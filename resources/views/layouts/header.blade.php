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
                            <h5 class="mb-1"><a href="{{ route('show', ['id' => $prd->id]) }}">{{ $prd->name_product }}</a></h5>
                            <small class="text-body-secondary">{{ $prd->created_at }}</small>
                        </div>
                        <p class="mb-1">{{ $prd->name_product }}</p>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</div>

@if (session()->has('role'))
    Xin chào {{ session()->get('name') }}
    <br>
    <a href="{{ route('logout') }}">Đăng xuất</a>
    <br>
    <a href="{{ route('order-history') }}">Lịch sửa mua hàng</a>
@else
    <a href="{{ route('register') }}">Đăng kí</a>
    <br>
    <a href="{{ route('login') }}">Đăng nhập</a>
@endif

<br>
<span>Số lượng sản phẩm trong giỏ hàng: {{ $totalQuantity }}</span>
<a href="{{ route('ViewCart') }}">
    Giỏ hàng
</a>
<br>
<a href="{{ route('index') }}">Trang chủ</a>
<br>
<a href="{{ route('product-page') }}">Trang sản phẩm</a>
<br>
<a href="">Giới thiệu</a>
<br>
<a href="">Liên hệ</a>
<hr>