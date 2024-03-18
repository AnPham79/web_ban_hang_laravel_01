<h1>Thêm sản phẩm tại đây</h1>
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
<form action="{{ route('Product.store') }}" method="POST">
    @csrf
    Tên sản phẩm
    <br>
    <input type="text" name="name_product">
    <br>
    Ảnh sản phẩm
    <br>
    <input ondblclick="openPopup('hinh')" id="hinh" name="img_product" placeholder="Địa chỉ hình" type="text">
    <br>
    Giá sản phẩm
    <br>
    <input type="text" name="price_product">
    <br>
    Số lượng sản phẩm
    <br>
    <input type="text" name="quantity_product">
    <br>
    Mô tả sản phẩm
    <br>
    <textarea name="description_product" id="description"></textarea>
    <br>
    Danh mục sản phẩm
    <br>
    <select name="category_id" id="">
        @foreach($categories as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>    
    <br>
    Thương hiệu sản phẩm
    <br>
    <select name="brand_id" id="">
        @foreach($brands as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>  
    <br>
    <button>Thêm sản phẩm</button>
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