<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route("home.index") }}"><img
                src="{{ asset("assets/images/icon-laptopshop.png") }}" alt="" width="30" height="30">MTShop</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Danh mục</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- Load danh mục sản phẩm -->
                        @foreach ($categories as $category)
                            <li class="dropdown-submenu position-relative">
                                <a class="dropdown-item dropdown-toggle"
                                    href="{{ route('category.product', $category->slug) }}">
                                    {{ $category->name }}
                                </a>
                                <!-- Ktra danh mục cha có thẻ con thì mới có thẻ ul -->
                                @if($category->children->isNotEmpty())
                                    <ul class="dropdown-menu">
                                        @foreach ($category->children as $child)
                                            <li><a class="dropdown-item"
                                                    href="{{ route("subcategory.product", $child->slug) }}">{{ $child->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <!-- Tìm kiếm-->
            <form action="{{ route('products.search') }}" method="GET" class="d-flex flex-grow-1 justify-content-center my-3 my-lg-0 px-lg-5 position-relative">
                <div class="position-relative w-100" style="max-width:500px;">
                    <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>

                    <input class="form-control ps-5" type="search" id="search-input" name="keyword"
                        placeholder="Bạn cần tìm gì..." autocomplete="off" value="{{ request('keyword') }}">

                    <!-- Vùng hiển thị kết quả tìm kiếm -->
                    <div id="search-results" class="position-absolute bg-white w-100 shadow-sm rounded-bottom d-none"
                        style="z-index: 1050; top: 100%; max-height: 400px; overflow-y: auto;">
                    </div>
                </div>
            </form>
            <div class="d-flex align-items-center gap-2">
                {{-- Nút giỏ hàng --}}
                <a href="{{ route('cart.index') }}" class="btn cart-btn-mini">
                    <div class="cart-icon-wrapper">
                        <i class="bi bi-cart3"></i>
                        <span class="cart-badge" id="cart-count">
                            {{ app(\App\Services\CartService::class)->count() }}
                        </span>
                    </div>
                </a>
                {{-- Đăng nhập --}}
                @auth
                    <div class="dropdown">
                        <a href="#" class="auth-btn-modern dropdown-toggle" data-bs-toggle="dropdown">
                            <div class="auth-icon-wrapper">
                                <i class="bi bi-person-check-fill"></i>
                            </div>
                            <span class="auth-text">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Hồ sơ cá nhân</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Đăng xuất</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="#" class="auth-btn-modern" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <div class="auth-icon-wrapper">
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <span class="auth-text">Đăng nhập</span>
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
@include("user.auth.login")
<style>
    .search-item:hover {
        background-color: #f8f9fa;
    }

    #search-results::-webkit-scrollbar {
        width: 5px;
    }

    #search-results::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 10px;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('search-input');
        const searchResults = document.getElementById('search-results');

        searchInput.addEventListener('input', function () {
            let keyword = this.value;

            if (keyword.length < 2) {
                searchResults.classList.add('d-none');
                return;
            }
            const storageUrl = "{{ asset('storage') }}";
            fetch(`/api/search-products?keyword=${keyword}`)
                .then(response => response.json())
                .then(data => {
                    let html = '';
                    if (data.length > 0) {
                        data.forEach(product => {
                            html += `
                            <a href="/products/${product.slug}" class="d-flex align-items-center p-2 text-decoration-none border-bottom search-item">
                                <img src="${storageUrl}/${product.thumbnail}" style="width: 50px; height: 50px; object-fit: cover;" class="me-3 rounded">
                                <div>
                                    <div class="text-dark fw-bold small">${product.name}</div>
                                    <div class="text-danger small">${new Intl.NumberFormat('vi-VN').format(product.price)}đ</div>
                                </div>
                            </a>
                        `;
                        });
                        searchResults.innerHTML = html;
                        searchResults.classList.remove('d-none');
                    } else {
                        searchResults.innerHTML = '<div class="p-3 text-muted small">Không tìm thấy sản phẩm...</div>';
                        searchResults.classList.remove('d-none');
                    }
                });
        });

        // Đóng kết quả khi click ra ngoài
        document.addEventListener('click', function (e) {
            if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
                searchResults.classList.add('d-none');
            }
        });
    });
</script>