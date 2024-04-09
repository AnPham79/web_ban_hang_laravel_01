@extends('layouts.master')

@section('content')
Lịch sử mua hàng
<table border="1" width="100%">
    <tr>
        <td>Tên người mua</td>
        <td>Số điện thoại</td>
        <td>Địa chỉ</td>
        <td>Tên sản phẩm</td>
        <td>Số lượng sản phẩm</td>
        <td>Giá sản phẩm</td>
        <td>Tổng tiền</td>
        <td>Ngày mua</td>
        <td>Trạng thái đơn hàng</td>
    </tr>
    @foreach($data as $each)
        <tr>
            <td>{{ $each->name }}</td>
            <td>{{ $each->phone }}</td>
            <td>{{ $each->address }}</td>
            <td>{{ $each->name_product }}</td>
            <td>{{ $each->quantity }}</td>
            <td>{{ $each->unit_price }}</td>
            <td>{{ $each->total_price }}</td>
            <td>{{ $each->setDateCreated() }}</td>
            <td>
                @if($each->status_invoices === \App\Enums\InvoiceStatusEnum::CHO_XAC_NHAN)
                    <form action="{{ route('cancel-order', ['id' => $each->id]) }}" method="POST">
                        {{-- không có csrf là ăn lỗi 419 --}}
                        @csrf
                        @method('PUT')
                        <button>Hủy đơn</button>
                    </form>
                @else
                    {{ \App\Enums\InvoiceStatusEnum::getDescription($each->status_invoices) }}
                @endif
            </td>
        </tr>
    @endforeach
</table>
@endsection