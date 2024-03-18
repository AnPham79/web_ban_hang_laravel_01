<h1>Sửa sản phẩm</h1>
<br>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<br>
<form action="{{ route('Product.update', ['id' => $data->id]) }}" method="POST">
    @csrf
    @method('PUT')
    Tên sản phẩm
    <br>
    <input type="text" name="name_product" value="{{ $data->name_product }}">
    <br>
    Ảnh củ của bạn
    <br>
    <img src="{{ $data->img_product }}" alt="" style="height: 200px">
    <br>
    Ảnh sản phẩm
    <br>
    <input ondblclick="openPopup('hinh')" id="hinh" name="img_product" placeholder="Địa chỉ hình" type="text" value="{{ $data->img_product }}">
    <br>
    Giá sản phẩm
    <br>
    <input type="text" name="price_product" value="{{ $data->price_product }}">
    <br>
    Số lượng sản phẩm
    <br>
    <input type="text" name="quantity_product" value="{{ $data->quantity_product }}">
    <br>
    Mô tả sản phẩm
    <br>
    <textarea name="description_product" id="description">{{ $data->description_product }}</textarea>
    <br>
    <button>Sửa sản phẩm</button>
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
</form>