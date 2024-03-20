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
    @if ($cartItems->isEmpty())
        <h1>Giỏ hàng trống</h1>
    @else
        <table border="1" width="100%">
            <tr>
                <td>#</td>
                <td>Tên người dùng</td>
                <td>Tên sản phẩm</td>
                <td>Ảnh sản phẩm</td>
                <td>Tăng số lượng</td>
                <td>Số lượng</td>
                <td>Giảm số lượng</td>
                <td>Giá</td>
                <td>Xóa</td>
            </tr>
            @foreach ($cartItems as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->user_id }}</td>
                    <td>{{ $data->name_prd }}</td>
                    <td><img src="{{ $data->img_prd }}" style="height:200px" alt=""></td>
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
        tổng tiền: {{ $totalPrice }}
    @endif
</body>

</html>
