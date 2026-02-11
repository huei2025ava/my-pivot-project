<?php

// 宣告這是一個控制器，處理訂單邏輯

namespace App\Http\Controllers;

// 引入 Laravel 內建的 Request 工具，用來接收前端傳來的資料（如總金額）
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
// 引入 DB 門面，用來處理資料庫交易（Transaction）
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        // 1. 從 Session 拿出購物車
        // 想像 Session 是一個購物籃，我們用 get('cart') 把它拿出來
        $cart = Session::get('cart');

        if (!$cart) {
            return redirect()->back()->with('error', '購物車是空的!');
        }
        //2. 開啟「資料庫交易模式」
        //沒有 commit，都不行正式存進去
        DB::beginTransaction();

        try {
            // --- A. 建立訂單主檔 (Order) ---
            $order = new Order(); // 建立一個新的訂單物件
            $order->total_price = $request->total_price; // 從前端表單接收總金額存入
            $order->status = 'pending';// 剛建立時，狀態先設為「處理中」
            $order->save();// 存檔！這時資料庫會自動產生一個 order.id

            // --- B. 用迴圈處理每一件商品 ---
            // $cart 是一個陣列，我們用 foreach 一個個拿出來處理
            // $id 是商品 ID，$details 是裡面的數量、價格等資訊
            foreach ($cart as $id => $details) {

                // 1. 存入訂單明細 (OrderItem)
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;// 關聯剛剛產生的訂單 ID
                $orderItem->product_id = $id; // $id 是商品 ID
                $orderItem->quantity = $details['quantity']; // 購買數量
                $orderItem->price = $details['price'];       // 購買當時的單價
                $orderItem->save();

                // 2. 重點：扣庫存 (Product)
                $product = Product::find($id);

                // 檢查庫存夠不夠
                if ($product->stock < $details['quantity']) {
                    // 如果不夠，我們手動觸發一個錯誤（Exception）
                    // 這會直接跳到下方的 catch 區塊，取消訂單
                    throw new \Exception($product->name . "庫存不足！");
                }

                // 扣除庫存
                $product->stock -= $details['quantity'];
                $product->save();
            }
            DB::commit();

            // 清空購物車，因為已經買單了
            Session::forget('cart');

            return redirect()->route('cart.index')->with('success', '訂單已成立！');
        } catch (\Exception $e) {
            // --- D. 發生意外時的處理 ---
            // 如果上面 try 裡面任何一行出錯（例如庫存不夠或是資料庫斷線）
            // 就會跑來這裡。這行 rollBack 會把剛剛「試寫」的內容全部擦掉！
            // 你的訂單不會產生，庫存也不會被亂扣，保證資料安全。
            DB::rollBack();

            return redirect()->back()->with('error','結帳失敗：'.$e->getMessage());
        }
    }
}