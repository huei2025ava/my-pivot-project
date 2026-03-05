<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class OrderItem extends Model
{
    // 每一筆明細都屬於一個商品（用來抓商品名字）
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
