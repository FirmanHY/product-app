@props(['subtotal', 'couponValue', 'totalAmount', 'shippingOptions'])

<div class="order-details">
    <div class="single-widget">
        <h2>CART TOTALS</h2>
        <div class="content">
            <ul>
                <li class="order_subtotal" data-price="{{ $subtotal }}">
                    Cart Subtotal<span>${{ number_format($subtotal, 2) }}</span>
                </li>
                <li class="shipping">
                    Shipping Cost
                    @if (count($shippingOptions) > 0 && Helper::cartCount() > 0)
                        <select name="shipping" class="nice-select">
                            <option value="">Select your address</option>
                            @foreach ($shippingOptions as $shipping)
                                <option value="{{ $shipping->id }}"
                                    class="shippingOption"
                                    data-price="{{ $shipping->price }}">
                                    {{ $shipping->type }}:
                                    ${{ $shipping->price }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <span>Free</span>
                    @endif
                </li>
                @if ($couponValue > 0)
                    <li class="coupon_price" data-price="{{ $couponValue }}">
                        You
                        Save<span>${{ number_format($couponValue, 2) }}</span>
                    </li>
                @endif
                <li class="last" id="order_total_price">
                    Total<span>${{ number_format($totalAmount, 2) }}</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="single-widget">
        <h2>Payments</h2>
        <div class="content">
            <div class="checkbox">
                <form-group>
                    <input name="payment_method" type="radio" value="cod">
                    <label> Cash On Delivery</label><br>
                    <input name="payment_method" type="radio" value="paypal">
                    <label> PayPal</label>
                </form-group>
            </div>
        </div>
    </div>
    <div class="single-widget payement">
        <div class="content">
            <img src="{{ asset('backend/img/payment-method.png') }}"
                alt="#">
        </div>
    </div>
    <div class="single-widget get-button">
        <div class="content">
            <div class="button">
                <button type="submit" class="btn">proceed to
                    checkout</button>
            </div>
        </div>
    </div>
</div>
