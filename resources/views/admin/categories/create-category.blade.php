@extends('admin.layouts.app')
@section('web-title', 'MTShop - Thêm mới danh mục & hãng sản xuất')
@section('header-title', 'Thêm mới danh mục & hãng sản xuất')
@section('content')
    <div class="row">
        <!-- Thêm danh mục -->
        <div class="col-xl-6">
            <div class="card stretch stretch-full">
                <!-- Thông báo thành công/ thất bại -->
                <div id="categoryAlert" class="alert alert-dismissible fade d-none m-3" role="alert">
                    <span class="alert-text"></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="card-header">
                    <h5>Thêm mới danh mục</h5>
                </div>
                <div class="card-body">
                    <form id="categoryForm" action="{{ route("admin.categories.store") }}">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label">Tên danh mục <span class="text-danger">*</span></label>
                            <input type="text" name="categoryName" class="form-control" placeholder="Nhập tên danh mục...">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Thuộc danh mục</label>
                            <select name="parent_id" class="form-select" data-select2-selector="default">
                                <option value="">-- Nếu là danh mục chính thì không cần chọn --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" id="add_row" class="btn btn-md btn-primary">Thêm danh mục</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Thêm hãng sản xuất -->
        <div class="col-xl-6">
            <div class="card stretch stretch-full">
                <!-- Thông báo lỗi -->
                <div id="brandAlert" class="alert alert-dismissible fade d-none m-3" role="alert">
                    <span class="alert-text"></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="card-header">
                    <h5>Thêm mới hãng sãn xuất</h5>
                </div>
                <div class="card-body">
                    <form id="brandForm" action="{{ route("admin.brands.store") }}">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label">Tên hãng <span class="text-danger">*</span></label>
                            <input type="text" name="brandName" class="form-control" placeholder="Nhập tên hãng...">
                        </div>
                        <button type="submit" id="add_row" class="btn btn-md btn-primary">Thêm hãng sản xuất</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Xử lý thêm category bằng ajax -->
    <script src="{{ asset("assets/js/admin/handle-create-category.js") }}"></script>
    <!-- Xử lý thêm brand bằng ajax -->
    <script src="{{ asset("assets/js/admin/handle-create-brand.js") }}"></script>
@endsection