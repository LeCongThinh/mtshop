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
                    <div class="product-item">
                        <div class="card product-card border">
                            <div class="position-relative">
                                <img class="card-img-top p-2" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    style="height:180px; object-fit:cover;" alt="">
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                                    -10%
                                </span>
                            </div>
                            <div class="card-body p-3 text-center">
                                <h6 class="fw-bold mb-2">Fancy Product</h6>
                                <div class="text-danger fw-bold">
                                    $40.00
                                </div>
                                <div class="text-muted small text-decoration-line-through">
                                    $50.00
                                </div>
                            </div>
                            <div class="card-footer p-2 border-0 bg-transparent text-center">
                                <a class="btn btn-outline-danger btn-sm w-100">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="card product-card border">
                            <div class="position-relative">
                                <img class="card-img-top p-2" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    style="height:180px; object-fit:cover;" alt="">
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                                    -10%
                                </span>
                            </div>
                            <div class="card-body p-3 text-center">
                                <h6 class="fw-bold mb-2">Fancy Product</h6>
                                <div class="text-danger fw-bold">
                                    $40.00
                                </div>
                                <div class="text-muted small text-decoration-line-through">
                                    $50.00
                                </div>
                            </div>
                            <div class="card-footer p-2 border-0 bg-transparent text-center">
                                <a class="btn btn-outline-danger btn-sm w-100">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="card product-card border">
                            <div class="position-relative">
                                <img class="card-img-top p-2" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    style="height:180px; object-fit:cover;" alt="">
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                                    -10%
                                </span>
                            </div>
                            <div class="card-body p-3 text-center">
                                <h6 class="fw-bold mb-2">Fancy Product</h6>
                                <div class="text-danger fw-bold">
                                    $40.00
                                </div>
                                <div class="text-muted small text-decoration-line-through">
                                    $50.00
                                </div>
                            </div>
                            <div class="card-footer p-2 border-0 bg-transparent text-center">
                                <a class="btn btn-outline-danger btn-sm w-100">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="card product-card border">
                            <div class="position-relative">
                                <img class="card-img-top p-2" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    style="height:180px; object-fit:cover;" alt="">
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                                    -10%
                                </span>
                            </div>
                            <div class="card-body p-3 text-center">
                                <h6 class="fw-bold mb-2">Fancy Product</h6>
                                <div class="text-danger fw-bold">
                                    $40.00
                                </div>
                                <div class="text-muted small text-decoration-line-through">
                                    $50.00
                                </div>
                            </div>
                            <div class="card-footer p-2 border-0 bg-transparent text-center">
                                <a class="btn btn-outline-danger btn-sm w-100">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="card product-card border">
                            <div class="position-relative">
                                <img class="card-img-top p-2" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    style="height:180px; object-fit:cover;" alt="">
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                                    -10%
                                </span>
                            </div>
                            <div class="card-body p-3 text-center">
                                <h6 class="fw-bold mb-2">Fancy Product</h6>
                                <div class="text-danger fw-bold">
                                    $40.00
                                </div>
                                <div class="text-muted small text-decoration-line-through">
                                    $50.00
                                </div>
                            </div>
                            <div class="card-footer p-2 border-0 bg-transparent text-center">
                                <a class="btn btn-outline-danger btn-sm w-100">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="card product-card border">
                            <div class="position-relative">
                                <img class="card-img-top p-2" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    style="height:180px; object-fit:cover;" alt="">
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                                    -10%
                                </span>
                            </div>
                            <div class="card-body p-3 text-center">
                                <h6 class="fw-bold mb-2">Fancy Product</h6>
                                <div class="text-danger fw-bold">
                                    $40.00
                                </div>
                                <div class="text-muted small text-decoration-line-through">
                                    $50.00
                                </div>
                            </div>
                            <div class="card-footer p-2 border-0 bg-transparent text-center">
                                <a class="btn btn-outline-danger btn-sm w-100">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="card product-card border">
                            <div class="position-relative">
                                <img class="card-img-top p-2" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    style="height:180px; object-fit:cover;" alt="">
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                                    -10%
                                </span>
                            </div>
                            <div class="card-body p-3 text-center">
                                <h6 class="fw-bold mb-2">Fancy Product</h6>
                                <div class="text-danger fw-bold">
                                    $40.00
                                </div>
                                <div class="text-muted small text-decoration-line-through">
                                    $50.00
                                </div>
                            </div>
                            <div class="card-footer p-2 border-0 bg-transparent text-center">
                                <a class="btn btn-outline-danger btn-sm w-100">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="card product-card border">
                            <div class="position-relative">
                                <img class="card-img-top p-2" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    style="height:180px; object-fit:cover;" alt="">
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                                    -10%
                                </span>
                            </div>
                            <div class="card-body p-3 text-center">
                                <h6 class="fw-bold mb-2">Fancy Product</h6>
                                <div class="text-danger fw-bold">
                                    $40.00
                                </div>
                                <div class="text-muted small text-decoration-line-through">
                                    $50.00
                                </div>
                            </div>
                            <div class="card-footer p-2 border-0 bg-transparent text-center">
                                <a class="btn btn-outline-danger btn-sm w-100">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
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
                    <div class="product-item">
                        <div class="card product-card border">
                            <div class="position-relative">
                                <img class="card-img-top p-2" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    style="height:180px; object-fit:cover;" alt="">
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                                    -10%
                                </span>
                            </div>
                            <div class="card-body p-3 text-center">
                                <h6 class="fw-bold mb-2">Fancy Product</h6>
                                <div class="text-danger fw-bold">
                                    $40.00
                                </div>
                                <div class="text-muted small text-decoration-line-through">
                                    $50.00
                                </div>
                            </div>
                            <div class="card-footer p-2 border-0 bg-transparent text-center">
                                <a class="btn btn-outline-danger btn-sm w-100">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="card product-card border">
                            <div class="position-relative">
                                <img class="card-img-top p-2" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    style="height:180px; object-fit:cover;" alt="">
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                                    -10%
                                </span>
                            </div>
                            <div class="card-body p-3 text-center">
                                <h6 class="fw-bold mb-2">Fancy Product</h6>
                                <div class="text-danger fw-bold">
                                    $40.00
                                </div>
                                <div class="text-muted small text-decoration-line-through">
                                    $50.00
                                </div>
                            </div>
                            <div class="card-footer p-2 border-0 bg-transparent text-center">
                                <a class="btn btn-outline-danger btn-sm w-100">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="card product-card border">
                            <div class="position-relative">
                                <img class="card-img-top p-2" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    style="height:180px; object-fit:cover;" alt="">
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                                    -10%
                                </span>
                            </div>
                            <div class="card-body p-3 text-center">
                                <h6 class="fw-bold mb-2">Fancy Product</h6>
                                <div class="text-danger fw-bold">
                                    $40.00
                                </div>
                                <div class="text-muted small text-decoration-line-through">
                                    $50.00
                                </div>
                            </div>
                            <div class="card-footer p-2 border-0 bg-transparent text-center">
                                <a class="btn btn-outline-danger btn-sm w-100">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="card product-card border">
                            <div class="position-relative">
                                <img class="card-img-top p-2" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    style="height:180px; object-fit:cover;" alt="">
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                                    -10%
                                </span>
                            </div>
                            <div class="card-body p-3 text-center">
                                <h6 class="fw-bold mb-2">Fancy Product</h6>
                                <div class="text-danger fw-bold">
                                    $40.00
                                </div>
                                <div class="text-muted small text-decoration-line-through">
                                    $50.00
                                </div>
                            </div>
                            <div class="card-footer p-2 border-0 bg-transparent text-center">
                                <a class="btn btn-outline-danger btn-sm w-100">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="card product-card border">
                            <div class="position-relative">
                                <img class="card-img-top p-2" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    style="height:180px; object-fit:cover;" alt="">
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                                    -10%
                                </span>
                            </div>
                            <div class="card-body p-3 text-center">
                                <h6 class="fw-bold mb-2">Fancy Product</h6>
                                <div class="text-danger fw-bold">
                                    $40.00
                                </div>
                                <div class="text-muted small text-decoration-line-through">
                                    $50.00
                                </div>
                            </div>
                            <div class="card-footer p-2 border-0 bg-transparent text-center">
                                <a class="btn btn-outline-danger btn-sm w-100">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
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
                    <div class="product-item">
                        <div class="card product-card border">
                            <div class="position-relative">
                                <img class="card-img-top p-2" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    style="height:180px; object-fit:cover;" alt="">
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                                    -10%
                                </span>
                            </div>
                            <div class="card-body p-3 text-center">
                                <h6 class="fw-bold mb-2">Fancy Product</h6>
                                <div class="text-danger fw-bold">
                                    $40.00
                                </div>
                                <div class="text-muted small text-decoration-line-through">
                                    $50.00
                                </div>
                            </div>
                            <div class="card-footer p-2 border-0 bg-transparent text-center">
                                <a class="btn btn-outline-danger btn-sm w-100">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="card product-card border">
                            <div class="position-relative">
                                <img class="card-img-top p-2" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    style="height:180px; object-fit:cover;" alt="">
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                                    -10%
                                </span>
                            </div>
                            <div class="card-body p-3 text-center">
                                <h6 class="fw-bold mb-2">Fancy Product</h6>
                                <div class="text-danger fw-bold">
                                    $40.00
                                </div>
                                <div class="text-muted small text-decoration-line-through">
                                    $50.00
                                </div>
                            </div>
                            <div class="card-footer p-2 border-0 bg-transparent text-center">
                                <a class="btn btn-outline-danger btn-sm w-100">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="card product-card border">
                            <div class="position-relative">
                                <img class="card-img-top p-2" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    style="height:180px; object-fit:cover;" alt="">
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                                    -10%
                                </span>
                            </div>
                            <div class="card-body p-3 text-center">
                                <h6 class="fw-bold mb-2">Fancy Product</h6>
                                <div class="text-danger fw-bold">
                                    $40.00
                                </div>
                                <div class="text-muted small text-decoration-line-through">
                                    $50.00
                                </div>
                            </div>
                            <div class="card-footer p-2 border-0 bg-transparent text-center">
                                <a class="btn btn-outline-danger btn-sm w-100">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="card product-card border">
                            <div class="position-relative">
                                <img class="card-img-top p-2" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    style="height:180px; object-fit:cover;" alt="">
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                                    -10%
                                </span>
                            </div>
                            <div class="card-body p-3 text-center">
                                <h6 class="fw-bold mb-2">Fancy Product</h6>
                                <div class="text-danger fw-bold">
                                    $40.00
                                </div>
                                <div class="text-muted small text-decoration-line-through">
                                    $50.00
                                </div>
                            </div>
                            <div class="card-footer p-2 border-0 bg-transparent text-center">
                                <a class="btn btn-outline-danger btn-sm w-100">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tin tức công nghệ -->
            @include("user.news.list-news")
        </div>
    </section>
@endsection