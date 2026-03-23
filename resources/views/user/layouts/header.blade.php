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
            <form class="d-flex flex-grow-1 justify-content-center my-3 my-lg-0 px-lg-5">
                <div class="position-relative w-100" style="max-width:500px;">
                    <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                    <input class="form-control ps-5" type="search" name="keyword" placeholder="Bạn cần tìm gì...">
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