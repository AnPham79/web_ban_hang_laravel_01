<h1>Sửa danh mục sản phẩm</h1>
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
<form action="{{ route('Category.update', ['id' => $data->id]) }}" method="post">
    @csrf
    @method('PUT')
    Tên danh mục
    <br>
    <input type="text" name="category_name" value="{{ $data->category_name }}">
    <br>
    <button>Sửa</button>
</form>