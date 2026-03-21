@extends('user.layouts.app')
@section('web-title', $subcategory->name . ' - MTShop.com')
@section('content')
    <section class="py-4" style="background-color:#e9ecef;">
        <div class="container">
            <!-- Đường dẫn sản phẩm -->
            <ul class="breadcrumb ms-5">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}" class="text-decoration-none fw-semibold">
                        <i class="bi bi-house-door-fill me-1"></i>Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('category.product', $subcategory->parent->slug) }}"
                        class="text-decoration-none fw-semibold">
                        {{ $subcategory->parent->name }}
                    </a>
                </li>
                <li class="breadcrumb-item ">{{ $subcategory->name }}</li>
            </ul>
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4 d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <div class="border-start border-4 border-primary ps-3">
                        <h4 class="fw-bolder mb-0 text-uppercase">{{ $subcategory->name }}</h4>
                        <p class="text-muted mb-0 small">Khám phá {{ $products->total() }} sản phẩm công nghệ mới nhất</p>
                    </div>
                </div>
            </div>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-3">
                @forelse($products as $product)
                    <div class="col">
                        <div class="card product-card border-0 shadow-sm h-100 d-flex flex-column transition hover-up">
                            <a href="{{ route('home.product-detail', $product->slug) }}"
                                class="text-decoration-none text-black">
                                <div class="position-relative product-img-container overflow-hidden bg-white">
                                    <img class="card-img-top p-2 product-img-hover"
                                        src="{{ $product->thumbnail ? asset('storage/' . $product->thumbnail) : asset('assets/images/avatar/undefined.png') }}"
                                        style="height:180px; object-fit:contain;" alt="{{ $product->name }}">

                                    @if($product->sale_price > 0)
                                        <span class="position-absolute top-0 start-0 badge bg-danger m-2">Giảm giá</span>
                                    @endif
                                </div>

                                <div class="card-body p-3 text-start d-flex flex-column flex-grow-1">
                                    <h6 class="fw-bold mb-2 text-dark line-clamp-2" style="min-height: 38px;">
                                        {{ Str::limit(strip_tags($product->name), 37) }}
                                    </h6>

                                    <div class="mt-auto pt-2">
                                        @if($product->sale_price > 0)
                                            <div class="text-danger fw-bold fs-5">
                                                {{ number_format($product->sale_price, 0, ',', '.') }} đ
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="text-muted small text-decoration-line-through">
                                                    {{ number_format($product->price, 0, ',', '.') }} đ
                                                </div>
                                                <div class="badge border border-danger text-danger fw-bold"
                                                    style="font-size: 0.7rem;">
                                                    -{{ round((($product->price - $product->sale_price) / $product->price) * 100) }}%
                                                </div>
                                            </div>
                                        @else
                                            <div class="text-danger fw-bold fs-5">
                                                {{ number_format($product->price, 0, ',', '.') }} đ
                                            </div>
                                            <div class="small opacity-0">&nbsp;</div>
                                        @endif
                                    </div>
                                </div>
                            </a>

                            <div class="card-footer p-2 border-0 bg-transparent text-center mt-auto">
                                <a class="btn btn-outline-primary btn-sm w-100">
                                    Thêm vào giỏ hàng
                                </a>
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
                @empty
                    <div class="col-12 text-center py-5">
                        <img src="{{ asset('assets/images/no-product.png') }}" width="150" class="mb-3 opacity-50">
                        <p class="text-muted">Hiện chưa có sản phẩm nào trong danh mục này.</p>
                    </div>
                @endforelse
            </div>
            <nav aria-label="Page navigation" class="d-flex justify-content-center mt-5 mb-4">
                <div class="bg-white shadow-sm p-2 rounded-pill">
                    {{ $products->links() }}
                </div>
            </nav>
    </section>
@endsection