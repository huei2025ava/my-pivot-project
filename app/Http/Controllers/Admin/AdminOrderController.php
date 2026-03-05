<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    // 訂單列表頁
    public function index()
    {
        // 一次抓好訂單 + 會員姓名，避免 N+1 問題
        $orders = Order::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', compact('orders'));
    }

    // 訂單明細頁
    public function show(Order $order)
    {
        // 載入這張訂單底下的所有明細，並且連動抓出商品名稱
        $order->load('items.product'); 
        return view('admin.orders.show', compact('order'));
    }
}