@extends('user.layouts.app')
@section('web-title', 'Tất cả bài viết - MTShop.com')
@section('content')
    <section class="py-4" style="background-color:#e9ecef;">
        <div class="container">
            <!-- Đường dẫn sản phẩm -->
            <ul class="breadcrumb ms-5">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}" class="text-decoration-none fw-semibold">
                        <i class="bi bi-house-door-fill me-1"></i>Trang chủ</a>
                </li>
                <li class="breadcrumb-item ">Tất cả bài viết</li>
            </ul>
            <div class="card border-0 shadow-sm mb-3 rounded-4 overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="border-start border-4 border-primary ps-3 py-1">
                            <h4 class="fw-bolder mb-1 text-dark text-uppercase letter-spacing-1">
                                Tin tức công nghệ mới nhất
                            </h4>
                            <p class="text-muted mb-0 small fw-medium">
                                Cập nhật những thông tin và thủ thuật mới nhất hàng ngày
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($posts as $item)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100 border-0 shadow-sm hover-up transition">
                            <a href="{{ route('home.news-detail', $item->slug) }}" class="overflow-hidden rounded-top">
                                <img src="{{ asset('storage/' . $item->thumbnail) }}" class="card-img-top img-fluid"
                                    alt="{{ $item->title }}" style="height: 220px; object-fit: cover;">
                            </a>

                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-2 text-muted small">
                                    <span class="me-3"><i class="bi bi-calendar3 me-1"></i>
                                        {{ $item->created_at->format('d/m/Y') }}</span>
                                    <span><i class="bi bi-person me-1"></i> {{ $item->user->name }}</span>
                                </div>

                                <h5 class="card-title mb-3">
                                    <a href="{{ route('home.news-detail', $item->slug) }}"
                                        class="text-decoration-none text-dark fw-bold line-clamp-2">
                                        {{ $item->title }}
                                    </a>
                                </h5>

                                <p class="card-text text-muted small line-clamp-3">
                                    {{ Str::limit(strip_tags($item->content), 120) }}
                                </p>
                            </div>

                            <div class="card-footer bg-transparent border-0 p-4 pt-0">
                                <a href="{{ route('home.news-detail', $item->slug) }}"
                                    class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                    Đọc tiếp <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Chưa có bài viết nào được đăng.</p>
                    </div>
                @endforelse
                <nav aria-label="Page navigation" class="d-flex justify-content-center mt-5">
                    {{ $posts->links() }}
                </nav>
            </div>
        </div>
    </section>
@endsection