@extends('layouts.app')
@section('content')
    {{-- <div class="section page-banner-section" style="background-image: url(assets/images/page-banner.jpg)">
        <div class="container">
            <!-- Page Banner Content End -->
            <div class="page-banner-content">
                <h2 class="title">Login</h2>

                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Login</li>
                </ul>
            </div>
            <!-- Page Banner Content End -->
        </div>
    </div> --}}
    <!-- Page Banner Section End -->

    <!-- Login Section Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <!-- Login & Register Start -->
                    <div class="login-register-wrapper">
                        <h4 class="title">Login to Your Account</h4>
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="single-form">
                                <input type="email" name="email" id="email" value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror" required
                                    placeholder="Username or email *" />
                            </div>
                            @error('email')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                    </div>
                    <div class="single-form">
                        <input id="password" type="password"
                            class="form-control form-control_gray @error('password') is-invalid @enderror " name="password"
                            required="" placeholder="Password *" />
                        @error('password')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="single-form">
                        <input type="checkbox" id="remember" />
                        <label for="remember"><span></span> Remember me</label>
                    </div>
                    <div class="single-form">
                        <button class="btn btn-primary btn-hover-dark">
                            Login
                        </button>
                    </div>
                    </form>
                    <p>
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}">

                        </a>
                        <a href="#">Lost your password?</a>
                    </p>
                    <p>
                        No account?
                        <a href="{{ route('register') }}">Create one here.</a>
                    </p>
                </div>
                <!-- Login & Register End -->
            </div>
        </div>
    </div>
    </div>
@endsection
