<h1>Sửa thương hiệu sản phẩm</h1>
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
<form action="{{ route('Brand.update', ['id' => $data->id]) }}" method="post">
    @csrf
    @method('PUT')
    Tên thương hiệu
    <br>
    <input type="text" name="Brand_name" value="{{ $data->brand_name }}">
    <br>
    <button>Sửa</button>
</form>