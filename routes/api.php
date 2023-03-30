<?php

use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/products'], function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/getLatestProducts', [ProductController::class, 'getLatestProducts']);
    Route::get('/{product}', [ProductController::class, 'get']);
    Route::post('/', [ProductController::class, 'create']);
    Route::post('/{product}', [ProductController::class, 'update']);
    Route::delete('/{product}', [ProductController::class, 'delete']);
});
