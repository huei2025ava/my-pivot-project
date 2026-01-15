@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('image/' . $product->img) }}" class="img-fluid rounded" alt="{{ $product->name }}">
        </div>
        <div class="col-md-6">
            <h1>{{ $product->name }}</h1>
            <p class="text-danger h3">NT$ {{ $product->price }}</p>
            <hr>
            <button class="btn btn-primary btn-lg">加入購物車</button>
            <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-lg">回到首頁</a>
        </div>
    </div>
</div>
@endsection