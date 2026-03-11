# Pivot E-Shop - 現代化全棧電商開發專案

這是一個基於 **Laravel 12** 與 **PHP 8.2** 開發的完整電商平台實作專案。本專案不僅涵蓋了核心的電商業務邏輯（購物車、訂單系統、產品管理），更導入了企業級開發規範，如自動化測試、軟刪除機制與權限控管系統。

## 🚀 技術棧
- **後端**: PHP 8.2+ / Laravel 12 (最新版本實踐)
- **前端**: Blade 模板引擎 / Vite / Vanilla CSS (SB Admin 2 整合)
- **資料庫**: MySQL (支援 Eloquent ORM 與複雜關聯處理)
- **測試**: Pest PHP (單元與功能測試實作)
- **工具**: Laravel Pint (代碼風格規範), Composer (套件管理)

## 🛠 核心功能與工程實踐

### 1. 電商業務邏輯
- **購物車系統**: 實作動態商品加入、數量更新與庫存檢核。
- **訂單流轉**: 從購物車結帳到 `Orders` 與 `OrderItems` 的資料一致性儲存。
- **產品管理**: 支援分類瀏覽與詳細規格展示。

### 2. 進階工程特性 (面試加分項)
- **資料完整性**: 使用 `SoftDeletes` 確保資料不被物理刪除，符合業界審計需求。
- **權限控管 (RBAC)**: 自定義 `AdminMiddleware` 區分一般用戶與管理者空間，保護敏感路徑。
- **代碼品質控管**: 
  - 導入 **Pest** 測試框架，確保核心邏輯（如結帳流）經過自動化驗證。
  - 使用 **Form Request** 進行嚴格的輸入驗證，保持 Controller 簡潔（Fat Model, Skinny Controller 理念）。
- **現代化架構**: 使用 Laravel 12 的簡約目錄結構，並透過 `AppServiceProvider` 與自定義 Provider 進行依賴解耦。

## 📂 專案結構精華
- `app/Http/Controllers/Admin`: 獨立的後台管理邏輯。
- `app/Models`: 包含完整定義的 Eloquent 關聯（One-to-Many for Orders）。
- `database/migrations`: 精心設計的 Schema，包含 Role-based 欄位與索引優化。
- `tests/`: 包含 Feature Test，模擬用戶真實購物行為。

## ⚙️ 快速啟動
```bash
# 1. 克隆專案
git clone [your-repository-url]

# 2. 安裝依賴
composer install
npm install && npm run build

# 3. 環境設定
cp .env.example .env
php artisan key:generate

# 4. 資料庫遷移與種子資料
php artisan migrate --seed

# 5. 啟動服務
php artisan serve
```

## 👩‍💻 關於作者
**職訓局結訓轉職者 | 軟體工程師**
- **專注領域**: PHP/Laravel 後端開發、資料庫設計。
- **開發哲學**: 「編寫易於維護與測試的代碼，比單純解決問題更重要。」

---
*本專案持續維護中，旨在展示對 Laravel 現代開發流程的掌握能力。*
