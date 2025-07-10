@props(['product' => []])
<div class="col-12">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="single-product">
                <div class="product-img">
                    <a href="{{ route('product-detail', $product->slug) }}">
                        @php
                            $photo = explode(',', $product->photo);
                        @endphp
                        <img class="default-img" src="{{ $photo[0] }}"
                            alt="{{ $photo[0] }}">
                        <img class="hover-img" src="{{ $photo[0] }}"
                            alt="{{ $photo[0] }}">
                    </a>
                    <div class="button-head">
                        <div class="product-action">
                            <a data-toggle="modal"
                                data-target="#{{ $product->id }}"
                                title="Quick View" href="#"><i
                                    class="ti-eye"></i><span>Quick
                                    Shop</span></a>
                            <a title="Wishlist"
                                href="{{ route('add-to-wishlist', $product->slug) }}"
                                class="wishlist"
                                data-id="{{ $product->id }}"><i
                                    class="ti-heart"></i><span>Add to
                                    Wishlist</span></a>
                        </div>
                        <div class="product-action-2">
                            <a title="Add to cart"
                                href="{{ route('add-to-cart', $product->slug) }}">Add
                                to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-6 col-12">
            <div class="list-content">
                <div class="product-content">
                    <div class="product-price">
                        @php
                            $after_discount =
                                $product->price -
                                ($product->price * $product->discount) / 100;
                        @endphp
                        <span>${{ number_format($after_discount, 2) }}</span>
                        <del>${{ number_format($product->price, 2) }}</del>
                    </div>
                    <h3 class="title"><a
                            href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a>
                    </h3>
                </div>
                <p class="des pt-2">{!! html_entity_decode($product->summary) !!}</p>
                <a href="javascript:void(0)" class="btn cart"
                    data-id="{{ $product->id }}">Buy Now!</a>
            </div>
        </div>
    </div>
</div>
