@extends('frontend.layouts.master')
@section('title', 'Wishlist Page')
@section('main-content')

    <x-frontend.general.breadcrumbs active="Wishlist" />

    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Shopping Summery -->
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th>PRODUCT</th>
                                <th>NAME</th>
                                <th class="text-center">TOTAL</th>
                                <th class="text-center">ADD TO CART</th>
                                <th class="text-center"><i
                                        class="ti-trash remove-icon"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (Helper::getAllProductFromWishlist())
                                @foreach (Helper::getAllProductFromWishlist() as $key => $wishlist)
                                    <tr>
                                        @php
                                            $photo = explode(
                                                ',',
                                                $wishlist->product['photo'],
                                            );
                                        @endphp
                                        <td class="image" data-title="No"><img
                                                src="{{ $photo[0] }}"
                                                alt="{{ $photo[0] }}"></td>
                                        <td class="product-des"
                                            data-title="Description">
                                            <p class="product-name"><a
                                                    href="{{ route('product-detail', $wishlist->product['slug']) }}">{{ $wishlist->product['title'] }}</a>
                                            </p>
                                            <p class="product-des">
                                                {!! $wishlist['summary'] !!}</p>
                                        </td>
                                        <td class="total-amount" data-title="Total">
                                            <span>${{ $wishlist['amount'] }}</span>
                                        </td>
                                        <td><a href="{{ route('add-to-cart', $wishlist->product['slug']) }}"
                                                class='btn text-white'>Add To
                                                Cart</a></td>
                                        <td class="action" data-title="Remove"><a
                                                href="{{ route('wishlist-delete', $wishlist->id) }}"><i
                                                    class="ti-trash remove-icon"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center">
                                        There are no any wishlist available. <a
                                            href="{{ route('product-grids') }}"
                                            style="color:blue;">Continue
                                            shopping</a>

                                    </td>
                                </tr>
                            @endif

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <x-frontend.general.services-area />
@endsection
@push('scripts')
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js">
    </script>
@endpush
