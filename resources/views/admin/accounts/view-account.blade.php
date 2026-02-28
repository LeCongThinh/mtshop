@extends('admin.layouts.app')
@section('web-title', 'MTShop - Danh sách tài khoản')
@section('header-title', 'Danh sách tài khoản')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if(session("success"))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="autoDismiss">
                    {{ session("success") }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card stretch stretch-full">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover" id="customerList">
                            <thead>
                                <tr>
                                    <th>Tên người dùng</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Ngày tạo</th>
                                    <th>Chức vụ</th>
                                    <th>Trạng thái</th>
                                    <th class="text-end">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="single-item {{ $user->trashed() ? 'row-disabled' : '' }}">
                                        <td>
                                            <a href="customers-view.html" class="hstack gap-3">
                                                <div>
                                                    <span class="text-truncate-1-line">{{ $user->name }}</span>
                                                </div>
                                            </a>
                                        </td>
                                        <td><a href="apps-email.html">{{ $user->email }}</a></td>
                                        <td><a href="tel:"> {{ $user->phone }}</a></td>
                                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <div class="{{ $user->role_label['class'] }} fs-status">
                                                {{ $user->role_label['text'] }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="{{ $user->status_label['class'] }} fs-status">
                                                {{ $user->status_label['text'] }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="hstack gap-2 justify-content-end">
                                                <a href="#" class="avatar-text avatar-md" data-bs-toggle="offcanvas"
                                                    data-bs-target="#viewUserCanvas" data-name="{{ $user->name }}"
                                                    data-email="{{ $user->email }}"
                                                    data-phone="{{ !empty($user->phone) ? $user->phone : "Chưa cập nhật" }}"
                                                    data-address="{{ !empty($user->address) ? $user->address : "Chưa cập nhật" }}"
                                                    data-avatar="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('storage/avatars/blank_user.png')}}"
                                                    data-role="{{ $user->role_label['text'] }}"
                                                    data-status="{{ $user->status_label['text'] }}"
                                                    data-created="{{ $user->created_at->format('d/m/Y') }}">
                                                    <i class="feather feather-eye"></i>
                                                </a>


                                                <div class="dropdown">
                                                    <a href="javascript:void(0)" class="avatar-text avatar-md"
                                                        data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                        <i class="feather feather-more-horizontal"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <!-- Nếu tài khoản bị xóa -> Hiển thị nút khôi phục. Nếu tài khoản đang hoạt động -> Hiển thị nút cập nhật và xóa -->
                                                        @if($user->trashed())
                                                            <form action="{{ route("admin.accounts.restore", $user->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method("PATCH")
                                                                <button type="submit"
                                                                    class="dropdown-item text-success border-0 bg-transparent">
                                                                    <i class="feather feather-rotate-ccw me-3"></i>
                                                                    <span>Khôi phục</span>
                                                                </button>
                                                            </form>
                                                        @else
                                                            <li>
                                                                <a class="dropdown-item" href="{{ route('admin.accounts.edit', $user->id) }}">
                                                                    <i class="feather feather-edit-3 me-3"></i>
                                                                    <span>Cập nhật</span>
                                                                </a>
                                                            </li>
                                                            <li class="dropdown-divider"></li>
                                                            <li>
                                                                <form action="{{ route("admin.accounts.destroy", $user->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Bạn có chắc muốn xóa tài khoản này?')">
                                                                    @csrf
                                                                    @method("DELETE")
                                                                    <button type="submit"
                                                                        class="dropdown-item text-danger border-0 bg-transparent">
                                                                        <i class="feather feather-trash-2 me-3"></i>
                                                                        <span>Xóa</span>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
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

    <div class="offcanvas offcanvas-end border-0 shadow" tabindex="-1" id="viewUserCanvas" style="width: 400px;">
        <div class="offcanvas-header bg-light border-bottom">
            <h5 class="offcanvas-title fw-bold text-primary">
                <i class="feather feather-user me-2"></i>Chi tiết tài khoản
            </h5>
        </div>
        <div class="offcanvas-body">
            <div class="text-center mb-4 py-3">
                <div class="position-relative d-inline-block">
                    <img id="oc-avatar" src="default-avatar.png" alt="Avatar"
                        class="rounded-circle border border-4 border-white shadow-sm mb-3"
                        style="width: 110px; height: 110px; object-fit: cover;">
                    <span id="oc-status-badge"
                        class="position-absolute bottom-0 end-0 p-2 bg-success border border-2 border-white rounded-circle"
                        title="Online"></span>
                </div>
                <h4 id="oc-name" class="fw-bold mb-1">---</h4>
                <p id="oc-role" class="badge bg-soft-primary text-primary text-uppercase px-3 py-2 rounded-pill">---</p>
            </div>

            <hr class="text-muted opacity-25">

            <div class="user-info-list mt-4">
                <div class="d-flex align-items-start mb-3">
                    <div class="avatar-text bg-light rounded p-2 me-3">
                        <i class="feather feather-mail text-muted"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Email</small>
                        <span id="oc-email" class="fw-medium text-dark">---</span>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-3">
                    <div class="avatar-text bg-light rounded p-2 me-3">
                        <i class="feather feather-phone text-muted"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Số điện thoại</small>
                        <span id="oc-phone" class="fw-medium text-dark">---</span>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-3">
                    <div class="avatar-text bg-light rounded p-2 me-3">
                        <i class="feather feather-map-pin text-muted"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Địa chỉ</small>
                        <span id="oc-address" class="fw-medium text-dark">---</span>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-3">
                    <div class="avatar-text bg-light rounded p-2 me-3">
                        <i class="feather feather-calendar text-muted"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Ngày tham gia</small>
                        <span id="oc-created" class="fw-medium text-dark">---</span>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-3">
                    <div class="avatar-text bg-light rounded p-2 me-3">
                        <i class="feather feather-shield text-muted"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Trạng thái tài khoản</small>
                        <span id="oc-status" class="fw-medium text-dark">---</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="offcanvas-footer p-3 border-top bg-light text-center">
            <button type="button" class="btn btn-outline-secondary btn-sm w-100" data-bs-dismiss="offcanvas">Đóng</button>
        </div>
    </div>
    <script>
        // Tự động ẩn thông báo sau 5 giây
        setTimeout(function () {
            const alert = document.getElementById('autoDismiss');
            if (alert) {
                alert.style.transition = "opacity 0.5s ease";
                alert.style.opacity = "0";
                setTimeout(() => alert.remove(), 500);
            }
        }, 5000);

        //JS cho offcanvas xem chi tiết tài khoản
        document.addEventListener('DOMContentLoaded', function () {
            var offcanvas = document.getElementById('viewUserCanvas');
            offcanvas.addEventListener('show.bs.offcanvas', function (event) {
                var button = event.relatedTarget;
                document.getElementById('oc-avatar').src = button.getAttribute('data-avatar');
                document.getElementById('oc-name').textContent = button.getAttribute('data-name');
                document.getElementById('oc-email').textContent = button.getAttribute('data-email');
                document.getElementById('oc-phone').textContent = button.getAttribute('data-phone');
                document.getElementById('oc-address').textContent = button.getAttribute('data-address');
                document.getElementById('oc-created').textContent = button.getAttribute('data-created');
                document.getElementById('oc-role').textContent = button.getAttribute('data-role');
                document.getElementById('oc-status').textContent = button.getAttribute('data-status');
            });
        });

    </script>
@endsection