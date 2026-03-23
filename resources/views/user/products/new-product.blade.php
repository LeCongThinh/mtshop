<div class="bg-white p-4 rounded shadow-sm mb-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Sản phẩm mới</h4>
        <a href="{{ route('all-products') }}" class="text-primary fst-italic text-decoration-none">Xem tất cả →</a>
    </div>
    <div class="product-scroll d-flex">
        @foreach ($products as $product)
            <div class="product-item">
                <div class="card product-card border h-100 d-flex flex-column">
                    <a href="{{ route('home.product-detail', $product->slug) }}" class="text-decoration-none text-black">
                        <div class="position-relative product-img-container overflow-hidden">
                            <img class="card-img-top p-2 product-img-hover"
                                src="{{ $product->thumbnail ? asset('storage/' . $product->thumbnail) : asset('assets/images/avatar/undefined.png') }}"
                                style="height:180px; object-fit:contain;" alt="{{ $product->name }}">

                            @if($product->sale_price > 0)
                                <span class="position-absolute top-0 start-0 badge bg-danger m-2">Giảm giá</span>
                            @endif
                        </div>
                        <div class="card-body p-3 text-start d-flex flex-column flex-grow-1">
                            <h6 class="fw-bold mb-2"> {{ Str::limit(strip_tags($product->name), 37) }} </h6>
                            <div class="mt-auto mt-3">
                                @if($product->sale_price > 0)
                                    <div class="text-danger fw-bold">
                                        {{ number_format($product->sale_price, 0, ',', '.') }} đ
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="text-muted small text-decoration-line-through">
                                            {{ number_format($product->price, 0, ',', '.') }} đ
                                        </div>
                                        <div class="badge border border-danger text-danger fw-bold">
                                            -{{ round((($product->price - $product->sale_price) / $product->price) * 100) }}%
                                        </div>
                                    </div>
                                @else
                                    <div class="text-danger fw-bold">
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
        @endforeach
    </div>
</div>