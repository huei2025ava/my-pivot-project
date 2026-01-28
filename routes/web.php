<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SnoopyController;
use App\Models\Product;  // 1. 必須引入Model
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

// Route::get('/', function () {
//     // 2. 叫 Product 模型去資料庫把所有資料撈出來
//     $products = Product::all();

//     // 3. 回傳 view 的同時， 把 $products 資料包進去給網頁
//     return view('snoopy', compact('products'));
// });

Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin', [ProductController::class, 'index'])->name('home');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
});