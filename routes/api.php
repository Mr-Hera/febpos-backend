<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VatController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DiscountController;

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

Route::group(['prefix' =>'v1'], function() {
    Route::get('products', [ProductController::class, 'index'])->name('get-product');
    Route::post('products/create', [ProductController::class, 'store'])->name('create-product');

    Route::group(['prefix' =>'statements'], function() {
        Route::get('vat-transactions', [VatController::class, 'index'])->name('get-vat');
        Route::get('discount-transactions', [DiscountController::class, 'index'])->name('get-discount');
    });
});
