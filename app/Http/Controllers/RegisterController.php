<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // 1. 顯示註冊頁面
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // 2. 處理註冊邏輯
    public function register(Request $request)
    {
        //資料驗證
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // 寫入資料庫，並預設 role 為 user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // 密碼加密
            'role' => 'user', // 強制預設權限
        ]);

        // 註冊完直接登入
        Auth::login($user);

        return redirect('/')->with('success', '註冊成功！');

    }
}