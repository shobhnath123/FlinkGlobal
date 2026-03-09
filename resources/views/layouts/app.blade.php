<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title> Fervour | E-Commerce</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/fervour-logo.webp">

    <!-- CSS
    ============================================ -->
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/pe-icon-7-stroke.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/font-awesome.min.css') }}" />

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/odometer.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/ion.rangeSlider.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    @stack('styles')
</head>

<body>

    <!-- Header Start  -->
    <div class="header-area header-white header-sticky d-none d-lg-block">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <!-- Header Logo Start -->
                    <div class="header-logo">
                        <a href="/"><img src="{{ asset('assets/images/fervour-logo1.webp') }}" width="200"
                                alt="Logo" /></a>
                    </div>
                    <!-- Header Logo End -->
                </div>
                <div class="col-lg-6">
                    <div class="header-menu">
                        <ul class="nav-menu">
                            <li><a href="/">Home</a></li>
                            <li><a href="{{ route('shop.index') }}">Shop</a></li>
                            <li><a href="{{ route('cart.index') }}">Cart</a></li>
                            <li><a href="{{ route('wishlist.index') }}">Wishlist</a></li>
                            <li><a href="{{ route('contact.index') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <!-- Header Meta Start -->
                    <div class="header-meta">
                        <div class="dropdown">
                            <a class="action" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="pe-7s-search"></i>
                            </a>

                            <div class="dropdown-menu dropdown-search">
                                <!-- Header Search Start -->
                                <div class="header-search">
                                    <form action="#">
                                        <input type="text" placeholder="Enter your search key ... " />
                                        <button>
                                            <i class="pe-7s-search"></i>
                                        </button>
                                    </form>
                                </div>
                                <!-- Header Search End -->
                            </div>
                        </div>

                        <div class="dropdown">
                            <a class="action" href="#" role="button" data-bs-toggle="dropdown"><i
                                    class="pe-7s-user"></i></a>

                            <ul class="dropdown-menu dropdown-profile">
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="login.html">Sign In</a></li>
                            </ul>
                        </div>
                        <a class="action" href="{{ route('wishlist.index') }}"><i class="pe-7s-like"></i></a>

                        <div class="dropdown">
                            <a class="action" href="{{ route('cart.index') }}">
                                <i class="pe-7s-shopbag"></i>
                                <span class="number">3</span>
                            </a>
                        </div>
                    </div>
                    <!-- Header Meta End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Header Mobile Start -->
    <div class="header-mobile section d-lg-none">
        <!-- Header Mobile top Start -->
        <div class="header-mobile-top header-sticky">
            <div class="container">
                <div class="row row-cols-3 gx-2 align-items-center">
                    <div class="col">
                        <!-- Header Toggle Start -->
                        <div class="header-toggle">
                            <button class="mobile-menu-open" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                        <!-- Header Toggle End -->
                    </div>
                    <div class="col">
                        <!-- Header Logo Start -->
                        <div class="header-logo text-center">
                            <a href="/"><img src="{{ asset('assets/images/fervour-logo1.webp') }}" width="154"
                                    height="46" alt="Logo" /></a>
                        </div>
                        <!-- Header Logo End -->
                    </div>
                    <div class="col">
                        <!-- Header Action Start -->
                        <div class="header-meta">
                            <div class="dropdown">
                                <a class="action" href="#" role="button" data-bs-toggle="dropdown"><i
                                        class="pe-7s-user"></i></a>

                                <ul class="dropdown-menu dropdown-profile">
                                    <li>
                                        <a href="my-account.html">My Account</a>
                                    </li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="login.html">Sign In</a></li>
                                </ul>
                            </div>
                            <a class="action" href="{{ route('cart.index') }}">
                                <i class="pe-7s-shopbag"></i>
                                <span class="number">3</span>
                            </a>
                        </div>
                        <!-- Header Action End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Mobile top End -->

        <!-- Header Mobile Bottom End -->
        <div class="header-mobile-bottom">
            <div class="container">
                <!-- Header Search Start -->
                <div class="header-search">
                    <form action="#">
                        <input type="text" placeholder="Enter your search key ... " />
                        <button><i class="pe-7s-search"></i></button>
                    </form>
                </div>
                <!-- Header Search End -->
            </div>
        </div>
        <!-- Header Mobile Bottom End -->
    </div>
    <!-- Header Mobile End -->

    <!-- off Canvas Start -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu">
        <div class="offcanvas-header">
            <!-- Canvas Action Start -->
            <div class="canvas-action">
                <a class="action" href="compare.html"><i class="icon-sliders"></i> Compare
                    <span class="action-num">(3)</span></a>
                <a class="action" href="{{ route('wishlist.index') }}"><i class="icon-heart"></i> Wishlist
                    <span class="action-num">(3)</span></a>
            </div>
            <!-- Canvas Action end -->

            <!-- Canvas Close bar Start -->
            <div class="canvas-close-bar">
                <span>Menu</span>
                <button class="menu-close" data-bs-dismiss="offcanvas">
                    <i class="pe-7s-angle-left"></i>
                </button>
            </div>
            <!-- Canvas Close bar End -->
        </div>

        <div class="offcanvas-body">
            <!-- Canvas Menu Start -->
            <div class="canvas-menu">
                <nav>
                    <ul class="nav-menu">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ route('shop.index') }}">Shop</a></li>
                        <li><a href="{{ route('cart.index') }}">Cart</a></li>
                        <li><a href="{{ route('wishlist.index') }}">Wishlist</a></li>
                        <li><a href="{{ route('contact.index') }}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Canvas Menu End -->
        </div>
    </div>
    <!-- off Canvas End -->
    @yield('content')
    <!-- Footer Section Start -->
    <div class="section footer-section">
        <!-- Footer Widget Section Start -->
        <div class="footer-widget-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-7 col-sm-12">
                        <!-- Footer Widget Start -->
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="/"><img src="{{ asset('assets/images/fervour-logo1.webp') }}"
                                        width="200" height="46" alt="Logo" /></a>
                            </div>

                            <div class="widget-about">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link">The Gardens, Auckland</li>
                                    <li class="ec-footer-link"><span>Call Us:</span><a href="tel:+6493930900"
                                            bis_skin_checked="1">+ 64 93 930 900</a></li>
                                    <li class="ec-footer-link"><span>Email:</span><a
                                            href="mailto:contact@flinkglobal.com"
                                            bis_skin_checked="1">+contact@flinkglobal.com</a></li>
                                </ul>
                            </div>
                            <div class="widget-social">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-tumblr"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Footer Widget End -->
                    </div>
                    {{-- <div class="col-lg-4 col-md-4 col-sm-6">                        
                        <div class="footer-widget">
                            <h4 class="footer-widget-title">Our Categories</h4>
                            <ul class="footer-link footer-link-m">
                                <li><a href="#">Category 1</a></li>
                                <li><a href="#">Category 2</a></li>
                                <li><a href="#">Category 3</a></li>
                                <li><a href="#">Category 4</a></li>
                                <li><a href="#">Category 5</a></li>
                                <li><a href="#">Category 6</a></li>
                                <li><a href="#">Category 7</a></li>
                                <li><a href="#">Category 8</a></li>
                                <li><a href="#">Category 9</a></li>
                                <li><a href="#">Category 10</a></li>
                            </ul>
                        </div>                        
                    </div> --}}
                    <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                        <!-- Footer Widget Start -->
                        <div class="footer-widget">
                            <h4 class="footer-widget-title">Information</h4>
                            <ul class="footer-link">
                                <li><a href="{{ route('aboutus.index') }}">About Us</a></li>
                                <li><a href="#">How to Shop</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="{{ route('contact.index') }}">Contact us</a></li>
                                <li><a href="login.html">Log in</a></li>
                            </ul>
                        </div>
                        <!-- Footer Widget End -->
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-6 col-6">
                        <!-- Footer Widget Start -->
                        <div class="footer-widget">
                            <h4 class="footer-widget-title">My Account</h4>
                            <ul class="footer-link">
                                <li><a href="register.html">Sign In</a></li>
                                <li><a href="{{ route('cart.index') }}">View Cart</a></li>
                                <li><a href="{{ route('wishlist.index') }}">My Wishlist</a></li>
                                <li><a href="#">Track My Order</a></li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </div>
                        <!-- Footer Widget End -->
                    </div>

                </div>
            </div>
        </div>
        <!-- Footer Widget End -->

        <!-- Footer Copyright End -->
        <div class="copyright">
            <div class="container">
                <div class="row" style="padding-top:12px; padding-bottom:12px;">
                    <div class="col-md-6">
                        <p>&copy; 2025 Fervour All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-end">
                        <img src="{{ asset('assets/images/payment.png') }}" width="192" height="21"
                            alt="Payment" />
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Copyright End -->
    </div>
    <!-- Footer Section End -->

    <!--Back To Start-->
    <button id="backBtn" class="back-to-top"><i class="pe-7s-angle-up"></i></button>
    <!--Back To End-->

    <!-- JS -->

    <!-- Modernizer & jQuery JS -->
    <script src="{{ asset('assets/js/vendor/modernizr-3.11.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-3.5.1.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>

    <!-- Plugins JS -->
    <script src="{{ asset('assets/js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/ajax-contact.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/odometer.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.zoom.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/breadcrumb.js') }}"></script>
    @stack('scripts')
</body>

</html>
