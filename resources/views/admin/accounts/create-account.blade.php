@extends('admin.layouts.app')
@section('web-title', 'MTShop - Thêm mới tài khoản')
@section('header-title', 'Thêm mới tài khoản')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if(session("error"))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="autoDismiss">
                    {{ session("danger") }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card stretch stretch-full">
                <div class="card-body p-0">
                    <form action="{{ route("admin.accounts.store") }}" method="POST" class="p-3"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="row g-3">

                            <!-- Ảnh đại diện -->
                            <div class="col-12 text-center mb-3">
                                <label class="form-label d-block">Ảnh đại diện</label>

                                <img id="avatarPreview" src="{{ asset('assets/images/avatar/blank_user.png') }}"
                                    class="rounded-circle" width="120" height="120"
                                    style="object-fit: cover; border: 2px solid #ddd; cursor: pointer;">
                                <input type="file" id="avatar" name="avatar" accept="image/*" style="display: none;">
                            </div>

                            <div class="col-md-6">
                                <label for="username" class="form-label">
                                    Tên người dùng <span class="text-danger">*</span>
                                </label>

                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    id="username" name="username" value="{{ old('username') }}"
                                    placeholder="Nhập tên người dùng">

                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">
                                    Email <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" value="{{ old('email') }}" placeholder="Nhập email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="phone" class="form-label">
                                    Số điện thoại <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                    name="phone" value="{{ old('phone') }}" placeholder="Nhập số điện thoại">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="password" class="form-label">
                                    Mật khẩu <span class="text-danger">*</span>
                                </label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" value="{{ old('password') }}" placeholder="Nhập mật khẩu">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <textarea class="form-control" id="address" name="address" rows="3"
                                    placeholder="Nhập địa chỉ"></textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="role" class="form-label">
                                    Chức vụ <span class="text-danger">*</span>
                                </label>
                                <select class="form-select @error('role') is-invalid @enderror" id="role" name="role">
                                    <option value="">-- Chọn chức vụ --</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}> Admin </option>
                                    <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}> Nhân viên </option>
                                    <option value="customer" {{ old('role') == 'customer' ? 'selected' : '' }}> Khách hàng
                                    </option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">
                                Thêm mới tài khoản
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset("assets/js/admin/preview-account-image.js") }}"></script>
    <script>
        // Tự động ẩn alert sau 5 giây
        setTimeout(function () {
            const alert = document.getElementById('autoDismiss');
            if (alert) {
                alert.style.transition = "opacity 0.5s ease";
                alert.style.opacity = "0";
                setTimeout(() => alert.remove(), 500);
            }
        }, 5000);
    </script>
@endsection