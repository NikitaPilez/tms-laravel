<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'main'])->name('main');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'category'])->name('categories.category');
Route::get('/cart', [MainController::class, 'cart'])->name('cart');
Route::get('/checkout', [MainController::class, 'checkout'])->name('checkout');
Route::get('/contacts', [MainController::class, 'contacts'])->name('contacts');
Route::get('/sales', [MainController::class, 'sales'])->name('sales');
