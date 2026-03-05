<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // 這行會自動增加一個名為 'deleted_at' 的欄位，且預設為 NULL
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('products', function (Blueprint $table) {
        // 回滾時（如果反悔了）要把欄位刪掉
        $table->dropSoftDeletes();
    });
    }
};