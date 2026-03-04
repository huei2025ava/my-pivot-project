@extends('layouts.admin')

@section('content')

<style>
:root {
  --cream: #fdf6ee;
  --warm-brown: #7a5c44;
  --dark-brown: #3e2c1e;
  --accent: #d4886a;
  --border: #e8d8c8;
  --text-soft: #8c7060;
}

.page-header-title {
  font-family: 'Noto Serif TC', serif;
  font-size: 22px;
  font-weight: 600;
  color: var(--dark-brown);
  letter-spacing: 2px;
  margin-bottom: 0;
}

/* ── Stat Cards ── */
.stat-card {
  border: none !important;
  border-radius: 16px !important;
  overflow: hidden;
  box-shadow: 0 4px 16px rgba(62, 44, 30, 0.08) !important;
  background: #fff;
}

.stat-card .border-left-primary {
  border-left: 4px solid var(--warm-brown) !important;
}

.stat-card .border-left-success {
  border-left: 4px solid var(--accent) !important;
}

.stat-card .card-body {
  padding: 20px 24px;
}

.stat-label {
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: var(--text-soft);
  margin-bottom: 6px;
}

.stat-value {
  font-family: 'Noto Serif TC', serif;
  font-size: 22px;
  font-weight: 600;
  color: var(--dark-brown);
}

/* ── Btn ── */
.btn-add-product {
  background-color: var(--dark-brown);
  color: #fff;
  border: none;
  border-radius: 24px;
  font-size: 13px;
  letter-spacing: 1px;
  padding: 10px 24px;
  transition: background-color 0.2s, transform 0.15s;
}

.btn-add-product:hover {
  background-color: var(--accent);
  transform: translateY(-1px);
  color: #fff;
}

/* ── Product Cards ── */
.admin-product-card {
  border: 1px solid var(--border) !important;
  border-radius: 14px !important;
  overflow: hidden;
  background: #fff;
  transition: transform 0.2s, box-shadow 0.2s;
}

.admin-product-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 10px 28px rgba(62, 44, 30, 0.12) !important;
}

.admin-product-img-wrap {
  aspect-ratio: 1/1;
  overflow: hidden;
  background: var(--cream);
}

.admin-product-img-wrap img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s;
}

.admin-product-card:hover .admin-product-img-wrap img {
  transform: scale(1.05);
}

.admin-product-card .card-body {
  padding: 14px 16px 18px;
}

.admin-product-card .card-title {
  font-family: 'Noto Serif TC', serif;
  font-size: 14px;
  font-weight: 600;
  color: var(--dark-brown);
  margin-bottom: 4px;
}

.admin-price {
  font-size: 14px;
  font-weight: 700;
  color: var(--accent);
  margin-bottom: 2px;
}

.admin-stock {
  font-size: 12px;
  color: var(--text-soft);
  margin-bottom: 14px;
}

.btn-delete-sm {
  background: #fff;
  border: 1px solid #f0bfb4;
  color: #c0392b;
  border-radius: 20px;
  font-size: 12px;
  padding: 5px 14px;
  transition: all 0.2s;
}

.btn-delete-sm:hover {
  background: #fdf0ee;
  border-color: #c0392b;
}

.btn-edit-sm {
  background: var(--cream);
  border: 1px solid var(--border);
  color: var(--warm-brown);
  border-radius: 20px;
  font-size: 12px;
  padding: 5px 14px;
  transition: all 0.2s;
}

.btn-edit-sm:hover {
  background: var(--warm-brown);
  color: #fff;
  border-color: var(--warm-brown);
}

/* ── Modals ── */
.modal-content {
  border: none;
  border-radius: 16px;
  overflow: hidden;
}

.modal-header {
  background-color: var(--dark-brown);
  color: #f0e4d4;
  border-bottom: none;
  padding: 20px 24px;
}

.modal-header .modal-title {
  font-family: 'Noto Serif TC', serif;
  font-size: 16px;
  letter-spacing: 1px;
}

.modal-header .close,
.modal-header button[data-dismiss="modal"] {
  color: #f0e4d4;
  opacity: 0.8;
}

.modal-body {
  padding: 24px;
  background: var(--cream);
}

.modal-footer {
  background: var(--cream);
  border-top: 1px solid var(--border);
  padding: 16px 24px;
}

.modal-body label {
  font-size: 12px;
  font-weight: 700;
  letter-spacing: 1px;
  text-transform: uppercase;
  color: var(--text-soft);
  display: block;
  margin-top: 16px;
  margin-bottom: 6px;
}

.modal-body input[type="text"],
.modal-body input[type="number"] {
  width: 100%;
  border: 1px solid var(--border);
  border-radius: 10px;
  padding: 10px 14px;
  font-size: 14px;
  background: #fff;
  outline: none;
  color: var(--dark-brown);
  transition: border-color 0.2s;
}

.modal-body input:focus {
  border-color: var(--warm-brown);
}

.modal-body input[type="file"] {
  font-size: 13px;
  color: var(--text-soft);
  margin-top: 8px;
}

.btn-modal-confirm {
  background-color: var(--dark-brown);
  color: #fff;
  border: none;
  border-radius: 20px;
  font-size: 13px;
  letter-spacing: 1px;
  padding: 10px 28px;
  transition: background-color 0.2s;
}

.btn-modal-confirm:hover {
  background-color: var(--accent);
  color: #fff;
}

.btn-modal-cancel {
  background: #fff;
  color: var(--text-soft);
  border: 1px solid var(--border);
  border-radius: 20px;
  font-size: 13px;
  padding: 10px 24px;
}

.preview-img-box {
  width: 100%;
  border-radius: 10px;
  overflow: hidden;
  margin-top: 8px;
}

.preview-img-box img {
  width: 100%;
  object-fit: cover;
  max-height: 180px;
}
</style>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="page-header-title">商品管理</h1>
  <button class="btn-add-product" data-toggle="modal" data-target="#createProductModal">
    <i class="fas fa-plus me-1" style="font-size:12px;"></i> 新增商品
  </button>
</div>

<!-- Stats -->
<div class="row mb-4">
  <div class="col-xl-6 col-md-6 mb-4">
    <div class="card stat-card border-left-primary h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="stat-label text-primary">商品總數</div>
            <div class="stat-value">{{ $totalProducts }} 件</div>
          </div>
          <div class="col-auto"><i class="fas fa-box fa-2x" style="color:#ddd;"></i></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-6 col-md-6 mb-4">
    <div class="card stat-card border-left-success h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="stat-label" style="color:var(--accent);">庫存總價值</div>
            <div class="stat-value">$ {{ number_format($totalPrice) }}</div>
          </div>
          <div class="col-auto"><i class="fas fa-dollar-sign fa-2x" style="color:#ddd;"></i></div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Product Grid -->
<div class="row g-3">
  @foreach($products as $index => $item)
  <div class="col-6 col-lg-3">
    <div class="card admin-product-card h-100">

      <button type="button" class="btn p-0 border-0" data-bs-toggle="modal" data-bs-target="#modal-{{ $index }}">
        <div class="admin-product-img-wrap">
          <img src="{{ asset('image/' . $item->img) }}" alt="{{ $item->name }}" />
        </div>
      </button>

      <div class="card-body text-center">
        <h5 class="card-title">{{ $item->name }}</h5>
        <p class="admin-price">NT$ {{ number_format($item->price) }}</p>
        <p class="admin-stock">庫存：{{ $item->stock }} 件</p>
        <div class="d-flex justify-content-center gap-2">
          <form action="{{ route('products.destroy', $item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-delete-sm" onclick="return confirm('確定刪除「{{ $item->name }}」嗎？')">
              <i class="fas fa-trash-alt me-1" style="font-size:11px;"></i>刪除
            </button>
          </form>
          <button class="btn-edit-sm" data-toggle="modal" data-target="#updateProductModal-{{ $item->id }}">
            <i class="fas fa-edit me-1" style="font-size:11px;"></i>編輯
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- 編輯 Modal -->
  <div class="modal fade" id="updateProductModal-{{ $item->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">✏️ 編輯商品</h5>
          <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <form action="{{ route('products.update', $item->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <label>商品名稱</label>
            <input type="text" name="name" value="{{ old('name', $item->name) }}">

            <label>價格（NT$）</label>
            <input type="number" name="price" value="{{ old('price', $item->price) }}">

            <label>目前圖片</label>
            <div class="preview-img-box">
              <img id="preview-{{ $item->id }}" src="{{ asset('image/' . $item->img) }}">
            </div>

            <label>更換圖片</label>
            <input type="file" name="img" onchange="unifiedPreview(event, '{{ $item->id }}')">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn-modal-cancel" data-dismiss="modal">取消</button>
            <button type="submit" class="btn-modal-confirm">確認更新</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach
</div>

<!-- 新增商品 Modal -->
<div class="modal fade" id="createProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">🐾 新增商品</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <label>商品名稱</label>
          <input type="text" name="name" value="{{ old('name') }}" placeholder="請輸入商品名稱">
          @error('name')
          <p style="color:var(--accent); font-size:12px; margin-top:4px;">{{ $message }}</p>
          @enderror

          <label>商品價格（NT$）</label>
          <input type="number" name="price" value="{{ old('price') }}" placeholder="0">

          <label>商品圖片</label>
          <div class="preview-img-box" style="display:none;" id="preview-new-wrap">
            <img id="preview-new" src="#" alt="預覽圖">
          </div>
          <input type="file" name="img" onchange="unifiedPreview(event, 'new')" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-modal-cancel" data-dismiss="modal">取消</button>
          <button type="submit" class="btn-modal-confirm">確認上架</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
function unifiedPreview(event, id) {
  const file = event.target.files[0];
  const previewImg = document.getElementById('preview-' + id);

  if (file && previewImg) {
    previewImg.src = URL.createObjectURL(file);
    previewImg.style.display = 'block';

    // show wrapper for new product
    const wrap = document.getElementById('preview-new-wrap');
    if (wrap) wrap.style.display = 'block';
  }
}
</script>
@endsection