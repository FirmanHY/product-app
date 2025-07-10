<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\User;
use App\Notifications\StatusNotification;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Notification;

class OrderController extends Controller
{
    public function checkout()
    {
        $cartItems = Helper::getAllProductFromCart();
        $subtotal = Helper::totalCartPrice();
        $shippingOptions = Helper::shipping();
        $couponValue = session()->has('coupon') ? session('coupon')['value'] : 0;
        $totalAmount = $subtotal - $couponValue;

        return view('frontend.pages.checkout', compact('cartItems', 'shippingOptions', 'subtotal', 'couponValue', 'totalAmount'));
    }

    public function incomeChart(Request $request)
    {
        $year = \Carbon\Carbon::now()->year;

        $items = Order::with(['cart_info'])->whereYear('created_at', $year)->where('status', 'delivered')->get()
            ->groupBy(function ($d) {
                return \Carbon\Carbon::parse($d->created_at)->format('m');
            });

        $result = [];
        foreach ($items as $month => $item_collections) {
            foreach ($item_collections as $item) {
                $amount = $item->cart_info->sum('amount');

                $m = intval($month);

                isset($result[$m]) ? $result[$m] += $amount : $result[$m] = $amount;
            }
        }
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthName = date('F', mktime(0, 0, 0, $i, 1));
            $data[$monthName] = (! empty($result[$i])) ? number_format((float) ($result[$i]), 2, '.', '') : 0.0;
        }

        return $data;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            'address1' => 'string|required',
            'address2' => 'string|nullable',
            'coupon' => 'nullable|numeric',
            'phone' => 'numeric|required',
            'post_code' => 'string|nullable',
            'email' => 'string|required',
        ]);

        if (empty(Cart::where('user_id', auth()->user()->id)->where('order_id', null)->first())) {
            request()->session()->flash('error', 'Cart is Empty !');

            return back();
        }

        $order = new Order;
        $order_data = $request->all();
        $order_data['order_number'] = 'ORD-'.strtoupper(Str::random(10));
        $order_data['user_id'] = $request->user()->id;
        $order_data['shipping_id'] = $request->shipping;
        $shipping = Shipping::where('id', $order_data['shipping_id'])->pluck('price');

        $order_data['sub_total'] = Helper::totalCartPrice();
        $order_data['quantity'] = Helper::cartCount();
        if (session('coupon')) {
            $order_data['coupon'] = session('coupon')['value'];
        }
        if ($request->shipping) {
            if (session('coupon')) {
                $order_data['total_amount'] = Helper::totalCartPrice() + $shipping[0] - session('coupon')['value'];
            } else {
                $order_data['total_amount'] = Helper::totalCartPrice() + $shipping[0];
            }
        } else {
            if (session('coupon')) {
                $order_data['total_amount'] = Helper::totalCartPrice() - session('coupon')['value'];
            } else {
                $order_data['total_amount'] = Helper::totalCartPrice();
            }
        }

        $order_data['status'] = 'new';
        if (request('payment_method') == 'paypal') {
            $order_data['payment_method'] = 'paypal';
            $order_data['payment_status'] = 'paid';
        } else {
            $order_data['payment_method'] = 'cod';
            $order_data['payment_status'] = 'Unpaid';
        }
        $order->fill($order_data);
        $status = $order->save();
        if ($order) {

            $users = User::where('role', 'admin')->first();
        }
        $details = [
            'title' => 'New order created',
            'actionURL' => route('user.order.show', $order->id),
            'fas' => 'fa-file-alt',
        ];
        Notification::send($users, new StatusNotification($details));
        if (request('payment_method') == 'paypal') {
            return redirect()->route('payment')->with(['id' => $order->id]);
        } else {
            session()->forget('cart');
            session()->forget('coupon');
        }
        Cart::where('user_id', auth()->user()->id)->where('order_id', null)->update(['order_id' => $order->id]);

        request()->session()->flash('success', 'Your product successfully placed in order');

        return redirect()->route('home');
    }
}
