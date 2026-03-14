@extends('admin.layouts.app')
@section('web-title', 'MTShop - Danh sách sản phẩm')
@section('header-title', 'Danh sách sản phẩm')
@section('content')
    <div class="row">
        <div class="col-lg-12">
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
            <div class="card stretch stretch-full">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover" id="customerList">
                            <thead>
                                <tr>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Tên hãng</th>
                                    <th>Giá bán</th>
                                    <th>Giá khuyến mãi</th>
                                    <th>Số lượng tồn kho</th>
                                    <th>Trạng thái</th>
                                    <th class="text-end">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr class="single-item">
                                        <td class="align-middle text-center">
                                            <img src="{{ asset("storage/" . $product->thumbnail) }}" alt=""
                                                class="table-img-thumb">
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="hstack gap-3">
                                                <div>
                                                    <span class="text-truncate-1-line">{{ $product->name }}</span>
                                                </div>
                                            </a>
                                        </td>
                                        <td><a href="javascript:void(0)">{{ $product->category->name }}</a></td>
                                        <td><a href="javascript:void(0)">{{ number_format($product->price, 0, ',', '.') }} đ</a>
                                        </td>
                                        <td><a href="javascript:void(0)">
                                                @if($product->sale_price)
                                                    {{ number_format($product->sale_price, 0, ',', '.') }} đ
                                                @else
                                                    <span class="badge bg-soft-muted text-muted fs-status">Không khuyến mãi</span>
                                                @endif
                                            </a>
                                        </td>

                                        <td><b>{{ $product->stock }}</b></td>
                                        <td>
                                            <div class="{{ $product->status_label['class'] }} fs-status">
                                                {{ $product->status_label['text'] }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="hstack gap-2 justify-content-end">
                                                <a href="#" class="avatar-text avatar-md">
                                                    <i class="feather feather-eye"></i>
                                                </a>

                                                <div class="dropdown">
                                                    <a href="javascript:void(0)" class="avatar-text avatar-md"
                                                        data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                        <i class="feather feather-more-horizontal"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route("admin.products.edit", $product->id) }}">
                                                                <i class="feather feather-edit-3 me-3"></i>
                                                                <span>Cập nhật</span>
                                                            </a>
                                                        </li>
                                                        <li class="dropdown-divider"></li>
                                                        <li>
                                                            <button type="submit"
                                                                class="dropdown-item text-danger border-0 bg-transparent">
                                                                <i class="feather feather-trash-2 me-3"></i>
                                                                <span>Xóa</span>
                                                            </button>
                                                        </li>
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
@endsection