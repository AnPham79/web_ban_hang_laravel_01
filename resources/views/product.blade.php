@extends('layouts.master')

@section('Web học lập trình F88', 'Trang chủ')

@section('content')
<h1>Trang sản phẩm</h1>
<br>
<table border="1" width="100%">
    Tìm kiếm
    <form action="">
        <input type="search" name="q" value="{{ $search }}" placeholder="Nhập tìm kiếm của bạn ...">
    </form>
    <tr>
        <td>Tên sản phẩm</td>
        <td>Ảnh sản phẩm</td>
        <td>Giá sản phẩm</td>
        <td>Số lượng</td>
        <td>Mô tả sản phẩm</td>
        <td>Thêm vào giỏ hàng</td>
    </tr>
    @foreach ($data as $each)
        <tr>
            <td><a href="{{ route('show', ['id' => $each->id]) }}">{{ $each->name_product }}</a></td>
            <td><a href="{{ route('show', ['id' => $each->id]) }}"><img src="{{ $each->img_product }}" alt="Hình ảnh"
                        style="width:200px"></a></td>
            <td>{{ $each->price_product }}</td>
            <td>{{ $each->quantity_product }}</td>
            {{-- !! sửa dụng để hiển thị html --}}
            <td>{!! nl2br($each->description_product) !!}</td>
            <td>
                <form action="{{ route('addToCart', ['id' => $each->id]) }}" method="POST">
                    @csrf
                    @method('POST')
                    <button>Thêm</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
{{ $data->links() }}
@endsection