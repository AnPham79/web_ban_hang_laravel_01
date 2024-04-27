@extends('layouts.master')

@section('content')

    <div class="container" style="padding: 30px 0px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="panel panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="fw-bold">ADD NEW BRAND</h2>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('Brand.index') }}" class="btn btn-success float-end">All Brand</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('Brand.store') }}" class="form-horizontal" method="POST">
                        @csrf
                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">Brand name</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="Brand Name" name="brand_name"
                                    class="form-control input-md" />
                            </div>
                        </div>

                        <div class="form-group my-2">
                            <div class="col-md-8 offset-md-4">
                                <button class="btn btn-success float-end" type="Submit">Insert Brand</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
