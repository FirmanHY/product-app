@extends('frontend.layouts.master')

@section('title', 'F-Shop | Login')

@section('main-content')
    <x-frontend.general.breadcrumbs active="Login" />

    <section class="shop login section">
        <div class signe="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-12">
                    <div class="login-form">
                        <h2>Login</h2>
                        <p>Sign in to checkout faster</p>

                        <form class="form" method="POST"
                            action="{{ route('login.submit') }}">
                            @csrf

                            <x-frontend.general.form-field label="Email Address"
                                name="email" type="email"
                                placeholder="Enter your email"
                                value="{{ old('email') }}" />

                            <x-frontend.general.form-field label="Password"
                                name="password" type="password"
                                placeholder="Enter your password"
                                value="{{ old('password') }}" />

                            <div class="form-group login-btn">
                                <button class="btn" type="submit">Login</button>
                                <a href="{{ route('register.form') }}"
                                    class="btn btn-secondary">Register</a>
                            </div>

                            <div class="checkbox">
                                <label class="checkbox-inline" for="remember-me">
                                    <input name="remember" id="remember-me"
                                        type="checkbox">
                                    Remember me
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <a class="lost-pass"
                                    href="{{ route('password.reset') }}">
                                    Forgot your password?
                                </a>
                            @endif
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
