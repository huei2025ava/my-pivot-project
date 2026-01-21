<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label>商品名稱：</label>
    <input type="text" name="name" value="{{ old('name', $product->name) }}">

    <label>價格：</label>
    <input type="number" name="price" value="{{ old('price', $product->price) }}">

    <label>目前商品圖片：</label>
    <div class="mb-3">
        <img src="{{ asset('image/' . $product->image) }}" alt="">
    </div>
</form>