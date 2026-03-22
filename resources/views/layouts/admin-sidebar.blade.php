<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a class="large_logo" style="width: 100px;" href="{{ route('admin.index')}}"><img
                src="{{ asset('assets/images/fervour-logo.webp') }}" alt=""></a>
        <a class="small_logo" href="{{ route('admin.index')}}"><img src="{{ asset('admin/img/mini-logo.webp') }}" alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="">
            <a href="{{ route('admin.index')}}" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('admin/img/menu-icon/dashboard.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Dashboard </span>
                </div>
            </a>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('admin/img/menu-icon/17.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Brand </span>
                </div>
            </a>
            <ul>
                <li><a href="{{ route('brands.create') }}">Add Brand</a></li>
                <li><a href="{{ route('brands.index') }}">Brands</a></li>
            </ul>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('admin/img/menu-icon/13.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Category </span>
                </div>
            </a>
            <ul>
                <li><a href="{{ route('categories.create') }}">Add Category</a></li>
                <li><a href="{{ route('categories.index') }}">Categories</a></li>
            </ul>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('admin/img/menu-icon/9.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Product </span>
                </div>
            </a>
            <ul>
                <li><a href="{{ route('products.create') }}">Add Product</a></li>
                <li><a href="{{ route('products.index') }}">Products</a></li>
            </ul>
        </li>

        <li class="">
            <a href="" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('admin/img/menu-icon/11.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Orders </span>
                </div>
            </a>
        </li>

        <li class="">
            <a href="{{ route('slides.index') }}" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('admin/img/menu-icon/6.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Sliders </span>
                </div>
            </a>
        </li>
        <li class="">
            <a href="{{ route('coupons.index') }}" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('admin/img/menu-icon/20.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Coupons </span>
                </div>
            </a>
        </li>

        <li class="">
            <a href="{{ route('admin.customer') }}" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('admin/img/menu-icon/4.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Users </span>
                </div>
            </a>
        </li>

        <li class="">
            <a href="{{ route('profile.edit') }}" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('admin/img/menu-icon/10.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Settings </span>
                </div>
            </a>
        </li>
    </ul>
</nav>
<section class="main_content dashboard_part large_header_bg">
    <div class="container-fluid g-0">
        <div class="row">
            <div class="col-lg-12 p-0 ">
                <div class="header_iner d-flex justify-content-between align-items-center">
                    <div class="sidebar_icon d-lg-none">
                        <i class="ti-menu"></i>
                    </div>
                    <div class="line_icon open_miniSide d-none d-lg-block">
                        <img src="{{ asset('admin/img/line_img.png') }}" alt="">
                    </div>
                    <div class="serach_field-area d-flex align-items-center">
                        <div class="search_inner">
                            <form action="#">
                                <div class="search_field">
                                    <input type="text" placeholder="Search">
                                </div>
                                <button type="submit"> <img src="{{ asset('admin/img/icon/icon_search.svg') }}"
                                        alt=""> </button>
                            </form>
                        </div>
                    </div>
                    <div class="header_right d-flex justify-content-between align-items-center">
                        <div class="header_notification_warp d-flex align-items-center">
                            <li>
                                <a class="bell_notification_clicker" href="#"> <img
                                        src="{{ asset('admin/img/icon/bell.svg') }}" alt="">
                                    <span>2</span>
                                </a>
                                <!-- Menu_NOtification_Wrap  -->
                                <div class="Menu_NOtification_Wrap">
                                    <div class="notification_Header">
                                        <h4>Notifications</h4>
                                    </div>
                                    <div class="Notification_body">
                                        <!-- single_notify  -->
                                        <div class="single_notify d-flex align-items-center">
                                            <div class="notify_thumb">
                                                <a href="#"><img src="{{ asset('admin/img/staf/2.png') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="notify_content">
                                                <a href="#">
                                                    <h5>Cool Marketing </h5>
                                                </a>
                                                <p>Lorem ipsum dolor sit amet</p>
                                            </div>
                                        </div>
                                        <!-- single_notify  -->
                                        <div class="single_notify d-flex align-items-center">
                                            <div class="notify_thumb">
                                                <a href="#"><img src="{{ asset('admin/img/staf/4.png') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="notify_content">
                                                <a href="#">
                                                    <h5>Awesome packages</h5>
                                                </a>
                                                <p>Lorem ipsum dolor sit amet</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nofity_footer">
                                        <div class="submit_button text-center pt_20">
                                            <a href="#" class="btn_1">See More</a>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Menu_NOtification_Wrap  -->
                            </li>
                        </div>
                        <div class="profile_info">
                            <img src="{{ asset('admin/img/client_img.png') }}" alt="#">
                            <div class="profile_info_iner">
                                <div class="profile_author_name">
                                    <p>Admin </p>
                                </div>
                                <div class="profile_info_details">
                                    <a href="profile.html">My Profile </a>
                                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                        @csrf
                                        <a href="{{ route('logout') }}" class=""
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <div class="icon"><i class="icon-settings"></i></div>
                                            <div class="text">Log Out</div>
                                        </a>
                                    </form>
                                    {{-- <a href="#">Log Out </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
