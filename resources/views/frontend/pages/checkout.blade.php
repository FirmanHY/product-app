@extends('frontend.layouts.master')

@section('title', 'Checkout page')

@section('main-content')

    <x-frontend.general.breadcrumbs active="Checkout" />

    <section class="shop checkout section">
        <div class="container">
            <form class="form" method="POST" action="{{ route('cart.order') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <x-frontend.checkout.checkout-form />
                    </div>
                    <div class="col-lg-4 col-12">
                        <x-frontend.checkout.order-details :subtotal="$subtotal"
                            :couponValue="$couponValue" :totalAmount="$totalAmount" :shippingOptions="$shippingOptions" />
                    </div>
                </div>
            </form>
        </div>
    </section>

    <x-frontend.general.services-area />
@endsection
@push('styles')
    <style>
        li.shipping {
            display: inline-flex;
            width: 100%;
            font-size: 14px;
        }

        li.shipping .input-group-icon {
            width: 100%;
            margin-left: 10px;
        }

        .input-group-icon .icon {
            position: absolute;
            left: 20px;
            top: 0;
            line-height: 40px;
            z-index: 3;
        }

        .form-select {
            height: 30px;
            width: 100%;
        }

        .form-select .nice-select {
            border: none;
            border-radius: 0px;
            height: 40px;
            background: #f6f6f6 !important;
            padding-left: 45px;
            padding-right: 40px;
            width: 100%;
        }

        .list li {
            margin-bottom: 0 !important;
        }

        .list li:hover {
            background: #F7941D !important;
            color: white !important;
        }

        .form-select .nice-select::after {
            top: 14px;
        }
    </style>
@endpush
@push('scripts')
    <script
        src="{{ asset('frontend/js/nice-select/js/jquery.nice-select.min.js') }}">
    </script>
    <script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("select.select2").select2();
        });
        $('select.nice-select').niceSelect();
    </script>
    <script>
        function showMe(box) {
            var checkbox = document.getElementById('shipping').style.display;
            // alert(checkbox);
            var vis = 'none';
            if (checkbox == "none") {
                vis = 'block';
            }
            if (checkbox == "block") {
                vis = "none";
            }
            document.getElementById(box).style.display = vis;
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.shipping select[name=shipping]').change(function() {
                let cost = parseFloat($(this).find(
                    'option:selected').data('price')) || 0;
                let subtotal = parseFloat($('.order_subtotal').data(
                    'price'));
                let coupon = parseFloat($('.coupon_price').data(
                    'price')) || 0;
                // alert(coupon);
                $('#order_total_price span').text('$' + (subtotal +
                    cost - coupon).toFixed(2));
            });

        });
    </script>
@endpush
