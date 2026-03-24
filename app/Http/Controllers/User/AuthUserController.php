<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\CartService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\RegisterUserRequest;

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
    public function register(RegisterUserRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'role' => 'customer',
                'avatar' => 'storage/avatars/blank_user.png',
            ]);
            Auth::login($user);
            return response()->json([
                'success' => true,
                'message' => 'Chào mừng ' . $user->name . ' đã đăng ký thành công tài khoản MTShop! Đang chuyển hướng...'
            ]);
        } catch (\Exception $e) {
            Log::error("Lỗi đăng ký User: " . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Đã có lỗi xảy ra. Vui lòng thử lại sau.'
            ], 500);
        }
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
