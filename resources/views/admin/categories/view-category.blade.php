@extends('admin.layouts.app')
@section('web-title', 'MTShop - Danh sách danh mục & hãng sản xuất')
@section('header-title', 'Danh sách danh mục & hãng sản xuất')
@section('content')
    <div class="row">
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
        <!-- Danh mục -->
        <div class="col-xxl-7">
            <div class="card stretch stretch-full">
                <div class="card-header">
                    <h5 class="card-title">Danh sách danh mục</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="customerList">
                            <thead>
                                <tr>
                                    <th>Tên danh mục</th>
                                    <th>Slug</th>
                                    <th>Thuộc danh mục</th>
                                    <th class="text-end">Trạng thái</th>
                                    <th class="text-end">Hoạt động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cate as $categories)
                                    <tr>
                                        <td>
                                            <div class="hstack gap-3">
                                                <a href="javascript:void(0);" class="d-block">{{ $categories->name }}</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="hstack gap-3">
                                                <a href="javascript:void(0);" class="d-block">{{ $categories->slug }}</a>
                                            </div>
                                        </td>
                                        <td>
                                            <!-- Truy cập vào tên danh mục cha thông qua quan hệ parent() với danh mục con -->
                                            @if($categories->parent_id && $categories->parent)
                                                <b class="badge bg-soft-primary text-primary fs-status">{{ $categories->parent->name }}</b>
                                            @else
                                                <b class="badge bg-soft-warning text-warning fs-status">Danh mục chính</b>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <span
                                                class="{{ $categories->status_label['class'] }} fs-status">{{ $categories->status_label['text'] }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="hstack gap-2 justify-content-end">
                                                @if($categories->trashed())
                                                    <form action="{{ route("admin.categories.restore", $categories->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method("PATCH")
                                                        <button type="submit" class="avatar-text avatar-md" data-bs-toggle="tooltip"
                                                            title="Khôi phục">
                                                            <i class="feather feather-rotate-ccw"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <a href="{{ route("admin.categories.edit", $categories->id) }}"
                                                        class="avatar-text avatar-md" data-bs-toggle="tooltip" title="Cập nhật">
                                                        <i class="feather feather-edit-3"></i>
                                                    </a>
                                                    <form action="{{ route('admin.categories.destroy', $categories->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button type="submit" class="avatar-text avatar-md" data-bs-toggle="tooltip"
                                                            title="Xóa">
                                                            <i class="feather feather-trash-2"></i>
                                                        </button>
                                                    </form>
                                                @endif
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
        <!-- Hãng sản xuẩt -->
        <div class="col-xxl-5">
            <div class="card stretch stretch-full">
                <div class="card-header">
                    <h5 class="card-title">Danh sách hãng sản xuất</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="paymentList">
                            <thead>
                                <tr>
                                    <th>Tên hãng</th>
                                    <th>Slug</th>
                                    <th class="text-end">Trạng thái</th>
                                    <th class="text-end">Hoạt động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($br as $brands)
                                    <tr>
                                        <td>
                                            <div class="hstack gap-3">
                                                <a href="javascript:void(0);" class="d-block">{{ $brands->name }}</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="hstack gap-3">
                                                <a href="javascript:void(0);" class="d-block">{{ $brands->slug }}</a>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <span class="{{ $brands->status_label['class'] }} fs-status">
                                                {{ $brands->status_label['text'] }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="hstack gap-2 justify-content-end">
                                                @if($brands->trashed())
                                                    <form action="{{ route("admin.brands.restore", $brands->id) }}" method="post">
                                                        @csrf
                                                        @method("PATCH")
                                                        <button type="submit" class="avatar-text avatar-md" data-bs-toggle="tooltip"
                                                            title="Khôi phục">
                                                            <i class="feather feather-rotate-ccw"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <a href="{{ route("admin.brands.edit", $brands->id) }}"
                                                        class="avatar-text avatar-md" data-bs-toggle="tooltip" title="Cập nhật">
                                                        <i class="feather feather-edit-3"></i>
                                                    </a>
                                                    <form action="{{ route("admin.brands.destroy", $brands->id) }}" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button type="submit" class="avatar-text avatar-md" data-bs-toggle="tooltip"
                                                            title="Xóa">
                                                            <i class="feather feather-trash-2"></i>
                                                        </button>
                                                    </form>
                                                @endif
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