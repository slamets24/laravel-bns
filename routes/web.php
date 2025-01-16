<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;



Route::get('/', [FrontendController::class, 'index']);
Route::get('/product/{slug}', [FrontendController::class, 'detailProduct'])->name('detailProduct');
Route::get('/product', [FrontendController::class, 'product'])->name('product');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard.index');
    })->name('dashboard');

    Route::resource('/users', UserController::class);
    Route::resource('/products', ProductController::class);
    Route::post('/products/{product}/toggle-favorite', [ProductController::class, 'toggleFavorite'])->name('products.toggle-favorite');
    Route::post('/products/{product}/images', [ProductController::class, 'addImages'])->name('products.addImages');
    Route::post('/products/{product}/color', [ProductController::class, 'addColor'])->name('products.addColor');
    Route::delete('/products/{product}/color/{color}', [ProductController::class, 'destroyColor'])->middleware('check.remaining.colors')->name('products.destroyColor');
    Route::delete('/products/{product}/image/{image}', [ProductController::class, 'destroyImage'])->middleware('check.remaining.images')->name('products.destroyImage');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
