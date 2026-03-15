@extends('admin.layouts.app')
@section('web-title', 'MTShop - Danh sách bài viết')
@section('header-title', 'Danh sách bài viết')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!-- Thông báo lỗi -->
            @if(session('success'))
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        showAlert("mainAlert", "{{ session('success') }}", "success");
                    });
                </script>
            @endif
            @if(session('error'))
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        showAlert("mainAlert", "{{ session('error') }}", "danger");
                    });
                </script>
            @endif
            <div class="card stretch stretch-full">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover" id="customerList">
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tiêu đề bài viết</th>
                                    <th>Slug</th>
                                    <th>Nội dung</th>
                                    <th>Ngày đăng bài</th>
                                    <th>Tác giả</th>
                                    <th>Trạng thái</th>
                                    <th class="text-end">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr class="single-item">
                                        <td class="align-middle text-center">
                                            <img src="{{ asset("storage/" . $post->thumbnail) }}" alt=""
                                                class="table-img-thumb">
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="hstack gap-3">
                                                <div>
                                                    <span class="text-truncate-1-line">{{ $post->title }}</span>
                                                </div>
                                            </a>
                                        </td>

                                        <td>
                                            <a href="javascript:void(0)" title="{{ $post->slug }}">
                                                {{ Str::limit($post->slug, 30, '...') }}
                                            </a>
                                        </td>

                                        <td>
                                            <a href="javascript:void(0)">
                                                {{ Str::limit(strip_tags($post->content), 50, '...') }}
                                            </a>
                                        </td>

                                        <td><a href="javascript:void(0)">{{ $post->created_at->format('d/m/Y') }}</a></td>

                                        <td><a href="javascript:void(0)">{{ $post->user->name }}</a></td>

                                        <td>
                                            <div class="{{ $post->status_label['class'] }} fs-status">
                                                {{ $post->status_label['text'] }}
                                            </div>
                                        </td>

                                        <td>
                                            <div class="hstack gap-2 justify-content-end">
                                                <a href="javascript:void(0)" class="avatar-text avatar-md btn-show-product">
                                                    <i class="feather feather-eye"></i>
                                                </a>

                                                <div class="dropdown">
                                                    <a href="javascript:void(0)" class="avatar-text avatar-md"
                                                        data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                        <i class="feather feather-more-horizontal"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        @if($post->trashed())
                                                            <form action="#" method="post">
                                                                @csrf
                                                                @method("PATCH")
                                                                <button type="submit"
                                                                    class="dropdown-item text-success border-0 bg-transparent">
                                                                    <i class="feather feather-rotate-ccw me-3"></i>
                                                                    <span>Khôi phục</span>
                                                                </button>
                                                            </form>
                                                        @else
                                                            <li>
                                                                <a class="dropdown-item" href="#">
                                                                    <i class="feather feather-edit-3 me-3"></i>
                                                                    <span>Cập nhật</span>
                                                                </a>
                                                            </li>
                                                            <li class="dropdown-divider"></li>
                                                            <li>
                                                                <form action="#" method="post">
                                                                    @csrf
                                                                    @method("DELETE")
                                                                    <button type="submit"
                                                                        class="dropdown-item text-danger border-0 bg-transparent">
                                                                        <i class="feather feather-trash-2 me-3"></i>
                                                                        <span>Xóa</span>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection