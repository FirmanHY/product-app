<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.user.index');
    }

    public function orderIndex()
    {
        $orders = Order::orderBy('id', 'DESC')->where('user_id', auth()->user()->id)->paginate(10);

        return view('frontend.user.order.index')->with('orders', $orders);
    }

    public function orderShow($id)
    {
        $order = Order::find($id);

        return view('frontend.user.order.show')->with('order', $order);
    }

    public function userOrderDelete($id)
    {
        $order = Order::find($id);
        if ($order) {
            if ($order->status == 'process' || $order->status == 'delivered' || $order->status == 'cancel') {
                return redirect()->back()->with('error', 'You can not delete this order now');
            } else {
                $status = $order->delete();
                if ($status) {
                    request()->session()->flash('success', 'Order Successfully deleted');
                } else {
                    request()->session()->flash('error', 'Order can not deleted');
                }

                return redirect()->route('user.order.index');
            }
        } else {
            request()->session()->flash('error', 'Order can not found');

            return redirect()->back();
        }
    }
}
