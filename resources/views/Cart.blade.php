@extends('layouts.master')

@section('Web học lập trình F88', 'Trang chủ')

@section('content')
@if (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif
<h1>Giỏ hàng</h1>
<br>
    @if ($cartItems->isEmpty())
        <h1>Giỏ hàng trống</h1>
    @else
        <table border="1" width="100%">
            <tr>
                <td>Mã</td>
                <td>Tên sản phẩm</td>
                <td>Ảnh sản phẩm</td>
                <td>Thương hiệu</td>
                <td>Tăng số lượng</td>
                <td>Số lượng</td>
                <td>Giảm số lượng</td>
                <td>Giá</td>
                <td>Xóa</td>
            </tr>
            @foreach ($cartItems as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->name_product }}</td>
                    <td>{{ $data->brand_name }}</td>
                    <td><img src="{{ $data->img_product }}" style="height:200px" alt=""></td>
                    <td>
                        <form action="{{ route('incre', ['id' => $data->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <button>+</button>
                        </form>
                    </td>
                    <td>{{ $data->quantity_prd }}</td>
                    <td>
                        <form action="{{ route('decre', ['id' => $data->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <button>-</button>
                        </form>
                    </td>
                    <td>{{ $data->price_prd }}</td>
                    <td>
                        <form action="{{ route('delCart', ['id' => $data->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button>Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <button>
            <a href="{{ route('PagePay') }}">
                Thanh toán
            </a>
        </button>
    @endif
@endsection
