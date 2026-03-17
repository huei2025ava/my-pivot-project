<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id); //findOrFail 如果商品 ID 不存在（例如有人亂改網址），它會直接回傳 404 頁面
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            // 情況 A：籃子裡已經有這個商品了
            $cart[$id]['quantity']++;
        } else {
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
        $cartCount = $this->getValidatedCart();

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

    public function index()
    {
        $cart = session()->get('cart', []);

        // 一次抓出所有相關商品，包含被軟刪除的
        $productsFromDb = Product::whereIn('id', array_keys($cart))
            ->withTrashed()
            ->get()
            ->keyBy('id');

        $totalPrice = 0;

        // 建立一個處理後的購物車陣列，標記狀態
        $processedCart = [];
        foreach ($cart as $id => $details) {
            $product = $productsFromDb->get($id);

            // 判斷是否失效：資料庫找不到、已被軟刪除、或庫存 <= 0
            $isInvalid = !$product || $product->trashed() || $product->stock <= 0;

            $processedCart[$id] = $details;
            $processedCart[$id]['img'] = $product ? $product->img : $details['img'];
            $processedCart[$id]['is_sold_out'] = $isInvalid;
            $processedCart[$id]['current_stock'] = $product?->stock ?? 0;

            // 只有沒完售的商品才計入總價
            if (!$isInvalid) {
                $totalPrice += $details['price'] * $details['quantity'];
            }
        }

        return view('cart.index', [
            'cart' => $processedCart,
            'totalPrice' => $totalPrice
        ]);
    }

    /**
 * 取得經過驗證（在庫、未刪除）的購物車資料
 */
    private function getValidatedCart()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return [];
        }

        // 一次抓出資料庫中所有「未刪除」且「庫存 > 0」的商品 ID
        // 這樣可以解決 N+1 問題
        $validProductIds = Product::whereIn('id', array_keys($cart))
            ->where('stock', '>', 0)
            ->pluck('id')
            ->toArray();

        $isUpdated = false;
        foreach ($cart as $id => $details) {
            // 如果該 ID 不在資料庫的有效名單內，就從 Session 移除
            if (!in_array($id, $validProductIds)) {
                unset($cart[$id]);
                $isUpdated = true;
            }
        }

        // 如果有變動，同步回 Session
        if ($isUpdated) {
            session()->put('cart', $cart);
        }

        return $cart;
    }

    public function update(Request $request)
    {
        $id = $request->id; 
        $quantity = $request->input('quantity');
        $product = Product::findOrFail($id);

        // 1. 安全檢查：數量不可小於 1
        if ($quantity < 1) {
            return response()->json(['error' => '數量至少為 1'], 400);
        }

        // 2. 庫存檢查
        if ($quantity > $product->stock) {
            return response()->json(['error' => '庫存不足，剩餘：' . $product->stock], 400);
        }

        // 3. 更新 Session 資料
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $quantity;
            session()->put('cart', $cart);
        }

        // 4. 計算新小計與總金額
        $subtotal = $cart[$id]['price'] * $cart[$id]['quantity'];
        $total = collect($cart)->sum(fn ($item) => $item['price'] * $item['quantity']);
        $cartCount = collect($cart)->sum('quantity');

        return response()->json([
            'message' => '購物車已更新',
            'subtotal' => number_format($subtotal),
            'total' => number_format($total),
            'cartCount' => $cartCount
        ]);
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        $total = number_format(collect($cart)->sum(fn ($item) => $item['price'] * $item['quantity']));
        $cartCount = collect($cart)->sum('quantity');

        if (request()->ajax()) {
            return response()->json([
                'status' => 'success',
                'total' => $total,
                'cartCount' => $cartCount
            ]);
        }

        return redirect()->back()->with('success', '商品已移除');
    }
}