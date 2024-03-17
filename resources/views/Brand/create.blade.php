<h1>Thêm thương hiệu sản phẩm</h1>
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
<form action="{{ route('Brand.store') }}" method="post">
    @csrf
    Tên thương hiệu
    <br>
    <input type="text" name="brand_name">
    <br>
    <button>Thêm</button>
</form>