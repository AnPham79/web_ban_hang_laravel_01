<h1>Trang quản lí sản phẩm</h1>

<a href="{{ route('Product.create') }}">
    Thêm sản phẩm tại đây
</a>
<br>

@if(session()->has('role'))
    Xin chào: {{ session()->get('name') }}
    <br>
    quyền : {{ session()->get('role') }}
    <br>
    <a href="{{ route('logout') }}">
        Đăng xuất
    </a>
@endif

<br>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<br>
<table border="1" width="100%">
    <tr>
        <td>Tên sản phẩm</td>
        <td>Ảnh sản phẩm</td>
        <td>Giá sản phẩm</td>
        <td>Số lượng</td>
        <td>Mô tả sản phẩm</td>
        <td>Sửa</td>
        <td>Xóa</td>
    </tr>
    @foreach($data as $each)
    <tr>
        <td>{{ $each->name_product }}</td>
        <td><img src="{{ $each->img_product }}" alt="Hình ảnh" style="width:200px"></td>
        <td>{{ $each->price_product }}</td>
        <td>{{ $each->quantity_product }}</td>
        {{-- !! sửa dụng để hiển thị html --}}
        <td>{!! nl2br($each->description_product) !!}</td>
        <td><a href="{{ route('Product.edit', ['id' => $each->id]) }}">Sửa</a></td>
        <td>
            <form action="{{ route('Product.destroy', ['id' => $each->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button>Xóa</button>
            </form>
        </td>        
    </tr>
    @endforeach
</table>
