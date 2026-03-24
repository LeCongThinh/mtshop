@extends('user.layouts.app')
@section('web-title', 'Chi tiết đơn hàng - MTShop.com')
@section('content')
    <section class="py-4" style="background-color:#e9ecef; min-height: 80vh;">
        <div class="container py-2">
            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="card checkout-card shadow-sm">
                        <div class="card-header bg-white py-3 border-0 mt-2">
                            <h5 class="mb-0 fw-bold">
                                <span class="step-badge">1</span>Thông tin vận chuyển
                            </h5>
                        </div>
                        <div class="card-body px-4 pb-4">
                            <form id="orderForm" action="#" method="POST">
                                @csrf
                                <div class="mb-2">
                                    <label class="form-label fw-semibold small">Họ và tên người nhận</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0"><i
                                                class="bi bi-person text-muted"></i></span>
                                        <input type="text" name="name" class="form-control border-start-0"
                                            value="{{ $user->name }}" required placeholder="VD: Nguyễn Văn A">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold small">Số điện thoại</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0"><i
                                                    class="bi bi-telephone text-muted"></i></span>
                                            <input type="text" name="phone" class="form-control border-start-0"
                                                value="{{ $user->phone }}" required placeholder="09xx xxx xxx">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold small">Email người dùng</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0"><i
                                                    class="bi bi-envelope text-muted"></i></span>
                                            <input type="email" class="form-control border-start-0 bg-light"
                                                value="{{ $user->email }}" readonly disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <label class="form-label fw-semibold small">Địa chỉ nhận hàng</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0"><i
                                                class="bi bi-geo-alt text-muted"></i></span>
                                        <textarea name="address" class="form-control border-start-0" rows="3" required
                                            placeholder="Số nhà, tên đường, Phường/Xã, Quận/Huyện...">{{ $user->address }}</textarea>
                                    </div>
                                </div>

                                <div class="mb-0">
                                    <label class="form-label fw-semibold small">Ghi chú giao hàng</label>
                                    <textarea name="note" class="form-control" rows="2"
                                        placeholder="VD: Giao giờ hành chính, gọi trước khi đến..."></textarea>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card checkout-card shadow-sm mt-3 border-0" style="border-radius: 12px;">
                        <div class="card-header bg-white py-3 border-0 mt-2">
                            <h5 class="mb-0 fw-bold">
                                <span class="step-badge">2</span>Phương thức thanh toán
                            </h5>
                        </div>
                        <div class="card-body px-4 pb-4">
                            <div class="mb-3">
                                <input class="form-check-input d-none payment-check" type="radio" name="payment_method"
                                    id="method_cod" value="cod" checked>
                                <label
                                    class="form-check-label d-flex align-items-center p-3 border rounded-3 payment-label payment-option w-100"
                                    for="method_cod">
                                    <div class="flex-shrink-0">
                                        <i class="bi bi-cash-stack fs-4 text-secondary"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div class="fw-bold">Thanh toán khi nhận hàng (COD)</div>
                                        <div class="text-muted small">Thanh toán bằng tiền mặt khi nhận hàng</div>
                                    </div>
                                </label>
                            </div>

                            <div class="mb-3">
                                <input class="form-check-input d-none payment-check" type="radio" name="payment_method"
                                    id="method_momo" value="momo">
                                <label
                                    class="form-check-label d-flex align-items-center p-3 border rounded-3 payment-label payment-option w-100"
                                    for="method_momo">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('user-assets/payment-method/momo-payment.png') }}"
                                            class="payment-logo" alt="Momo">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div class="fw-bold">Ví điện tử MoMo</div>
                                        <div class="text-muted small">Thanh toán qua ứng dụng MoMo bằng mã QR</div>
                                    </div>
                                </label>
                            </div>

                            <div class="mb-0">
                                <input class="form-check-input d-none payment-check" type="radio" name="payment_method"
                                    id="method_vnpay" value="vnpay">
                                <label
                                    class="form-check-label d-flex align-items-center p-3 border rounded-3 payment-label payment-option w-100"
                                    for="method_vnpay">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('user-assets/payment-method/vnpay-payment.png') }}"
                                            class="payment-logo" alt="VNPAY">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div class="fw-bold">VNPAY</div>
                                        <div class="text-muted small">Thanh toán qua ứng dụng ngân hàng hoặc thẻ ATM/Quốc tế
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="sticky-summary">
                        <div class="card checkout-card shadow-sm">
                            <div class="card-header bg-white py-3 border-0">
                                <h5 class="mb-0 fw-bold">Giỏ hàng của bạn</h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="list-group list-group-flush" style="max-height: 380px; overflow-y: auto;">
                                    @foreach($cartItems as $item)
                                        @php
                                            $currentPrice = $item->product->sale_price ?? $item->product->price;
                                            $subtotal = $currentPrice * $item->quantity;
                                        @endphp
                                        <div class="list-group-item py-3 px-4 border-0">
                                            <div class="d-flex align-items-center">
                                                <div class="position-relative">
                                                    <img src="{{ asset('storage/' . $item->product->thumbnail) }}"
                                                        class="product-img border" alt="">
                                                    <span
                                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                        {{ $item->quantity }}
                                                    </span>
                                                </div>
                                                <div class="ms-3 flex-grow-1">
                                                    <h6 class="mb-1 small fw-bold text-dark">{{ $item->product->name }}</h6>
                                                    <div class="d-flex align-items-center">
                                                        <span
                                                            class="text-primary fw-bold small">{{ number_format($currentPrice) }}đ</span>
                                                        @if($item->product->sale_price)
                                                            <small class="text-muted text-decoration-line-through ms-2"
                                                                style="font-size: 0.7rem;">{{ number_format($item->product->price) }}đ</small>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="text-end ms-2">
                                                    <span class="fw-bold small">{{ number_format($subtotal) }}đ</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="card-footer bg-light border-0 p-4">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted small">Tạm tính</span>
                                    <span class="fw-semibold">{{ number_format($totalOrder) }}đ</span>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <span class="text-muted small">Phí vận chuyển</span>
                                    <span class="text-success small fw-bold">Miễn phí</span>
                                </div>
                                <hr class="my-3">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <span class="fw-bold">Tổng thanh toán</span>
                                    <span class="h4 mb-0 fw-bold text-danger">{{ number_format($totalOrder) }}đ</span>
                                </div>
                                <button type="submit" form="orderForm"
                                    class="btn btn-primary btn-confirm w-100 fw-bold text-uppercase shadow-sm">
                                    Thanh toán đơn hàng <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                                <p class="text-center text-muted small mt-3">
                                    <i class="bi bi-shield-lock me-1"></i> Thanh toán an toàn & bảo mật
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        :root {
            --mt-primary: #9ca8ce;
            --mt-bg: #f8f9fa;
        }

        body {
            background-color: var(--mt-bg);
        }

        .checkout-card {
            border: none;
            border-radius: 10px;
            transition: transform 0.2s ease;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            padding: 12px 16px;
            border: 1px solid #e0e0e0;
            background-color: #fff;
        }

        .form-control:focus {
            box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.1);
            border-color: var(--mt-primary);
        }

        .product-img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 12px;
        }

        .sticky-summary {
            position: sticky;
            top: 20px;
        }

        .btn-confirm {
            background: linear-gradient(45deg, #0d6efd, #004dc7);
            border: none;
            border-radius: 12px;
            padding: 16px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .btn-confirm:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(13, 110, 253, 0.3);
        }

        .step-badge {
            width: 30px;
            height: 30px;
            background: var(--mt-primary);
            color: white;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-right: 10px;
            font-size: 0.9rem;
        }

        .payment-option {
            cursor: pointer;
            transition: all 0.2s ease;
            border: 2px solid #f1f1f1;
        }

        .payment-option:hover {
            background-color: #f8f9fa;
            border-color: #dee2e6;
        }

        /* Khi radio được check, thẻ label bao ngoài sẽ đổi màu */
        .payment-check:checked+.payment-label {
            background-color: #f0f7ff !important;
            border-color: #0d6efd !important;
        }

        .payment-logo {
            width: 30px;
            height: 30px;
            object-fit: contain;
            border-radius: 6px;
        }
    </style>
@endsection