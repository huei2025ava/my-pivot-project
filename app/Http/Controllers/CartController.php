<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Request $request, $id) {
        $product = Product::findOrFail($id); //findOrFail 如果商品 ID 不存在（例如有人亂改網址），它會直接回傳 404 頁面
        $cart = session()->get('cart', []);
        
        if (isset($cart[$id])) {
            // 情況 A：籃子裡已經有這個商品了
           $cart['$id']['quantity']++;
        }else{
            // 情況 B：這是一個新商品，第一次放進籃子
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "img" => $product->img,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', '商品已加入購物車！');
    }
}