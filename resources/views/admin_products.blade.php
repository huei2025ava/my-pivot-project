@extends('layouts.admin')

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
                    <p class="card-text text-center">NT$ {{ $item->price }}</p>
                    <form action="{{ route('products.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('「{{ $item->name }}」嗎？這將會連同圖片一起刪除且無法還原！')">
                            刪除
                        </button>
                    </form>
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