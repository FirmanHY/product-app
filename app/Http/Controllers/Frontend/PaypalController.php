<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    protected $provider;

    public function __construct()
    {
        $this->provider = new PayPalClient;
        $this->provider->setApiCredentials(config('services.paypal'));

        $token = $this->provider->getAccessToken();
        $this->provider->setAccessToken($token);
    }

    public function payment()
    {
        $cartItems = Cart::where('user_id', auth()->id())->whereNull('order_id')->get();

        $items = [];
        $total = 0;

        foreach ($cartItems as $item) {
            $product = Product::find($item->product_id);

            $items[] = [
                'name' => $product->title,
                'quantity' => (string) $item->quantity,
                'unit_amount' => [
                    'currency_code' => 'USD',
                    'value' => number_format($item->price, 2, '.', ''),
                ],
            ];

            $total += $item->price * $item->quantity;
        }

        $discount = session('coupon')['value'] ?? 0;
        $finalTotal = $total - $discount;

        $order = $this->provider->createOrder([
            'intent' => 'CAPTURE',
            'application_context' => [
                'return_url' => route('payment.success'),
                'cancel_url' => route('payment.cancel'),
            ],
            'purchase_units' => [
                [
                    'reference_id' => 'ORD-'.strtoupper(uniqid()),
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => number_format($finalTotal, 2, '.', ''),
                        'breakdown' => [
                            'item_total' => [
                                'currency_code' => 'USD',
                                'value' => number_format($total, 2, '.', ''),
                            ],
                            'discount' => [
                                'currency_code' => 'USD',
                                'value' => number_format($discount, 2, '.', ''),
                            ],
                        ],
                    ],
                    'items' => $items,
                ],
            ],
        ]);

        Cart::where('user_id', auth()->id())->whereNull('order_id')->update([
            'order_id' => session()->get('id'),
        ]);

        foreach ($order['links'] as $link) {
            if ($link['rel'] === 'approve') {
                return redirect()->away($link['href']);
            }
        }

        return redirect()->route('cart')->with('error', 'Something went wrong.');
    }

    public function success(Request $request)
    {
        $response = $this->provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            session()->flash('success', 'You successfully paid with PayPal!');
            session()->forget(['cart', 'coupon']);

            return redirect()->route('home');
        }

        return redirect()->route('cart')->with('error', 'Payment failed. Please try again.');
    }

    public function cancel()
    {
        return redirect()->route('cart')->with('error', 'Payment cancelled.');
    }
}
