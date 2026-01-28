@extends('layouts.admin')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">商品管理</h1>
    <button class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#createProductModal">
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

        <!-- 新增商品彈出視窗 -->
        <div class="modal fade" id="createProductModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">新增 Snoopy 商品</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
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
                            <img id="preview" src="#" alt="預覽圖"
                                style="width: 200px; dispaly: none; border: 1px solid black; padding: 5px;">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                            <button type="submit" class="btn btn-primary">確認上架</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
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