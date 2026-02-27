@extends('admin.layouts.app')
@section('web-title', 'MTShop - Thêm mới tài khoản')
@section('header-title', 'Thêm mới tài khoản')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card stretch stretch-full">
                <div class="card-body p-0">
                    <form action="" method="POST" class="p-3" enctype="multipart/form-data">
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
                                <label for="username" class="form-label">Tên người dùng <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Nhập tên người dùng">
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">
                                    Email <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email">
                            </div>

                            <div class="col-md-6">
                                <label for="phone" class="form-label">
                                    Số điện thoại <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="Nhập số điện thoại">
                            </div>

                            <div class="col-md-6">
                                <label for="password" class="form-label">
                                    Mật khẩu <span class="text-danger">*</span>
                                </label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Nhập mật khẩu">
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
                                <select class="form-select" id="role" name="role">
                                    <option value="">-- Chọn chức vụ --</option>
                                    <option value="admin">Admin</option>
                                    <option value="staff">Nhân viên</option>
                                    <option value="customer">Khách hàng</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">
                                Thêm mới tài khoản
                            </button>

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