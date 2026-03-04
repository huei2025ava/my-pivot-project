@extends('layouts.app')

@section('content')

<style>
.detail-img-wrap {
  border-radius: 16px;
  overflow: hidden;
  background: var(--cream);
  aspect-ratio: 1/1;
}

.detail-img-wrap img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.detail-section {
  padding: 20px 0 0 32px;
}

.detail-brand {
  font-size: 11px;
  letter-spacing: 3px;
  text-transform: uppercase;
  color: var(--text-soft);
  margin-bottom: 10px;
}

.detail-name {
  font-family: 'Noto Serif TC', serif;
  font-size: 28px;
  font-weight: 600;
  color: var(--dark-brown);
  line-height: 1.4;
  margin-bottom: 16px;
}

.detail-price {
  font-size: 26px;
  font-weight: 700;
  color: var(--accent);
  margin-bottom: 24px;
}

.divider-line {
  border-top: 1px solid var(--border);
  margin: 24px 0;
}

.btn-add-cart {
  background-color: var(--dark-brown);
  color: #fff;
  border: none;
  border-radius: 30px;
  font-size: 14px;
  letter-spacing: 2px;
  padding: 14px 40px;
  transition: background-color 0.2s, transform 0.15s;
  text-transform: uppercase;
}

.btn-add-cart:hover {
  background-color: var(--accent);
  transform: translateY(-2px);
  color: #fff;
}

.btn-back {
  background: none;
  border: 1.5px solid var(--border);
  color: var(--text-soft);
  border-radius: 30px;
  font-size: 13px;
  letter-spacing: 1px;
  padding: 13px 28px;
  transition: border-color 0.2s, color 0.2s;
  text-decoration: none;
  display: inline-block;
}

.btn-back:hover {
  border-color: var(--warm-brown);
  color: var(--warm-brown);
}

.badge-tag {
  display: inline-block;
  background: var(--cream);
  border: 1px solid var(--border);
  border-radius: 20px;
  font-size: 11px;
  color: var(--text-soft);
  padding: 4px 14px;
  margin-right: 6px;
  letter-spacing: 1px;
}
</style>

<div class="container mt-5 mb-5">
  <div class="row align-items-start">
    <div class="col-md-6">
      <div class="detail-img-wrap">
        <img src="{{ asset('image/' . $product->img) }}" alt="{{ $product->name }}">
      </div>
    </div>
    <div class="col-md-6 detail-section">
      <p class="detail-brand">Snoopy Official Store</p>
      <h1 class="detail-name">{{ $product->name }}</h1>
      <p class="detail-price">NT$ {{ number_format($product->price) }}</p>

      <div class="mb-3">
        <span class="badge-tag">正版授權</span>
        <span class="badge-tag">台灣現貨</span>
      </div>

      <div class="divider-line"></div>

      <div class="d-flex gap-3 flex-wrap">
        <button class="btn-add-cart">
          <i class="fas fa-shopping-bag me-2"></i> 加入購物袋
        </button>
        <a href="{{ route('home') }}" class="btn-back">
          ← 回到首頁
        </a>
      </div>
    </div>
  </div>
</div>
@endsection