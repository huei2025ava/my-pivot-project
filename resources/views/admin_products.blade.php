@extends('layouts.admin')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">商品管理</h1>
    <button class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#createProductModal">
        <i class="fas fa-plus fa-sm text-white-50"></i> 新增商品
    </button>
</div>

<div class="row">
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">商品總數</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProducts }} 件</div>
                    </div>
                    <div class="col-auto"><i class="fas fa-box fa-2x text-gray-300"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">庫存總價值</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$ {{ number_format($totalPrice) }}</div>
                    </div>
                    <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                    <p class="card-text text-center">NT$ {{ $item->price }}</p>
                    <div class="d-flex align-items-center justify-content-center">
                        <form action="{{ route('products.destroy', $item->id) }}" method="POST" class="mr-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mt-3"
                                onclick="return confirm('確定刪除「{{ $item->name }}」嗎？')">
                                刪除
                            </button>
                        </form>

                        <a href="{{ route('products.edit', $item->id) }}" class="btn btn-info btn-circle btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class=" modal fade" id="modal-{{ $index }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset('image/' . $item->img) }}" class="card-img-top img-fluid"
                                        alt="商品名稱" />
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