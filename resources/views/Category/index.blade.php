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
                                    <h2 class="fw-bold">All Category</h2>
                                </div>
                                <div class="col-md-6 float-end">
                                    <a href="{{ route('Category.create') }}" class="btn btn-success float-end mx-1">Add
                                        new
                                    </a>
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
                                    <th>Category Name</th>
                                    <th>Date Create</th>
                                    <th>Date Update</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $each)
                                    <tr>
                                        <td>{{ $each->id }}</td>
                                        <td>{{ $each->category_name }}</td>    
                                        <td>{{ $each->setCreatedTime() }}</td>
                                        <td>{{ $each->setUpdatedTime() }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('Category.edit', ['id' => $each->id]) }}"><i class="fa-solid fa-pen-to-square mx-1"></i></a>
                                            <form action="{{ route('Category.destroy', ['id' => $each->id]) }}"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
