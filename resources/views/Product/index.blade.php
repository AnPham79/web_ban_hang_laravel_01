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
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>SKU</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $each)
                                    <tr>
                                        <td>{{ $each->id }}</td>
                                        <td><img src="{{ $each->img_product }}" alt="Hình ảnh" style="height:100px"></td>
                                        <td>{{ $each->name_product }}</td>
                                        <td>
                                            @if($each->stock_status == 'in_stock')
                                                in stock
                                            @else
                                                out of stock
                                            @endif
                                        </td>
                                        <td class="fw-bold">${{ $each->price_product }}</td>
                                        <td>{{ $each->SKU }}</td>
                                        <td>{{ $each->category->category_name }}</td>
                                        <td>{{ $each->setDateCreated() }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('Product.edit', ['id' => $each->id]) }}"><i class="fa-solid fa-pen-to-square mx-1"></i></a>
                                            <form action="{{ route('Product.destroy', ['id' => $each->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="border-0" type="submit"><a href=""><i class="fa-solid fa-trash text-danger mx-1"></i></a></button>
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
