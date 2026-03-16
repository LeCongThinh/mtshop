@extends('admin.layouts.app')
@section('web-title', 'MTShop - Cập nhật bài viết')
@section('header-title', 'Cập nhật bài viết')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if(session('error'))
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        showAlert("mainAlert", "{{ session('error') }}", "danger");
                    });
                </script>
            @endif
            <form action="{{ route("admin.posts.update", $post->id) }}" method="POST" class="p-3"
                enctype="multipart/form-data" novalidate>
                @csrf
                @method("PUT")
                <div class="card stretch stretch-full mb-4">
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-3">
                                <label class="form-label fw-bold">Ảnh bài viết <span class="text-danger">*</span></label>
                                <div class="thumbnail-upload-wrapper border rounded p-3 text-center bg-light">
                                    <div class="position-relative d-inline-block">
                                        <img id="thumbPreview"
                                            src="{{ $post->thumbnail ? asset("storage/" . $post->thumbnail) : asset('assets/images/avatar/undefined.png') }}"
                                            class="rounded border shadow-sm img-thumbnail"
                                            style="width: 100%; max-width: 250px; aspect-ratio: 1/1; object-fit: cover; cursor: pointer;">
                                        <input type="file" id="thumbInput" name="thumbnail" accept="image/*" class="d-none">
                                    </div>
                                    <div class="mt-2 text-muted small">Click vào ảnh để tải lên (Tỷ lệ 1:1)</div>
                                </div>
                                @error('thumbnail')
                                    <div class="text-danger small mt-2 d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-9">
                                <!-- Tiêu đề bài viết -->
                                <label for="title" class="form-label">
                                    Tiêu đề bài viết <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                    class="form-control @if($errors->has('title') || $errors->has('slug')) is-invalid @endif"
                                    id="title" name="title" value="{{ old('title', $post->title) }}" placeholder="Nhập tiêu đề bài viết">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <!-- Nội dung bài viết -->
                                <div class="mt-2">
                                    <label for="content" class="form-label">Nội dung bài viết <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" id="description"
                                        name="content" rows="3" placeholder="Nhập nội dung bài viết">{{ old('content', $post->content) }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mb-5">
                    <button type="submit" class="btn btn-primary px-5">Lưu bài viết</button>
                    <a href="{{ route("admin.posts") }}" class="btn btn-md bg-soft-danger text-danger">Hủy bỏ</a>
                </div>
            </form>
        </div>
    </div>
    <!-- Nhúng ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <!-- post editor content -->
    <script src="{{ asset('assets/js/admin/product-editor.js') }}"></script>
    <!-- preview post image -->
    <script src="{{ asset("assets/js/admin/preview-product-images.js") }}"></script>
@endsection