<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label>商品名稱：</label>
    <input type="text" name="name" value="{{ old('name', $product->name) }}">

    <label>價格：</label>
    <input type="number" name="price" value="{{ old('price', $product->price) }}">

    <label>目前商品圖片：</label>
    <div class="mb-3">
        <img id="preview" src="{{ asset('image/' . $product->img) }}" width="200px"
            style="display:block; margin-bottom:10px;">
    </div>

    <label>更換圖片：</label>
    <input type="file" name="img" onchange="previewImage(event)">
    <button type="submit">確認更新</button>

</form>

<script>
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('preview');
        output.src = reader.result; // 當使用者選取新圖時，即時替換預覽畫面
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>