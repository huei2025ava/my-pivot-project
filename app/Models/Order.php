<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use App\Models\User;

class Order extends Model
{
    // 一張訂單有很多個明細
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // 一張訂單屬於一個會員
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}