<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct(protected CartService $cartService)
    {
    }

    // Trang chi tiết giỏ hàng
    public function index()
    {
        $items = $this->cartService->getItems();

        $total = collect($items)->sum(
            fn($i) => $i['product']->price * $i['quantity']
        );

        return view('user.cart.detail-cart', compact('items', 'total'));
    }

    // Thêm sản phẩm vào giỏ hàng
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'integer|min:1',
        ]);

        $this->cartService->add(
            (int) $request->product_id,
            (int) ($request->quantity ?? 1)
        );

        return response()->json([
            'success' => true,
            'message' => 'Đã thêm sản phẩm vào giỏ hàng',
            'count' => $this->cartService->count(),
        ]);
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public function update(Request $request, int $productId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:0',
        ]);

        $this->cartService->update($productId, (int) $request->quantity);

        return back()->with('success', 'Đã cập nhật giỏ hàng!');
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function remove(int $productId)
    {
        $this->cartService->remove($productId);

        return back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
    }

    // Trang đặt hàng - yêu cầu đăng nhập
    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('info', 'Vui lòng đăng nhập để đặt hàng.');
        }

        $items = $this->cartService->getItems();

        // Giỏ hàng trống thì quay lại trang giỏ hàng
        if (empty($items)) {
            return redirect()->route('cart.index')
                ->with('warning', 'Giỏ hàng của bạn đang trống!');
        }

        $total = collect($items)->sum(
            fn($i) => $i['product']->price * $i['quantity']
        );

        return view('cart.checkout', compact('items', 'total'));
    }
}
