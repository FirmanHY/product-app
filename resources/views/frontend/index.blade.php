@extends('frontend.layouts.master')
@section('title','F-SHOP || HOME PAGE')
@section('main-content')
<!-- Slider Area -->
{{-- @if(count($banners)>0)
    <section id="Gslider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($banners as $key=>$banner)
        <li data-target="#Gslider" data-slide-to="{{$key}}" class="{{(($key==0)? 'active' : '')}}"></li>
            @endforeach

        </ol>
        <div class="carousel-inner" role="listbox">
                @foreach($banners as $key=>$banner)
                <div class="carousel-item {{(($key==0)? 'active' : '')}}">
                    <img class="first-slide" src="{{$banner->photo}}" alt="First slide">
                    <div class="carousel-caption d-none d-md-block text-left">
                        <h1 class="wow fadeInDown">{{$banner->title}}</h1>
                        <p>{!! html_entity_decode($banner->description) !!}</p>
                        <a class="btn btn-lg ws-btn wow fadeInUpBig" href="{{route('product-grids')}}" role="button">Shop Now<i class="far fa-arrow-alt-circle-right"></i></i></a>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#Gslider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#Gslider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </section>
@endif --}}

<!--/ End Slider Area -->

<!-- Start Small Banner  -->
<section class="small-banner section">
    <div class="container-fluid">
        <div class="row">
            @php
            $category_lists=DB::table('categories')->where('status','active')->limit(3)->get();
            @endphp
            @if($category_lists)
                @foreach($category_lists as $cat)
                    @if($cat->is_parent==1)
                        <!-- Single Banner  -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="single-banner">
                                @if($cat->photo)
                                    <img src="{{$cat->photo}}" alt="{{$cat->photo}}">
                                @else
                                    <img src="https://via.placeholder.com/600x370" alt="#">
                                @endif
                                {{-- <div class="content">
                                    <h3>{{$cat->title}}</h3>
                                        <a href="{{route('product-cat',$cat->slug)}}">Discover Now</a>
                                </div> --}}
                            </div>
                        </div>
                    @endif
                    <!-- /End Single Banner  -->
                @endforeach
            @endif
        </div>
    </div>
</section>
<!-- End Small Banner -->

<!-- Start Product Area -->
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
                            <!-- Tab Nav -->
                            <ul class="nav nav-tabs filter-tope-group" id="myTab" role="tablist">
                                @php
                                    $categories=DB::table('categories')->where('status','active')->where('is_parent',1)->get();
                                    // dd($categories);
                                @endphp
                                @if($categories)
                                <button class="btn" style="background:black"data-filter="*">
                                    All Products
                                </button>
                                    @foreach($categories as $key=>$cat)

                                    <button class="btn" style="background:none;color:black;"data-filter=".{{$cat->id}}">
                                        {{$cat->title}}
                                    </button>
                                    @endforeach
                                @endif
                            </ul>
                            <!--/ End Tab Nav -->
                        </div>
                        <div class="tab-content isotope-grid" id="myTabContent">
                             <!-- Start Single Tab -->
                            @if($product_lists)
                                @foreach($product_lists as $key=>$product)
                                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$product->cat_id}}">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="{{route('home',$product->slug)}}">
                                                @php
                                                    $photo=explode(',',$product->photo);
                                                // dd($photo);
                                                @endphp
                                                <img class="default-img" src="data:image/jpeg;base64,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" alt="data:image/jpeg;base64,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">
                                                <img class="hover-img" src="data:image/jpeg;base64,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" alt="data:image/jpeg;base64,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">
                                                @if($product->stock<=0)
                                                    <span class="out-of-stock">Sale out</span>
                                                @elseif($product->condition=='new')
                                                    <span class="new">New</span
                                                @elseif($product->condition=='hot')
                                                    <span class="hot">Hot</span>
                                                @else
                                                    <span class="price-dec">{{$product->discount}}% Off</span>
                                                @endif


                                            </a>
                                            <div class="button-head">
                                                <div class="product-action">
                                                    <a data-toggle="modal" data-target="#{{$product->id}}" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                    {{-- <a title="Wishlist" href="{{route('add-to-wishlist',$product->slug)}}" ><i class=" ti-heart "></i><span>Add to Wishlist</span></a> --}}
                                                </div>
                                                <div class="product-action-2">
                                                    {{-- <a title="Add to cart" href="{{route('add-to-cart',$product->slug)}}">Add to cart</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            {{-- <h3><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h3> --}}
                                            <div class="product-price">
                                                @php
                                                    $after_discount=($product->price-($product->price*$product->discount)/100);
                                                @endphp
                                                <span>${{number_format($after_discount,2)}}</span>
                                                <del style="padding-left:4%;">${{number_format($product->price,2)}}</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                             <!--/ End Single Tab -->
                            @endif

                        <!--/ End Single Tab -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- End Product Area -->
{{-- @php
    $featured=DB::table('products')->where('is_featured',1)->where('status','active')->orderBy('id','DESC')->limit(1)->get();
@endphp --}}
<!-- Start Midium Banner  -->
<section class="midium-banner">
    <div class="container">
        <div class="row">
            @if($featured)
                @foreach($featured as $data)
                    <!-- Single Banner  -->
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="single-banner">
                            @php
                                $photo=explode(',',$data->photo);
                            @endphp
                            <img src="{{$photo[0]}}" alt="{{$photo[0]}}">
                            <div class="content">
                                <p>{{$data->cat_info['title']}}</p>
                                <h3>{{$data->title}} <br>Up to<span> {{$data->discount}}%</span></h3>
                                {{-- <a href="{{route('product-detail',$data->slug)}}">Shop Now</a> --}}
                            </div>
                        </div>
                    </div>
                    <!-- /End Single Banner  -->
                @endforeach
            @endif
        </div>
    </div>
</section>
<!-- End Midium Banner -->

<!-- Start Most Popular -->
<div class="product-area most-popular section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Hot Item</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel popular-slider">
                    @foreach($product_lists as $product)
                        @if($product->condition=='hot')
                            <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-img">
                                {{-- <a href="{{route('product-detail',$product->slug)}}"> --}}
                                    @php
                                        $photo=explode(',',$product->photo);
                                    // dd($photo);
                                    @endphp
                                    <img class="default-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                    <img class="hover-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                    {{-- <span class="out-of-stock">Hot</span> --}}
                                </a>
                                <div class="button-head">
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#{{$product->id}}" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>

                                    </div>
                                    <div class="product-action-2">
                                        <a href="">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h3>
                                <div class="product-price">
                                    <span class="old">${{number_format($product->price,2)}}</span>
                                    @php
                                    $after_discount=($product->price-($product->price*$product->discount)/100)
                                    @endphp
                                    <span>${{number_format($after_discount,2)}}</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Most Popular Area -->

<!-- Start Shop Home List  -->
<section class="shop-home-list section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-section-title">
                            <h1>Latest Items</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @php
                        $product_lists=DB::table('products')->where('status','active')->orderBy('id','DESC')->limit(6)->get();
                    @endphp
                    @foreach($product_lists as $product)
                        <div class="col-md-4">
                            <!-- Start Single List  -->
                            <div class="single-list">
                                <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="list-image overlay">
                                        @php
                                            $photo=explode(',',$product->photo);
                                            // dd($photo);
                                        @endphp
                                        <img src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                        {{-- <a href="{{route('add-to-cart',$product->slug)}}" class="buy"><i class="fa fa-shopping-bag"></i></a> --}}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 no-padding">
                                    <div class="content">
                                        <h4 class="title"><a href="#">{{$product->title}}</a></h4>
                                        <p class="price with-discount">${{number_format($product->discount,2)}}</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- End Single List  -->
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Shop Home List  -->

<!-- Start Shop Blog  -->
<section class="shop-blog section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>From Our Blog</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Shop Blog  -->

<!-- Start Shop Services Area -->
<section class="shop-services section home">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-rocket"></i>
                    <h4>Free shiping</h4>
                    <p>Orders over $100</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-reload"></i>
                    <h4>Free Return</h4>
                    <p>Within 30 days returns</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-lock"></i>
                    <h4>Sucure Payment</h4>
                    <p>100% secure payment</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-tag"></i>
                    <h4>Best Peice</h4>
                    <p>Guaranteed price</p>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
</section>
<!-- End Shop Services Area -->

{{-- @include('frontend.layouts.newsletter') --}}

<!-- Modal -->
@if($product_lists)
    @foreach($product_lists as $key=>$product)
        <div class="modal fade" id="{{$product->id}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                        </div>
                        <div class="modal-body">
                            <div class="row no-gutters">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <!-- Product Slider -->
                                        <div class="product-gallery">
                                            <div class="quickview-slider-active">
                                                @php
                                                    $photo=explode(',',$product->photo);
                                                // dd($photo);
                                                @endphp
                                                @foreach($photo as $data)
                                                    <div class="single-slider">
                                                        <img src="{{$data}}" alt="{{$data}}">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    <!-- End Product slider -->
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <div class="quickview-content">
                                        <h2>{{$product->title}}</h2>
                                        <div class="quickview-ratting-review">
                                            <div class="quickview-ratting-wrap">
                                                <div class="quickview-ratting">
                                                    {{-- <i class="yellow fa fa-star"></i>
                                                    <i class="yellow fa fa-star"></i>
                                                    <i class="yellow fa fa-star"></i>
                                                    <i class="yellow fa fa-star"></i>
                                                    <i class="fa fa-star"></i> --}}
                                                    {{-- @php
                                                        $rate=DB::table('product_reviews')->where('product_id',$product->id)->avg('rate');
                                                        $rate_count=DB::table('product_reviews')->where('product_id',$product->id)->count();
                                                    @endphp
                                                    @for($i=1; $i<=5; $i++)
                                                        @if($rate>=$i)
                                                            <i class="yellow fa fa-star"></i>
                                                        @else
                                                        <i class="fa fa-star"></i>
                                                        @endif
                                                    @endfor --}}
                                               
                                            </div>
                                            <div class="quickview-stock">
                                                @if($product->stock >0)
                                                <span><i class="fa fa-check-circle-o"></i> {{$product->stock}} in stock</span>
                                                @else
                                                <span><i class="fa fa-times-circle-o text-danger"></i> {{$product->stock}} out stock</span>
                                                @endif
                                            </div>
                                        </div>
                                        @php
                                            $after_discount=($product->price-($product->price*$product->discount)/100);
                                        @endphp
                                        <h3><small><del class="text-muted">${{number_format($product->price,2)}}</del></small>    ${{number_format($after_discount,2)}}  </h3>
                                        <div class="quickview-peragraph">
                                            <p>{!! html_entity_decode($product->summary) !!}</p>
                                        </div>
                                        @if($product->size)
                                            <div class="size">
                                                <div class="row">
                                                    <div class="col-lg-6 col-12">
                                                        <h5 class="title">Size</h5>
                                                        <select>
                                                            @php
                                                            $sizes=explode(',',$product->size);
                                                            // dd($sizes);
                                                            @endphp
                                                            @foreach($sizes as $size)
                                                                <option>{{$size}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 col-12">
                                                        <h5 class="title">Color</h5>
                                                        <select>
                                                            <option selected="selected">orange</option>
                                                            <option>purple</option>
                                                            <option>black</option>
                                                            <option>pink</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="default-social">
                                        <!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    @endforeach
@endif
<!-- Modal end -->
@endsection

@push('styles')
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script>
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script>
    <style>
        /* Banner Sliding */
        #Gslider .carousel-inner {
        background: #000000;
        color:black;
        }

        #Gslider .carousel-inner{
        height: 550px;
        }
        #Gslider .carousel-inner img{
            width: 100% !important;
            opacity: .8;
        }

        #Gslider .carousel-inner .carousel-caption {
        bottom: 60%;
        }

        #Gslider .carousel-inner .carousel-caption h1 {
        font-size: 50px;
        font-weight: bold;
        line-height: 100%;
        color: #F7941D;
        }

        #Gslider .carousel-inner .carousel-caption p {
        font-size: 18px;
        color: black;
        margin: 28px 0 28px 0;
        }

        #Gslider .carousel-indicators {
        bottom: 70px;
        }
    </style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>

        /*==================================================================
        [ Isotope ]*/
        var $topeContainer = $('.isotope-grid');
        var $filter = $('.filter-tope-group');

        // filter items on button click
        $filter.each(function () {
            $filter.on('click', 'button', function () {
                var filterValue = $(this).attr('data-filter');
                $topeContainer.isotope({filter: filterValue});
            });

        });

        // init Isotope
        $(window).on('load', function () {
            var $grid = $topeContainer.each(function () {
                $(this).isotope({
                    itemSelector: '.isotope-item',
                    layoutMode: 'fitRows',
                    percentPosition: true,
                    animationEngine : 'best-available',
                    masonry: {
                        columnWidth: '.isotope-item'
                    }
                });
            });
        });

        var isotopeButton = $('.filter-tope-group button');

        $(isotopeButton).each(function(){
            $(this).on('click', function(){
                for(var i=0; i<isotopeButton.length; i++) {
                    $(isotopeButton[i]).removeClass('how-active1');
                }

                $(this).addClass('how-active1');
            });
        });
    </script>
    <script>
         function cancelFullScreen(el) {
            var requestMethod = el.cancelFullScreen||el.webkitCancelFullScreen||el.mozCancelFullScreen||el.exitFullscreen;
            if (requestMethod) { // cancel full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
        }

        function requestFullScreen(el) {
            // Supports most browsers and their versions.
            var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullscreen;

            if (requestMethod) { // Native full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
            return false
        }
    </script>

@endpush
