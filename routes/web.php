<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'main'])->name('main');

Route::group(['prefix' => '/products', 'controller' => ProductController::class], function () {
    Route::get('/', 'products')->name('products.index');
    Route::get('/categories/{category}', 'category')->name('products.category');
    Route::get('/{product}', 'product')->name('products.show');
});

Route::get('/wishlist', [UserController::class, 'wishlist'])->name('wishlist');
Route::get('/cart', [MainController::class, 'cart'])->name('cart');
Route::get('/checkout', [MainController::class, 'checkout'])->name('checkout');
Route::get('/contacts', [MainController::class, 'contacts'])->name('contacts');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/sales', [MainController::class, 'sales'])->name('sales');
