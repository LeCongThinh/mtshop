<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $user = Auth::user();
        // Lấy danh sách sản phẩm trong giỏ hàng của User từ DB
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('home')->with('error', 'Giỏ hàng của bạn đang trống.');
        }
        // Tính tổng tiền đơn hàng
        $totalOrder = $cartItems->sum(function ($item) {
            $currentPrice = ($item->product->sale_price > 0) ? $item->product->sale_price : $item->product->price;
            return $currentPrice * $item->quantity;
        });
        return view('user.invoice.checkout', compact('user', 'cartItems', 'totalOrder'));
    }
}
