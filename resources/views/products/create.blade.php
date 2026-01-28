@extends('layouts.admin')
@section('content')

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
        <label for="">商品圖片：(不超過5MB)</label>
        <input type="file" name="img" id="imgInput" accept="image/*">
    </div>

    <div style=" margin-top: 10px">
        <p>圖片預覽</p>
        <img id="preview" src="#" alt="預覽圖" style="width: 200px; dispaly: none; border: 1px solid black; padding: 5px;">
    </div>

    <button type="submit">儲存商品</button>

</form>

<script>
document.getElementById('imgInput').onchange = function(evt) {

    // console.log(this.files)
    const [file] = this.files;
    // const file = this.files[0];

    if (file) {
        const preview = document.getElementById('preview');
        preview.src = URL.createObjectURL(file)
        preview.style.display = 'block'
    }

}
</script>
@endsection