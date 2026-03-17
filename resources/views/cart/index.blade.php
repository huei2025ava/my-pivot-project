@extends('layouts.app')

@section('content')

<style>
:root {
    --cream: #fdf6ee;
    --warm-brown: #7a5c44;
    --dark-brown: #3e2c1e;
    --accent: #d4886a;
    --border: #e8d8c8;
    --text-soft: #8c7060;
}

.cart-title {
    font-family: 'Noto Serif TC', serif;
    font-size: 22px;
    font-weight: 600;
    color: var(--dark-brown);
    letter-spacing: 2px;
    margin-bottom: 4px;
}

.cart-subtitle {
    font-size: 12px;
    color: var(--text-soft);
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-bottom: 32px;
}

/* ── 表格 ── */
.cart-table thead th {
    background-color: var(--dark-brown);
    color: #f0e4d4;
    font-size: 11px;
    letter-spacing: 2px;
    text-transform: uppercase;
    font-weight: 400;
    padding: 14px 16px;
    border: none;
    white-space: nowrap;
}

.cart-table tbody tr {
    border-bottom: 1px solid var(--border);
    transition: background-color 0.15s;
}

.cart-table tbody tr:hover {
    background-color: var(--cream);
}

.cart-table tbody td {
    padding: 14px 16px;
    vertical-align: middle;
    font-size: 14px;
    border: none;
    color: var(--dark-brown);
}

.cart-product-img {
    width: 64px;
    height: 64px;
    object-fit: contain;
    border-radius: 8px;
    background: var(--cream);
    padding: 4px;
    display: block;
}

.qty-input {
    width: 68px;
    border: 1px solid var(--border);
    border-radius: 8px;
    text-align: center;
    padding: 6px 8px;
    font-size: 14px;
    background: var(--cream);
    color: var(--dark-brown);
    outline: none;
    transition: border-color 0.2s;
}

.qty-input:focus {
    border-color: var(--warm-brown);
}

.price-text {
    font-weight: 600;
    color: var(--accent);
    white-space: nowrap;
}

.unit-price {
    color: var(--text-soft);
    font-size: 13px;
    white-space: nowrap;
}

.btn-remove {
    background: none;
    border: 1px solid #f0bfb4;
    border-radius: 50%;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #c0392b;
    font-size: 12px;
    cursor: pointer;
    transition: background-color 0.2s, border-color 0.2s;
    padding: 0;
}

.btn-remove:hover {
    background: #fdf0ee;
    border-color: #c0392b;
}

/* ── 右側摘要 ── */
.cart-summary-box {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 28px;
    position: sticky;
    top: 100px;
}

.total-label {
    font-size: 11px;
    color: var(--text-soft);
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-bottom: 6px;
}

.total-amount {
    font-family: 'Noto Serif TC', serif;
    font-size: 28px;
    font-weight: 600;
    color: var(--dark-brown);
    margin-bottom: 4px;
}

.btn-checkout {
    background-color: var(--dark-brown);
    color: #fff;
    border: none;
    border-radius: 30px;
    font-size: 13px;
    letter-spacing: 2px;
    padding: 14px 40px;
    width: 100%;
    text-transform: uppercase;
    transition: background-color 0.2s, transform 0.15s;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.btn-checkout:hover {
    background-color: var(--accent);
    transform: translateY(-2px);
    color: #fff;
}

.empty-cart {
    text-align: center;
    padding: 80px 0;
    color: var(--text-soft);
}

.empty-cart .icon {
    font-size: 48px;
    margin-bottom: 20px;
    display: block;
}

.empty-cart a {
    color: var(--accent);
    text-decoration: none;
    font-weight: 600;
}

/* ══ 自訂 Confirm Modal ══ */
.custom-modal-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(30, 18, 10, 0.45);
    z-index: 9999;
    align-items: center;
    justify-content: center;
}

.custom-modal-overlay.show {
    display: flex;
}

.custom-modal {
    background: #fff;
    border-radius: 20px;
    padding: 36px 32px 28px;
    width: 320px;
    max-width: 92vw;
    text-align: center;
    box-shadow: 0 20px 60px rgba(62, 44, 30, 0.2);
    animation: modalIn 0.2s ease;
}

@keyframes modalIn {
    from {
        transform: scale(0.92);
        opacity: 0;
    }

    to {
        transform: scale(1);
        opacity: 1;
    }
}

.modal-icon-wrap {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: #fdf0ee;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 16px;
    font-size: 22px;
    color: #c0392b;
}

.custom-modal h4 {
    font-family: 'Noto Serif TC', serif;
    font-size: 17px;
    font-weight: 700;
    color: var(--dark-brown);
    margin-bottom: 8px;
}

.custom-modal p {
    font-size: 13px;
    color: var(--text-soft);
    margin-bottom: 24px;
    line-height: 1.6;
}

.modal-btn-row {
    display: flex;
    gap: 10px;
}

.btn-modal-cancel {
    flex: 1;
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 20px;
    color: var(--text-soft);
    font-size: 13px;
    padding: 10px;
    cursor: pointer;
    transition: border-color 0.2s;
}

.btn-modal-cancel:hover {
    border-color: var(--warm-brown);
    color: var(--warm-brown);
}

.btn-modal-confirm {
    flex: 1;
    background: #c0392b;
    border: none;
    border-radius: 20px;
    color: #fff;
    font-size: 13px;
    font-weight: 600;
    padding: 10px;
    cursor: pointer;
    transition: background-color 0.2s;
}

.btn-modal-confirm:hover {
    background: #a93226;
}
</style>

{{-- ══ 自訂確認 Modal ══ --}}
<div class="custom-modal-overlay" id="removeModal">
    <div class="custom-modal">
        <div class="modal-icon-wrap">
            <i class="fas fa-trash-alt"></i>
        </div>
        <h4>移除商品</h4>
        <p>確定要將這件商品<br>從購物袋移除嗎？</p>
        <div class="modal-btn-row">
            <button class="btn-modal-cancel" id="modalCancel">再想想</button>
            <button class="btn-modal-confirm" id="modalConfirm">確定移除</button>
        </div>
    </div>
</div>

<div class="container py-4">
    <h2 class="cart-title text-center">購物袋</h2>
    <p class="cart-subtitle text-center">SHOPPING BAG</p>

    @if(session('success'))
    <div
        style="background:#edf7ed; border:1px solid #b7ddb7; border-radius:10px; color:#2d6a2d; font-size:14px; padding:12px 20px; margin-bottom:20px;">
        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div
        style="background:#fdf0ee; border:1px solid #f0bfb4; border-radius:10px; color:#9b3322; font-size:14px; padding:12px 20px; margin-bottom:20px;">
        <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
    </div>
    @endif

    @if(session('cart'))
    <div class="row g-4 align-items-start">

        {{-- ── 左：商品表格 ── --}}
        <div class="col-lg-8">
            <div style="border-radius:16px; overflow:hidden; border:1px solid var(--border);">
                <table class="table cart-table mb-0 text-center">
                    <thead>
                        <tr>
                            <th style="width:80px;">商品</th>
                            <th>名稱</th>
                            <th>單價</th>
                            <th style="width:90px;">數量</th>
                            <th>小計</th>
                            <th style="width:48px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $id => $details)
                        <tr>
                            {{-- 圖片 --}}
                            <td>
                                <img src="{{ asset('image/' . $details['img']) }}" class="cart-product-img"
                                    alt="{{ $details['name'] }}">
                            </td>

                            {{-- 名稱 --}}
                            <td>
                                <div style="font-weight:600; font-size:13.5px; line-height:1.5;">
                                    {{ $details['name'] }}
                                </div>
                                @if($details['is_sold_out'])
                                <span class="badge bg-danger mt-1" style="font-size:10px;">
                                    已完售 / 暫時下架
                                </span>
                                @endif
                            </td>

                            {{-- 單價 --}}
                            <td class="unit-price">NT$ {{ number_format($details['price']) }}</td>

                            {{-- 數量 --}}
                            <td>
                                @if($details['is_sold_out'])
                                <span style="color:var(--text-soft);">—</span>
                                @else
                                <input type="number" value="{{ $details['quantity'] }}" min="1"
                                    max="{{ $details['current_stock'] }}" class="qty-input update-cart"
                                    data-id="{{ $id }}">
                                @endif
                            </td>

                            {{-- 小計 --}}
                            <td class="price-text" id="subtotal-{{ $id }}">
                                @if($details['is_sold_out'])
                                NT$ 0
                                @else
                                NT$ {{ number_format($details['price'] * $details['quantity']) }}
                                @endif
                            </td>

                            {{-- 刪除 --}}
                            <td>
                                <button class="btn-remove" data-id="{{ $id }}" title="移除">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ── 右：結帳摘要 ── --}}
        <div class="col-lg-4">
            <div class="cart-summary-box">
                <p class="total-label">訂單總計</p>
                <p class="total-amount" id="cart-total-amount">NT$ {{ number_format($totalPrice) }}</p>
                <p style="font-size:12px; color:var(--text-soft); margin-bottom:20px;">含稅 · 不含運費</p>
                <div style="border-top:1px solid var(--border); margin-bottom:20px;"></div>

                @if(auth()->user()?->name === 'admin')
                <div
                    style="background:#fff8e1; border:1px solid #f5d87a; border-radius:10px; color:#b8860b; font-size:13px; padding:12px 16px;">
                    <i class="fas fa-info-circle me-1"></i>
                    管理員帳號不開放購買功能。
                </div>
                @else
                <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                    <input type="hidden" name="total_price" value="{{ $totalPrice }}">
                    <button type="submit" class="btn-checkout">
                        <i class="fas fa-lock" style="font-size:11px;"></i> 確認結帳
                    </button>
                </form>
                @endif
            </div>
        </div>

    </div>

    @else
    <div class="empty-cart">
        <span class="icon">🛍️</span>
        <p style="font-size:16px; margin-bottom:8px;">購物袋目前空空如也</p>
        <p style="font-size:14px;">快去 <a href="{{ route('home') }}">逛逛商品</a> 吧！</p>
    </div>
    @endif

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// ── 數量更新 AJAX ──
$(".update-cart").change(function() {
    let ele = $(this);
    let id = ele.attr("data-id");
    let quantity = ele.val();

    $.ajax({
        url: '{{ route("update.cart") }}',
        method: "patch",
        data: {
            _token: '{{ csrf_token() }}',
            id,
            quantity
        },
        success: function(res) {
            $(`#subtotal-${id}`).text('NT$ ' + res.subtotal);
            $('#cart-total-amount').text('NT$ ' + res.total);
            $('#cart-count-nav').text(res.cartCount);
        },
        error: function(xhr) {
            let msg = xhr.responseJSON ? xhr.responseJSON.error : '更新失敗，請重試';
            alert(msg);
            location.reload();
        }
    });
});

// ── 自訂 Confirm Modal：刪除商品 ──
let pendingRemoveId = null;

$(document).on('click', '.btn-remove', function() {
    pendingRemoveId = $(this).attr('data-id');
    $('#removeModal').addClass('show');
});

// 取消：點按鈕或遮罩
$('#modalCancel, #removeModal').click(function(e) {
    if (e.target === document.getElementById('removeModal') || e.target === document.getElementById(
            'modalCancel')) {
        $('#removeModal').removeClass('show');
        pendingRemoveId = null;
    }
});

// 確認刪除
$('#modalConfirm').click(function() {
    $('#removeModal').removeClass('show');
    if (!pendingRemoveId) return;

    let id = pendingRemoveId;
    let row = $(`.btn-remove[data-id="${id}"]`).closest('tr');

    $.ajax({
        url: '{{ url("remove-from-cart") }}/' + id,
        method: "DELETE",
        data: {
            _token: '{{ csrf_token() }}'
        },
        success: function(res) {
            row.fadeOut(280, function() {
                $(this).remove();
                if ($('tbody tr').length === 0) location.reload();
            });
            if (res.total !== undefined) {
                $('#cart-total-amount').text('NT$ ' + res.total);
                $('#cart-count-nav').text(res.cartCount);
            }
        },
        error: function() {
            alert('移除失敗，請重試');
        }
    });

    pendingRemoveId = null;
});
</script>

@endsection