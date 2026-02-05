<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RegisterControllerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Models\Product;  // 1. 必須引入Model
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

//購物車
Route::get('/cart',[CartController::class, 'index'])->name('cart.index');
Route::post('/checkout',[OrderController::class, 'checkout'])->name('checkout');
Route::post('/add-to-cart/{id}',[CartController::class, 'addToCart'])->name('add.to.cart');
Route::delete('/remove-from-cart/{id}',[CartController::class, 'remove'])->name('remove.from.cart');

// 註冊
Route::get('/register',[RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// 登入登出
Route::get('/login',[LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login',[LoginController::class, 'login']);
Route::post('/logout',[LoginController::class, 'logout'])->name('logout');

// 前台
Route::get('/', [HomeController::class, 'index'])->name('home');

// 後台
Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('admin.index');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
});