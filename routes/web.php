<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\AboutusController;
use App\Http\Middleware\AuthAdmin;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\admin\OrderController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/shop',[ShopController::class,'index'])->name('shop.index');
Route::get('/cart',[CartController::class,'index'])->name('cart.index');
Route::get('/wishlist',[WishlistController::class,'index'])->name('wishlist.index');
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout.index');
Route::get('/contact-us',[ContactController::class,'index'])->name('contact.index');
Route::post('/contact-us',[ContactController::class,'store'])->name('contact.store');
Route::get('/about-us',[AboutusController::class,'index'])->name('aboutus.index');

// Route::get('/dashboard', [AdminController::class, 'index'])
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');
// Route::get('/dashboard', function () {
//    Route::get('/dashboard', [AdminController::class, 'index'])
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function(){
    Route::get('/account-dashboard', [UserController::class, 'index'])->name('user.index');
    Route::get('/account-orders', [UserController::class, 'order'])->name('user.orders');
    Route::get('/account-order/{order_id}/details', [UserController::class, 'order_details'])->name('user.order.details');
    Route::put('/account-order/cancel-order', [UserController::class, 'order_caancel'])->name('user.order.cancel');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->middleware(['auth', AuthAdmin::class])->group(function(){

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/brands', [BrandController::class,'index'])->name('admin.brands');
    Route::get('/brand/add', [BrandController::class,'create'])->name('admin.brand.add');

    Route::get('/categories', [CategoriesController::class,'index'])->name('admin.categories');
    Route::get('/category/add', [CategoriesController::class,'create'])->name('admin.category.add');

    Route::get('/products', [ProductController::class,'index'])->name('admin.products');
    Route::get('/product/add', [ProductController::class,'create'])->name('admin.product.add');

    Route::get('/coupons', [CouponController::class,'index'])->name('admin.coupons');
    Route::get('/coupon/add', [CouponController::class,'create'])->name('admin.coupon.add');

    Route::get('/orders', [OrderController::class,'index'])->name('admin.orders');
    Route::get('/order/{order_id}/details', [OrderController::class,'create'])->name('admin.order.details');

    Route::get('/slides', [SliderController::class,'index'])->name('admin.slides');
    Route::get('/slide/add', [SliderController::class,'create'])->name('admin.slide.add');

});
//  Route::middleware(['auth',AuthAdmin::class])->group(function(){
//     Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');

// Route::get('/admin/brands', [BrandController::class,'index'])->name('admin.brands');
// Route::get('/admin/brand/add', [BrandController::class,'create'])->name('admin.brand.add');

// Route::get('/admin/categories', [CategoriesController::class,'index'])->name('admin.categories');
// Route::get('/admin/category/add', [CategoriesController::class,'create'])->name('admin.category.add');

// Route::get('/admin/products', [ProductController::class,'index'])->name('admin.products');
// Route::get('/admin/product/add', [ProductController::class,'create'])->name('admin.product.add');

// Route::get('/admin/coupons', [CouponController::class,'index'])->name('admin.coupons');
// Route::get('/admin/coupon/add', [CouponController::class,'create'])->name('admin.coupon.add');

// Route::get('/admin/orders', [OrderController::class,'index'])->name('admin.orders');
// Route::get('/admin/order/{order_id}/details', [OrderController::class,'create'])->name('admin.order.details');

// Route::get('/admin/slides', [SliderController::class,'index'])->name('admin.slides');
// Route::get('/admin/slide/add', [SliderController::class,'create'])->name('admin.slide.add');
// });
require __DIR__.'/auth.php';
