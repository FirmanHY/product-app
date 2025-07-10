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
