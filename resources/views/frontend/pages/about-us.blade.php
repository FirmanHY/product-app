@extends('frontend.layouts.master')

@section('title', 'F-SHOP || About Us')

@section('main-content')

    <x-frontend.general.breadcrumbs active="About us" />

    <!-- About Us -->
    <section class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="about-content">
                        <h3>Welcome To <span>Fshop</span></h3>
                        <p>Fshop is your ultimate destination for all things sports.
                            We offer a wide range of high-quality sports equipment,
                            apparel, and accessories for athletes of all levels.
                            Whether you're a professional athlete or just starting
                            your fitness journey, we have something for everyone.
                            Our mission is to provide the best products at
                            competitive prices, ensuring you can perform at your
                            best without breaking the bank. With a focus on customer
                            satisfaction, fast shipping, and top-notch service,
                            Fshop is here to support your active lifestyle.</p>
                        <h4>Our Products</h4>
                        <p>We offer a diverse selection of sports gear, including:
                        </p>
                        <ul>
                            <li>Football equipment</li>
                            <li>Basketball gear</li>
                            <li>Running shoes and apparel</li>
                            <li>Fitness accessories</li>
                            <li>And much more!</li>
                        </ul>
                        <h4>Why Choose Fshop?</h4>
                        <ul>
                            <li>Competitive pricing</li>
                            <li>High-quality products</li>
                            <li>Fast and reliable shipping</li>
                            <li>Exceptional customer service</li>
                            <li>Easy returns</li>
                        </ul>
                        <p>At Fshop, we are committed to providing our customers
                            with the best products and services. We carefully select
                            our products to ensure they meet the highest standards
                            of quality and performance. Our team is passionate about
                            sports and dedicated to helping you achieve your goals.
                        </p>

                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="about-img overlay">
                        <img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211"
                            alt="Athlete running on a track">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us -->

    <x-frontend.general.services-area />

@endsection
