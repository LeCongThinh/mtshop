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
                                            <a href="javascript:void(0)" class="hstack gap-3">
                                                <div>
                                                    <span class="text-truncate-1-line">{{ $user->name }}</span>
                                                </div>
                                            </a>
                                        </td>
                                        <td><a href="javascript:void(0)">{{ $user->email }}</a></td>
                                        <td><a href="javascript:void(0)"> {{ $user->phone }}</a></td>
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
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.accounts.edit', $user->id) }}">
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
    </script>
@endsection