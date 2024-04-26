@extends('layouts.master')

@section('content')

    <div class="container" style="padding: 30px 0px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="panel panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="fw-bold">EDIT PRODUCT</h2>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('Product.index') }}" class="btn btn-success float-end">All Products</a>
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
                    <form action="{{ route('Product.update', ['id' => $data->id]) }}" class="form-horizontal" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">Product name</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="Product Name" name="name_product"
                                    class="form-control input-md" value="{{ $data->name_product }}"/>
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">Short Description</label>
                            <div class="col-md-8">
                                <textarea class="form-control" placeholder="Short Description" name="short_description">
                                    {{ $data->short_description }}
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">Description</label>
                            <div class="col-md-8">
                                <textarea class="form-control" id="description" placeholder="Description" 
                                name="description_product">{{ $data->description_product }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">Regular Price</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="Product price" class="form-control input-md"
                                    name="price_product" value="{{ $data->price_product }}"/>
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">Quantity</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="Product Name" class="form-control input-md"
                                    name="quantity_product" value="{{ $data->quantity_product }}"/>
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">SKU</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="Product Name" class="form-control input-md"
                                    name="SKU" value="{{ $data->SKU }}"/>
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">Product Image</label>
                            <div class="col-md-8">
                                <input ondblclick="openPopup('hinh')" id="hinh" name="img_product"
                                    class="form-control input-md" placeholder="image" type="text" value="{{ $data->img_product }}">
                                <img src="{{ asset($data->img_product) }}" style="height: 100px" alt="Product Image">
                            </div>
                        </div>                        

                        <div class="form-group my-2">
                            <div class="col-md-8 offset-md-4">
                                <button class="btn btn-success float-end" type="Submit">EDIT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        ClassicEditor.create(document.querySelector('#description'), {
                language: 'vi',
                ckfinder: {
                    uploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
                },
                toolbar: {
                    items: [
                        'fontfamily', 'fontsize', '|',
                        'heading', '|',
                        'alignment', '|',
                        'fontColor', 'fontBackgroundColor', '|',
                        'bold', 'italic', 'underline', 'subscript', 'superscript', '|',
                        'link', '|',
                        'outdent', 'indent', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'code', 'codeBlock', '|',
                        'insertTable', '|',
                        'uploadImage', '|',
                        'ckfinder',
                        'undo', 'redo'
                    ],
                    shouldNotGroupWhenFull: true
                }
            })
            .then(editor => {})
            .catch(error => {
                console.error(error)
            });
    </script>
    <script src="{{ asset('ckfinder_php_3.6.1/ckfinder/ckfinder.js') }}"></script>
    <script>
        function openPopup(idobj) {
            CKFinder.popup({
                chooseFiles: true,
                onInit: function(finder) {
                    finder.on('files:choose', function(evt) {
                        var file = evt.data.files.first();
                        document.getElementById(idobj).value = file.getUrl();
                    });
                    finder.on('file:choose:resizedImage', function(evt) {
                        document.getElementById(idobj).value = evt.data.resizedUrl;
                    });
                }
            });
        }
    </script>
@endsection
