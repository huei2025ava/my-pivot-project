@extends('layouts.app')

@section('content')

<style>
/* ── Breadcrumb ── */
.detail-breadcrumb {
    font-size: 12px;
    color: var(--text-soft);
    letter-spacing: 0.5px;
    margin-bottom: 32px;
}

.detail-breadcrumb a {
    color: var(--text-soft);
    text-decoration: none;
    transition: color 0.2s;
}

.detail-breadcrumb a:hover {
    color: var(--accent);
}

.detail-breadcrumb span {
    margin: 0 8px;
    opacity: 0.4;
}

/* ── Image ── */
.detail-img-wrap {
    border-radius: 4px;
    overflow: hidden;
    background: var(--cream);
    aspect-ratio: 1 / 1;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid var(--border);
}

.detail-img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 16px;
    transition: transform 0.4s ease;
}

.detail-img-wrap:hover img {
    transform: scale(1.04);
}

/* ── Right info panel ── */
.detail-info {
    padding: 8px 0 0 32px;
    display: flex;
    flex-direction: column;
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
    font-size: 26px;
    font-weight: 600;
    color: var(--dark-brown);
    line-height: 1.4;
    margin-bottom: 20px;
}

.detail-divider {
    border: none;
    border-top: 1px solid var(--border);
    margin: 20px 0;
}

.detail-price-label {
    font-size: 11px;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: var(--text-soft);
    margin-bottom: 6px;
}

.detail-price {
    font-family: 'Noto Serif TC', serif;
    font-size: 30px;
    font-weight: 600;
    color: var(--dark-brown);
    margin-bottom: 0;
}

/* ── Tags ── */
.tag-row {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin: 20px 0;
}

.tag {
    display: inline-block;
    background: var(--cream);
    border: 1px solid var(--border);
    border-radius: 20px;
    font-size: 11px;
    color: var(--text-soft);
    padding: 4px 14px;
    letter-spacing: 1px;
}

/* ── Add to cart button ── */
.btn-add-cart {
    width: 100%;
    background-color: var(--dark-brown);
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    letter-spacing: 2px;
    text-transform: uppercase;
    padding: 16px;
    cursor: pointer;
    transition: background-color 0.2s, transform 0.15s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-bottom: 12px;
}

.btn-add-cart:hover {
    background-color: var(--accent);
    transform: translateY(-1px);
}

/* ── Back link ── */
.btn-back-home {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    width: 100%;
    border: 1px solid var(--border);
    border-radius: 4px;
    background: none;
    color: var(--text-soft);
    font-size: 13px;
    letter-spacing: 1px;
    padding: 13px;
    text-decoration: none;
    transition: border-color 0.2s, color 0.2s;
}

.btn-back-home:hover {
    border-color: var(--warm-brown);
    color: var(--warm-brown);
}

/* ── Notice strip ── */
.notice-strip {
    margin-top: 24px;
    background: var(--cream);
    border-radius: 4px;
    border: 1px solid var(--border);
    padding: 14px 18px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.notice-item {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 12px;
    color: var(--text-soft);
}

.notice-item i {
    color: var(--accent);
    font-size: 13px;
    width: 16px;
    text-align: center;
    flex-shrink: 0;
}

@media (max-width: 767px) {
    .detail-info {
        padding: 24px 0 0;
    }

    .detail-name {
        font-size: 20px;
    }

    .detail-price {
        font-size: 24px;
    }
}
</style>

<div class="container py-4 py-md-5">

    {{-- Breadcrumb --}}
    <div class="detail-breadcrumb">
        <a href="{{ route('home') }}">首頁</a>
        <span>›</span>
        <span>{{ $product->name }}</span>
    </div>

    <div class="row align-items-start">

        {{-- Left: image --}}
        <div class="col-md-6">
            <div class="detail-img-wrap">
                <img src="{{ asset('image/' . $product->img) }}" alt="{{ $product->name }}" />
            </div>
        </div>

        {{-- Right: info --}}
        <div class="col-md-6 detail-info">

            <p class="detail-brand">Snoopy Official Store</p>
            <h1 class="detail-name">{{ $product->name }}</h1>

            <hr class="detail-divider">

            <p class="detail-price-label">售價</p>
            <p class="detail-price">NT$ {{ number_format($product->price) }}</p>

            <div class="tag-row">
                <span class="tag">正版授權</span>
                <span class="tag">台灣現貨</span>
                <span class="tag">限量商品</span>
            </div>

            <hr class="detail-divider">

            {{-- Add to cart --}}
            <form action="{{ route('add.to.cart', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn-add-cart">
                    <i class="fas fa-shopping-bag"></i> 加入購物車
                </button>
            </form>

            {{-- Back --}}
            <a href="{{ route('home') }}" class="btn-back-home">
                <i class="fas fa-arrow-left" style="font-size:11px;"></i> 回到首頁
            </a>

            {{-- Notice --}}
            <div class="notice-strip">
                <div class="notice-item">
                    <i class="fas fa-truck"></i>
                    <span>全台免運，滿 NT$1,500 贈 Snoopy 貼紙組</span>
                </div>
                <div class="notice-item">
                    <i class="fas fa-shield-alt"></i>
                    <span>正版授權商品，品質保證</span>
                </div>
                <div class="notice-item">
                    <i class="fas fa-undo"></i>
                    <span>7 天鑑賞期，不滿意可退換</span>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection