<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserCheckoutRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $user = Auth::user();
        // Lấy danh sách sản phẩm trong giỏ hàng của User từ DB
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('home.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }
        // Tính tổng tiền đơn hàng
        $totalOrder = $cartItems->sum(function ($item) {
            $currentPrice = ($item->product->sale_price > 0) ? $item->product->sale_price : $item->product->price;
            return $currentPrice * $item->quantity;
        });
        return view('user.invoice.checkout', compact('user', 'cartItems', 'totalOrder'));
    }

    public function processCheckout(UserCheckoutRequest $request)
    {
        $user = Auth::user();
        // Lấy thông tin giỏ hàng của người dùng đăng nhập
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống!');
        }
        // ktra số lượng tồn kho
        foreach ($cartItems as $item) {
            if ($item->product->stock <= 0) {
                return back()->with('error', "Sản phẩm '{$item->product->name}' đã hết hàng!");
            }
            if ($item->product->stock < $item->quantity) {
                return back()->with('error', "Sản phẩm '{$item->product->name}' chỉ còn {$item->product->stock} sản phẩm trong kho!");
            }
        }
        $paymentMethod = $request->payment_method ?? 'cod';
        return match ($paymentMethod) {
            'cod' => $this->handleCOD($request, $user, $cartItems),
            'momo' => $this->handleMomo($request, $user, $cartItems),
            'vnpay' => $this->handleVNPay($request, $user, $cartItems),
            default => back()->with('error', 'Phương thức thanh toán không hợp lệ!')
        };
    }

    // Tạo đơn hàng
    private function createOrder($request, $user, $cartItems, string $paymentMethod): Order
    {
        $totalAmount = $cartItems->sum(function ($item) {
            return ($item->product->sale_price ?? $item->product->price) * $item->quantity;
        });
        return Order::create([
            'user_id' => $user->id,
            'order_code' => 'ORD-' . date('Ymd') . '-' . strtoupper(Str::random(6)),
            'receiver_name' => $request->name,
            'receiver_phone' => $request->phone,
            'receiver_address' => $request->address,
            'note' => $request->note,
            'payment_method' => $paymentMethod,
            'total_amount' => $totalAmount,
        ]);
    }

    // Thêm chi tiết đơn hàng
    private function createOrderDetails(Order $order, $cartItems): void
    {
        foreach ($cartItems as $item) {
            $salePrice = $item->product->sale_price ?? $item->product->price;

            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $item->product->id,
                'product_name' => $item->product->name,
                'product_thumbnail' => $item->product->thumbnail,
                'original_price' => $item->product->price,
                'price' => $salePrice,
                'quantity' => $item->quantity,
                'subtotal' => $salePrice * $item->quantity,
            ]);
            // trừ số lượng sp trong kho
            $item->product->decrement('stock', $item->quantity);
        }
    }

    // Thanh toán khi nhận hàng
    private function handleCOD($request, $user, $cartItems)
    {
        DB::beginTransaction();
        try {
            $order = $this->createOrder($request, $user, $cartItems, 'cod');
            $this->createOrderDetails($order, $cartItems);
            // Xóa giỏ hàng ngay vì không cần chờ thanh toán
            Cart::where('user_id', $user->id)->delete();
            // Lưu data
            DB::commit();
            return redirect()->route('checkout.success', ['order_code' => $order->order_code])->with('success', 'Đặt hàng thành công! Mã đơn hàng: ' . $order->order_code);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Đặt hàng thất bại, vui lòng thử lại! ' . $e->getMessage());
        }
    }

    // Thanh toán bàng MOMO
    private function handleMomo($request, $user, $cartItems)
    {
        DB::beginTransaction();
        try {
            // Tạo đơn hàng trước với payment_status = pending
            // Chỉ xóa giỏ hàng & trừ tồn kho sau khi MoMo callback thành công
            $order = $this->createOrder($request, $user, $cartItems, 'momo');

            // Lưu order_id vào session để dùng lại khi callback
            session(['pending_momo_order_id' => $order->id]);

            DB::commit();

            // TODO: Tích hợp MoMo Payment Gateway
            // $momoUrl = $this->momoService->createPaymentUrl($order);
            // return redirect()->away($momoUrl);

            return back()->with('info', 'Tính năng thanh toán MoMo đang được phát triển!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Đặt hàng thất bại, vui lòng thử lại! ' . $e->getMessage());
        }
    }

    // Thanh toán bằng VNPAY
    private function handleVNPay($request, $user, $cartItems)
    {
        DB::beginTransaction();
        try {
            // Tạo đơn hàng với trạng thái 'pending'
            $order = $this->createOrder($request, $user, $cartItems, 'vnpay');

            // Tạo chi tiết đơn hàng và trừ tồn kho để giữ hàng
            $this->createOrderDetails($order, $cartItems);

            DB::commit();

            // Gọi Service tạo URL
            $vnpayService = new \App\Services\VNPayService();
            $paymentUrl = $vnpayService->createPaymentUrl($order);

            return redirect()->away($paymentUrl);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Lỗi khởi tạo thanh toán: ' . $e->getMessage());
        }
    }

    public function vnpayCallback(Request $request)
    {
        $vnpayService = new \App\Services\VNPayService();
        $vnpData = $request->all();
        // Xác thực chữ ký
        if (!$vnpayService->verifyCallback($vnpData)) {
            return redirect()->route('cart.index')->with('error', 'Chữ ký thanh toán không hợp lệ!');
        }
        $orderCode = $vnpData['vnp_TxnRef'];
        $responseCode = $vnpData['vnp_ResponseCode'];
        $transactionId = $vnpData['vnp_TransactionNo'];

        $order = Order::where('order_code', $orderCode)->first();
        if (!$order) {
            return redirect()->route('cart.index')->with('error', 'Không tìm thấy đơn hàng!');
        }

        // Kiểm tra trạng thái thanh toán từ VNPAY. 00 thanh toán thành công
        if ($responseCode === '00') {
            DB::beginTransaction();
            try {
                $order->update([
                    'payment_status' => 'paid',
                    'transaction_id' => $transactionId,
                    'status' => 'confirmed',
                ]);

                // Xóa giỏ hàng của user
                Cart::where('user_id', $order->user_id)->delete();

                DB::commit();

                return redirect()->route('checkout.success', ['order_code' => $order->order_code])->with('success', 'Thanh toán thành công!');

            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('cart.index')->with('error', 'Lỗi cập nhật đơn hàng: ' . $e->getMessage());
            }
        } else {
            // Thanh toán thất bại hoặc khách hủy, hoàn trả lại tồn kho vì bước handleVNPay đã trừ đi
            $this->restoreStock($order);

            $order->update(['payment_status' => 'failed', 'status' => 'canceled']);

            return redirect()->route('cart.index')->with('error', 'Thanh toán không thành công. Mã lỗi: ' . $responseCode);
        }
    }

    // Hàm hỗ trợ hoàn tồn kho nếu cần
    private function restoreStock($order)
    {
        foreach ($order->orderDetails as $detail) {
            $detail->product->increment('stock', $detail->quantity);
        }
    }
}
