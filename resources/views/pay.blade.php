<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
@if (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif
<a href="{{ route('index') }}">
    Quay về trang chủ
</a>

<body>
    <table border="1" width="100%">
        <tr>
            <td>#</td>
            <td>Tên người dùng</td>
            <td>Tên sản phẩm</td>
            <td>Ảnh sản phẩm</td>
            <td>Số lượng</td>
        </tr>
        @foreach ($result as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->user_id }}</td>
                <td>{{ $data->name_prd }}</td>
                <td><img src="{{ $data->img_prd }}" style="height:200px" alt=""></td>
                <td>{{ $data->quantity_prd }}</td>
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
</body>
</html>
