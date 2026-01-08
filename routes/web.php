<?php

use App\Models\Product;  // 1. 必須引入Model
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/snoopy', function () {
    // 2. 叫 Product 模型去資料庫把所有資料撈出來
    $products = Product::all();

    // 3. 回傳 view 的同時， 把 $products 資料包進去給網頁
    return view('snoopy', compact('products'));
});