@extends('admin.layouts.app')
@section('web-title', 'MTShop - Cập nhật danh mục')
@section('header-title', 'Cập nhật danh mục')
@section('content')
    <div class="row">
        <!-- Cập nhật danh mục -->
        <div class="col-xl-6">
            <div class="card stretch stretch-full">
                <!-- Thông báo lỗi -->
                @if(session('error'))
                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            showAlert("mainAlert", "{{ session('error') }}", "danger");
                        });
                    </script>
                @endif
                <div class="card-header">
                    <h5>Cập nhật danh mục</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route("admin.categories.update", $categories->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="form-label">Tên danh mục <span class="text-danger">*</span></label>
                            <input type="text" name="categoryName"
                                class="form-control @error('categoryName') is-invalid @enderror"
                                value="{{ old("categoryName", $categories->name) }}" placeholder="Nhập tên danh mục...">
                            @error("categoryName")
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Thuộc danh mục</label>
                            <select name="parent_id" class="form-select @error('parent_id') is-invalid @enderror"
                                data-select2-selector="default">
                                <option value="">-- Nếu là danh mục chính thì không cần chọn --</option>
                                @foreach($parent_cate as $category)
                                    <!-- giai thich lai -->
                                    <option value="{{ $category->id }}" {{ old('parent_id', $categories->parent_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('parent_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                Lưu thay đổi
                            </button>
                            <a href="{{ route('admin.categories') }}" class="btn btn-danger">
                                Hủy
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection