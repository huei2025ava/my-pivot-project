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
    --white: #fffdf9;
}

/* ── Page header ── */
.page-header-title {
    font-family: 'Noto Serif TC', serif;
    font-size: 22px;
    font-weight: 600;
    color: var(--dark-brown);
    letter-spacing: 2px;
}

/* ── 回到首頁按鈕 ── */
.btn-back-front {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: none;
    border: 1px solid var(--border);
    border-radius: 20px;
    color: var(--text-soft);
    font-size: 12px;
    padding: 6px 16px;
    text-decoration: none;
    transition: border-color 0.2s, color 0.2s;
}

.btn-back-front:hover {
    border-color: var(--warm-brown);
    color: var(--warm-brown);
}

/* ── 新增商品按鈕 ── */
.btn-add-product {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background-color: var(--dark-brown);
    color: #fff;
    border: none;
    border-radius: 24px;
    font-size: 13px;
    letter-spacing: 1px;
    padding: 10px 24px;
    transition: background-color 0.2s, transform 0.15s;
    cursor: pointer;
}

.btn-add-product:hover {
    background-color: var(--accent);
    transform: translateY(-1px);
    color: #fff;
}

/* ── Stat cards ── */
.stat-card {
    background: #fff;
    border: none !important;
    border-radius: 16px !important;
    box-shadow: 0 4px 16px rgba(62, 44, 30, 0.08) !important;
}

.stat-card .card-body {
    padding: 22px 28px;
}

.stat-label {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-bottom: 8px;
}

.stat-value {
    font-family: 'Noto Serif TC', serif;
    font-size: 26px;
    font-weight: 600;
    color: var(--dark-brown);
}

.stat-icon {
    font-size: 32px;
    color: #e0d0c4;
}

/* ── Product cards ── */
.admin-product-card {
    border: 1px solid var(--border) !important;
    border-radius: 12px !important;
    overflow: hidden;
    background: #fff;
    transition: transform 0.2s, box-shadow 0.2s;
}

.admin-product-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 28px rgba(62, 44, 30, 0.12) !important;
}

/* 圖片：正方形，contain 完整顯示不裁切 */
.admin-product-img-wrap {
    aspect-ratio: 1 / 1;
    overflow: hidden;
    background: var(--cream);
    display: flex;
    align-items: center;
    justify-content: center;
}

.admin-product-img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    /* ← 完整顯示，不裁切 */
    padding: 8px;
    transition: transform 0.3s;
}

.admin-product-card:hover .admin-product-img-wrap img {
    transform: scale(1.04);
}

.admin-product-card .card-body {
    padding: 14px 16px 18px;
    text-align: center;
}

.admin-product-card .card-title {
    font-size: 13px;
    font-weight: 600;
    color: var(--dark-brown);
    margin-bottom: 4px;
    line-height: 1.5;
    min-height: 2.6em;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.admin-price {
    font-size: 13px;
    font-weight: 700;
    color: var(--accent);
    margin-bottom: 2px;
}

.admin-stock {
    font-size: 12px;
    color: var(--text-soft);
    margin-bottom: 14px;
}

/* ── 刪除 / 編輯按鈕：固定相同尺寸 ── */
.btn-action {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 4px;
    width: 72px;
    /* 固定寬度，兩顆一樣大 */
    height: 32px;
    border-radius: 20px;
    font-size: 12px;
    letter-spacing: 0.3px;
    cursor: pointer;
    transition: all 0.2s;
    white-space: nowrap;
}

.btn-delete {
    background: #fff;
    border: 1px solid #f0bfb4;
    color: #c0392b;
}

.btn-delete:hover {
    background: #fdf0ee;
    border-color: #c0392b;
}

.btn-edit {
    background: var(--cream);
    border: 1px solid var(--border);
    color: var(--warm-brown);
}

.btn-edit:hover {
    background: var(--warm-brown);
    color: #fff;
    border-color: var(--warm-brown);
}

/* ══════════════════════
       MODALS
    ══════════════════════ */
.modal-content {
    border: none;
    border-radius: 16px;
    overflow: hidden;
}

.modal-header {
    background-color: var(--dark-brown);
    color: #f0e4d4;
    border-bottom: none;
    padding: 18px 24px;
}

.modal-header .modal-title {
    font-family: 'Noto Serif TC', serif;
    font-size: 15px;
    letter-spacing: 1px;
}

.modal-header .close,
.modal-header button[data-dismiss="modal"],
.modal-header button[data-bs-dismiss="modal"] {
    color: #f0e4d4 !important;
    opacity: 0.7;
    background: none;
    border: none;
    font-size: 20px;
    cursor: pointer;
}

.modal-header .close:hover,
.modal-header button[data-dismiss="modal"]:hover {
    opacity: 1;
}

.modal-body {
    padding: 24px 28px;
    background: var(--cream);
}

.modal-footer {
    background: var(--cream);
    border-top: 1px solid var(--border);
    padding: 14px 28px;
    justify-content: flex-end;
    gap: 10px;
}

.modal-field-label {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: var(--text-soft);
    display: block;
    margin-bottom: 7px;
    margin-top: 16px;
}

.modal-field-label:first-child {
    margin-top: 0;
}

.modal-input {
    width: 100%;
    border: 1px solid var(--border);
    border-radius: 10px;
    padding: 11px 14px;
    font-size: 14px;
    background: #fff;
    outline: none;
    color: var(--dark-brown);
    transition: border-color 0.2s;
}

.modal-input:focus {
    border-color: var(--warm-brown);
}

/* 圖片預覽：contain，不裁切 */
.preview-img-box {
    width: 100%;
    border-radius: 10px;
    overflow: hidden;
    border: 1px solid var(--border);
    background: var(--cream);
    margin-top: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 180px;
}

.preview-img-box img {
    max-width: 100%;
    max-height: 220px;
    object-fit: contain;
    /* ← 完整顯示，不裁切 */
    padding: 8px;
}

.file-input-wrap {
    margin-top: 10px;
    font-size: 13px;
    color: var(--text-soft);
}

.btn-modal-confirm {
    background-color: var(--dark-brown);
    color: #fff;
    border: none;
    border-radius: 20px;
    font-size: 13px;
    letter-spacing: 1px;
    padding: 9px 28px;
    transition: background-color 0.2s;
    cursor: pointer;
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
    padding: 9px 24px;
    cursor: pointer;
    transition: border-color 0.2s;
}

.btn-modal-cancel:hover {
    border-color: var(--warm-brown);
}
</style>

{{-- ── Header ── --}}
<div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
    <div class="d-flex align-items-center gap-3">
        <h1 class="page-header-title mb-0">商品管理</h1>
        <a href="{{ route('home') }}" class="btn-back-front">
            <i class="fas fa-store" style="font-size:11px;"></i> 回到首頁
        </a>
    </div>
    <button class="btn-add-product" data-toggle="modal" data-target="#createProductModal">
        <i class="fas fa-plus" style="font-size:11px;"></i> 新增商品
    </button>
</div>

{{-- ── Stat cards ── --}}
<div class="row mb-4">
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card stat-card h-100">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <div class="stat-label" style="color:var(--warm-brown);">商品總數</div>
                    <div class="stat-value">{{ $totalProducts }} 件</div>
                </div>
                <i class="fas fa-box stat-icon"></i>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card stat-card h-100">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <div class="stat-label" style="color:var(--accent);">庫存總價值</div>
                    <div class="stat-value">$ {{ number_format($totalPrice) }}</div>
                </div>
                <i class="fas fa-dollar-sign stat-icon"></i>
            </div>
        </div>
    </div>
</div>

{{-- ── Product grid ── --}}
<div class="row g-3">
    @foreach($products as $index => $item)
    <div class="col-6 col-lg-3">
        <div class="card admin-product-card h-100">

            {{-- Image --}}
            <button type="button" class="btn p-0 border-0 d-block" data-bs-toggle="modal"
                data-bs-target="#modal-{{ $index }}">
                <div class="admin-product-img-wrap">
                    <img src="{{ asset('image/' . $item->img) }}" alt="{{ $item->name }}" />
                </div>
            </button>

            <div class="card-body">
                <h5 class="card-title">{{ $item->name }}</h5>
                <p class="admin-price">NT$ {{ number_format($item->price) }}</p>
                <p class="admin-stock">庫存：{{ $item->stock }} 件</p>

                {{-- 刪除 / 編輯：同一個 d-flex，fixed width 按鈕 ── --}}
                <div class="d-flex justify-content-center gap-2">
                    <form action="{{ route('products.destroy', $item->id) }}" method="POST" class="m-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-action btn-delete"
                            onclick="return confirm('確定刪除「{{ $item->name }}」嗎？')">
                            <i class="fas fa-trash-alt" style="font-size:10px;"></i> 刪除
                        </button>
                    </form>
                    <button class="btn-action btn-edit" data-toggle="modal"
                        data-target="#updateProductModal-{{ $item->id }}">
                        <i class="fas fa-edit" style="font-size:10px;"></i> 編輯
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- ── 編輯 Modal ── --}}
    <div class="modal fade" id="updateProductModal-{{ $item->id }}" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">✏️ 編輯商品</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <form action="{{ route('products.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <label class="modal-field-label">商品名稱</label>
                        <input type="text" name="name" class="modal-input" value="{{ old('name', $item->name) }}"
                            placeholder="請輸入商品名稱">

                        <label class="modal-field-label">商品價格（NT$）</label>
                        <input type="number" name="price" class="modal-input" value="{{ old('price', $item->price) }}">

                        <label class="modal-field-label">目前圖片</label>
                        <div class="preview-img-box">
                            <img id="preview-{{ $item->id }}" src="{{ asset('image/' . $item->img) }}"
                                alt="{{ $item->name }}">
                        </div>

                        <label class="modal-field-label">更換圖片</label>
                        <div class="file-input-wrap">
                            <input type="file" name="img" onchange="unifiedPreview(event, '{{ $item->id }}')">
                        </div>
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


{{-- ── 新增商品 Modal ── --}}
<div class="modal fade" id="createProductModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">🐾 新增商品</h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label class="modal-field-label">商品名稱</label>
                    <input type="text" name="name" class="modal-input" value="{{ old('name') }}" placeholder="請輸入商品名稱">
                    @error('name')
                    <p style="color:var(--accent);font-size:12px;margin-top:4px;">{{ $message }}</p>
                    @enderror

                    <label class="modal-field-label">商品價格（NT$）</label>
                    <input type="number" name="price" class="modal-input" value="{{ old('price') }}" placeholder="0">

                    <label class="modal-field-label">商品圖片</label>
                    {{-- 預覽框：預設隱藏，選圖後顯示 --}}
                    <div class="preview-img-box" id="preview-new-wrap" style="display:none;">
                        <img id="preview-new" src="#" alt="預覽圖">
                    </div>
                    <div class="file-input-wrap">
                        <input type="file" name="img" onchange="unifiedPreview(event, 'new')" required>
                    </div>
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
        // 新增商品：顯示外框
        const wrap = document.getElementById('preview-new-wrap');
        if (wrap) wrap.style.display = 'flex';
    }
}
</script>
@endsection