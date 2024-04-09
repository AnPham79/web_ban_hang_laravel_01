@extends('layouts.master')

@section('Web học lập trình F88', 'Trang chủ')

@section('content')
    <h1>Chi tiết sản phẩm</h1>
    <br>
    <table border="1" width="100%">
        <tr>
            <td>Tên sản phẩm</td>
            <td>Ảnh sản phẩm</td>
            <td>Giá sản phẩm</td>
            <td>Số lượng</td>
            <td>Mô tả sản phẩm</td>
            <td>Tăng giảm số lượng</td>
            <td>Thêm vào giỏ hàng</td>
        </tr>
        <tr>
            <td>{{ $data->name_product }}</td>
            <td><img src="{{ $data->img_product }}" alt="Hình ảnh" style="width:200px"></td>
            <td>{{ $data->price_product }}</td>
            <td>{{ $data->quantity_product }}</td>
            {{-- !! sửa dụng để hiển thị html --}}
            <td>{!! nl2br($data->description_product) !!}</td>
            <td>
                <button onclick="decreaseQuantity()">Giảm</button>
                <button onclick="increaseQuantity()">Tăng</button>
            </td>
            <td>
                <form action="{{ route('addToCartInDetail', ['id' => $data->id]) }}" method="post">
                    @csrf
                    <input type="number" min="1" value="1" id="quantity" name="quantity">
                    <button>Thêm vào giỏ hàng</button>
                </form>
            </td>
        </tr>
    </table>

    @foreach ($comment as $each)
        người bình luận {{ $each->user_id }}
        nội dung bình luận
        <p>{{ $each->feedback }}</p>
    @endforeach

    <form action="{{ route('comment', ['id' => $data->id]) }}" method="POST">
        @csrf
        @method('POST')
        <textarea name="feedback" cols="30" rows="10"></textarea>
        <button>Đăng bình luận</button>
    </form>
@endsection

<script>
    function increaseQuantity() {
        var quantityInput = document.getElementById('quantity');
        quantityInput.value = parseInt(quantityInput.value) + 1;
    }

    function decreaseQuantity() {
        var quantityInput = document.getElementById('quantity');
        if (parseInt(quantityInput.value) > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
        }
    }
</script>
