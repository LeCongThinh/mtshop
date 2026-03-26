@extends("user.layouts.app")
@section('web-title', 'MTShop - Chuyên cung cấp các dòng máy tính, laptop')
@section('content')
    <!-- Section slider banner-->

    @include("user.layouts.slider")
    <!-- Section sản phẩm bán chạy -->
    <section class="py-4" style="background-color:#e9ecef;">
        <div class="container">
            <!-- Sản phẩm mới -->
            @include("user.products.new-product")
            <!-- PC bán chạy -->
            <!-- <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-3"> -->
            <div class="bg-white p-4 rounded shadow-sm mb-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>PC bán chạy</h4>
                    <a href="#" class="text-primary fst-italic text-decoration-none">Xem tất cả →</a>
                </div>
                <div class="product-scroll d-flex">
                    @foreach ($bestSellingPCs as $pc)
                        <div class="product-item">
                            <div class="card product-card border h-100 d-flex flex-column">
                                <a href="{{ route('home.product-detail', $pc->slug) }}" class="text-decoration-none text-black">
                                    <div class="position-relative product-img-container overflow-hidden">
                                        <img class="card-img-top p-2 product-img-hover"
                                            src="{{ $pc->thumbnail ? asset('storage/' . $pc->thumbnail) : asset('assets/images/avatar/undefined.png') }}"
                                            style="height:180px; object-fit:contain;" alt="{{ $pc->name }}">

                                        @if($pc->sale_price > 0)
                                            <span class="position-absolute top-0 start-0 badge bg-danger m-2">Giảm giá</span>
                                        @endif
                                    </div>
                                    <div class="card-body p-3 text-start d-flex flex-column flex-grow-1">
                                        <h6 class="fw-bold mb-2"> {{ Str::limit(strip_tags($pc->name), 37) }} </h6>
                                        <div class="mt-auto mt-3">
                                            @if($pc->sale_price > 0)
                                                <div class="text-danger fw-bold">
                                                    {{ number_format($pc->sale_price, 0, ',', '.') }} đ
                                                </div>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="text-muted small text-decoration-line-through">
                                                        {{ number_format($pc->price, 0, ',', '.') }} đ
                                                    </div>
                                                    <div class="badge border border-danger text-danger fw-bold">
                                                        -{{ round((($pc->price - $pc->sale_price) / $pc->price) * 100) }}%
                                                    </div>
                                                </div>
                                            @else
                                                <div class="text-danger fw-bold">
                                                    {{ number_format($pc->price, 0, ',', '.') }} đ
                                                </div>
                                                <div class="small opacity-0">&nbsp;</div>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                                <div class="card-footer p-2 border-0 bg-transparent text-center mt-auto">
                                    <button class="btn btn-outline-primary btn-sm w-100 btn-add-cart" data-id="{{ $pc->id }}">
                                        <i class="bi bi-cart-plus me-1"></i> Thêm vào giỏ hàng
                                    </button>
                                    <div class="d-flex align-items-center mt-2 mb-1 justify-content-start">
                                        <span class="text-warning me-2">
                                            <span class="fw-semibold small">4.8</span>
                                            <i class="bi bi-star-fill"></i>
                                        </span>
                                        <span class="text-muted small">(120 đánh giá)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Laptop bán chạy -->
            <div class="bg-white p-4 rounded shadow-sm mb-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Laptop bán chạy</h4>
                    <a href="#" class="text-primary fst-italic text-decoration-none">
                        Xem tất cả →
                    </a>
                </div>
                <div class="product-scroll d-flex">
                    @foreach ($bestSellingLaptops as $laptop)
                        <div class="product-item">
                            <div class="card product-card border h-100 d-flex flex-column">
                                <a href="{{ route('home.product-detail', $laptop->slug) }}"
                                    class="text-decoration-none text-black">
                                    <div class="position-relative product-img-container overflow-hidden">
                                        <img class="card-img-top p-2 product-img-hover"
                                            src="{{ $laptop->thumbnail ? asset('storage/' . $laptop->thumbnail) : asset('assets/images/avatar/undefined.png') }}"
                                            style="height:180px; object-fit:contain;" alt="{{ $laptop->name }}">

                                        @if($laptop->sale_price > 0)
                                            <span class="position-absolute top-0 start-0 badge bg-danger m-2">Giảm giá</span>
                                        @endif
                                    </div>
                                    <div class="card-body p-3 text-start d-flex flex-column flex-grow-1">
                                        <h6 class="fw-bold mb-2"> {{ Str::limit(strip_tags($laptop->name), 37) }} </h6>
                                        <div class="mt-auto mt-3">
                                            @if($laptop->sale_price > 0)
                                                <div class="text-danger fw-bold">
                                                    {{ number_format($laptop->sale_price, 0, ',', '.') }} đ
                                                </div>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="text-muted small text-decoration-line-through">
                                                        {{ number_format($laptop->price, 0, ',', '.') }} đ
                                                    </div>
                                                    <div class="badge border border-danger text-danger fw-bold">
                                                        -{{ round((($laptop->price - $laptop->sale_price) / $laptop->price) * 100) }}%
                                                    </div>
                                                </div>
                                            @else
                                                <div class="text-danger fw-bold">
                                                    {{ number_format($laptop->price, 0, ',', '.') }} đ
                                                </div>
                                                <div class="small opacity-0">&nbsp;</div>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                                <div class="card-footer p-2 border-0 bg-transparent text-center mt-auto">
                                    <button class="btn btn-outline-primary btn-sm w-100 btn-add-cart"
                                        data-id="{{ $laptop->id }}">
                                        <i class="bi bi-cart-plus me-1"></i> Thêm vào giỏ hàng
                                    </button>
                                    <div class="d-flex align-items-center mt-2 mb-1 justify-content-start">
                                        <span class="text-warning me-2">
                                            <span class="fw-semibold small">4.8</span>
                                            <i class="bi bi-star-fill"></i>
                                        </span>
                                        <span class="text-muted small">(120 đánh giá)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Màn hình bán chạy -->
            <div class="bg-white p-4 rounded shadow-sm mb-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Màn hình bán chạy</h4>
                    <a href="#" class="text-primary fst-italic text-decoration-none">
                        Xem tất cả →
                    </a>
                </div>
                <div class="product-scroll d-flex">
                    @foreach ($bestSellingMonitors as $monitor)
                        <div class="product-item">
                            <div class="card product-card border h-100 d-flex flex-column">
                                <a href="{{ route('home.product-detail', $monitor->slug) }}"
                                    class="text-decoration-none text-black">
                                    <div class="position-relative product-img-container overflow-hidden">
                                        <img class="card-img-top p-2 product-img-hover"
                                            src="{{ $monitor->thumbnail ? asset('storage/' . $monitor->thumbnail) : asset('assets/images/avatar/undefined.png') }}"
                                            style="height:180px; object-fit:contain;" alt="{{ $monitor->name }}">

                                        @if($monitor->sale_price > 0)
                                            <span class="position-absolute top-0 start-0 badge bg-danger m-2">Giảm giá</span>
                                        @endif
                                    </div>
                                    <div class="card-body p-3 text-start d-flex flex-column flex-grow-1">
                                        <h6 class="fw-bold mb-2"> {{ Str::limit(strip_tags($monitor->name), 37) }} </h6>
                                        <div class="mt-auto mt-3">
                                            @if($monitor->sale_price > 0)
                                                <div class="text-danger fw-bold">
                                                    {{ number_format($monitor->sale_price, 0, ',', '.') }} đ
                                                </div>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="text-muted small text-decoration-line-through">
                                                        {{ number_format($monitor->price, 0, ',', '.') }} đ
                                                    </div>
                                                    <div class="badge border border-danger text-danger fw-bold">
                                                        -{{ round((($monitor->price - $monitor->sale_price) / $monitor->price) * 100) }}%
                                                    </div>
                                                </div>
                                            @else
                                                <div class="text-danger fw-bold">
                                                    {{ number_format($monitor->price, 0, ',', '.') }} đ
                                                </div>
                                                <div class="small opacity-0">&nbsp;</div>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                                <div class="card-footer p-2 border-0 bg-transparent text-center mt-auto">
                                    <button class="btn btn-outline-primary btn-sm w-100 btn-add-cart"
                                        data-id="{{ $monitor->id }}">
                                        <i class="bi bi-cart-plus me-1"></i> Thêm vào giỏ hàng
                                    </button>
                                    <div class="d-flex align-items-center mt-2 mb-1 justify-content-start">
                                        <span class="text-warning me-2">
                                            <span class="fw-semibold small">4.8</span>
                                            <i class="bi bi-star-fill"></i>
                                        </span>
                                        <span class="text-muted small">(120 đánh giá)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Tin tức công nghệ -->
            @include("user.news.list-news")
        </div>
    </section>
@endsection