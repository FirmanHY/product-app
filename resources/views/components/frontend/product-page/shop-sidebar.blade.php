@props(['recent_products' => []])

<div class="shop-sidebar">
    <!-- Categories -->
    <div class="single-widget category">
        <h3 class="title">Categories</h3>
        <ul class="categor-list">
            @php
                $menu = App\Models\Category::getAllParentWithChild();
            @endphp
            @if ($menu)
                <li>
                    @foreach ($menu as $cat_info)
                        @if ($cat_info->child_cat->count() > 0)
                <li><a
                        href="{{ route('product-cat', $cat_info->slug) }}">{{ $cat_info->title }}</a>
                    <ul>
                        @foreach ($cat_info->child_cat as $sub_menu)
                            <li><a
                                    href="{{ route('product-sub-cat', [$cat_info->slug, $sub_menu->slug]) }}">{{ $sub_menu->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @else
                <li><a
                        href="{{ route('product-cat', $cat_info->slug) }}">{{ $cat_info->title }}</a>
                </li>
            @endif
            @endforeach
            </li>
            @endif
        </ul>
    </div>
    <!-- Shop By Price -->
    <div class="single-widget range">
        <h3 class="title">Shop by Price</h3>
        <div class="price-filter">
            <div class="price-filter-inner">
                @php
                    $max = DB::table('products')->max('price');
                @endphp
                <div id="slider-range" data-min="0"
                    data-max="{{ $max }}"></div>
                <div class="product_filter">
                    <button type="submit" class="filter_button">Filter</button>
                    <div class="label-input">
                        <span>Range:</span>
                        <input style="" type="text" id="amount"
                            readonly />
                        <input type="hidden" name="price_range"
                            id="price_range"
                            value="@if (!empty($_GET['price'])) {{ $_GET['price'] }} @endif" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Recent Posts -->
    <div class="single-widget recent-post">
        <h3 class="title">Recent post</h3>
        @foreach ($recent_products as $product)
            @php
                $photo = explode(',', $product->photo);
            @endphp
            <div class="single-post first">
                <div class="image">
                    <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                </div>
                <div class="content">
                    <h5><a
                            href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a>
                    </h5>
                    @php
                        $org =
                            $product->price -
                            ($product->price * $product->discount) / 100;
                    @endphp
                    <p class="price"><del
                            class="text-muted">${{ number_format($product->price, 2) }}</del>
                        ${{ number_format($org, 2) }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Brands -->
    <div class="single-widget category">
        <h3 class="title">Brands</h3>
        <ul class="categor-list">
            @php
                $brands = DB::table('brands')
                    ->orderBy('title', 'ASC')
                    ->where('status', 'active')
                    ->get();
            @endphp
            @foreach ($brands as $brand)
                <li><a
                        href="{{ route('product-brand', $brand->slug) }}">{{ $brand->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
