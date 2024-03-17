<h1>Thêm danh mục sản phẩm</h1>
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
<form action="{{ route('Category.store') }}" method="post">
    @csrf
    Tên danh mục
    <br>
    <input type="text" name="category_name">
    <br>
    <button>Thêm</button>
</form>