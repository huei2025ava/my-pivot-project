@extends('layouts.app')

@section('carousel')
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('image/powerup.webp') }}" class="d-block img-fluid w-100" alt="..." />
        </div>
        <div class="carousel-item">
            <img src="{{ asset('image/happylove.webp') }}" class="d-block img-fluid w-100" alt="..." />
        </div>
        <div class="carousel-item">
            <img src="{{ asset('image/loveproduct.webp') }}" class="d-block img-fluid w-100" alt="..." />
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
@endsection

@section('content')

<style>
.section-title {
    font-family: 'Noto Serif TC', serif;
    font-size: 20px;
    font-weight: 600;
    color: var(--dark-brown);
    letter-spacing: 3px;
    margin-bottom: 6px;
}

.section-divider {
    width: 36px;
    height: 2px;
    background-color: var(--accent);
    margin: 0 auto 10px;
}

.section-subtitle {
    font-size: 12px;
    color: var(--text-soft);
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-bottom: 36px;
}

/* ── Product card ── */
.product-card {
    border: 1px solid var(--border) !important;
    border-radius: 0 !important;
    background: var(--white);
    overflow: hidden;
}

/* image wrapper — position relative so overlay can sit on top */
.product-img-wrap {
    position: relative;
    overflow: hidden;
    aspect-ratio: 1 / 1;
    background: var(--cream);
    cursor: pointer;
}

.product-img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.35s ease;
}

.product-card:hover .product-img-wrap img {
    transform: scale(1.05);
}

/* ── Hover overlay ── */
.cart-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(62, 44, 30, 0.82);
    /* dark brown semi-transparent */
    color: #fff;
    text-align: center;
    font-size: 13px;
    letter-spacing: 2px;
    text-transform: none;
    padding: 13px 0;
    /* hidden by default */
    opacity: 0;
    transform: translateY(100%);
    transition: opacity 0.25s ease, transform 0.25s ease;
    border: none;
    width: 100%;
    cursor: pointer;
}

.product-img-wrap:hover .cart-overlay {
    opacity: 1;
    transform: translateY(0);
}

.cart-overlay i {
    margin-right: 6px;
    font-size: 13px;
}

/* ── Card body ── */
.product-card .card-body {
    padding: 14px 10px 18px;
    text-align: center;
}

.product-card .card-title {
    font-size: 13.5px;
    font-weight: 600;
    color: var(--dark-brown);
    line-height: 1.5;
    margin-bottom: 6px;
    /* allow 2-line wrap like in the screenshot */
    min-height: 2.8em;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.product-price {
    font-size: 14px;
    color: var(--text-main);
    margin-bottom: 0;
}

/* empty state */
.empty-state {
    padding: 80px 0;
    color: var(--text-soft);
    font-size: 15px;
    text-align: center;
}

.empty-state .paw {
    font-size: 44px;
    margin-bottom: 16px;
    display: block;
}
</style>

<div class="my-4 text-center">

    @if(isset($products) && $products->count() > 0)

    <h2 class="section-title">精選商品</h2>
    <div class="section-divider"></div>
    <p class="section-subtitle">FEATURED PRODUCTS</p>

    <div class="row g-3">
        @foreach($products as $item)
        <div class="col-6 col-lg-3">
            <div class="card product-card h-100">

<<<<<<< HEAD
                {{-- Image with hover overlay --}}
                <div class="product-img-wrap">
                    <a href="{{ route('product.show', $item->id) }}" class="d-block w-100 h-100">
                        <img src="{{ asset('image/' . $item->img) }}" alt="{{ $item->name }}" />
                    </a>
=======
        {{-- Image with hover overlay --}}
        <div class="product-img-wrap">
          <a href="{{ route('product.show', $item->id) }}" class="d-block w-100 h-100">
            <img src="{{ asset('image/' . $item->img) }}" alt="{{ $item->name }}" />
          </a>
>>>>>>> 86edfa3d0735437970d68d08b867d0085e32126a

                    {{-- Overlay form — sits on top of the image --}}
                    <form action="{{ route('add.to.cart', $item->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="cart-overlay">
                            <i class="fas fa-shopping-bag"></i> 加入購物車
                        </button>
                    </form>
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="product-price">NT$ {{ number_format($item->price) }}</p>
                </div>

            </div>
        </div>
        @endforeach
    </div>

    @else
    <div class="empty-state">
        <span class="paw">🐾</span>
        <p>目前還沒有商品上架，請稍後再回來！</p>
    </div>
    @endif

</div>
@endsection