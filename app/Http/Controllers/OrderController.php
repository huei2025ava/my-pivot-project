<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', '購物車是空的！');
        }

        try {
            // 開啟資料庫交易 (Transaction)
            DB::beginTransaction();

            // 1. 建立訂單主檔
            $order = Order::create([
                'total_price' => collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']),
                'status' => 'paid', // 假設直接付款成功
            ]);

            foreach ($cart as $id => $details) {
                // 2. 找到商品
                $product = Product::findOrFail($id);

                // 3. 檢查庫存是否足夠
                if ($product->stock < $details['quantity']) {
                    throw new \Exception("商品 {$product->name} 庫存不足！");
                }

                // 4. 建立訂單明細
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'quantity' => $details['quantity'],
                    'price' => $details['price'],
                ]);

                // 5. 重點：自動扣除庫存
                $product->decrement('stock', $details['quantity']);
            }

            // 提交交易：以上動作都成功才真正寫入資料庫
            DB::commit();

            // 6. 清空購物車 Session
            session()->forget('cart');

            return redirect()->route('home')->with('success', '結帳成功！訂單編號：' . $order->id);

        } catch (\Exception $e) {
            // 如果出錯（例如庫存不足），復原所有動作
            DB::rollback();
            return redirect()->route('cart.index')->with('error', '結帳失敗：' . $e->getMessage());
        }
    }
}
?>