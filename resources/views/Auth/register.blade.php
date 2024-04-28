@extends('layouts.master')

@section('content')

    <div class="container" style="padding: 30px 0px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="panel panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="fw-bold">REGISTER</h2>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('login') }}" class="btn btn-success float-end">Login</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('process_register') }}" class="form-horizontal" method="POST">
                        @csrf
                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">nName</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="Your name" name="name" class="form-control input-md"
                                    value="{{ old('name') }}" />
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">Email</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="Your email" name="email" class="form-control input-md"
                                    value="{{ old('email') }}" />
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">Password</label>
                            <div class="col-md-8">
                                <input type="password" placeholder="********************" name="password" class="form-control input-md"/>
                            </div>                            
                        </div>

                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">Address</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="Your address" name="address" class="form-control input-md"
                                    value="{{ old('address') }}" />
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">Phone</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="Your phone" name="phone" class="form-control input-md"
                                    value="{{ old('phone') }}" />
                            </div>
                        </div>

                        <div class="form-group my-2">
                            <div class="col-md-8 offset-md-4">
                                <button class="btn btn-success float-end" type="Submit">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection