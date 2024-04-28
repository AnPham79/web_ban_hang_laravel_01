@extends('layouts.master')

@section('content')
<!-- START SHOP -->
<div class="shop-page">
    <div class="container my-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"
                        class="text-decoration-none text-dark">Home</a></li>
                <li class="breadcrumb-item"><a href="#"
                        class="text-decoration-none text-dark">Shop</a></li>
            </ol>
        </nav>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <h2 class="fw-bold">PRODUCT PAGE</h2>
                <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#customNavbarSupportedContent"
                    aria-controls="customNavbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end"
                    id="customNavbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 mx-lg-4">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Chair</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Table</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Bed</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Light</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" name="q" value="{{ $search }}"
                         aria-label="Search" placeholder="search">
                        <button class="btn btn-outline-success"
                            type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>                               
        <div class="row my-4">
            <div class="session-product-1 my-4">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <img src="{{ asset('img/more/product-page-session-1.jpg') }}"
                            class="w-100 rounded-4" alt>
                    </div>
                    @foreach ($product_session_1 as $item)
                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <div class="product">
                                <div
                                    class="product-image position-relative">
                                    <a href="{{ route('show', ['id' => $item->id]) }}">
                                        <img
                                            src="{{ $item->img_product }}"
                                            class="w-100" alt>
                                    </a>
                                    <form action="{{ route('addToCart', ['id' => $item->id]) }}" method="post">
                                        @csrf
                                        <button
                                        class="btn-addtocart position-absolute"><i
                                            class="fa-solid fa-bag-shopping mx-2"></i>Add
                                        to cart</button>
                                    </form>
                                </div>
                                <div class="product-info">
                                    <div class="product-name my-2">
                                        <a href="{{ route('show', ['id' => $item->id]) }}" class="text-dark"
                                            style="text-decoration: none;"><h5
                                                class="fw-bold"
                                                style="font-size: 15px;"
                                                class="font-size:20px">{{ $item->name_product }}</h5></a>
                                    </div>
                                    <div class="product-description" style="overflow: hidden;
                                    text-overflow: ellipsis;
                                    white-space: nowrap;
                                    max-width: 100%">
                                        {{ $item->short_description }}
                                    </div>
                                    <div class="product-rate">
                                        <i
                                            class="fa-solid fa-star text-warning my-2"></i>
                                        <i
                                            class="fa-solid fa-star text-warning my-2"></i>
                                        <i
                                            class="fa-solid fa-star text-warning my-2"></i>
                                        <i
                                            class="fa-solid fa-star text-warning my-2"></i>
                                        <i
                                            class="fa-solid fa-star text-warning my-2"></i>
                                    </div>
                                    <div class="product-price">
                                        <b>${{ $item->price_product }}</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="session-product-2 my-4">
                <div class="row">
                    @foreach ($product_session_2 as $item)
                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <div class="product">
                                <div
                                    class="product-image position-relative">
                                    <a href="{{ route('show', ['id' => $item->id]) }}">
                                        <img
                                            src="{{ $item->img_product }}"
                                            class="w-100" alt>
                                    </a>
                                    <form action="{{ route('addToCart', ['id' => $item->id]) }}" method="post">
                                        @csrf
                                        <button
                                        class="btn-addtocart position-absolute"><i
                                            class="fa-solid fa-bag-shopping mx-2"></i>Add
                                        to cart</button>
                                    </form>
                                </div>
                                <div class="product-info">
                                    <div class="product-name my-2">
                                        <a href="{{ route('show', ['id' => $item->id]) }}" class="text-dark"
                                            style="text-decoration: none;"><h5
                                                class="fw-bold"
                                                style="font-size: 15px;"
                                                class="font-size:20px">{{ $item->name_product }}</h5></a>
                                    </div>
                                    <div class="product-description" style="overflow: hidden;
                                    text-overflow: ellipsis;
                                    white-space: nowrap;
                                    max-width: 100%">
                                        {{ $item->short_description }}
                                    </div>
                                    <div class="product-rate">
                                        <i
                                            class="fa-solid fa-star text-warning my-2"></i>
                                        <i
                                            class="fa-solid fa-star text-warning my-2"></i>
                                        <i
                                            class="fa-solid fa-star text-warning my-2"></i>
                                        <i
                                            class="fa-solid fa-star text-warning my-2"></i>
                                        <i
                                            class="fa-solid fa-star text-warning my-2"></i>
                                    </div>
                                    <div class="product-price">
                                        <b>${{ $item->price_product }}</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <img src="{{ asset('img/more/product-page-session-2.png') }}"
                            class="w-100 rounded-4" alt>
                    </div>
                </div>
            </div>

            <div class="session-product-3 my-4">
                <div class="row">
                    @foreach ($data as $item)
                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <div class="product">
                                <div
                                    class="product-image position-relative">
                                    <a href="{{ route('show', ['id' => $item->id]) }}">
                                        <img
                                            src="{{ $item->img_product }}"
                                            class="w-100" alt>
                                    </a>
                                    <form action="{{ route('addToCart', ['id' => $item->id]) }}" method="post">
                                        @csrf
                                        <button
                                        class="btn-addtocart position-absolute"><i
                                            class="fa-solid fa-bag-shopping mx-2"></i>Add
                                        to cart</button>
                                    </form>
                                </div>
                                <div class="product-info">
                                    <div class="product-name my-2">
                                        <a href="{{ route('show', ['id' => $item->id]) }}" class="text-dark"
                                            style="text-decoration: none;"><h5
                                                class="fw-bold"
                                                style="font-size: 15px;"
                                                class="font-size:20px">{{ $item->name_product }}</h5></a>
                                    </div>
                                    <div class="product-description" style="overflow: hidden;
                                    text-overflow: ellipsis;
                                    white-space: nowrap;
                                    max-width: 100%">
                                        {{ $item->short_description }}
                                    </div>
                                    <div class="product-rate">
                                        <i
                                            class="fa-solid fa-star text-warning my-2"></i>
                                        <i
                                            class="fa-solid fa-star text-warning my-2"></i>
                                        <i
                                            class="fa-solid fa-star text-warning my-2"></i>
                                        <i
                                            class="fa-solid fa-star text-warning my-2"></i>
                                        <i
                                            class="fa-solid fa-star text-warning my-2"></i>
                                    </div>
                                    <div class="product-price">
                                        <b>${{ $item->price_product }}</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{ $data->links() }}
    </div>
</div>
@endsection
<!-- END SHOP -->