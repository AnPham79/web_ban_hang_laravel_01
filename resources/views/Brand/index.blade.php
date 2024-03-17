<h1>Quản lí thương hiệu sản phẩm</h1>
<br>
<a href="{{ route('Brand.create') }}">
    Thêm thương hiệu tại đây
</a>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<table border="1" width="100%">
    <tr>
        <td>#</td>
        <td>Tên thương hiệu</td>
        <td>Ngày tạo</td>
        <td>Ngày sửa</td>
        <td>Sửa</td>
        <td>Xóa</td>
    </tr>
    @foreach($data as $each)
    <tr>
        <td>{{ $each->id }}</td>
        <td>{{ $each->brand_name }}</td>    
        <td>{{ $each->setCreatedTime() }}</td>
        <td>{{ $each->setUpdatedTime() }}</td>
        <td><a href="{{ route('Brand.edit', ['id' => $each->id]) }}">
                Sửa
            </a>
        </td>
        <td>
            <form action="{{ route('Brand.destroy', ['id' => $each->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button>Xóa</button>
            </form>
        </td>    
    </tr> 
    @endforeach
</table>
