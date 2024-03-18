CHi tiết sản phẩm
<table border="1" width="100%">
    <tr>
        <td>Tên sản phẩm</td>
        <td>Ảnh sản phẩm</td>
        <td>Giá sản phẩm</td>
        <td>Số lượng</td>
        <td>Mô tả sản phẩm</td>
    </tr>
        <tr>
            <td>{{ $data->name_product }}</td>
            <td><img src="{{ $data->img_product }}" alt="Hình ảnh" style="width:200px"></td>
            <td>{{ $data->price_product }}</td>
            <td>{{ $data->quantity_product }}</td>
            {{-- !! sửa dụng để hiển thị html --}}
            <td>{!! nl2br($data->description_product) !!}</td>
        </tr>
</table>
