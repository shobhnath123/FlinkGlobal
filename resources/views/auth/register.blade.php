@extends('layouts.app')
@section('content')
    <div class="section page-banner-section" style="background-image: url(assets/images/page-banner.jpg)">
        <div class="container">
            <!-- Page Banner Content End -->
            <div class="page-banner-content">
                <h2 class="title">Register</h2>

                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Register</li>
                </ul>
            </div>
            <!-- Page Banner Content End -->
        </div>
    </div>
    <!-- Page Banner Section End -->
    <!-- Register Section Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <!-- Login & Register Start -->
                    <div class="login-register-wrapper">
                        <h4 class="title">Create New Account</h4>
                        <p>
                            Already have an account?
                            <a href="{{ route('login') }}">Log in instead!</a>
                        </p>
                        <form method="POST" action="{{ route('register') }}" name="register-form" class="needs-validation"
                            novalidate="">
                            @csrf
                            <div class="single-form">
                                <input class="form-control form-control_gray @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required="" autocomplete="name"
                                    autofocus="">
                                <input type="text" placeholder="First Name" />
                            </div>
                            <div class="single-form">
                                 <input type="text" class="form-control form-control_gray @error('lastname') is-invalid @enderror"
                                    name="lastname" value="{{ old('lastname') }}" required="" autocomplete="lastname"
                                    autofocus="">
                            </div>
                            <div class="single-form">
                                <input id="email" type="email" class="form-control form-control_gray @error('email') is-invalid @enderror " name="email" value="{{ old('email') }}" required=""
                  autocomplete="email">
                             @error('email')<span class="invalid-feedback" role="alert">{{ $message }}
                                 </span>
                             @enderror
                            </div>
                            <div class="single-form">
                                <input type="text" placeholder="Username *" />
                            </div>
                            <div class="single-form">
                                <input type="password" placeholder="Password" />
                            </div>
                            <div class="single-form">
                                <input type="password" placeholder="Confirm Password" />
                            </div>
                            <div class="single-form">
                                <input type="checkbox" id="receive" />
                                <label for="receive">
                                    <span></span> Receive Offers From Our
                                    Partners</label>
                            </div>
                            <div class="single-form">
                                <button class="btn btn-primary btn-hover-dark">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- Login & Register End -->
                </div>
            </div>
        </div>
    </div>
@endsection
