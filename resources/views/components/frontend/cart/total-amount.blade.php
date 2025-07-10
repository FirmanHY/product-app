@props(['subtotal', 'couponValue', 'totalAmount'])

<div class="total-amount">
    <div class="row">
        <div class="col-lg-8 col-md-5 col-12">
            <div class="left">
                <div class="coupon">
                    <form action="{{ route('coupon-store') }}" method="POST">
                        @csrf
                        <input name="code" placeholder="Enter Your Coupon">
                        <button class="btn">Apply</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-7 col-12">
            <div class="right">
                <ul>
                    <li class="order_subtotal" data-price="{{ $subtotal }}">
                        Cart
                        Subtotal<span>${{ number_format($subtotal, 2) }}</span>
                    </li>
                    @if ($couponValue > 0)
                        <li class="coupon_price"
                            data-price="{{ $couponValue }}">You
                            Save<span>${{ number_format($couponValue, 2) }}</span>
                        </li>
                    @endif
                    <li class="last" id="order_total_price">You
                        Pay<span>${{ number_format($totalAmount, 2) }}</span>
                    </li>
                </ul>
                <div class="button5">
                    <a href="{{ route('checkout') }}"
                        class="btn">Checkout</a>
                    <a href="{{ route('product-grids') }}"
                        class="btn">Continue shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>
