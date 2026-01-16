<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div>
        <label for="">商品名稱</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
        <p style="color:red">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="">商品價格：</label>
        <input type="number" name="price" value="{{ old('price') }}">
    </div>

    <div>
        <label for="">商品圖片：</label>
        <input type="file" name="img">
    </div>

    <button type="submit">儲存商品</button>

</form>