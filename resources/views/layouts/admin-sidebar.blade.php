<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a class="large_logo" style="width: 100px;" href="dashboard.html"><img src="{{ asset('assets/images/fervour-logo.webp')}}" alt=""></a>
        <a class="small_logo" href="dashboard.html"><img src="{{ asset('admin/img/mini-logo.webp') }}" alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="">
            <a href="dashboard.html" aria-expanded="false">
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
                <li><a href="brand-add.html">Add Brand</a></li>
                <li><a href="brands.html">Brands</a></li>
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
                <li><a href="category-add.html">Add Category</a></li>
                <li><a href="categories.html">Categories</a></li>
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
                <li><a href="product-add.html">Add Product</a></li>
                <li><a href="products.html">Products</a></li>
            </ul>
        </li>

        <li class="">
            <a href="orders.html" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('admin/img/menu-icon/11.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Orders </span>
                </div>
            </a>
        </li>

        <li class="">
            <a href="slider.html" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('admin/img/menu-icon/6.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Sliders </span>
                </div>
            </a>
        </li>

        <li class="">
            <a href="coupons.html" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('admin/img/menu-icon/20.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Coupons </span>
                </div>
            </a>
        </li>

        <li class="">
            <a href="users.html" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('admin/img/menu-icon/4.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Users </span>
                </div>
            </a>
        </li>

        <li class="">
            <a href="settings.html" aria-expanded="false">
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