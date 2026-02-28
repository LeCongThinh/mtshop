@extends('admin.layouts.app')
@section('web-title', 'MTShop - Cập nhật tài khoản')
@section('header-title', 'Cập nhật tài khoản')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if(session("error"))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="autoDismiss">
                    {{ session("error") }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card stretch stretch-full">
                <div class="card-body p-0">
                    <form action="{{ route('admin.accounts.update', $user->id) }}" method="POST" class="p-3"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="row g-3">

                            <div class="col-12 text-center mb-3">
                                <label class="form-label d-block">Ảnh đại diện</label>
                                <img id="avatarPreview"
                                    src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('assets/images/avatar/blank_user.png') }}"
                                    class="rounded-circle" width="120" height="120"
                                    style="object-fit: cover; border: 2px solid #ddd; cursor: pointer;">
                                <input type="file" id="avatar" name="avatar" accept="image/*" style="display: none;">
                            </div>

                            <div class="col-md-6">
                                <label for="username" class="form-label @error('username') is-invalid @enderror">
                                    Tên người dùng <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="username" name="username"
                                    value="{{ old('username', $user->name) }}" placeholder="Nhập tên người dùng">
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
                                    name="email" value="{{ old('email', $user->email) }}" placeholder="Nhập email">
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
                                    name="phone" value="{{ old('phone', $user->phone) }}" placeholder="Nhập số điện thoại">
                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="password" class="form-label">
                                    Mật khẩu <span class="text-danger">*</span>
                                </label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" value="{{ old('password') }}" placeholder="Nhập mật khẩu">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <textarea class="form-control" id="address" name="address" rows="3"
                                    placeholder="Nhập địa chỉ">{{ old('address', $user->address) }}</textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="role" class="form-label">
                                    Chức vụ <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" id="role" name="role">
                                    <option value="">-- Chọn chức vụ --</option>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}> Admin </option>
                                    <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}> Nhân viên </option>
                                    <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}> Khách hàng
                                    </option>
                                </select>

                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    Lưu thay đổi
                                </button>

                                <a href="{{ route('admin.accounts') }}" class="btn btn-danger">
                                    Hủy
                                </a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const avatarInput = document.getElementById('avatar');
        const avatarPreview = document.getElementById('avatarPreview');

        // Click vào ảnh → mở chọn file
        avatarPreview.addEventListener('click', function () {
            avatarInput.click();
        });

        // Preview ảnh
        avatarInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    avatarPreview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection