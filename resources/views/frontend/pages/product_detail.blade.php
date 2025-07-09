@extends('frontend.layouts.master')

@section('meta')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords"
        content="online shop, purchase, cart, ecommerce site, best online shopping">
    <meta name="description" content="{{ $product_detail->summary }}">
    <meta property="og:url"
        content="{{ route('product-detail', $product_detail->slug) }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $product_detail->title }}">
    <meta property="og:image" content="{{ $product_detail->photo }}">
    <meta property="og:description" content="{{ $product_detail->description }}">
@endsection
@section('title', 'F-SHOP || PRODUCT DETAIL')
@section('main-content')

    <x-frontend.general.breadcrumbs active="Shop Details" />

    <section class="shop single section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-6 col-12">

                            <x-frontend.product-detail.product-gallery
                                :photos="explode(',', $product_detail->photo)" />
                        </div>
                        <div class="col-lg-6 col-12">

                            <x-frontend.product-detail.product-description
                                :product="$product_detail" :afterDiscount="$product_detail->price -
                                    ($product_detail->price *
                                        $product_detail->discount) /
                                        100"
                                :sizes="$product_detail->size
                                    ? explode(',', $product_detail->size)
                                    : []" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">

                            <x-frontend.product-detail.product-info-tabs
                                :description="$product_detail->description" />
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!--/ End Shop Single -->

@endsection

@push('styles')
    <style>
        /* Rating */
        .rating_box {
            display: inline-flex;
        }

        .star-rating {
            font-size: 0;
            padding-left: 10px;
            padding-right: 10px;
        }

        .star-rating__wrap {
            display: inline-block;
            font-size: 1rem;
        }

        .star-rating__wrap:after {
            content: "";
            display: table;
            clear: both;
        }

        .star-rating__ico {
            float: right;
            padding-left: 2px;
            cursor: pointer;
            color: #F7941D;
            font-size: 16px;
            margin-top: 5px;
        }

        .star-rating__ico:last-child {
            padding-left: 0;
        }

        .star-rating__input {
            display: none;
        }

        .star-rating__ico:hover:before,
        .star-rating__ico:hover~.star-rating__ico:before,
        .star-rating__input:checked~.star-rating__ico:before {
            content: "\F005";
        }
    </style>
@endpush
