@extends('layouts.app')

@section('carousel')
<div id="carouselExampleIndicators" class="carousel slide">
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
            <img src="{{ asset('image/powerup.jpg') }}" class="d-block img-fluid w-100" alt="..." />
        </div>
        <div class="carousel-item">
            <img src="{{ asset('image/happylove.jpg') }}" class="d-block img-fluid w-100" alt="..." />
        </div>
        <div class="carousel-item">
            <img src="{{ asset('image/loveproduct.jpg') }}" class="d-block img-fluid w-100" alt="..." />
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
<div class="container my-5">
    @if(isset($products) && $products->count() > 0)
    <div class="row g-3">
        @foreach($products as $index => $item)
        <div class="col-6 col-lg-3">
            <div class="card h-100">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modal-{{ $index }}">
                    <a href="{{ route('product.show', $item->id) }}">
                        <img src="{{ asset('image/' . $item->img) }}" class="card-img-top img-fluid" alt="商品名稱" />
                    </a>
                </button>

                <div class="card-body">
                    <h5 class="card-title text-center">{{ $item->name }}</h5>
                    <p class="card-text text-center">{{ $item->price }}</p>
                </div>
            </div>
        </div>

        <!-- <div class="modal fade" id="modal-{{ $index }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('image/' . $item->img) }}" class="card-img-top img-fluid" alt="商品名稱" />
                    </div>
                </div>
            </div>
        </div> -->
        @endforeach
        @else
        <div class="text-center py-5">
            <p class="text-muted">
                🐾 汪！目前還沒有商品上架喔，請稍後再回來。
            </p>
        </div>
        @endif
    </div>

</div>
@endsection