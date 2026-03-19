@extends('user.layouts.app')
@section('web-title', $product->name . ' - MTShop.com')
@section('content')
    <section class="py-4" style="background-color:#e9ecef;">
        <div class="container">
            <!-- Đường dẫn sản phẩm -->
            <ul class="breadcrumb ms-5">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}" class="text-decoration-none fw-semibold">
                        <i class="bi bi-house-door-fill me-1"></i>Trang chủ</a>
                </li>
                <li class="breadcrumb-item ">{{ $product->category->parent->name }}</li>
                <li class="breadcrumb-item active">{{$product->name}}</li>
            </ul>
            <div class="card stretch stretch-full mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card border-0 shadow-sm p-3">
                                <!-- Thumbnail sản phẩm -->
                                <div class="main-image-container mb-3 text-center">
                                    <img src="https://via.placeholder.com/500x500" id="mainImage"
                                        class="img-fluid rounded shadow-sm" alt="Sản phẩm chính">
                                </div>
                                <!-- Danh sách ảnh sản phẩm -->
                                <div class="d-flex justify-content-center gap-2 overflow-auto">
                                    <img src="https://via.placeholder.com/500x500" class="img-thumbnail thumb-img active"
                                        style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                                    <img src="https://via.placeholder.com/500x600" class="img-thumbnail thumb-img"
                                        style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                                    <img src="https://via.placeholder.com/600x500" class="img-thumbnail thumb-img"
                                        style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                                    <img src="https://via.placeholder.com/400x400" class="img-thumbnail thumb-img"
                                        style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <h4 class="fw-bold mb-2">iPhone 15 Pro Max 256GB</h4>
                            <div class="mb-3">
                                <span class="text-danger fs-2 fw-bold me-2">29.990.000đ</span>
                                <span class="text-muted text-decoration-line-through fs-5">34.990.000đ</span>
                                <span class="badge border border-danger text-danger ms-2">-15%</span>
                            </div>

                            <div class="mb-2">
                                <button class="btn btn-danger fw-bold shadow-sm"
                                    style="padding-left: 60px; padding-right: 60px; min-width: 280px;" type="button">
                                    <span class="fs-5 d-block">MUA NGAY</span>
                                    <span class="d-block fw-normal opacity-75" style="font-size: 0.75rem;">
                                        (Giao nhanh từ 2 giờ hoặc nhận tại cửa hàng)
                                    </span>
                                </button>
                            </div>

                            <div class="card bg-light border-0">
                                <div class="card-body">
                                    <h6 class="fw-bold"><i class="bi bi-truck me-2"></i>Chính sách ưu đãi</h6>
                                    <ul class="small mb-0 list-unstyled">
                                        <li>✅ Miễn phí vận chuyển toàn quốc.</li>
                                        <li>✅ Bảo hành chính hãng 24 tháng.</li>
                                        <li>✅ Hỗ trợ đổi mới trong 7 ngày.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm p-4">
                        <h4 class="fw-bold mb-4 border-bottom pb-2">Mô tả sản phẩm</h4>
                        <div class="product-description">
                            <p>Đây là khu vực hiển thị nội dung chi tiết về sản phẩm của bạn. Bạn có thể sử dụng các thẻ
                                HTML như <strong>bold</strong>, <em>italic</em> hoặc danh sách để làm nổi bật tính năng.
                            </p>
                            <p>iPhone 15 Pro Max sở hữu khung viền Titan siêu bền, chip A17 Pro mạnh mẽ nhất thế giới
                                smartphone hiện nay...</p>
                            <img src="https://via.placeholder.com/800x400" class="img-fluid rounded my-3"
                                alt="Banner sản phẩm">
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm p-4">
                        <h4 class="fw-bold mb-4 border-bottom pb-2">Thông số kỹ thuật</h4>
                        <table class="table table-striped table-sm">
                            <tbody>
                                <tr>
                                    <td class="text-muted" style="width: 40%;">Màn hình</td>
                                    <td class="fw-medium">6.7 inch, OLED</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Chipset</td>
                                    <td class="fw-medium">Apple A17 Pro 6 nhân</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">RAM</td>
                                    <td class="fw-medium">8 GB</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Bộ nhớ trong</td>
                                    <td class="fw-medium">256 GB</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Pin</td>
                                    <td class="fw-medium">4,422 mAh</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-outline-secondary btn-sm w-100 mt-2" data-bs-toggle="modal"
                            data-bs-target="#specModal">
                            Xem cấu hình chi tiết
                        </button>
                    </div>
                </div>
            </div>

            <style>
                .thumb-img:hover,
                .thumb-img.active {
                    border-color: #0d6efd !important;
                    border-width: 2px;
                }

                .product-description p {
                    line-height: 1.8;
                }
            </style>

            <script>
                function changeImage(element) {
                    // Đổi ảnh chính
                    document.getElementById('mainImage').src = element.src;
                    // Xử lý class active cho ảnh nhỏ
                    document.querySelectorAll('.thumb-img').forEach(img => img.classList.remove('active'));
                    element.classList.add('active');
                }
            </script>
        </div>
    </section>
@endsection