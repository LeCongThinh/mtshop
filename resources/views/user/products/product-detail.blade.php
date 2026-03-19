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
                        <div class="col-md-6 mb-3">
                            <div class="card border-0 shadow-sm p-3">
                                <div class="position-relative">
                                    <div class="main-image-container text-center"
                                        style="height: 350px; display: flex; align-items: center; justify-content: center; overflow: hidden; background: #f8f9fa; border-radius: 10px;">
                                        <img src="{{ asset('storage/' . $product->thumbnail) }}" id="mainImage"
                                            class="img-fluid" style="max-height: 100%; object-fit: contain;" alt="Sản phẩm">
                                    </div>

                                    <button
                                        class="btn nav-btn shadow-sm position-absolute top-50 start-0 translate-middle-y rounded-circle"
                                        onclick="prevImage()" style="width: 40px; height: 40px; z-index: 10;">
                                        <i class="bi bi-chevron-left"></i>
                                    </button>

                                    <button
                                        class="btn nav-btn shadow-sm position-absolute top-50 end-0 translate-middle-y rounded-circle"
                                        onclick="nextImage()" style="width: 40px; height: 40px; z-index: 10;">
                                        <i class="bi bi-chevron-right"></i>
                                    </button>
                                </div>
                                <div class="d-flex justify-content-center gap-2 overflow-auto pb-2" id="thumbGallery">
                                    @foreach($product->images as $index => $img)
                                        <img src="{{ asset('storage/' . $img->image) }}" class="img-thumbnail thumb-img"
                                            style="width: 65px; height: 65px; object-fit: cover; cursor: pointer;"
                                            onclick="changeImage(this, {{ $index + 1 }})">
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <h4 class="fw-bold mb-2">{{ $product->name }}</h4>
                            <div class="mt-2">
                                <span class="text-warning">
                                    <i class="bi bi-star-fill"></i> 4.8
                                </span>
                                <span class="text-muted">(120 đánh giá)</span>
                                <span class="ms-3 text-success">Đã bán 500+</span>
                            </div>
                            <div class="mb-3">
                                <!-- Có khuyến mãi -->
                                @if($product->sale_price > 0)
                                    <span
                                        class="text-danger fs-2 fw-bold me-2">{{ number_format($product->sale_price, 0, ',', '.') }}đ</span>
                                    <span
                                        class="text-muted text-decoration-line-through fs-5">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                    <span
                                        class="badge border border-danger text-danger ms-2">-{{ round((($product->price - $product->sale_price) / $product->price) * 100) }}%</span>
                                @else
                                    <!-- không  khuyến mãi -->
                                    <span
                                        class="text-danger fs-2 fw-bold me-2">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                @endif
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
                            

                            <div class="row g-2 mt-2">
                                <div class="col-6">
                                    <div class="d-flex align-items-center p-2 border rounded shadow-sm h-100">
                                        <i class="bi bi-shield-check text-primary fs-4 me-2"></i>
                                        <span class="small lh-sm">Bảo hành chính hãng 12 tháng</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center p-2 border rounded shadow-sm h-100">
                                        <i class="bi bi-arrow-left-right text-primary fs-4 me-2"></i>
                                        <span class="small lh-sm">Lỗi là đổi mới trong 30 ngày</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center p-2 border rounded shadow-sm h-100">
                                        <i class="bi bi-truck text-primary fs-4 me-2"></i>
                                        <span class="small lh-sm">Miễn phí giao hàng toàn quốc</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center p-2 border rounded shadow-sm h-100">
                                        <i class="bi bi-headset text-primary fs-4 me-2"></i>
                                        <span class="small lh-sm">Hỗ trợ kỹ thuật 24/7 chuyên nghiệp</span>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="product-info-mini p-3 bg-light rounded-3 border-0">
                                <ul class="list-unstyled mb-0 shadow-none">
                                    <li class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                        <span class="text-secondary"><i class="bi bi-tag me-2"></i>Thương hiệu</span>
                                        <span
                                            class="fw-bold text-dark">{{ $product->brand->name ?? 'Đang cập nhật' }}</span>
                                    </li>
                                    <li class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                        <span class="text-secondary"><i class="bi bi-grid me-2"></i>Danh mục</span>
                                        <span
                                            class="fw-bold text-dark text-uppercase small">{{ $product->category->name ?? 'Laptop' }}</span>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center">
                                        <span class="text-secondary"><i class="bi bi-box-seam me-2"></i>Tình trạng sản phẩm</span>
                                        @if($product->stock > 0)
                                            <span class="text-success fw-bold"><i class="bi bi-check-circle-fill me-1"></i>Còn
                                                hàng</span>
                                        @else
                                            <span class="text-danger fw-bold"><i class="bi bi-x-circle-fill me-1"></i>Hết
                                                hàng</span>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm p-4">
                        <h4 class="fw-bold mb-4 border-bottom pb-2">Mô tả sản phẩm</h4>

                        <div id="descWrapper" class="description-wrapper">
                            <div class="product-description">
                                {!! $product->description !!}
                            </div>
                            <div id="descGradient" class="description-gradient"></div>
                        </div>

                        <div class="text-center mt-3">
                            <button id="btnToggleDesc" class="btn btn-outline-primary btn-sm px-4">
                                Đọc tiếp bài viết <i class="bi bi-chevron-down ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm p-4">
                        <h4 class="fw-bold mb-4 border-bottom pb-2">Thông số kỹ thuật</h4>
                        <table class="table table-striped table-sm">
                            <tbody>
                                <!-- kiểm tra thông số kỹ thuật có rỗng không -->
                                @if($specs->isNotempty())
                                    @foreach ($specs as $spec)
                                        <tr>
                                            <td class="text-muted" style="width: 40%;">{{ $spec->spec_key }}</td>
                                            <td class="fw-medium">{{ $spec->spec_value }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2" class="text-center text-muted py-4">
                                            <i class="bi bi-info-circle me-2"></i>Thông số đang được cập nhật
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        @if($spec->count() > 9)
                            <button class="btn btn-outline-secondary btn-sm w-100 mt-3 shadow-sm" data-bs-toggle="modal"
                                data-bs-target="#fullSpecsModal">
                                <i class="bi bi- megaphone me-1"></i> Xem tất cả cấu hình
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include("user.products.show-specs")
@endsection