<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' =>'v1'], function() {
    Route::get('products', [ProductController::class, 'index'])->name('get-product');
    Route::post('products', [ProductController::class, 'store'])->name('create-product');

    Route::get('sales', [ProductController::class, 'index'])->name('get-sales');
    Route::post('sales', [ProductController::class, 'create'])->name('generate-sales');
});
