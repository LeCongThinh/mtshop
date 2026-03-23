{{-- resources/views/cart/index.blade.php --}}
@extends('user.layouts.app')
@section('web-title', 'Giỏ hàng của bạn - MTShop.com')

@section('content')
    <section class="py-4" style="background-color:#e9ecef; min-height: 80vh;">
        <div class="container">

            {{-- Breadcrumb --}}
            <ul class="breadcrumb ms-2 mb-3">
                <li class="breadcrumb-item">
                    <a href="{{ route('home.index') }}" class="text-decoration-none fw-semibold">
                        <i class="bi bi-house-door-fill me-1"></i>Trang chủ
                    </a>
                </li>
                <li class="breadcrumb-item active">Giỏ hàng</li>
            </ul>

            {{-- Tiêu đề --}}
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <div class="border-start border-4 border-primary ps-3">
                        <h4 class="fw-bolder mb-1 text-uppercase">Giỏ hàng của bạn</h4>
                        <p class="text-muted mb-0 small">Kiểm tra lại sản phẩm trước khi đặt hàng</p>
                    </div>
                </div>
            </div>

            @if(empty($items))
                {{-- Giỏ hàng trống --}}
                <div class="card border-0 shadow-sm rounded-4 text-center py-5">
                    <div class="card-body">
                        <i class="bi bi-cart-x" style="font-size: 4rem; color: #dee2e6;"></i>
                        <h5 class="mt-3 text-muted">Giỏ hàng của bạn đang trống</h5>
                        <p class="text-muted small">Hãy thêm sản phẩm vào giỏ hàng để tiếp tục mua sắm</p>
                        <a href="{{ route('home.index') }}" class="btn btn-primary mt-2">
                            <i class="bi bi-arrow-left me-1"></i> Tiếp tục mua sắm
                        </a>
                    </div>
                </div>

            @else
                <div class="row g-4">

                    {{-- Danh sách sản phẩm --}}
                    <div class="col-lg-8">
                        <div class="card border-0 shadow-sm rounded-4">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table align-middle mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="ps-4 py-3" style="width: 45%">Sản phẩm</th>
                                                <th class="text-center py-3">Đơn giá</th>
                                                <th class="text-center py-3">Số lượng</th>
                                                <th class="text-center py-3">Thành tiền</th>
                                                <th class="text-center py-3"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($items as $item)
                                                                        @php
                                                                            $price = $item['product']->sale_price > 0
                                                                                ? $item['product']->sale_price
                                                                                : $item['product']->price;
                                                                            $subtotal = $price * $item['quantity'];
                                                                        @endphp
                                                                        <tr class="cart-row border-top" data-id="{{ $item['product']->id }}">

                                                                            {{-- Ảnh + tên --}}
                                                                            <td class="ps-4 py-3">
                                                                                <div class="d-flex align-items-center gap-3">
                                                                                    <img src="{{ $item['product']->thumbnail
                                                ? asset('storage/' . $item['product']->thumbnail)
                                                : asset('assets/images/avatar/undefined.png') }}"
                                                                                        style="width:70px; height:70px; object-fit:contain;"
                                                                                        class="rounded-3 border p-1 bg-white"
                                                                                        alt="{{ $item['product']->name }}">
                                                                                    <div>
                                                                                        <a href="{{ route('home.product-detail', $item['product']->slug) }}"
                                                                                            class="text-decoration-none text-dark fw-semibold line-clamp-2"
                                                                                            style="font-size: 0.9rem;">
                                                                                            {{ $item['product']->name }}
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </td>

                                                                            {{-- Đơn giá --}}
                                                                            <td class="text-center">
                                                                                <span class="text-danger fw-semibold">
                                                                                    {{ number_format($price, 0, ',', '.') }}đ
                                                                                </span>
                                                                                @if($item['product']->sale_price > 0)
                                                                                    <br>
                                                                                    <small class="text-muted text-decoration-line-through">
                                                                                        {{ number_format($item['product']->price, 0, ',', '.') }}đ
                                                                                    </small>
                                                                                @endif
                                                                            </td>

                                                                            {{-- Số lượng --}}
                                                                            <td class="text-center">
                                                                                <div class="d-flex align-items-center justify-content-center gap-1">
                                                                                    <button class="btn btn-outline-secondary btn-sm btn-qty"
                                                                                        data-action="minus" data-id="{{ $item['product']->id }}"
                                                                                        style="width:30px; height:30px; padding:0;">
                                                                                        <i class="bi bi-dash"></i>
                                                                                    </button>

                                                                                    <input type="number"
                                                                                        class="form-control form-control-sm text-center qty-input"
                                                                                        value="{{ $item['quantity'] }}" min="1" max="99"
                                                                                        data-id="{{ $item['product']->id }}" style="width:50px;">

                                                                                    <button class="btn btn-outline-secondary btn-sm btn-qty"
                                                                                        data-action="plus" data-id="{{ $item['product']->id }}"
                                                                                        style="width:30px; height:30px; padding:0;">
                                                                                        <i class="bi bi-plus"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </td>

                                                                            {{-- Thành tiền --}}
                                                                            <td class="text-center">
                                                                                <span class="fw-bold text-danger subtotal" data-price="{{ $price }}">
                                                                                    {{ number_format($subtotal, 0, ',', '.') }}đ
                                                                                </span>
                                                                            </td>

                                                                            {{-- Xóa --}}
                                                                            <td class="text-center pe-3">
                                                                                <button class="btn btn-sm btn-outline-danger btn-remove"
                                                                                    data-id="{{ $item['product']->id }}" title="Xóa sản phẩm">
                                                                                    <i class="bi bi-trash3"></i>
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        {{-- Nút tiếp tục mua sắm --}}
                        <div class="mt-3">
                            <a href="{{ route('home.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i> Tiếp tục mua sắm
                            </a>
                        </div>
                    </div>

                    {{-- Tóm tắt đơn hàng --}}
                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm rounded-4 sticky-top" style="top: 80px;">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-4">Tóm tắt đơn hàng</h5>

                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Tạm tính</span>
                                    <span id="summary-subtotal" class="fw-semibold">
                                        {{ number_format($total, 0, ',', '.') }}đ
                                    </span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Phí vận chuyển</span>
                                    <span class="text-success fw-semibold">Miễn phí</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between mb-4">
                                    <span class="fw-bold fs-6">Tổng cộng</span>
                                    <span id="summary-total" class="fw-bold fs-5 text-danger">
                                        {{ number_format($total, 0, ',', '.') }}đ
                                    </span>
                                </div>

                                <a href="{{ route('cart.checkout') }}" class="btn btn-primary w-100 py-2">
                                    <i class="bi bi-bag-check me-1"></i> Đặt hàng
                                </a>

                                @guest
                                    <p class="text-muted small text-center mt-3 mb-0">
                                        <i class="bi bi-info-circle me-1"></i>
                                        Bạn cần <a href="#">đăng nhập</a>
                                        để hoàn tất đặt hàng
                                    </p>
                                @endguest
                            </div>
                        </div>
                    </div>

                </div>
            @endif
        </div>
    </section>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

                // ── CẬP NHẬT TỔNG TIỀN TRÊN GIAO DIỆN ──────────────────
                function recalcTotal() {
                    let total = 0;
                    document.querySelectorAll('.cart-row').forEach(row => {
                        const qty = parseInt(row.querySelector('.qty-input').value) || 0;
                        const price = parseFloat(row.querySelector('.subtotal').dataset.price) || 0;
                        const subtotal = qty * price;

                        row.querySelector('.subtotal').textContent =
                            subtotal.toLocaleString('vi-VN') + 'đ';
                        total += subtotal;
                    });

                    const formatted = total.toLocaleString('vi-VN') + 'đ';
                    document.getElementById('summary-subtotal').textContent = formatted;
                    document.getElementById('summary-total').textContent = formatted;

                    // Cập nhật badge giỏ hàng trên navbar
                    let totalQty = 0;
                    document.querySelectorAll('.qty-input').forEach(i => totalQty += parseInt(i.value) || 0);
                    const badge = document.getElementById('cart-count');
                    if (badge) badge.textContent = totalQty;
                }

                // ── NÚT TĂNG / GIẢM SỐ LƯỢNG ───────────────────────────
                document.querySelectorAll('.btn-qty').forEach(btn => {
                    btn.addEventListener('click', function () {
                        const productId = this.dataset.id;
                        const action = this.dataset.action;
                        const row = document.querySelector(`.cart-row[data-id="${productId}"]`);
                        const input = row.querySelector('.qty-input');
                        let qty = parseInt(input.value) || 1;

                        if (action === 'plus') qty = Math.min(qty + 1, 99);
                        if (action === 'minus') qty = Math.max(qty - 1, 1);

                        input.value = qty;
                        updateCart(productId, qty);
                    });
                });

                // ── NHẬP TAY SỐ LƯỢNG ──────────────────────────────────
                document.querySelectorAll('.qty-input').forEach(input => {
                    input.addEventListener('change', function () {
                        let qty = parseInt(this.value) || 1;
                        qty = Math.max(1, Math.min(qty, 99));
                        this.value = qty;
                        updateCart(this.dataset.id, qty);
                    });
                });

                // ── GỌI API CẬP NHẬT ───────────────────────────────────
                function updateCart(productId, quantity) {
                    fetch(`/cart/${productId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                            'X-HTTP-Method-Override': 'PATCH',
                        },
                        body: JSON.stringify({ quantity }),
                    })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) recalcTotal();
                        })
                        .catch(() => showToast('Cập nhật thất bại!', 'danger'));
                }

                // ── XÓA SẢN PHẨM ───────────────────────────────────────
                document.querySelectorAll('.btn-remove').forEach(btn => {
                    btn.addEventListener('click', function () {
                        const productId = this.dataset.id;

                        if (!confirm('Bạn có chắc muốn xóa sản phẩm này?')) return;

                        fetch(`/cart/${productId}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json',
                                'X-HTTP-Method-Override': 'DELETE',
                            },
                        })
                            .then(res => res.json())
                            .then(data => {
                                if (data.success) {
                                    const row = document.querySelector(`.cart-row[data-id="${productId}"]`);
                                    row.style.transition = 'opacity 0.3s';
                                    row.style.opacity = '0';
                                    setTimeout(() => {
                                        row.remove();
                                        recalcTotal();

                                        // Nếu xóa hết thì reload để hiện trạng thái trống
                                        if (!document.querySelector('.cart-row')) {
                                            location.reload();
                                        }
                                    }, 300);
                                }
                            })
                            .catch(() => showToast('Xóa thất bại!', 'danger'));
                    });
                });

                // ── TOAST THÔNG BÁO ─────────────────────────────────────
                function showToast(message, type = 'success') {
                    const toast = document.createElement('div');
                    toast.className = `toast-notify toast-${type}`;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.classList.add('show'), 10);
                    setTimeout(() => {
                        toast.classList.remove('show');
                        setTimeout(() => toast.remove(), 300);
                    }, 3000);
                }
            });
        </script>
    @endpush
@endsection