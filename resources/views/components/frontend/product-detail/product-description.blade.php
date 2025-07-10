@props(['product' => '', 'afterDiscount' => 0])

<div class="product-des">

    <div class="short">
        <h4>{{ $product->title }}</h4>
        <p class="price">
            <span class="discount">${{ number_format($afterDiscount, 2) }}</span>
            <s>${{ number_format($product->price, 2) }}</s>
        </p>
        <p class="description">{!! $product->summary !!}</p>
    </div>

    @if ($product->size)
        <div class="size mt-4">
            <h4>Size</h4>
            <ul>
                @php
                    $sizes = explode(',', $product->size);

                @endphp
                @foreach ($sizes as $size)
                    <li><a href="#" class="one">{{ $size }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="product-buy">
        <form action="{{ route('single-add-to-cart') }}" method="POST">
            @csrf
            <div class="quantity">
                <h6>Quantity :</h6>
                <!-- Input Order -->
                <div class="input-group">
                    <div class="button minus">
                        <button type="button"
                            class="btn btn-primary btn-number"
                            disabled="disabled" data-type="minus"
                            data-field="quant[1]">
                            <i class="ti-minus"></i>
                        </button>
                    </div>
                    <input type="hidden" name="slug"
                        value="{{ $product->slug }}">
                    <input type="text" name="quant[1]" class="input-number"
                        data-min="1" data-max="1000" value="1"
                        id="quantity">
                    <div class="button plus">
                        <button type="button"
                            class="btn btn-primary btn-number" data-type="plus"
                            data-field="quant[1]">
                            <i class="ti-plus"></i>
                        </button>
                    </div>
                </div>
                <!--/ End Input Order -->
            </div>
            <div class="add-to-cart mt-4">
                <button type="submit" class="btn">Add to cart</button>
                <a href="{{ route('add-to-wishlist', $product->slug) }}"
                    class="btn min"><i class="ti-heart"></i></a>
            </div>
        </form>

        <p class="cat">Category : {{ $product->cat_info['title'] }}</p>
        @if ($product->sub_cat_info)
            <p class="cat mt-1">Sub Category
                :{{ $product->sub_cat_info['title'] }}</p>
        @endif
        <p class="availability">Stock :
            @if ($product->stock > 0)
                <span class="badge badge-success">{{ $product->stock }}</span>
            @else
                <span class="badge badge-danger">{{ $product->stock }}</span>
            @endif
        </p>
    </div>
</div>
