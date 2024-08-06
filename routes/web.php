<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BazarController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MarketController::class, 'index'])->name('market');

Route::get('/overview/{product}', [ProductController::class, 'show'])->name('product.overview');

Route::get('/{user}/products', [ProductController::class, 'getUserProducts'])->name('user.products');

Route::get('/bazar/{bazar}/products', [BazarController::class, 'getBazarProducts'])->name('bazar.products');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/count', [CartController::class, 'count'])->name('cart.count');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('products', ProductController::class);
    Route::get('/my-products', [ProductController::class, 'myProducts'])->name('my.products');

    Route::middleware('is_admin')->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('posts', PostController::class);
        Route::resource('shops', UsersController::class);
    });

});

require __DIR__.'/auth.php';
