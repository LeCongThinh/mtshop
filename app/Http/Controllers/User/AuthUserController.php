<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthUserController extends Controller
{

    public function showLoginForm()
    {
        return view("user.auth.login");
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            // 3. ĐỒNG BỘ GIỎ HÀNG (Quan trọng cho MTShop)
            // Gọi CartService để gộp sản phẩm từ Session vào Database
            $cartService = app(\App\Services\CartService::class);
            $cartService->mergeSessionToDatabase();

            // 4. Trở lại trang cũ hoặc trang chủ
            return redirect()->intended('/')->with('success', 'Chào mừng bạn quay trở lại!');
        }

        // 5. Nếu thất bại, trả về lỗi (Modal sẽ tự mở lại nhờ đoạn script trước đó)
        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        // 1. Đăng xuất tài khoản khỏi Auth Guard
        Auth::logout();

        // 2. Xóa sạch session hiện tại của user này
        $request->session()->invalidate();

        // 3. Tạo lại CSRF token mới để bảo mật cho phiên làm việc tiếp theo
        $request->session()->regenerateToken();

        // 4. Điều hướng về trang chủ hoặc trang đăng nhập kèm thông báo
        return redirect('/')->with('success', 'Bạn đã đăng xuất thành công!');
    }


}
