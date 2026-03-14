@extends('admin.layouts.app')
@section('web-title', 'MTShop - Cập nhật sản phẩm')
@section('header-title', 'Cập nhật sản phẩm')
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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route("admin.products.update", $product->id) }}" method="POST" class="p-3"
                enctype="multipart/form-data" novalidate>
                @csrf
                @method("PUT")
                <div class="card stretch stretch-full mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Thông tin sản phẩm</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Ảnh sản phẩm <span class="text-danger">*</span></label>
                                <div class="thumbnail-upload-wrapper border rounded p-3 text-center bg-light">
                                    <div class="position-relative d-inline-block">
                                        <img id="thumbPreview" src="{{ asset('storage/' . $product->thumbnail) }}"
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

                            <div class="col-md-8">
                                <label class="form-label fw-bold">Danh sách ảnh sản phẩm</label>
                                <div class="upload-gallery-container border rounded p-3 bg-light"
                                    style="min-height: 315px;">
                                    <button type="button" class="btn btn-outline-primary mb-3 btn-upload-custom"
                                        onclick="document.getElementById('galleryInput').click()">
                                        <i class="bi bi-plus-circle "></i> Thêm ảnh mới
                                    </button>
                                    <input type="file" name="gallery[]" id="galleryInput" accept="image/*" multiple
                                        class="d-none">
                                    <div id="galleryPreview" class="d-flex flex-wrap gap-3">
                                        {{--LOAD ẢNH ĐÃ CÓ TRONG DATABASE--}}
                                        @if($product->images->count() > 0)
                                            @foreach($product->images as $img)
                                                <div class="position-relative existing-image" style="width: 100px;"
                                                    id="old-img-{{ $img->id }}">
                                                    <img src="{{ asset('storage/' . $img->image) }}"
                                                        class="rounded border shadow-sm"
                                                        style="width: 100px; height: 100px; object-fit: cover;">

                                                    {{-- Nút xóa ảnh cũ --}}
                                                    <input type="checkbox" name="delete_images[]" value="{{ $img->id }}"
                                                        class="d-none" id="delete-{{ $img->id }}">
                                                    <span
                                                        class="remove-btn position-absolute top-0 end-0 bg-danger text-white rounded-circle px-1"
                                                        style="cursor:pointer; font-size: 12px; line-height: 1;"
                                                        onclick="markForDelete({{ $img->id }})">&times;
                                                    </span>
                                                </div>
                                            @endforeach
                                        @endif
                                        {{-- THÔNG BÁO TRỐNG (Chỉ hiện khi không có ảnh nào) --}}
                                        <div id="emptyMessage"
                                            class="w-100 text-center py-5 border dashed rounded {{ $product->images->count() > 0 ? 'd-none' : '' }}">
                                            <p class="text-muted mb-0">Chưa có ảnh nào trong bộ sưu tập.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="name" class="form-label">
                                    Tên sản phẩm <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                    class="form-control @if($errors->has('name') || $errors->has('slug')) is-invalid @endif"
                                    id="name" name="name" value="{{ old('name', $product->name) }}"
                                    placeholder="Nhập tên sản phẩm">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Chọn danh mục -->
                            <div class="col-md-6 mb-3">
                                <label for="category_id" class="form-label">Thuộc danh mục <span
                                        class="text-danger">*</span></label>
                                <select class="form-select @error('category_id') is-invalid @enderror" id="category_id"
                                    name="category_id" data-select2-selector="default">
                                    <option value="">Chọn danh mục</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Chọn hãng sản xuất -->
                            <div class="col-md-6 mb-3">
                                <label for="brand_id" class="form-label">Hãng sản xuất <span
                                        class="text-danger">*</span></label>
                                <select class="form-select @error('brand_id') is-invalid @enderror" id="brand_id"
                                    name="brand_id" data-select2-selector="default">
                                    <option value="">Chọn hãng sản xuất</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="price" class="form-label">
                                    Giá bán <span class="text-danger">*</span>
                                </label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                                    value="{{ old('price', $product->price) }}" placeholder="Nhập giá bán" step="1" min="1">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="sale_price" class="form-label">
                                    Giá khuyến mãi
                                </label>
                                <input type="number" class="form-control @error('sale_price') is-invalid @enderror"
                                    name="sale_price" value="{{ old('sale_price', $product->sale_price) }}"
                                    placeholder="Nhập giá khuyến mãi" step="1" min="1">
                                @error('sale_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="stock" class="form-label">
                                    Số lượng sản phẩm <span class="text-danger">*</span>
                                </label>
                                <input type="number" class="form-control qty @error('stock') is-invalid @enderror"
                                    name="stock" value="{{ old('stock', $product->stock) }}"
                                    placeholder="Nhập số lượng sản phẩm" step="1" min="1">
                                @error('stock')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="description" class="form-label">Mô tả sản phẩm</label>
                                <textarea class="form-control" id="description" name="description" rows="3"
                                    placeholder="Nhập mô tả sản phẩm">{{ $product->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card stretch stretch-full mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Thông số kỹ thuật</h5>
                        <button type="button" class="btn btn-outline-dark btn-add-spec-custom" id="add-spec">
                            <i class="bi bi-plus-lg me-2"></i>
                            <span>Thêm dòng mới</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="specs-list">
                            @forelse($product->specs as $spec)
                                <div class="row g-3 mb-3 spec-item">
                                    <div class="col-md-4">
                                        <input type="text" name="spec_name[]" class="form-control"
                                            value="{{ old('spec_name.' . $loop->index, $spec->spec_key) }}"
                                            placeholder="Tên: CPU, RAM, Pin...">
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" name="spec_value[]" class="form-control"
                                            value="{{ old('spec_value.' . $loop->index, $spec->spec_value) }}"
                                            placeholder="Giá trị: Core i7, 16GB...">
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-outline-danger w-100 remove-spec">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            @empty
                                {{-- Dòng mặc định nếu sản phẩm chưa có thông số nào --}}
                                <div class="row g-3 mb-3 spec-item">
                                    <div class="col-md-4">
                                        <input type="text" name="spec_name[]" class="form-control"
                                            placeholder="Tên: CPU, RAM, Pin...">
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" name="spec_value[]" class="form-control"
                                            placeholder="Giá trị: Core i7, 16GB...">
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-outline-danger w-100 remove-spec">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mb-5">
                    <button type="submit" class="btn btn-primary px-5">Lưu sản phẩm</button>
                    <a href="{{ route("admin.products") }}" class="btn btn-md bg-soft-danger text-danger">Hủy bỏ</a>
                </div>
            </form>
        </div>
    </div>
    <!-- Nhúng ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <!-- product editor description -->
    <script src="{{ asset('assets/js/admin/product-editor.js') }}"></script>
    <!-- preview product image -->
    <script src="{{ asset("assets/js/admin/preview-product-images.js") }}"></script>
    <!-- Thêm xóa các dòng product specs -->
    <!-- <script src="{{ asset("assets/js/admin/add-product-specs.js") }}"></script> -->

    <!-- Xóa ảnh cũ trong danh sách ảnh -->
    <!-- khi nhấn vào nút x của ảnh cũ, nó sẽ ẩn ảnh đó đi và tích vào cái checkbox delete_images[] để server xóa. -->
    <script>
        function markForDelete(id) {
            if (confirm('Bạn có chắc muốn xóa ảnh này không?')) {
                document.getElementById('delete-' + id).checked = true;
                document.getElementById('old-img-' + id).classList.add('d-none');
                checkAllEmpty();
            }
        }
        function checkAllEmpty() {
            const galleryPreview = document.getElementById('galleryPreview');
            const visibleImages = galleryPreview.querySelectorAll('.position-relative:not(.d-none)').length;
            const emptyMessage = document.getElementById('emptyMessage');
            if (visibleImages === 0) {
                emptyMessage.classList.remove('d-none');
            }
        }
    </script>

    <script src="{{ asset("assets/js/admin/handle-old-spec.js") }}"></script>
@endsection