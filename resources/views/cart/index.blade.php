@extends('layouts.app')

@section('content')

<div class="container">
    <h2>您的購物車</h2>

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
            @php $total += $details['price'] * $details['quantity'] @endphp
            <tr>
                <td><img src="{{ asset('image/' . $details['img']) }}" width="50"></td>
                <td>{{ $details['name'] }}</td>
                <td>${{ $details['price'] }}</td>
                <td>{{ $details['quantity'] }}</td>
                <td>${{ $details['price'] * $details['quantity'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-end">
        <h3>總計：${{ $total }}</h3>
        {{-- 這裡就是妳下一步要做的結帳按鈕 --}}
        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">確認結帳</button>
        </form>
    </div>
    @else
    <p>購物車空空如也，快去逛逛吧！</p>
    @endif
</div>

@endsection