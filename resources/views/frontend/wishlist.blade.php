@extends('layouts.app')
@section('content')
<div class="section">
    <div class="shop_smoke_effect_wrapper">
        <canvas width="1265" height="200"></canvas>
        <h1 class="shop_smoke_effect_heading_wrapper" id="smoke-heading">Wishlist</h1>
    </div>
</div>
{{-- <div class="section page-banner-section" style="background-image: url(assets/images/page-banner.jpg)">
    <div class="container">
        <!-- Page Banner Content End -->
        <div class="page-banner-content">
            <h2 class="title">Wishlist</h2>
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Wishlist</li>
            </ul>
        </div>
        <!-- Page Banner Content End -->
    </div>
</div> --}}
<!-- Page Banner Section End -->

<!-- Shopping Cart Section Start -->
<div class="section section-padding">
    <div class="container">
        <div class="cart-wrapper">
            <!-- empty cart Start -->
            <div class="empty-cart text-center pb-5">
                <h2 class="empty-cart-title">
                    There are no more items in your wishlist
                </h2>
                <div class="empty-cart-img">
                    <img src="assets/images/wishlist.png" alt="Cart">
                </div>
                <p>No item found in your wishlist</p>
                <a href="{{ route('shop.index') }}" class="btn btn-info btn-hover-dark">Wishlist Now</a>
            </div>
            <!-- empty cart End -->
        </div>

        <div class="cart-wrapper">
            <!-- Cart Wrapper Start -->
            <div class="cart-table table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="product-thumb">Image</th>
                            <th class="product-info">
                                product Information
                            </th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-total-price">
                                Total Price
                            </th>
                            <th class="product-add-to-cart">
                                Add to Cart
                            </th>
                            <th class="product-action">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="product-thumb">
                                <img src="assets/images/product/3.webp" alt="" />
                            </td>
                            <td class="product-info">
                                <h6 class="name">
                                    <a href="product-details-2.html">Pendant Chandelier Light</a>
                                </h6>
                                <div class="product-prices">
                                    <span class="old-price">$35.90</span>
                                    <span class="sale-price">$28.72</span>
                                </div>
                                <div class="product-size-color">
                                    <p>Size <span>S</span></p>
                                    <p>Color <span>White</span></p>
                                </div>
                            </td>
                            <td class="quantity">
                                <div class="product-quantity d-inline-flex">
                                    <button type="button" class="sub">
                                        -
                                    </button>
                                    <input type="text" value="1" />
                                    <button type="button" class="add">
                                        +
                                    </button>
                                </div>
                            </td>
                            <td class="product-total-price">
                                <span class="price">$28.72</span>
                            </td>
                            <td class="product-add-to-cart">
                                <a href="#" class="btn btn-dark btn-hover-primary">Add to Cart</a>
                            </td>
                            <td class="product-action">
                                <button class="remove">
                                    <i class="pe-7s-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="product-thumb">
                                <img src="assets/images/product/1.webp" alt="" />
                            </td>
                            <td class="product-info">
                                <h6 class="name">
                                    <a href="product-details-2.html">High quality vase bottle</a>
                                </h6>
                                <div class="product-prices">
                                    <span class="sale-price">$35.72</span>
                                </div>
                                <div class="product-size-color">
                                    <p>Size <span>S</span></p>
                                    <p>Color <span>White</span></p>
                                </div>
                            </td>
                            <td class="quantity">
                                <div class="product-quantity d-inline-flex">
                                    <button type="button" class="sub">
                                        -
                                    </button>
                                    <input type="text" value="1" />
                                    <button type="button" class="add">
                                        +
                                    </button>
                                </div>
                            </td>
                            <td class="product-total-price">
                                <span class="price">$28.72</span>
                            </td>
                            <td class="product-add-to-cart">
                                <a href="#" class="btn btn-dark btn-hover-primary">Add to Cart</a>
                            </td>
                            <td class="product-action">
                                <button class="remove">
                                    <i class="pe-7s-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="product-thumb">
                                <img src="assets/images/product/product-08.jpg" alt="" />
                            </td>
                            <td class="product-info">
                                <h6 class="name">
                                    <a href="product-details-2.html">Reece Seater Sofa</a>
                                </h6>
                                <div class="product-prices">
                                    <span class="sale-price">$28.72</span>
                                </div>
                                <div class="product-size-color">
                                    <p>Size <span>S</span></p>
                                    <p>Color <span>White</span></p>
                                </div>
                            </td>
                            <td class="quantity">
                                <div class="product-quantity d-inline-flex">
                                    <button type="button" class="sub">
                                        -
                                    </button>
                                    <input type="text" value="1" />
                                    <button type="button" class="add">
                                        +
                                    </button>
                                </div>
                            </td>
                            <td class="product-total-price">
                                <span class="price">$28.72</span>
                            </td>
                            <td class="product-add-to-cart">
                                <a href="#" class="btn btn-dark btn-hover-primary">Add to Cart</a>
                            </td>
                            <td class="product-action">
                                <button class="remove">
                                    <i class="pe-7s-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Cart Wrapper End -->
        </div>
    </div>
</div>
@endsection