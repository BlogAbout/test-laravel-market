<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class)->name('index');

Route::group(['namespace' => 'Product', 'prefix' => 'products'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/{product}', [ProductController::class, 'show'])->name('product.show');
});

Route::group(['namespace' => 'Cart', 'prefix' => 'cart'], function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/{product}', [CartController::class, 'remove'])->name('cart.remove');
});

Route::group(['namespace' => 'Order', 'prefix' => 'order'], function () {
    Route::group(['middleware' => ['auth']], function() {
        Route::get('/', [OrderController::class, 'index'])->name('order.index');
        Route::delete('/{order}', [OrderController::class, 'delete'])->name('order.delete');
    });

    Route::post('/', [OrderController::class, 'store'])->name('order.store');
});

Auth::routes();
