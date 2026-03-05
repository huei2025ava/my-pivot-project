@extends('layouts.admin')

@section('content')

<style>
:root {
    --cream: #fdf6ee;
    --warm-brown: #7a5c44;
    --dark-brown: #3e2c1e;
    --accent: #d4886a;
    --border: #e8d8c8;
    --text-soft: #8c7060;
    --white: #fffdf9;
}

.page-header-title {
    font-family: 'Noto Serif TC', serif;
    font-size: 20px;
    font-weight: 600;
    color: var(--dark-brown);
    letter-spacing: 1px;
}

/* ── 返回按鈕 ── */
.btn-back {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: none;
    border: 1px solid var(--border);
    border-radius: 20px;
    color: var(--text-soft);
    font-size: 12px;
    font-weight: 600;
    padding: 7px 18px;
    text-decoration: none;
    transition: all 0.2s;
}

.btn-back:hover {
    border-color: var(--warm-brown);
    color: var(--warm-brown);
}

.btn-back i {
    font-size: 11px;
}

/* ── Info cards ── */
.info-card {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 16px;
    overflow: hidden;
    margin-bottom: 20px;
    box-shadow: 0 4px 14px rgba(62, 44, 30, 0.07);
}

.info-card-header {
    background-color: var(--dark-brown);
    color: #f0e4d4;
    font-family: 'Noto Serif TC', serif;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: 2px;
    text-transform: uppercase;
    padding: 13px 20px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.info-card-header i {
    color: var(--accent);
    font-size: 13px;
}

.info-card-body {
    padding: 20px 22px;
}

.info-row {
    display: flex;
    align-items: baseline;
    gap: 8px;
    margin-bottom: 12px;
    font-size: 13.5px;
}

.info-row:last-child {
    margin-bottom: 0;
}

.info-label {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    color: var(--text-soft);
    white-space: nowrap;
    min-width: 80px;
}

.info-value {
    color: var(--dark-brown);
    font-weight: 500;
}

/* ── Level badge ── */
.level-badge {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1px;
    padding: 3px 10px;
}

.level-gold {
    background: #fff8e1;
    color: #b8860b;
    border: 1px solid #f5d87a;
}

.level-silver {
    background: #f2f2f2;
    color: #666;
    border: 1px solid #ccc;
}

.level-normal {
    background: var(--cream);
    color: var(--text-soft);
    border: 1px solid var(--border);
}

/* ── Status badge ── */
.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1px;
    padding: 4px 12px;
}

.status-pending {
    background: #fff8e1;
    color: #b8860b;
    border: 1px solid #f5d87a;
}

.status-paid {
    background: #edf7ed;
    color: #2d6a2d;
    border: 1px solid #b7ddb7;
}

.status-shipped {
    background: #e8f0fe;
    color: #1a56b0;
    border: 1px solid #aac4f0;
}

.status-done {
    background: var(--cream);
    color: var(--text-soft);
    border: 1px solid var(--border);
}

.status-default {
    background: #f5f5f5;
    color: #666;
    border: 1px solid #ddd;
}

/* ── Total amount ── */
.total-amount {
    font-family: 'Noto Serif TC', serif;
    font-size: 22px;
    font-weight: 600;
    color: var(--accent);
}

/* ── Items table ── */
.items-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 0;
}

.items-table thead tr {
    background-color: var(--dark-brown);
}

.items-table thead th {
    color: #f0e4d4;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    padding: 14px 18px;
    border: none;
}

.items-table tbody tr {
    border-bottom: 1px solid var(--border);
    transition: background-color 0.15s;
}

.items-table tbody tr:last-child {
    border-bottom: none;
}

.items-table tbody tr:hover {
    background-color: var(--cream);
}

.items-table tbody td {
    padding: 14px 18px;
    font-size: 13.5px;
    color: var(--dark-brown);
    vertical-align: middle;
    border: none;
}

.items-table tfoot tr {
    background-color: var(--cream);
    border-top: 2px solid var(--border);
}

.items-table tfoot td {
    padding: 14px 18px;
    font-size: 14px;
    font-weight: 700;
    color: var(--dark-brown);
    border: none;
}

.item-name {
    font-weight: 600;
    color: var(--dark-brown);
    margin-bottom: 2px;
}

.item-id {
    font-size: 11px;
    color: var(--text-soft);
}

.item-price {
    color: var(--text-soft);
    font-weight: 500;
}

.item-subtotal {
    font-weight: 700;
    color: var(--accent);
}

.tfoot-total {
    font-family: 'Noto Serif TC', serif;
    font-size: 18px;
    color: var(--accent);
}
</style>

{{-- ── Header ── --}}
<div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
    <h2 class="page-header-title mb-0">
        訂單明細 <span style="color:var(--text-soft); font-size:15px;">#{{ $order->id }}</span>
    </h2>
    <a href="{{ route('admin.orders.index') }}" class="btn-back">
        <i class="fas fa-arrow-left"></i> 返回列表
    </a>
</div>

<div class="row g-4">

    {{-- ── Left column ── --}}
    <div class="col-md-4">

        {{-- 客戶資訊 --}}
        <div class="info-card">
            <div class="info-card-header">
                <i class="fas fa-user"></i> 客戶資訊
            </div>
            <div class="info-card-body">
                {{-- Avatar --}}
                <div
                    style="display:flex; align-items:center; gap:14px; margin-bottom:20px; padding-bottom:16px; border-bottom:1px solid var(--border);">
                    <div
                        style="width:44px;height:44px;border-radius:50%;background:var(--warm-brown);color:#fff;display:flex;align-items:center;justify-content:center;font-size:18px;font-weight:700;flex-shrink:0;">
                        {{ mb_substr($order->user->name, 0, 1) }}
                    </div>
                    <div>
                        <div style="font-weight:700; font-size:15px; color:var(--dark-brown);">{{ $order->user->name }}
                        </div>
                        <div style="font-size:12px; color:var(--text-soft);">{{ $order->user->email }}</div>
                    </div>
                </div>

                <div class="info-row">
                    <span class="info-label">等級</span>
                    @php $level = $order->user->level; @endphp
                    @if($level == 'Gold')
                    <span class="level-badge level-gold"><i class="fas fa-crown" style="font-size:9px;"></i> 金卡</span>
                    @elseif($level == 'Silver')
                    <span class="level-badge level-silver"><i class="fas fa-medal" style="font-size:9px;"></i> 銀卡</span>
                    @else
                    <span class="level-badge level-normal">一般</span>
                    @endif
                </div>
            </div>
        </div>

        {{-- 訂單狀態 --}}
        <div class="info-card">
            <div class="info-card-header">
                <i class="fas fa-receipt"></i> 訂單狀態
            </div>
            <div class="info-card-body">
                <div class="info-row">
                    <span class="info-label">下單時間</span>
                    <span class="info-value">{{ $order->created_at->format('Y-m-d H:i') }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">目前狀態</span>
                    @php
                    $statusMap = [
                    '待付款'=>'status-pending','已付款'=>'status-paid',
                    '已出貨'=>'status-shipped','已完成'=>'status-done',
                    'pending'=>'status-pending','paid'=>'status-paid',
                    'shipped'=>'status-shipped','done'=>'status-done',
                    ];
                    $cls = $statusMap[$order->status] ?? 'status-default';
                    @endphp
                    <span class="status-badge {{ $cls }}">{{ $order->status }}</span>
                </div>
                <div style="border-top:1px solid var(--border); margin-top:16px; padding-top:16px;">
                    <div
                        style="font-size:11px; letter-spacing:1px; text-transform:uppercase; color:var(--text-soft); margin-bottom:6px;">
                        訂單總計</div>
                    <div class="total-amount">NT$ {{ number_format($order->total_price) }}</div>
                </div>
            </div>
        </div>

    </div>

    {{-- ── Right column: items ── --}}
    <div class="col-md-8">
        <div class="info-card">
            <div class="info-card-header">
                <i class="fas fa-box-open"></i> 購買清單
            </div>
            <div style="overflow:hidden;">
                <table class="items-table">
                    <thead>
                        <tr>
                            <th>商品名稱</th>
                            <th class="text-end">單價</th>
                            <th class="text-center">數量</th>
                            <th class="text-end">小計</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                        <tr>
                            <td>
                                <div class="item-name">{{ $item->product->name }}</div>
                                <div class="item-id">商品 ID：{{ $item->product_id }}</div>
                            </td>
                            <td class="text-end item-price">NT$ {{ number_format($item->price) }}</td>
                            <td class="text-center">
                                <span
                                    style="background:var(--cream); border:1px solid var(--border); border-radius:20px; padding:2px 12px; font-size:13px;">
                                    {{ $item->quantity }}
                                </span>
                            </td>
                            <td class="text-end item-subtotal">NT$ {{ number_format($item->price * $item->quantity) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-end"
                                style="color:var(--text-soft); font-size:12px; letter-spacing:1px; text-transform:uppercase;">
                                訂單總計
                            </td>
                            <td class="text-end tfoot-total">NT$ {{ number_format($order->total_price) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection