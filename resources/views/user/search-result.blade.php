@extends('user.layouts.app')
@section('web-title', 'Kết quả tìm kiếm ' . $keyword . '  - MTShop.com')
@section('content')
    <section class="py-4" style="background-color:#e9ecef;">
        <div class="container">
            <!-- Chỉ hiển thị tiêu đề khi có keyword -->
            @if(!empty($keyword))
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4">
                        <div class="border-start border-4 border-primary ps-3">
                            <h3>Kết quả tìm kiếm cho: <span class="text-primary">"{{ $keyword }}"</span></h3>
                            <p class="text-muted mb-0">Tìm thấy {{ $products->total() }} sản phẩm</p>
                        </div>
                    </div>
                </div>
            @endif
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
                                <button class="btn btn-outline-primary btn-sm w-100 btn-add-cart" data-id="{{ $product->id }}">
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
                @empty
                    <div class="col-12 w-100">
                        <div class="card border-0 shadow-sm rounded-4 text-center py-5">
                            <div class="card-body">
                                <div class="mb-4">
                                    <i class="bi bi-search-heart text-muted" style="font-size: 5rem; opacity: 0.3;"></i>
                                </div>
                                <!-- không nhậ từ khóa -->
                                @if(empty($keyword))
                                    <h4 class="fw-bold">Bạn chưa nhập từ khóa</h4>
                                    <p class="text-muted">Vui lòng nhập tên sản phẩm cần tìm vào ô tìm kiếm phía trên.</p>
                                @else
                                    <!-- Nhập từ khóa nhưng ko có sản phẩm -->
                                    <h4 class="fw-bold">Không tìm thấy kết quả</h4>
                                    <p class="text-muted">Rất tiếc, chúng tôi không tìm thấy sản phẩm nào phù hợp với từ khóa
                                        <strong>"{{ $keyword }}"</strong>.
                                    </p>
                                @endif

                                <div class="mt-4">
                                    <a href="{{ url('/') }}" class="btn btn-primary px-4 rounded-pill">
                                        <i class="bi bi-house-door me-2"></i>Quay lại trang chủ
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
            <nav aria-label="Page navigation" class="d-flex justify-content-center mt-5 mb-4">
                <div class="bg-white shadow-sm p-2 rounded-pill">
                    @if($products->isNotEmpty())
                        <div class="mt-4 d-flex justify-content-center">
                            {{ $products->appends(['keyword' => $keyword])->links() }}
                        </div>
                    @endif
                </div>
            </nav>
    </section>
@endsection