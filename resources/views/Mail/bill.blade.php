<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn mua hàng</title>
</head>

<body>
    <h1>Hóa đơn mua hàng</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Người mua</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($billDetails as $item)
            <tr>
                <td>{{ $item['product_id']->name_product }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>{{ $item['unit_price'] }}</td>
            @endforeach
        </tbody>
    </table>
    <p>Tổng tiền: {{ $totalPrice }}</p>
</body>

</html>
