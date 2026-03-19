@extends('user.layouts.app')
@section('web-title', $post->title . ' - MTShop.com')
@section('content')
    <section class="py-4" style="background-color:#e9ecef;">
        <div class="container">
            <!-- Đường dẫn sản phẩm -->
            <ul class="breadcrumb ms-5">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}" class="text-decoration-none fw-semibold">
                        <i class="bi bi-house-door-fill me-1"></i>Trang chủ</a>
                </li>
                <li class="breadcrumb-item ">Tin công nghệ</li>
                <li class="breadcrumb-item active">{{$post->title}}</li>
            </ul>
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-10">
                    <div class="card stretch stretch-full mb-3 shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mt-3 text-center">
                                    <h4 class="fw-bold mb-2">{{ $post->title }}</h4>

                                </div>
                                <div class="d-flex align-items-center text-muted small mb-4">
                                    <span class="me-3">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        {{ $dayName }}, {{ $post->created_at->format('d/m/Y') }}
                                    </span>
                                    <span class="d-flex align-items-center">
                                        <i class="bi bi-person-fill me-1"></i>
                                        <span class="fw-semibold text-dark">{{ $post->user->name }}</span>
                                    </span>

                                </div>

                                <div class="post-content border-top pt-4">
                                    {!! $post->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection