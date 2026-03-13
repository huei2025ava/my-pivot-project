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
           $cart[$id]['quantity']++;
        }else{
            // 情況 B：這是一個新商品，第一次放進籃子
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "img" => $product->img,
            ];
        }
        // dd($cart);
        session()->put('cart', $cart);
        
        // 取得最新總數
        $cartCount = $this->getCurrentCartCount();

        // ✨ 關鍵判斷：如果是 AJAX 請求
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => '商品已加入購物車！',
                'cartCount' => $cartCount
            ]);
        }

        // ✨ 如果是一般頁面跳轉（備援方案）
        return redirect()->back()->with('success', '商品已加入購物車！');
    }

    public function index() {
        // 從 Session 拿資料，如果沒資料就給空陣列
        $cart = session()->get('cart', []);

        return view('cart.index', compact('cart'));
    }

    private function getCurrentCartCount()
    {
        // 從 Session 抓取購物車資料，如果沒資料就給空陣列 []
        $cart = session()->get('cart', []);

        // 使用 PHP 內建函式 array_column 抽出所有的 'quantity' 欄位，再用 array_sum 加總
        // 這樣不論裡面有幾種商品，都能算出總數量（2+1 = 3 個）
        return array_sum(array_column($cart, 'quantity'));
    }

    public function update(Request $request) {
        //未完成
    }
}