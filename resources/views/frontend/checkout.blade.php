@extends('layouts.app')
@section('content')
<div class="section">
    <div class="shop_smoke_effect_wrapper">
        <canvas width="1265" height="200"></canvas>
        <h1 class="shop_smoke_effect_heading_wrapper" id="smoke-heading">Checkout</h1>
    </div>
</div>
{{-- <div class="section page-banner-section" style="background-image: url(assets/images/page-banner.jpg)">
    <div class="container">
        <!-- Page Banner Content End -->
        <div class="page-banner-content">
            <h2 class="title">Checkout</h2>

            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Checkout</li>
            </ul>
        </div>
        <!-- Page Banner Content End -->
    </div>
</div> --}}
<!-- Page Banner Section End -->

<!-- Shopping Cart Section Start -->
<div class="section section-padding" bis_skin_checked="1">
    <div class="container" bis_skin_checked="1">
        <form>
            <div class="row" bis_skin_checked="1">
                <div class="col-lg-7" bis_skin_checked="1">
                    <!-- Checkout Form Start -->
                    <div class="checkout-form" bis_skin_checked="1">
                        <div class="checkout-title" bis_skin_checked="1">
                            <h4 class="title">Shipping details</h4>
                        </div>

                        <div class="row mt-5" bis_skin_checked="1">
                            <div class="col-md-6" bis_skin_checked="1">
                                <div class="form-floating my-3" bis_skin_checked="1">
                                    <input type="text" class="form-control" name="name" required=""
                                        value="">
                                    <label for="name">Full Name *</label>
                                </div>
                            </div>
                            <div class="col-md-6" bis_skin_checked="1">
                                <div class="form-floating my-3" bis_skin_checked="1">
                                    <input type="text" class="form-control" name="phone" required=""
                                        value="">
                                    <label for="phone">Phone Number *</label>
                                </div>
                            </div>
                            <div class="col-md-4" bis_skin_checked="1">
                                <div class="form-floating my-3" bis_skin_checked="1">
                                    <input type="text" class="form-control" name="zip" required=""
                                        value="">
                                    <label for="zip">Pincode *</label>
                                </div>
                            </div>
                            <div class="col-md-4" bis_skin_checked="1">
                                <div class="form-floating mt-3 mb-3" bis_skin_checked="1">
                                    <input type="text" class="form-control" name="state" required=""
                                        value="">
                                    <label for="state">State *</label>
                                </div>
                            </div>
                            <div class="col-md-4" bis_skin_checked="1">
                                <div class="form-floating my-3" bis_skin_checked="1">
                                    <input type="text" class="form-control" name="city" required=""
                                        value="">
                                    <label for="city">Town / City *</label>
                                </div>
                            </div>
                            <div class="col-md-6" bis_skin_checked="1">
                                <div class="form-floating my-3" bis_skin_checked="1">
                                    <input type="text" class="form-control" name="address" required=""
                                        value="">
                                    <label for="address">House no, Building Name *</label>
                                </div>
                            </div>
                            <div class="col-md-6" bis_skin_checked="1">
                                <div class="form-floating my-3" bis_skin_checked="1">
                                    <input type="text" class="form-control" name="locality" required=""
                                        value="">
                                    <label for="locality">Road Name, Area, Colony *</label>
                                </div>
                            </div>
                            <div class="col-md-12" bis_skin_checked="1">
                                <div class="form-floating my-3" bis_skin_checked="1">
                                    <input type="text" class="form-control" name="landmark" required=""
                                        value="">
                                    <label for="landmark">Landmark *</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Checkout Form End -->
                </div>
                <div class="col-lg-5" bis_skin_checked="1">
                    <div class="checkout-order" bis_skin_checked="1">
                        <div class="checkout-title" bis_skin_checked="1">
                            <h4 class="title">Your Order</h4>
                        </div>

                        <div class="checkout-order-table table-responsive" bis_skin_checked="1">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="Product-name">Product</th>
                                        <th class="Product-price">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="Product-name">
                                            <p class="order-products">
                                                <img src="uploads/products/thumbnails/1747188775.jpg"
                                                    class="order-img">
                                                &nbsp; Fourth Product × 1
                                            </p>
                                        </td>
                                        <td class="Product-price">
                                            <p>$210.00</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="Product-name">
                                            <p class="order-products">
                                                <img src="uploads/products/thumbnails/1747188478.jpg"
                                                    class="order-img">
                                                &nbsp; Second Product × 1
                                            </p>
                                        </td>
                                        <td class="Product-price">
                                            <p>$300.00</p>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="Product-name">
                                            <p>Subtotal</p>
                                        </td>
                                        <td class="Product-price">
                                            <p>$510.00</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="Product-name">
                                            <p>Shipping</p>
                                        </td>
                                        <td class="Product-price">
                                            <p>Free</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="Product-name">
                                            <p>VAT</p>
                                        </td>
                                        <td class="total-price">
                                            <p>$107.10</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="Product-name">
                                            <p>Total</p>
                                        </td>
                                        <td class="total-price">
                                            <p>$617.10</p>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="checkout-payment" bis_skin_checked="1">
                            <ul>
                                <li>
                                    <div class="single-payment" bis_skin_checked="1">
                                        <div class="payment-radio radio" bis_skin_checked="1">
                                            <input type="radio" name="mode" id="card" value="card">
                                            <label for="card"><span></span> Debit or Credit Card</label>
                                            <div class="payment-details" bis_skin_checked="1">
                                                <p>Please send a Check to Store name with Store Street, Store Town,
                                                    Store State, Store Postcode, Store Country.</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-payment" bis_skin_checked="1">
                                        <div class="payment-radio radio" bis_skin_checked="1">
                                            <input type="radio" name="mode" id="paypal">
                                            <label for="paypal"><span></span> Paypal</label>
                                            <div class="payment-details" bis_skin_checked="1">
                                                <p>Pay via PayPal; you can pay with your credit card if you don’t have
                                                    a PayPal account.</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-payment" bis_skin_checked="1">
                                        <div class="payment-radio radio" bis_skin_checked="1">
                                            <input type="radio" name="mode" id="cod" value="cod"
                                                checked="checked">
                                            <label for="mode"><span></span> Cash on Delivery</label>
                                            <div class="payment-details" style="display: block;"
                                                bis_skin_checked="1">
                                                <p>Pay with cash upon delivery.</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="single-form" bis_skin_checked="1">
                                <button type="submit" class="btn btn-primary btn-hover-dark d-block">Place
                                    Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection