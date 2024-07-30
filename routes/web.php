<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BazarController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MarketController::class, 'index'])->name('market');

Route::get('/overview/{product}', [ProductController::class, 'show'])->name('product.overview');

Route::get('/{user}/products', [ProductController::class, 'getUserProducts'])->name('user.products');

Route::get('/bazar/{bazar}/products', [BazarController::class, 'getBazarProducts'])->name('bazar.products');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('is_admin')->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('posts', PostController::class);
        Route::resource('shops', UsersController::class);
    });

});

require __DIR__.'/auth.php';
