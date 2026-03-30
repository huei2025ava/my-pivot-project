<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1. 先確保 users 表有 level 欄位
        if (!Schema::hasColumn('users', 'level')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('level')->default('Normal')->after('role');
            });
        }

        // 2. 建立 Stored Procedure
        // 使用 DROP 確保重新執行 migration 時不會衝突
        DB::unprepared("DROP PROCEDURE IF EXISTS update_user_level");

        $procedure = "
            CREATE PROCEDURE update_user_level(IN p_user_id INT)
            BEGIN
                DECLARE total_spent DECIMAL(10, 2) DEFAULT 0;

                -- 1. 計算該使用者的所有訂單總金額
                SELECT IFNULL(SUM(total_price), 0) INTO total_spent 
                FROM orders 
                WHERE user_id = p_user_id;

                -- 2. 判斷等級邏輯
                IF total_spent >= 10000 THEN
                    UPDATE users SET level = 'Gold' WHERE id = p_user_id;
                ELSEIF total_spent >= 5000 THEN
                    UPDATE users SET level = 'Silver' WHERE id = p_user_id;
                ELSE
                    UPDATE users SET level = 'Normal' WHERE id = p_user_id;
                END IF;
            END;
        ";

        DB::unprepared($procedure);
    }

    public function down(): void
    {
        // 復原時刪除 Procedure
        DB::unprepared("DROP PROCEDURE IF EXISTS update_user_level");

        // 如果想移除欄位也可以加上：
        // Schema::table('users', function (Blueprint $table) {
        //     $table->dropColumn('level');
        // });
    }
};