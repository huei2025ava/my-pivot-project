<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
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
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|numeric|min:0',
            'img' => 'nullable|image|max:2048',
        ]);

        // B. 圖片上傳
        $imageName = null;

        if ($request->hasFile('img')) {
            $file = $request->file('img');

            $imageName = time() . '_' . $file->getClientOriginalName();

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
}