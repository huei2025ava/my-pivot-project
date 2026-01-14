<?php

use App\Http\Controllers\SnoopyController;
use App\Models\Product;  // 1. 必須引入Model
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // 2. 叫 Product 模型去資料庫把所有資料撈出來
    $products = Product::all();

    // 3. 回傳 view 的同時， 把 $products 資料包進去給網頁
    return view('snoopy', compact('products'));
});

// Route::get('/welcome/{name?}', [SnoopyController::class, 'sayHello']);

Route::get('/sum/{num}/{operators}', function (string $num, string $operators) {

    $sum = $operators === '*' ? 1 : 0;

    switch ($operators) {
        case '+':
            for ($i = 1; $i <= $num ; $i++) {
                $sum += $i;
            };
            break;
        case '*':
            for ($i = 1; $i <= $num ; $i++) {
                $sum *= $i;
            };
            break;

        default:
            return "不支援的運算子！請輸入 plus 或 mul";
            break;
    }

    // dd($sum);
    $data = [
        'sum' => $sum,
        'num' => $num,
        'operators' => $operators
    ];

    return view('sum')->with('result', $data);
});