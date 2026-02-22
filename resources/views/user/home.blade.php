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
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route("home.index") }}"><img
                    src="{{ asset("assets/images/icon-laptopshop.png") }}" alt="" width="30" height="30">MTShop</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Danh mục</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <li class="dropdown-submenu position-relative">
                                <a class="dropdown-item dropdown-toggle" href="#">
                                    Laptop
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Dell</a></li>
                                    <li><a class="dropdown-item" href="#">HP</a></li>
                                    <li><a class="dropdown-item" href="#">Lenovo</a></li>
                                </ul>
                            </li>

                            <li class="dropdown-submenu position-relative">
                                <a class="dropdown-item dropdown-toggle" href="#!">PC</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">PC văn phòng</a></li>
                                    <li><a class="dropdown-item" href="#">PC đồ họa</a></li>
                                    <li><a class="dropdown-item" href="#">PC gamming</a></li>
                                </ul>
                            </li>

                            <li class="dropdown-submenu position-relative">
                                <a class="dropdown-item dropdown-toggle" href="#!">Màn
                                    hình</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Dell</a></li>
                                    <li><a class="dropdown-item" href="#">E-dra</a></li>
                                    <li><a class="dropdown-item" href="#">LG</a></li>
                                    <li><a class="dropdown-item" href="#">Acer</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                </ul>
                <!-- Tìm kiếm-->
                <form class="d-flex flex-grow-1 justify-content-center my-3 my-lg-0 px-lg-5">
                    <div class="position-relative w-100" style="max-width:500px;">
                        <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                        <input class="form-control ps-5" type="search" name="keyword" placeholder="Bạn cần tìm gì...">
                    </div>
                </form>
                <div class="d-flex align-items-center gap-2">

                    <!-- Giỏ hàng-->
                    <button class="btn btn-outline-danger">
                        <i class="bi bi-cart-fill me-1"></i>
                        Giỏ hàng
                        <span class="badge bg-danger text-white ms-1 rounded-pill">0</span>
                    </button>

                    <!-- Đăng nhập-->
                    <a href="#" class="btn btn-outline-primary">
                        <i class="bi bi-person"></i> Đăng nhập
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <main class="flex-fill">

        <!-- Section slider banner-->
        <section class="py-4" style="background-color:#e9ecef;">
            <div class="container">
                <div class="bg-white rounded shadow-sm overflow-hidden">
                    <div id="headerSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000"
                        data-bs-touch="true" data-bs-pause="false">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#headerSlider" data-bs-slide-to="0"
                                class="active"></button>
                            <button type="button" data-bs-target="#headerSlider" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#headerSlider" data-bs-slide-to="2"></button>
                            <button type="button" data-bs-target="#headerSlider" data-bs-slide-to="3"></button>
                            <button type="button" data-bs-target="#headerSlider" data-bs-slide-to="4"></button>

                        </div>
                        <div class="carousel-inner rounded">

                            <!-- Slide 1 -->
                            <div class="carousel-item active">
                                <img src="{{ asset("user-assets/banner/banner1.png") }}" class="d-block w-100">
                            </div>

                            <!-- Slide 2 -->
                            <div class="carousel-item">
                                <img src="{{ asset("user-assets/banner/banner2.png") }}" class="d-block w-100">
                            </div>

                            <!-- Slide 3 -->
                            <div class="carousel-item">
                                <img src="{{ asset("user-assets/banner/banner3.png") }}" class="d-block w-100">
                            </div>

                            <!-- Slide 4 -->
                            <div class="carousel-item">
                                <img src="{{ asset("user-assets/banner/banner4.png") }}" class="d-block w-100">
                            </div>

                            <!-- Slide 5 -->
                            <div class="carousel-item">
                                <img src="{{ asset("user-assets/banner/banner5.png") }}" class="d-block w-100">
                            </div>
                        </div>
                        <!-- Nút Previous -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#headerSlider"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>

                        <!-- Nút Next -->
                        <button class="carousel-control-next" type="button" data-bs-target="#headerSlider"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section-->
        <section class="py-4" style="background-color:#e9ecef;">
            <div class="container">

                <div class="bg-white p-4 rounded shadow-sm mb-3">
                    <!-- PC bán chạy -->
                    <!-- <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-3"> -->
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

                <div class="bg-white p-4 rounded shadow-sm mb-3">
                    <!-- Laptop gamming bán chạy -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4>Laptop gamming bán chạy</h4>
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
                    <!-- Laptop văn phòng bán chạy -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4>Laptop văn phòng bán chạy</h4>

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
    <script src="{{ asset("") }}js/scripts.js"></script>
</body>

</html>