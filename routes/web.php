<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    ProfileController,
    MailSettingController,
};
use App\Models\User;
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

Route::get('/', function () {
    return redirect()->route('admin.login');
});

Route::get('/tc', function () {
    return view('business-credit-account-tc');
});
Route::get('/cash-application', function () {
    return view('business-cash-account');
});
Route::get('/credit-application', function () {
    return view('business-credit-account');
});
Route::post('/business-account', [BusinessAccountController::class, 'store'])
    ->name('business.account.store');

Route::get('/business-account', function () {
    return view('business-credit-account');
})->name('business.account.create');

Route::post('/cash-account', [CashAccountApplicationController::class, 'store'])
    ->name('cash.account.store');

Route::get('/cash-account', function () {
    return view('business-cash-account');
})->name('cash.account.create');

Route::get('/business-account/{id}/pdf', [BusinessAccountController::class, 'pdf'])
    ->name('business.account.pdf');

Route::get('/business-credit/{id}/preview', [BusinessAccountController::class, 'pdfPreview'])
    ->name('business.credit.preview');

Route::get('/business-cash/{id}/preview', [CashAccountApplicationController::class, 'pdfPreview'])
    ->name('business.cash.preview');

Route::get('/apply/{token}', [App\Http\Controllers\ClientApplicationController::class, 'show'])
    ->name('client.form.show');

// Route::post('/business-account', [BusinessAccountController::class, 'store'])->name('business.account.store');
Route::get('/address/suggest', [AddressController::class, 'suggest'])->name('address.suggest');


Route::get('/test-mail', function () {

    $message = "Testing mail";

    \Mail::raw('Hi, welcome!', function ($message) {
        $message->to('shobhnath.s@i2a.co')
            ->subject('Testing mail');
    });

    dd('sent');

});


Route::get('/dashboard', function () {
    $applications = \App\Models\BusinessCreditApplication::where('email', auth('front')->user()->email)->orderBy('created_at', 'desc')->get();
    return view('front.dashboard', compact('applications'));
})->middleware(['front'])->name('dashboard');

Route::middleware(['front'])->group(function () {
    Route::get('/application/{id}/edit', [\App\Http\Controllers\Front\ApplicationController::class, 'edit'])->name('application.edit');
    Route::put('/application/{id}', [\App\Http\Controllers\Front\ApplicationController::class, 'update'])->name('application.update');
});


require __DIR__ . '/front_auth.php';

// Admin routes
Route::get('/admin/dashboard', function () {
    $user = auth()->user();
    
    $userQuery = \App\Models\User::query();
    $creditQuery = \App\Models\BusinessCreditApplication::where('application_type', 'Credit');
    $cashQuery = \App\Models\BusinessCreditApplication::where('application_type', 'Cash');

    // If the user doesn't have full access (e.g., Sales Agent), only show their clients' data
    if (!$user->can('BusinessApp access')) {
        $agentEmails = \App\Models\ClientFormRequest::where('agent_id', $user->id)
            ->pluck('email')
            ->unique()
            ->values();
            
        $creditQuery->whereIn('email', $agentEmails);
        $cashQuery->whereIn('email', $agentEmails);
        $userQuery->whereIn('email', $agentEmails);
    }

    $userCount = $userQuery->count();
    $creditCount = $creditQuery->count();
    $cashCount = $cashQuery->count();

    return view('dashboard', compact('userCount', 'creditCount', 'cashCount'));
})->middleware(['auth', 'force.password.change'])->name('admin.dashboard');

Route::prefix('admin')
    ->namespace('App\Http\Controllers\Admin')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/force-password-change', 'ForcePasswordChangeController@show')->name('admin.password.change.form');
        Route::post('/force-password-change', 'ForcePasswordChangeController@store')->name('admin.password.change.store');
    });

require __DIR__ . '/auth.php';




Route::
        namespace('App\Http\Controllers\Admin')->name('admin.')->prefix('admin')
    ->middleware(['auth', 'force.password.change'])
    ->group(function () {
        Route::resource('roles', 'RoleController');
        Route::resource('permissions', 'PermissionController');
        // Sales Agent bulk creation routes (must come before resource route)
        Route::get('users/bulk-create', 'UserController@bulkCreate')->name('users.bulk-create');
        Route::post('users/bulk-store', 'UserController@bulkStore')->name('users.bulk-store');
        Route::post('users/{user}/toggle-active', 'UserController@toggleActive')->name('users.toggle-active');
        Route::resource('users', 'UserController');

        // Business Credit Applications routes - custom routes must be defined BEFORE resource route
        Route::delete('business-credit-applications/bulk-delete', 'BusinessCreditApplicationController@bulkDelete')->name('business-credit-applications.bulk-delete');
        Route::get('business-credit-applications/export/csv', 'BusinessCreditApplicationController@export')->name('business-credit-applications.export');
        Route::post('business-credit-applications/{id}/toggle-client-access', 'BusinessCreditApplicationController@toggleClientAccess')->name('business-credit-applications.toggle-client-access');
        Route::resource('business-credit-applications', 'BusinessCreditApplicationController');

        // Mail Logs routes
        Route::delete('mail-logs/bulk-delete', 'MailLogController@bulkDelete')->name('mail-logs.bulk-delete');
        Route::get('mail-logs/export/csv', 'MailLogController@export')->name('mail-logs.export');
        Route::resource('mail-logs', 'MailLogController');

        Route::post('client-form-requests/{id}/resend', 'ClientFormRequestController@resend')->name('client-form-requests.resend');
        Route::resource('client-form-requests', 'ClientFormRequestController')->except(['show', 'edit', 'update', 'destroy']);

        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('/profile-update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/mail', [MailSettingController::class, 'index'])->name('mail.index');
        Route::put('/mail-update/{mailsetting}', [MailSettingController::class, 'update'])->name('mail.update');
    });
