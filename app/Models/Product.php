<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Product extends Model
{
    use HasFactory;   // 功能：讓我能快速生出一堆假資料來測試
    use SoftDeletes;  // 功能：讓我在刪除時只是「隱藏」而不是「抹除」

    // fillable 像是白名單，只有裡面的欄位才能透過表單新增
    protected $fillable = [
        'name',
        'price',
        'img',
        'stock'
    ];
}