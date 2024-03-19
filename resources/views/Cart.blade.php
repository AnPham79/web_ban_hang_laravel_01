<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table border="1" width="100%">
        <tr>
            <td>#</td>
            <td>Tên người dùng</td>
            <td>Tên sản phẩm</td>
            <td>Ảnh sản phẩm</td>
            <td>Số lượng</td>
            <td>Giá</td>
        </tr>
        @foreach ($cartItems as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->user_id }}</td>
                <td>{{ $data->name_prd }}</td>
                <td><img src="{{ $data->img_prd }}" style="height:200px" alt=""></td>
                <td>{{ $data->quantity_prd }}</td>
                <td>{{ $data->price_prd }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
