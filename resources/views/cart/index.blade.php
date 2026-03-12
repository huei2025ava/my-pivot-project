@extends('layouts.app')

@section('content')

<style>
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

.cart-table thead th {
  background-color: var(--dark-brown);
  color: #f0e4d4;
  font-size: 12px;
  letter-spacing: 2px;
  text-transform: uppercase;
  font-weight: 400;
  padding: 14px 16px;
  border: none;
}

.cart-table tbody tr {
  border-bottom: 1px solid var(--border);
  transition: background-color 0.15s;
}

.cart-table tbody tr:hover {
  background-color: var(--cream);
}

.cart-table tbody td {
  padding: 16px;
  vertical-align: middle;
  font-size: 14px;
  border: none;
  color: var(--text-main);
}

.cart-product-img {
  width: 64px;
  height: 64px;
  object-fit: cover;
  border-radius: 8px;
}

.qty-input {
  width: 72px;
  border: 1px solid var(--border);
  border-radius: 8px;
  text-align: center;
  padding: 6px 8px;
  font-size: 14px;
  background: var(--cream);
  color: var(--text-main);
  outline: none;
}

.qty-input:focus {
  border-color: var(--warm-brown);
}

.price-text {
  font-weight: 600;
  color: var(--accent);
}

.cart-summary-box {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: 16px;
  padding: 28px;
}

.total-label {
  font-size: 13px;
  color: var(--text-soft);
  letter-spacing: 1px;
  text-transform: uppercase;
}

.total-amount {
  font-family: 'Noto Serif TC', serif;
  font-size: 26px;
  font-weight: 600;
  color: var(--dark-brown);
}

.btn-checkout {
  background-color: var(--dark-brown);
  color: #fff;
  border: none;
  border-radius: 30px;
  font-size: 14px;
  letter-spacing: 2px;
  padding: 14px 40px;
  width: 100%;
  text-transform: uppercase;
  transition: background-color 0.2s, transform 0.15s;
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
</style>

<div class="container py-4">
  <h2 class="cart-title text-center">購物袋</h2>
  <p class="cart-subtitle text-center">SHOPPING BAG</p>

  @if(session('success'))
  <div class="alert"
    style="background:#edf7ed; border:1px solid #b7ddb7; border-radius:10px; color:#2d6a2d; font-size:14px; padding:12px 20px;">
    {{ session('success') }}
  </div>
  @endif

  @if(session('error'))
  <div class="alert"
    style="background:#fdf0ee; border:1px solid #f0bfb4; border-radius:10px; color:#9b3322; font-size:14px; padding:12px 20px;">
    {{ session('error') }}
  </div>
  @endif

  @if(session('cart'))

  <div class="row g-4 align-items-start">
    <div class="col-lg-8">
      <div style="border-radius:16px; overflow:hidden; border:1px solid var(--border);">
        <table class="table cart-table mb-0">
          <thead>
            <tr>
              <th>商品</th>
              <th>名稱</th>
              <th>單價</th>
              <th>數量</th>
              <th>小計</th>
            </tr>
          </thead>
          <tbody>
            @php $total = 0 @endphp
            @foreach($cart as $id => $details)
            @php
            $total += $details['price'] * $details['quantity'];
            $product = \App\Models\Product::find($id);
            @endphp
            <tr>
              <td>
                <img src="{{ asset('image/' . $details['img']) }}" class="cart-product-img">
              </td>
              <td style="font-weight:600;">{{ $details['name'] }}</td>
              <td class="price-text">NT$ {{ number_format($details['price']) }}</td>
              <td>
                <input type="number" value="{{ $details['quantity'] }}" min="1" max="{{ $product->stock }}"
                  class="qty-input update-cart" data-id="{{ $id }}">
              </td>
              <td class="price-text">NT$ {{ number_format($details['price'] * $details['quantity']) }}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="cart-summary-box">
        <p class="total-label mb-2">訂單總計</p>
        <p class="total-amount mb-1">NT$ {{ number_format($total) }}</p>
        <p style="font-size:12px; color:var(--text-soft); margin-bottom:24px;">含稅 · 不含運費</p>
        <div style="border-top:1px solid var(--border); margin-bottom:24px;"></div>
        @if(auth()->user()?->name !== 'admin')
        <form action="{{ route('checkout') }}" method="POST">
          @csrf
          <input type="hidden" name="total_price" value="{{ $total }}">
          <button type="submit" class="btn-checkout">
            <i class="fas fa-lock me-2" style="font-size:12px;"></i> 確認結帳
          </button>
          @else
          <div class="alert alert-warning">
            您目前是以管理員身分登入，不開放購買功能。
          </div>
          @endif
        </form>
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

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(".update-cart").change(function(e) {
  e.preventDefault()
  let ele = $(this);

  $.ajax({
    url: '{{ route("update.cart") }}',
    method: "patch",
    data: {
      _token: '{{ csrf_token() }}',
      id: ele.attr("data-id"),
      quantity: ele.val()
    },
    success: function(response) {
      window.location.reload();
    },
    error: function(response) {
      alert('更新失敗，請檢查庫存！');
    }
  });
})
</script>