<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'main'])->name('main');

Route::group(['prefix' => '/products', 'controller' => ProductController::class], function () {
    Route::get('/', 'products')->name('products.index');
    Route::get('/categories/{category}', 'category')->name('products.category');
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
    Route::post('/{product}/remove', 'remove')->name('cart.remove');
});

Route::group(['prefix' => '/wishlist', 'controller' => WishlistController::class, 'middleware' => 'auth'], function () {
    Route::get('/', 'get')->name('wishlist.get');
    Route::post('/{product}/delete', 'delete')->name('wishlist.delete');
    Route::post('/{product}/add', 'add')->name('wishlist.add');
});

Route::group(['prefix' => '/admin', 'middleware' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['prefix' => '/products', 'as' => 'products.'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('index');

        Route::get('/create', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('create.view');
        Route::post('/create', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('create');

        Route::get('/update/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('update.view');
        Route::post('/update/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('update');

        Route::get('/delete/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('delete');
    });
});

Route::get('/checkout', [MainController::class, 'checkout'])->name('checkout');
Route::get('/contacts', [ContactController::class, 'contacts'])->name('contacts');
Route::post('/contacts', [ContactController::class, 'sendFeedback'])->name('contacts.feedback');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/sales', [MainController::class, 'sales'])->name('sales');
