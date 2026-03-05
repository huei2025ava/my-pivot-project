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
            // 只有在 deleted_at 欄位不存在時才新增
        if (!Schema::hasColumn('products', 'deleted_at')) {
            $table->softDeletes();
        }
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