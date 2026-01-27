<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\File; //處理檔案（刪除、移動、檢查是否存在）的工具箱，使用 File 的 methods
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function admin()
    {
        $products = Product::all();
        return view('admin_products', compact('products'));

    }

    public function index()
    {
        $products = Product::all();
        return view('snoopy', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('product_detail', compact('product'));
    }
    //1. 顯示新增頁面
    public function create()
    {
        return view('products.create');
    }

    // 2. 處理存檔
    public function store(Request $request)
    {
        // A. 驗證資料 (Validation)
        // 如果沒過，Laravel 會自動跳回上一頁並帶上錯誤訊息
        $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|numeric|min:0',
            'img' => 'nullable|image|max:5120', // nullable 這個欄位可以是 NULL（可以不填值）
        ]);

        // B. 圖片上傳
        $imageName = null;

        if ($request->hasFile('img')) {
            $file = $request->file('img');

            $extension = $file->getClientOriginalExtension();

            // dd($extension);

            $imageName = time() . '_' . Str::random(5) . '.' . $extension;

            // dd($imageName);

            $file->move(public_path('image'), $imageName);
            // $path = $request->file('img')->store('products', 'public');
            // $validatedData['img'] = $path;
        }

        // C. 寫入資料庫
        // Product::create($validatedData);
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'img' => $imageName,
        ]);

        // D. 導回去，並顯示成功
        return redirect()->route('home')->with('success', '商品已成功上架!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id); // 找不到會自動回傳 404
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id) //Request 是要後面的這個變數必須符合 Request 的格式
    {
        $product = Product::findOrFail($id);

        // 1. 基本資料驗證，之後可用 StoreProductRequest 修改
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        // 2. 處理圖片邏輯
        $imageName = $product->img; // 找出該 $id 的 欄位為 img

        if ($request->hasFile('img')) {
            // 如果有上傳新圖：刪除舊圖
            $oldImagePath = public_path('image/' . $product->img);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
            // 儲存新圖
            $file = $request->file('img');

            $extension = $file->getClientOriginalExtension();
            $imageName = time() . '_' . Str::random(5) . '.' . $extension;

            $file->move(public_path('image'), $imageName);
        }

        // 3. 更新資料庫
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'img' => $imageName, // 無論有無換圖，這行都適用
        ]);

        return redirect()->route('home')->with('success', 'Snoopy 商品已更新！');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $imagePath = public_path('image/'. $product->img);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $product->delete();

        return redirect()->route('home')->with('success', '商品與圖片已成功移除！');

    }
}