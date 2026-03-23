<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\CartService;
use Illuminate\Support\Facades\Hash;

class AuthUserController extends Controller
{
    // Sử dụng Dependency Injection để gọi CartService xuyên suốt controller
    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    // View đăng nhập
    public function showLoginForm()
    {
        return view("user.auth.login");
    }
    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            // ĐỒNG BỘ GIỎ HÀNG
            $this->cartService->mergeSessionToDatabase();
            // Chuyển hướng dựa trên Role (Nếu là admin thì vào trang quản trị)
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->intended('/')->with('success', 'Chào mừng bạn quay trở lại!');
        }
        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ])->onlyInput('email');
    }
    // View đăng ký
    public function showRegisterForm()
    {
        return view('user.auth.register');
    }
    // Xử lý đăng ký
    public function register(Request $request)
    {
        // 1. Validate
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'email.unique' => 'Email này đã tồn tại trên hệ thống.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.'
        ]);

        // 2. Tạo User (Mặc định là customer)
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer',
        ]);

        // Tự động đăng nhập
        Auth::login($user);

        // 4. Đồng bộ giỏ hàng ngay lập tức
        $this->cartService->mergeSessionToDatabase();

        return redirect()->intended('/')->with('success', 'Đăng ký thành viên MTShop thành công!');
    }

    // Đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();
        // Xóa sạch session hiện tại
        $request->session()->invalidate();
        // Tạo lại CSRF token mới để bảo mật cho phiên làm việc tiếp theo
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Bạn đã đăng xuất thành công!');
    }
}
