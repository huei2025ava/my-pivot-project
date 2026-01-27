<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SnoopyController;
use App\Models\Product;  // 1. 必須引入Model
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     // 2. 叫 Product 模型去資料庫把所有資料撈出來
//     $products = Product::all();

//     // 3. 回傳 view 的同時， 把 $products 資料包進去給網頁
//     return view('snoopy', compact('products'));
// });
Route::get('/admin/products',[ProductController::class, 'admin'])->name('admin.products');

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');