<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RegisterControllerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\AdminUserController; // 處理會員
use App\Http\Controllers\Admin\AdminOrderController;  // 處理後台訂單
use App\Models\Product;  // 1. 必須引入Model
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

//購物車
Route::get('/cart',[CartController::class, 'index'])->name('cart.index');
Route::post('/checkout',[OrderController::class, 'checkout'])->name('checkout');
Route::post('/add-to-cart/{id}',[CartController::class, 'addToCart'])->name('add.to.cart');
Route::delete('/remove-from-cart/{id}',[CartController::class, 'remove'])->name('remove.from.cart');
Route::patch('/update-cart',[CartController::class, 'update'])->name('update.cart');


// 註冊
Route::get('/register',[RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// 登入登出
Route::get('/login',[LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login',[LoginController::class, 'login']);
Route::post('/logout',[LoginController::class, 'logout'])->name('logout');

// 前台
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{id}', [HomeController::class, 'show'])->name('product.show');

// 後台
Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('admin.index');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');

    // 2. 新增：會員管理 (對應妳的需求：顯示 users 與修改 level)
    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::patch('/users/{user}/level', [AdminUserController::class, 'updateLevel'])->name('admin.users.updateLevel');

    // 3. 新增：訂單管理 (對應妳的需求：顯示訂單與查看明細)
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
});