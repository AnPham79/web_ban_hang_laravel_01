@extends('layouts.master')

@section('content')
    <div>
        <style>
            nav svg {
                height: 20px;
            }

            nav .hidden {
                display: block !important;
            }
        </style>
        <div class="container" style="padding:30px 0px">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="fw-bold">ORDER HISTORY</h2>
                        </div>
                        <div class="panel-body">
                            @if (Session::has('message'))
                                <div class="alert aler-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                            <table class="table table-triped">
                                <thead>
                                    <tr>
                                        <th>user id</th>
                                        <th>Total price</th>
                                        <th>User name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Discount</th>
                                        <th>Province</th>
                                        <th>City</th>
                                        <th>Commune</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Order Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->user_id }}</td>
                                            <td>${{ $item->total_price }}</td>
                                            <td>${{ $item->user_name }}</td>
                                            <td>${{ $item->phone_number }}</td>
                                            <td>${{ $item->email }}</td>
                                            <td>{{ $item->discount }}</td>
                                            <td>{{ $item->province }}</td>
                                            <td>{{ $item->city }}</td>
                                            <td>{{ $item->commune }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->status_invoices }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                @if ($each->status_invoices === \App\Enums\InvoiceStatusEnum::CHO_XAC_NHAN)
                                                    <form action="{{ route('cancel-order', ['id' => $each->id]) }}"
                                                        method="POST">
                                                        {{-- không có csrf là ăn lỗi 419 --}}
                                                        @csrf
                                                        @method('PUT')
                                                        <button>Cancel order</button>
                                                    </form>
                                                @else
                                                    {{ \App\Enums\InvoiceStatusEnum::getDescription($each->status_invoices) }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
