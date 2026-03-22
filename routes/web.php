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
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UsersController;


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
    Route::get('/customer', [AdminController::class, 'showAllUsers'])->name('admin.customer');
    Route::resources([
        'brands' => BrandController::class,
        'categories' => CategoriesController::class,
        'products'=> ProductController::class,
        'orders' => OrderController::class,
        'coupons' => CouponController::class,
        'slides' => SliderController::class,
    ]);
});

require __DIR__.'/auth.php';
