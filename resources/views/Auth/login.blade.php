@extends('layouts.master')

@section('content')

    <div class="container" style="padding: 30px 0px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="panel panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="fw-bold">LOGIN</h2>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('register') }}" class="btn btn-success float-end">Register</a>
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
                    <form action="{{ route('login') }}" class="form-horizontal" method="POST">
                        @csrf
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
                                <input type="password" placeholder="********************" name="password" class="form-control input-md" id="check"/>
                                {{-- <span onclick="checkpass()" style="cursor: pointer;">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </span> --}}
                            </div>                            
                        </div>

                        <div class="form-group my-2">
                            <div class="col-md-8 offset-md-4">
                                <button class="btn btn-success float-end" type="Submit">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- <script>
    function checkpass() {
        var checkpass = document.getElementById("Check");
        if (checkpass.type === 'password') {
            checkpass.type = 'text';
        } else {
            checkpass.type = 'password';
        }
    }
</script> --}}
