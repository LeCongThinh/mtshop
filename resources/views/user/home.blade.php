<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MTShop - Chuyên cung cấp các dòng máy tính, laptop</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset("assets/images/laptopshop.png") }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset("user-assets/css/styles.css") }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset("user-assets/css/app.css") }}">
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Header-->
    @include("user.layouts.header")

    <main class="flex-fill">
        <!-- Section slider banner-->
        @include("user.layouts.slider")

        <!-- Section sản phẩm bán chạy-->
        <section class="py-4" style="background-color:#e9ecef;">
            <div class="container">
                <!-- Sản phẩm mới -->
                @include("user.product.new-product")
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
                <div class="bg-white p-4 rounded shadow-sm mb-3">
                    <!-- Màn hình bán chạy -->
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
                <div class="bg-white p-4 rounded shadow-sm mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4>Tin công nghệ</h4><a href="#" class="text-primary fst-italic text-decoration-none">Xem tất
                            cả
                            →</a>
                    </div>
                    <div class="product-scroll d-flex">
                        <div class="product-item">
                            <div class="card product-card border">
                                <div class="position-relative">
                                    <img class="card-img-top p-2" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                        style="height:180px; object-fit:cover;" alt="">
                                </div>
                                <div class="card-body p-3 text-center">
                                    <a href="#" class="mb-2 text-decoration-none">Fancy Product</a>
                                </div>
                            </div>

                        </div>
                        <div class="product-item">
                            <div class="card product-card border">
                                <div class="position-relative">
                                    <img class="card-img-top p-2" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                        style="height:180px; object-fit:cover;" alt="">
                                </div>
                                <div class="card-body p-3 text-center">
                                    <a href="#" class="mb-2 text-decoration-none">Fancy Product</a>
                                </div>
                            </div>

                        </div>
                        <div class="product-item">
                            <div class="card product-card border">
                                <div class="position-relative">
                                    <img class="card-img-top p-2" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                        style="height:180px; object-fit:cover;" alt="">
                                </div>
                                <div class="card-body p-3 text-center">
                                    <a href="#" class="mb-2 text-decoration-none">Fancy Product</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; MTShop 2026</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset("user-assets/js/scripts.js") }}"></script>
</body>

</html>