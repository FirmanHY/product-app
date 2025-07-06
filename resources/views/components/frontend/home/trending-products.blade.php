@props(['categories', 'productLists'])

<div class="product-area section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Trending Item</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-info">
                    <div class="nav-main">
                        <ul class="nav nav-tabs filter-tope-group" id="myTab"
                            role="tablist">
                            <button class="btn" style="background:black"
                                data-filter="*">All Products</button>
                            @foreach ($categories as $cat)
                                <button class="btn"
                                    style="background:none;color:black;"
                                    data-filter=".{{ $cat->id }}">{{ $cat->title }}</button>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-content isotope-grid" id="myTabContent">
                        @foreach ($productLists as $product)
                            <x-frontend.general.product-card-grid
                                :product="$product"
                                wrapperClass="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $product->cat_id }}" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
