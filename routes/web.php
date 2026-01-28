<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    ProfileController,
    MailSettingController,
};
use App\Models\User;
use App\Models\Post;
use App\Http\Controllers\BusinessAccountController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CashAccountApplicationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/tc', function () {
    return view('business-credit-account-tc');
});
Route::get('/cash', function () {
    return view('business-cash-account');
});
Route::get('/', function () {
    return view('business-credit-account');
});
Route::post('/business-account', [BusinessAccountController::class,'store'])
    ->name('business.account.store');

Route::post('/cash-account', [CashAccountApplicationController::class,'store'])
    ->name('cash.account.store');

Route::get('/business-account/{id}/pdf', [BusinessAccountController::class,'pdf'])
    ->name('business.account.pdf');

Route::get('/business-account/{id}/pdf-preview', [BusinessAccountController::class, 'pdfPreview'])
    ->name('business.account.pdf.preview');

Route::get('/business-cash/{id}/pdf-preview', [CashAccountApplicationController::class, 'pdfPreview'])
    ->name('business.cash.pdf.preview');

// Route::post('/business-account', [BusinessAccountController::class, 'store'])->name('business.account.store');
Route::get('/address/suggest', [AddressController::class, 'suggest'])->name('address.suggest');


Route::get('/test-mail',function(){

    $message = "Testing mail";

    \Mail::raw('Hi, welcome!', function ($message) {
      $message->to('shobhnath.s@i2a.co')
        ->subject('Testing mail');
    });

    dd('sent');

});


Route::get('/dashboard', function () {
    return view('front.dashboard');
})->middleware(['front'])->name('dashboard');


require __DIR__.'/front_auth.php';

// Admin routes
Route::get('/admin/dashboard', function () {
    $userCount = User::count();
    $postCount = Post::count();

    return view('dashboard', compact('userCount', 'postCount'));
})->middleware(['auth'])->name('admin.dashboard');

require __DIR__.'/auth.php';




Route::namespace('App\Http\Controllers\Admin')->name('admin.')->prefix('admin')
    ->group(function(){
        Route::resource('roles','RoleController');
        Route::resource('permissions','PermissionController');
        Route::resource('users','UserController');
        Route::resource('posts','PostController');
        Route::delete('posts/bulk-delete', 'PostController@bulkDelete')->name('posts.bulk-delete');
        
        // Business Credit Applications routes - custom routes must be defined BEFORE resource route
        Route::delete('business-credit-applications/bulk-delete', 'BusinessCreditApplicationController@bulkDelete')->name('business-credit-applications.bulk-delete');
        Route::get('business-credit-applications/export/csv', 'BusinessCreditApplicationController@export')->name('business-credit-applications.export');
        Route::resource('business-credit-applications','BusinessCreditApplicationController');

        // Mail Logs routes
        Route::delete('mail-logs/bulk-delete', 'MailLogController@bulkDelete')->name('mail-logs.bulk-delete');
        Route::get('mail-logs/export/csv', 'MailLogController@export')->name('mail-logs.export');
        Route::resource('mail-logs','MailLogController');

        Route::get('/profile',[ProfileController::class,'index'])->name('profile');
        Route::put('/profile-update',[ProfileController::class,'update'])->name('profile.update');
        Route::get('/mail',[MailSettingController::class,'index'])->name('mail.index');
        Route::put('/mail-update/{mailsetting}',[MailSettingController::class,'update'])->name('mail.update');
});
