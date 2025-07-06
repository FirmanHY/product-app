@extends('frontend.layouts.master')

@section('title', 'F-SHOP || PRODUCT PAGE')

@section('main-content')

    <x-frontend.general.breadcrumbs active="Shop Lists" />
    <form action="{{ route('shop.filter') }}" method="POST">
        @csrf
        <!-- Product Style 1 -->
        <section class="product-area shop-sidebar shop-list shop section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-12">
                        <x-frontend.product-page.shop-sidebar :recent_products="$recent_products" />
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="row">
                            <div class="col-12">
                                <x-frontend.product-page.shop-top active="list" />
                            </div>
                        </div>
                        <div class="row">
                            @if (count($products))
                                @foreach ($products as $product)
                                    <x-frontend.general.product-card-list
                                        :product="$product" />
                                @endforeach
                            @else
                                <x-frontend.general.empty-state-product />
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-12 justify-content-center d-flex">
                                {{ $products->appends($_GET)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ End Product Style 1  -->
    </form>
    <x-frontend.general.product-modals :productLists="$products" />
@endsection
@push('styles')
    <style>
        .pagination {
            display: inline-flex;
        }

        .filter_button {
            /* height:20px; */
            text-align: center;
            background: #F7941D;
            padding: 8px 16px;
            margin-top: 10px;
            color: white;
        }
    </style>
@endpush
@push('scripts')
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js">
    </script>
    <script>
        $(document).ready(function() {
            /*----------------------------------------------------*/
            /*  Jquery Ui slider js
            /*----------------------------------------------------*/
            if ($("#slider-range").length > 0) {
                const max_value = parseInt($("#slider-range").data(
                    'max')) || 500;
                const min_value = parseInt($("#slider-range").data(
                    'min')) || 0;
                const currency = $("#slider-range").data('currency') || '';
                let price_range = min_value + '-' + max_value;
                if ($("#price_range").length > 0 && $("#price_range")
                    .val()) {
                    price_range = $("#price_range").val().trim();
                }

                let price = price_range.split('-');
                $("#slider-range").slider({
                    range: true,
                    min: min_value,
                    max: max_value,
                    values: price,
                    slide: function(event, ui) {
                        $("#amount").val(currency + ui.values[
                                0] + " -  " + currency + ui
                            .values[1]);
                        $("#price_range").val(ui.values[0] +
                            "-" + ui.values[1]);
                    }
                });
            }
            if ($("#amount").length > 0) {
                const m_currency = $("#slider-range").data('currency') ||
                    '';
                $("#amount").val(m_currency + $("#slider-range").slider(
                        "values", 0) +
                    "  -  " + m_currency + $("#slider-range").slider(
                        "values", 1));
            }
        })
    </script>
@endpush
