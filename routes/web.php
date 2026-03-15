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

// Route::get('/dashboard', function () {
//     return view('dashboard');
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
Route::middleware(['auth',AuthAdmin::class])->group(function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');
});
require __DIR__.'/auth.php';
