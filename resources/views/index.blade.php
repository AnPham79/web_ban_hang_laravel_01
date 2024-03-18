<h1>Trang chủ</h1>
<br>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<div id="timkiem" class="col-10 p-2 mx-auto">
    <form class="border border-primary p-2 row" action="{{ route('search') }}" method="get">
        <input name="tukhoa" class="border border-primary p-2 col-6" placeholder="Từ khóa">
        <button type="submit" class="btn btn-primary p-2 col-2">Tìm</button>
    </form>
    <div id="search_results">
        @if (!empty($listsp))
            @foreach ($listsp as $prd)
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $prd->name_product }}</h5>
                            <small class="text-body-secondary">{{ $prd->created_at }}</small>
                        </div>
                        <p class="mb-1">{{ $prd->name_product }}</p>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</div>
<table border="1" width="100%">
    <tr>
        <td>Tên sản phẩm</td>
        <td>Ảnh sản phẩm</td>
        <td>Giá sản phẩm</td>
        <td>Số lượng</td>
        <td>Mô tả sản phẩm</td>
    </tr>
    @foreach ($data as $each)
        <tr>
            <td><a href="{{ route('show', ['id' => $each->id]) }}">{{ $each->name_product }}</a></td>
            <td><a href="{{ route('show', ['id' => $each->id]) }}"><img src="{{ $each->img_product }}" alt="Hình ảnh"
                        style="width:200px"></a></td>
            <td>{{ $each->price_product }}</td>
            <td>{{ $each->quantity_product }}</td>
            {{-- !! sửa dụng để hiển thị html --}}
            <td>{!! nl2br($each->description_product) !!}</td>
        </tr>
    @endforeach
    @if ($data instanceof \Illuminate\Pagination\AbstractPaginator)
        {{ $data->links() }}
    @endif
</table>
