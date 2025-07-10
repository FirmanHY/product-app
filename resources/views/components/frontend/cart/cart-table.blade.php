@props(['cartItems'])

<table class="table shopping-summery">
    <thead>
        <tr class="main-hading">
            <th>PRODUCT</th>
            <th>NAME</th>
            <th class="text-center">UNIT PRICE</th>
            <th class="text-center">QUANTITY</th>
            <th class="text-center">TOTAL</th>
            <th class="text-center"><i class="ti-trash remove-icon"></i></th>
        </tr>
    </thead>
    <tbody id="cart_item_list">
        <form action="{{ route('cart.update') }}" method="POST">
            @csrf
            @if ($cartItems)
                @foreach ($cartItems as $key => $cart)
                    @php
                        $photo = explode(',', $cart->product['photo']);
                    @endphp
                    <tr>
                        <td class="image" data-title="No"><img
                                src="{{ $photo[0] }}"
                                alt="{{ $photo[0] }}"></td>
                        <td class="product-des" data-title="Description">
                            <p class="product-name"><a
                                    href="{{ route('product-detail', $cart->product['slug']) }}"
                                    target="_blank">{{ $cart->product['title'] }}</a>
                            </p>
                            <p class="product-des">{!! $cart['summary'] !!}</p>
                        </td>
                        <td class="price" data-title="Price">
                            <span>${{ number_format($cart['price'], 2) }}</span>
                        </td>
                        <td class="qty" data-title="Qty">
                            <div class="input-group">
                                <div class="button minus">
                                    <button type="button"
                                        class="btn btn-primary btn-number"
                                        disabled="disabled" data-type="minus"
                                        data-field="quant[{{ $key }}]">
                                        <i class="ti-minus"></i>
                                    </button>
                                </div>
                                <input type="text"
                                    name="quant[{{ $key }}]"
                                    class="input-number" data-min="1"
                                    data-max="100"
                                    value="{{ $cart->quantity }}">
                                <input type="hidden" name="qty_id[]"
                                    value="{{ $cart->id }}">
                                <div class="button plus">
                                    <button type="button"
                                        class="btn btn-primary btn-number"
                                        data-type="plus"
                                        data-field="quant[{{ $key }}]">
                                        <i class="ti-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="total-amount cart_single_price"
                            data-title="Total"><span
                                class="money">${{ $cart['amount'] }}</span>
                        </td>
                        <td class="action" data-title="Remove"><a
                                href="{{ route('cart-delete', $cart->id) }}"><i
                                    class="ti-trash remove-icon"></i></a></td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="float-right">
                        <button class="btn float-right"
                            type="submit">Update</button>
                    </td>
                </tr>
            @else
                <tr>
                    <td class="text-center" colspan="6">
                        There are no any carts available. <a
                            href="{{ route('product-grids') }}"
                            style="color:blue;">Continue shopping</a>
                    </td>
                </tr>
            @endif
        </form>
    </tbody>
</table>
