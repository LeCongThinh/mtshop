<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view("admin.login");
    }

    public function handleLogin(Request $request)
    {
        $request->validate(
            ["txtEmail" => "required", "txtPass" => "required"],
            ["txtEmail.required" => "Vui lòng nhập đầy đủ thông tin đăng nhập", "txtPass.required" => "Vui lòng nhập đầy đủ thông tin đăng nhập",]
        );

        $getInfo = ['email' => $request->txtEmail, 'password' => $request->txtPass];

        if (Auth::attempt($getInfo)) {

            $user = Auth::user();

            if (in_array($user->role, ["admin", "staff"])) {
                return redirect()->route("admin.dashboard");
            } else {
                //Tài khoản không có quyền đăng nhập
                Auth::logout();
                return redirect()->back()->with("error", "Thông tin đăng nhập không hợp lệ");
            }
        } else {
            return redirect()->back()->with('error', 'Email hoặc mật khẩu không đúng');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("admin.login");
    }

}
