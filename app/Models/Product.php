<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // fillable 像是白名單，只有裡面的欄位才能透過表單新增
    protected $fillable = [
        'name',
        'price',
        'img',
        'stock'
    ];
}