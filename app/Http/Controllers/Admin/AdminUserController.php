<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    // 顯示會員列表
    public function index()
    {
        // 取得所有會員，分頁顯示（這對大數據處理是加分項）
        $users = User::where('name', '!=', 'admin')->orderBy('id', 'desc')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    // 手動修改 Level (預防 Procedure 沒跑時的人工補位)
    public function updateLevel(Request $request, User $user)
    {
        $request->validate([
            'level' => 'required|string|max:20',
        ]);

        $user->update([
            'level' => $request->level
        ]);

        return back()->with('success', "會員 {$user->name} 的等級已更新為 {$request->level}");
    }
}
