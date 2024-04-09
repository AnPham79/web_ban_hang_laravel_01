@extends('layouts.master')

@section('Web học lập trình F88', 'Trang chủ')

@section('content')
@if (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif
<body>
    <table border="1" width="100%">
        <tr>
            <td>#</td>
            <td>Tên sản phẩm</td>
            <td>Ảnh sản phẩm</td>
            <td>Thương hiệu</td>
            <td>Số lượng</td>
            <td>Giá</td>
        </tr>
        @foreach ($result as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->name_product }}</td>
                <td><img src="{{ $data->img_product }}" style="height:200px" alt=""></td>
                <td>{{ $data->brand_name }}</td>
                <td>{{ $data->quantity_prd }}</td>
                <td>{{ $data->price_prd }}</td>
            </tr>
        @endforeach
    </table>
    <h1>Tổng tiền của bạn: {{ $totalPrice }}</h1>
    <h2>Thông tin khách hàng</h2>
    tên của bạn
    <br>
    <input type="text" value="{{ session()->get('name') }}">
    <br>
    Số điện thoại
    <br>
    <input type="text" value="{{ session()->get('phone') }}">
    <br>
    Địa chỉ
    <br>
    <input type="text" value="{{ session()->get('address') }}">
    <br>
    Email
    <br>
    <input type="text" value="{{ session()->get('email') }}">
    <br>
    <form action="{{ route('pay') }}" method="POST">
        @csrf
        @method('PUT')
        <button>Hoàn thành thanh toán</button>
    </form>
@endsection
