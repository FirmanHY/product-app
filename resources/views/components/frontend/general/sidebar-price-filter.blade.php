@props(['max_price' => 0, 'current_price_range' => ''])

<div class="single-widget range">
    <h3 class="title">Shop by Price</h3>
    <div class="price-filter">
        <div class="price-filter-inner">
            <div id="slider-range" data-min="0" data-max="{{ $max_price }}">
            </div>
            <div class="product_filter">

                <button type="submit" class="filter_button">Filter</button>
                <div class="label-input">
                    <span>Range:</span>
                    <input style="" type="text" id="amount"
                        readonly />
                    <input type="hidden" name="price_range" id="price_range"
                        value="{{ $current_price_range }}" />

                </div>
            </div>
        </div>
    </div>
</div>
