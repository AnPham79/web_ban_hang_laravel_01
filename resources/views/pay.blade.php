@extends('layouts.master')

@section('content')

    <div class="container" style="padding: 30px 0px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="panel panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="fw-bold">BILLING ADDRESS</h2>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('ViewCart') }}" class="btn btn-warning text-white float-end">View Cart</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('pay') }}" method="POST" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">User name</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="Product Name" name="user_name"
                                    class="form-control input-md" value="{{ session()->get('name') }}"/>
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">Phone number</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="Phone number" name="phone_number"
                                    class="form-control input-md" value="{{ session()->get('phone') }}"/>
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">Email</label>
                            <div class="col-md-8">
                                <input type="email" placeholder="Email" name="email"
                                    class="form-control input-md" value="{{ session()->get('email') }}"/>
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">Address</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="address" name="address"
                                    class="form-control input-md" value="{{ session()->get('address') }}"/>
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">Province</label>
                            <div class="col-md-8">
                                <select class="form-control" name="province">
                                    <option value="" selected disabled>-- Province --</option>
                                    @foreach($provinces as $province)
                                        <option>{{ $province['Name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">City</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="city" name="city"
                                    class="form-control input-md"/>
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">Commune</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="commune" name="commune"
                                    class="form-control input-md"/>
                            </div>
                        </div>

                        <div class="form-group my-2">
                            <div class="col-md-8 offset-md-4">
                                <button class="btn btn-warning text-white float-end" type="Submit">Submitt</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
