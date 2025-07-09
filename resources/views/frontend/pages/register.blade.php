@extends('frontend.layouts.master')

@section('title', 'F-Shop | Register')

@section('main-content')
    <x-frontend.general.breadcrumbs active="Register" />

    <section class="shop login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-12">
                    <div class="login-form">
                        <h2>Register</h2>
                        <p>Create an account to checkout faster</p>

                        <form class="form" method="POST"
                            action="{{ route('register.submit') }}">
                            @csrf

                            <x-frontend.general.form-field label="Full Name"
                                name="name" type="text"
                                placeholder="Enter your full name"
                                value="{{ old('name') }}" />

                            <x-frontend.general.form-field label="Email Address"
                                name="email" type="email"
                                placeholder="Enter your email"
                                value="{{ old('email') }}" />

                            <x-frontend.general.form-field label="Password"
                                name="password" type="password"
                                placeholder="Enter your password"
                                value="{{ old('password') }}" />

                            <x-frontend.general.form-field label="Confirm Password"
                                name="password_confirmation" type="password"
                                placeholder="Confirm your password"
                                value="{{ old('password_confirmation') }}" />

                            <div class="form-group login-btn">
                                <button class="btn"
                                    type="submit">Register</button>
                                <a href="{{ route('login.form') }}"
                                    class="btn btn-secondary">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .shop.login .form .btn {
            margin-right: 0;
        }
    </style>
@endpush
