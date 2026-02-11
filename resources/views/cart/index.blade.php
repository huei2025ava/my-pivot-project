@extends('layouts.app')

@section('content')

<div class="container">
    <h2>您的購物車</h2>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('cart'))
    <table class="table">
        <thead>
            <tr>
                <th>商品圖片</th>
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
            $product =\App\Models\Product::find($id);
            @endphp
            <tr>
                <td><img src="{{ asset('image/' . $details['img']) }}" width="50"></td>
                <td>{{ $details['name'] }}</td>
                <td>${{ $details['price'] }}</td>
                <td>
                    <input type="number" value="{{ $details['quantity'] }}" min="1" max="{{ $product->stock }}"
                        class="form-control update-cart" data-id="{{ $id }}">
                </td>
                <td>${{ $details['price'] * $details['quantity'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-end">
        <p>總金額:{{ $total }}</p>
        {{-- 這裡就是妳下一步要做的結帳按鈕 --}}
        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <input type="hidden" name="total_price" value="{{ $total }}">
            <button type="submit" class="btn btn-primary">確認結帳</button>
        </form>
    </div>
    @else
    <p>購物車空空如也，快去逛逛吧！</p>
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
            window.location.reload(); // 成功後重新整理頁面，更新總金額
        },
        error: function(response) {
            alert('更新失敗，請檢查庫存！');
        }
    });
})
</script>