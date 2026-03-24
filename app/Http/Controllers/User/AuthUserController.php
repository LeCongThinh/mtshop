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

        // 1. Kiểm tra xem Email/Password có đúng trong DB không (Chưa đăng nhập)
        if (Auth::validate($credentials)) {
            $user = \App\Models\User::where('email', $credentials['email'])->first();

            // ko cho adin đăng nhập ở form này
            if ($user->role !== 'customer') {
                return response()->json([
                    'success' => false,
                    'message' => 'Thông tin đăng nhập không chính xác.'
                ], 422);
            }
            // Nếu là customer cho phép đăng nhập
            if (Auth::attempt($credentials, $request->remember)) {
                $request->session()->regenerate();

                if (isset($this->cartService)) {
                    $this->cartService->mergeSessionToDatabase();
                }
                return response()->json([
                    'success' => true,
                    'redirect' => url('/'),
                    'message' => 'Chào mừng bạn quay trở lại!'
                ]);
            }
        }
        return response()->json([
            'success' => false,
            'message' => 'Thông tin đăng nhập không chính xác.'
        ], 422);
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
            return response()->json([
                'success' => true,
                'message' => 'Đăng ký tài khoản MTShop thành công. Vui lòng đăng nhập để tiếp tục mua sắm!'
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
