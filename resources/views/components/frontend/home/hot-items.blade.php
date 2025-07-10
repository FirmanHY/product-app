@props(['productLists'])

<div class="product-area most-popular section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Hot Item</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel popular-slider">
                    @foreach ($productLists as $product)
                        @if ($product->condition == 'hot')
                            <div class="single-product">
                                <div class="product-img">
                                    <a
                                        href="{{ route('product-detail', $product->slug) }}">
                                        @php $photo = explode(',', $product->photo); @endphp
                                        <img class="default-img"
                                            src="{{ $photo[0] }}"
                                            alt="{{ $photo[0] }}">
                                        <img class="hover-img"
                                            src="{{ $photo[0] }}"
                                            alt="{{ $photo[0] }}">
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action">
                                            <a data-toggle="modal"
                                                data-target="#{{ $product->id }}"
                                                title="Quick View"
                                                href="#">
                                                <i class="ti-eye"></i><span>Quick
                                                    Shop</span>
                                            </a>
                                            <a title="Wishlist"
                                                href="{{ route('add-to-wishlist', $product->slug) }}">
                                                <i class="ti-heart"></i><span>Add
                                                    to Wishlist</span>
                                            </a>
                                        </div>
                                        <div class="product-action-2">
                                            <a
                                                href="{{ route('add-to-cart', $product->slug) }}">Add
                                                to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a
                                            href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a>
                                    </h3>
                                    <div class="product-price">
                                        <span
                                            class="old">${{ number_format($product->price, 2) }}</span>
                                        @php
                                            $after_discount =
                                                $product->price -
                                                ($product->price *
                                                    $product->discount) /
                                                    100;
                                        @endphp
                                        <span>${{ number_format($after_discount, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
