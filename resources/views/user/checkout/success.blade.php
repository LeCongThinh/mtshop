@extends('user.layouts.app')
@section('web-title', 'Thanh toán đơn hàng thành công - MTShop.com')
@section('content')
    <section class="py-5" style="background-color: #e9ecef; min-height: 80vh; display: flex; align-items: center;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-4">
                                <div class="display-1 text-success">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                            </div>

                            <h2 class="fw-bold mb-3">Đặt hàng thành công!</h2>
                            <p class="text-muted mb-4">
                                Cảm ơn bạn đã tin tưởng lựa chọn <strong>MTShop</strong>. <br>
                                Đơn hàng của bạn đã được tiếp nhận và đang chờ xử lý.
                            </p>

                            <div class="bg-light rounded-3 p-4 mb-4 border">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-secondary">Mã đơn hàng:</span>
                                    <span class="fw-bold text-primary">#{{ $order->order_code }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-secondary">Ngày đặt hàng:</span>
                                    <span>{{ $order->created_at->timezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i') }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-secondary">Phương thức thanh toán:</span>
                                    <span class="text-uppercase fw-semibold" style="font-size: 0.85rem;">
                                        {{ $order->payment_method == 'cod' ? 'Thanh toán khi nhận hàng' : $order->payment_method }}
                                    </span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Tổng thanh toán:</span>
                                    <span
                                        class="h5 mb-0 fw-bold text-danger">{{ number_format($order->total_amount) }}đ</span>
                                </div>
                            </div>

                            <div class="alert alert-info border-0 small mb-4" style="background-color: #f0f7ff;">
                                <i class="bi bi-info-circle me-2"></i>
                                Nhân viên MTShop sẽ liên hệ với bạn qua số điện thoại <strong>{{ $order->phone }}</strong>
                                để xác nhận đơn hàng trong vòng 15-30 phút.
                            </div>

                            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                                <a href="{{ url('/') }}" class="btn btn-outline-primary px-4 py-2 fw-bold"
                                    style="border-radius: 10px;">
                                    <i class="bi bi-house-door me-2"></i>Tiếp tục mua sắm
                                </a>
                                <a href="#" class="btn btn-primary px-4 py-2 fw-bold shadow-sm"
                                    style="border-radius: 10px; background: linear-gradient(45deg, #0d6efd, #004dc7); border: none;">
                                    <i class="bi bi-file-earmark-text me-2"></i>Xem chi tiết đơn hàng
                                </a>
                            </div>
                        </div>
                    </div>
                    <p class="text-center text-muted mt-4 small">
                        Bạn cần hỗ trợ? Liên hệ Hotline: <span class="text-primary fw-bold">1900 xxxx</span>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection