<div class="bg-white p-4 rounded shadow-sm mb-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Sản phẩm mới</h4>
        <a href="#" class="text-primary fst-italic text-decoration-none">Xem tất cả →</a>
    </div>
    <div class="product-scroll d-flex">
        @foreach ($products as $product)
            <div class="product-item">
                <div class="card product-card border">
                    <a href="{{ route("home.product-detail", $product->slug) }}" class="text-decoration-none text-black">
                        <div class="position-relative product-img-container overflow-hidden">
                            <!-- Thumbnail sản phẩm -->
                            <img class="card-img-top p-2 product-img-hover"
                                src="{{ $product->thumbnail ? asset("storage/" . $product->thumbnail) : asset("assets/images/avatar/undefined.png") }}"
                                style="height:200px; object-fit:cover;" alt="">
                        </div>
                        <div class="card-body p-3 text-start">
                            <!-- Tên sản phẩm -->
                            <h6 class="fw-bold mb-2"> {{ $product->name }} </h6>
                            <!-- Trường hợp có khuyến mãi -->
                            @if($product->sale_price > 0)
                                <!-- Giá khuyến mãi -->
                                <div class="text-danger fw-bold">
                                    {{ number_format($product->sale_price, 0, ',', '.') }} đ
                                </div>
                                <!-- Giá bán -->
                                <div class="d-flex align-items-center gap-2">
                                    <div class="text-muted small text-decoration-line-through">
                                        {{ number_format($product->price, 0, ',', '.') }} đ
                                    </div>
                                    <div class="badge border border-danger text-danger fw-bold">
                                        -{{ round((($product->price - $product->sale_price) / $product->price) * 100) }}%
                                    </div>
                                </div>
                            @else
                                <!-- không có khuyến mãi -->
                                <div class="text-danger fw-bold fs-2 mb-3">
                                    {{ number_format($product->price, 0, ',', '.') }} đ
                                </div>
                            @endif

                        </div>
                    </a>

                    <div class="card-footer p-2 border-0 bg-transparent text-center">
                        <a class="btn btn-outline-primary btn-sm w-100">
                            Thêm vào giỏ hàng
                        </a>
                        <div class="d-flex align-items-center mt-2 mb-1">
                            <span class="text-warning me-2">
                                <span class="fw-semibold small">0.0</span>
                                <i class="bi bi-star-fill"></i>
                            </span>
                            <span class="text-muted small">(0 đánh giá)</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>