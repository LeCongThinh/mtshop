@extends('admin.layouts.app')
@section('web-title', 'MTShop - Danh sách tài khoản')
@section('header-title', 'Danh sách tài khoản')
@section('content')
    <div class="row">
        <div class="col-lg-12">
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
                                <tr class="single-item">
                                    <td>
                                        <a href="customers-view.html" class="hstack gap-3">
                                            <div>
                                                <span class="text-truncate-1-line">Albert Enstein</span>
                                            </div>
                                        </a>
                                    </td>
                                    <td><a href="apps-email.html">nancy.elliot@outlook.com</a></td>
                                    <td><a href="tel:"> (375) 8523 456</a></td>
                                    <td>2023-04-06, 02:52PM</td>
                                    <td>
                                        <div class="badge bg-soft-warning text-warning fs-status">Quản trị viên</div>
                                    </td>
                                    <td>
                                        <select class="form-control" data-select2-selector="status">
                                            <option value="success" data-bg="bg-success" selected>Hoạt động</option>
                                            <option value="warning" data-bg="bg-danger">Không hoạt động</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="hstack gap-2 justify-content-end">
                                            <a href="customers-view.html" class="avatar-text avatar-md">
                                                <i class="feather feather-eye"></i>
                                            </a>
                                            <div class="dropdown">
                                                <a href="javascript:void(0)" class="avatar-text avatar-md"
                                                    data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                    <i class="feather feather-more-horizontal"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="feather feather-edit-3 me-3"></i>
                                                            <span>Cập nhật</span>
                                                        </a>
                                                    </li>

                                                    <li class="dropdown-divider"></li>
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="feather feather-trash-2 me-3"></i>
                                                            <span>Xóa</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="single-item">
                                    <td>
                                        <a href="customers-view.html" class="hstack gap-3">
                                            <div>
                                                <span class="text-truncate-1-line">Thomas Edison</span>
                                            </div>
                                        </a>
                                    </td>
                                    <td><a href="apps-email.html">nancy.elliot@outlook.com</a></td>
                                    <td><a href="tel:"> (375) 8523 456</a></td>
                                    <td>2023-04-06, 02:52PM</td>
                                    <td>
                                        <div class="badge bg-soft-teal text-teal fs-status">Nhân viên</div>
                                    </td>
                                    <td>
                                        <select class="form-control" data-select2-selector="status">
                                            <option value="success" data-bg="bg-success" selected>Hoạt động</option>
                                            <option value="danger" data-bg="bg-danger">Không hoạt động</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="hstack gap-2 justify-content-end">
                                            <a href="customers-view.html" class="avatar-text avatar-md">
                                                <i class="feather feather-eye"></i>
                                            </a>
                                            <div class="dropdown">
                                                <a href="javascript:void(0)" class="avatar-text avatar-md"
                                                    data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                    <i class="feather feather-more-horizontal"></i>
                                                </a>
                                                
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="feather feather-edit-3 me-3"></i>
                                                            <span>Cập nhật</span>
                                                        </a>
                                                    </li>

                                                    <li class="dropdown-divider"></li>
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="feather feather-trash-2 me-3"></i>
                                                            <span>Xóa</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection