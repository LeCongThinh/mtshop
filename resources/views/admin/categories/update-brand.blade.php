@extends('admin.layouts.app')
@section('web-title', 'MTShop - Cập nhật loại sản phẩm')
@section('header-title', 'Cập nhật loại sản phẩm')
@section('content')
    <div class="row">
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
                    <h5>Cập nhật loại sản phẩm</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route("admin.brands.update", $brands->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="form-label">Tên loại <span class="text-danger">*</span></label>
                            <input type="text" name="brandName" value="{{ old('brandName', $brands->name) }}"
                                class="form-control @error('brandName') is-invalid @enderror" placeholder="Nhập tên loại sản phẩm...">
                            @error('brandName')
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