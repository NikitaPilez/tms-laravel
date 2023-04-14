<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'main'])->name('main');
Route::get('/changeLang', [MainController::class, 'changeLang'])->name('changeLang');
Route::get('/contacts', [ContactController::class, 'contacts'])->name('contacts');
Route::post('/contacts', [ContactController::class, 'sendFeedback'])->name('contacts.feedback');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/sales', [MainController::class, 'sales'])->name('sales');
Route::post('/order/create', [OrderController::class, 'createOrder'])->name('order.create');

Route::get('/email/verify', [VerificationController::class, 'view'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'handle'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', [VerificationController::class, 'send'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/forget-password', [ForgetPasswordController::class, 'forgotPasswordView'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [ForgetPasswordController::class, 'sendResetLink'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [ForgetPasswordController::class, 'resetPasswordView'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [ForgetPasswordController::class, 'resetPassword'])->middleware('guest')->name('password.update');

Route::group(['prefix' => '/products', 'controller' => ProductController::class], function () {
    Route::get('/', 'products')->name('products.index');
    Route::get('/{product}', 'product')->name('products.show');
});

Route::group(['controller' => AuthController::class], function () {
    Route::get('/login', 'getLoginPage')->name('auth.loginPage');
    Route::post('/login', 'login')->name('auth.login');
    Route::get('/register', 'getRegisterPage')->name('auth.registerPage');
    Route::post('/register', 'register')->name('auth.register');
    Route::get('/logout', 'logout')->name('auth.logout');
});

Route::group(['prefix' => '/account', 'controller' => AccountController::class, 'middleware' => 'auth'], function () {
    Route::get('/', 'account')->name('account.show');
    Route::post('/', 'updateAccount')->name('account.update');
});

Route::group(['prefix' => '/cart', 'controller' => CartController::class], function () {
    Route::get('/', 'getCart')->name('cart.get');
    Route::post('/{product}/add', 'add')->name('cart.add');
    Route::get('/{product}/remove', 'remove')->name('cart.remove');
});

Route::group(['prefix' => '/wishlist', 'controller' => WishlistController::class, 'middleware' => 'auth'], function () {
    Route::get('/', 'get')->name('wishlist.get');
    Route::post('/{product}/delete', 'delete')->name('wishlist.delete');
    Route::post('/{product}/add', 'add')->name('wishlist.add');
});

Route::group(['prefix' => '/admin', 'middleware' => ['admin', 'verified'], 'as' => 'admin.'], function () {
    Route::group(['prefix' => '/products', 'as' => 'products.'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('index');
        Route::get('/export-csv', [\App\Http\Controllers\Admin\ProductController::class, 'exportCsv'])->name('export.csv');
        Route::get('/export-excel', [\App\Http\Controllers\Admin\ProductController::class, 'exportExcel'])->name('export.excel');

        Route::get('/create', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('create.view');
        Route::post('/create', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('create');
        Route::get('/upload-excel', [\App\Http\Controllers\Admin\ProductController::class, 'uploadExcel'])->name('upload.excel');

        Route::get('/update/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('update.view');
        Route::post('/update/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('update');

        Route::get('/delete/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('delete');
    });
});

Route::get('/google/auth/redirect/', [GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('/google/auth/callback/', [GoogleController::class, 'callback'])->name('google.callback');
