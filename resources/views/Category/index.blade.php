<h1>Quản lí danh mục sản phẩm</h1>
<br>
<a href="{{ route('Category.create') }}">
    Thêm danh mục tại đây
</a>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<table border="1" width="100%">
    <tr>
        <td>#</td>
        <td>Tên danh mục</td>
        <td>Ngày tạo</td>
        <td>Ngày sửa</td>
        <td>Sửa</td>
        <td>Xóa</td>
    </tr>
    @foreach($data as $each)
    <tr>
        <td>{{ $each->id }}</td>
        <td>{{ $each->category_name }}</td>    
        <td>{{ $each->setCreatedTime() }}</td>
        <td>{{ $each->setUpdatedTime() }}</td>
        <td><a href="{{ route('Category.edit', ['id' => $each->id]) }}">
                Sửa
            </a>
        </td>
        <td>
            <form action="{{ route('Category.destroy', ['id' => $each->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button>Xóa</button>
            </form>
        </td>    
    </tr> 
    @endforeach
</table>
