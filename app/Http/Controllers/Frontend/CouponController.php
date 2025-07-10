<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function couponStore(Request $request)
    {
        $coupon = Coupon::where('code', $request->code)->first();

        if (! $coupon) {
            request()->session()->flash('error', 'Invalid coupon code, Please try again');

            return back();
        }
        if ($coupon) {
            $total_price = Cart::where('user_id', auth()->user()->id)->where('order_id', null)->sum('price');
            session()->put('coupon', [
                'id' => $coupon->id,
                'code' => $coupon->code,
                'value' => $coupon->discount($total_price),
            ]);
            request()->session()->flash('success', 'Coupon successfully applied');

            return redirect()->back();
        }
    }
}
