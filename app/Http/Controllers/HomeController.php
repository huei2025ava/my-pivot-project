<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('welcome', compact('products'));
    }

<<<<<<< HEAD
    public function show($id){
    $product = Product::findOrFail($id);
    return view('products', compact('product'));
    
}
=======
    public function show($id)
    {
        $product = Product::findOrFail($id); 
        return view('product_detail', compact('product'));
    }
>>>>>>> 86edfa3d0735437970d68d08b867d0085e32126a
}