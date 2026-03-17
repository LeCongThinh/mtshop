@extends('user.layouts.app')
@section('web-title', $product->name) 
@section('content')
    <div class="header-path">
        <div class="page-header-title">
            <h5 class="m-b-10">@yield('header-title', 'Cửa hàng')</h5>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active">@yield('header-title', 'Sản phẩm')</li>
        </ul>
    </div>
    view chi tiet san pham
@endsection