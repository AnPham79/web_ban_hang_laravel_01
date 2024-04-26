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
        <div class="container" style="padding: 30px 0px">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2 class="fw-bold">All products</h2>
                                </div>
                                <div class="col-md-6 float-end">
                                    <a href="{{ route('Product.create') }}" class="btn btn-success float-end mx-1">Add
                                        new
                                    </a>
                                    <form action="{{ route('export-CSV') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-success float-end mx-1">
                                            Export CSV
                                        </button>
                                    </form>
                                    <form action="{{ route('export-excel') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-success float-end mx-1">
                                            Export Excel
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <table class="table table-triped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Sale</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $each)
                                    <tr>
                                        <td>{{ $each->name_product }}</td>
                                        <td><img src="{{ $each->img_product }}" alt="Hình ảnh" style="width:200px"></td>
                                        <td>{{ $each->price_product }}</td>
                                        <td>{{ $each->quantity_product }}</td>
                                        {{-- !! sửa dụng để hiển thị html --}}
                                        <td>{!! nl2br($each->description_product) !!}</td>
                                        <td>
                                            <a href="{{ route('Product.edit', ['id' => $each->id]) }}">Sửa</a>
                                            <form action="{{ route('Product.destroy', ['id' => $each->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button>Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
