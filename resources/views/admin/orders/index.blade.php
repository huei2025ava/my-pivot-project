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
    font-size: 22px;
    font-weight: 600;
    color: var(--dark-brown);
    letter-spacing: 2px;
}

/* ── Table wrap ── */
.orders-table-wrap {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid var(--border);
    box-shadow: 0 4px 16px rgba(62, 44, 30, 0.07);
}

.orders-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 0;
}

.orders-table thead tr {
    background-color: var(--dark-brown);
}

.orders-table thead th {
    color: #f0e4d4;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    padding: 16px 20px;
    border: none;
    white-space: nowrap;
}

.orders-table tbody tr {
    border-bottom: 1px solid var(--border);
    transition: background-color 0.15s;
}

.orders-table tbody tr:last-child {
    border-bottom: none;
}

.orders-table tbody tr:hover {
    background-color: var(--cream);
}

.orders-table tbody td {
    padding: 15px 20px;
    font-size: 13.5px;
    color: var(--dark-brown);
    vertical-align: middle;
    border: none;
}

.order-id {
    font-size: 12px;
    font-weight: 700;
    color: var(--text-soft);
}

.order-price {
    font-weight: 700;
    color: var(--accent);
}

/* ── Status badges ── */
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

/* ── Detail button ── */
.btn-detail {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: var(--cream);
    border: 1px solid var(--border);
    border-radius: 20px;
    color: var(--warm-brown);
    font-size: 12px;
    font-weight: 600;
    padding: 6px 16px;
    text-decoration: none;
    transition: all 0.2s;
    white-space: nowrap;
}

.btn-detail:hover {
    background: var(--dark-brown);
    border-color: var(--dark-brown);
    color: #fff;
}

.btn-detail i {
    font-size: 11px;
}
</style>

<div class="d-flex align-items-center justify-content-between mb-4">
    <h2 class="page-header-title mb-0">訂單管理</h2>
</div>

<div class="orders-table-wrap">
    <table class="orders-table">
        <thead>
            <tr>
                <th>訂單編號</th>
                <th>會員姓名</th>
                <th>總金額</th>
                <th>狀態</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td class="order-id">{{ $order->id }}</td>

                <td>
                    <div style="display:flex; align-items:center; gap:10px;">
                        <div
                            style="width:32px;height:32px;border-radius:50%;background:var(--warm-brown);color:#fff;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;flex-shrink:0;">
                            {{ mb_substr($order->user->name, 0, 1) }}
                        </div>
                        <span style="font-weight:600;">{{ $order->user->name }}</span>
                    </div>
                </td>

                <td class="order-price">NT$ {{ number_format($order->total_price) }}</td>

                <td>
                    @php
                    $statusMap = [
                    '待付款' => 'status-pending',
                    '已付款' => 'status-paid',
                    '已出貨' => 'status-shipped',
                    '已完成' => 'status-done',
                    'pending' => 'status-pending',
                    'paid' => 'status-paid',
                    'shipped' => 'status-shipped',
                    'done' => 'status-done',
                    ];
                    $cls = $statusMap[$order->status] ?? 'status-default';
                    @endphp
                    <span class="status-badge {{ $cls }}">{{ $order->status }}</span>
                </td>

                <td>
                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn-detail">
                        <i class="fas fa-receipt"></i> 查看明細
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection