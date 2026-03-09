@extends('admin.layouts.app')
@section('web-title', 'MTShop - Cập nhật hãng sản xuất')
@section('header-title', 'Cập nhật hãng sản xuất')
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
                    <h5>Cập nhật hãng sãn xuất</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route("admin.brands.update", $brands->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="form-label">Tên hãng <span class="text-danger">*</span></label>
                            <input type="text" name="brandName" value="{{ old('brandName', $brands->name) }}"
                                class="form-control @error('brandName') is-invalid @enderror" placeholder="Nhập tên hãng...">
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