<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderStatusController extends Controller
{
    public function index($order_code)
    {
        // Lấy đơn hàng dựa trên mã và thuộc về người dùng đang đăng nhập
        $order = Order::where('order_code', $order_code)->where('user_id', Auth::id())->firstOrFail();
        return view('user.checkout.success', compact('order'));
    }
}
