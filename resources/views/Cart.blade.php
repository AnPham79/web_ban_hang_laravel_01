@extends('layouts.master')

@section('content')
    <div class="cart">
        <div class="container my-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-dark">Cart</a></li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-6">
                    <h2 class="fw-bold">CART PAGE</h2>
                </div>
                <div class="col-md-6">
                    <a href="" class="btn btn-warning float-end rounded-0 text-white">Clear All</a>
                </div>
            </div>
            @if ($cartItems->isEmpty())
                <p>Your cart is empty >.< </h2>
                        <span><a href="{{ route('product-page') }}">Shop here</a></span>
                    @else
                        <div class="product-in4-incart">
                            @if (session('error'))
                                <div class="alert alert-error">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @foreach ($cartItems as $data)
                                <div class="row mt-4">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-12 col-sm-12 img-incart">
                                                <img src="{{ $data->img_product }}" alt="">
                                            </div>
                                            <div class="col-lg-10 col-md-12 col-sm-12 name-prd-incart">
                                                <p style="font-size: 14px;">{{ $data->name_product }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 action-quantity">
                                        <div class="row">
                                            <div class="col-3 price-incart">
                                                <span class="">${{ $data->price_prd }}</span>
                                            </div>
                                            <div class="col-3 quantity-incart d-flex">
                                                <form action="{{ route('decre', ['id' => $data->id]) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="border-0"><a href="" class="decrea"><i
                                                                class="fa-solid fa-minus rounded-circle"></i></a></button>
                                                </form>
                                                <span>{{ $data->quantity_prd }}</span>
                                                <form action="{{ route('incre', ['id' => $data->id]) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="border-0"><a href="" class="increa"><i
                                                                class="fa-solid fa-plus rounded-circle"></i></a></button>
                                                </form>
                                            </div>
                                            <div class="col-3 subtotal-incart">
                                                <span class="">${{ $data->price_prd * $data->quantity_prd }}</span>
                                            </div>
                                            <div class="col-3 del-product-incart">
                                                <form action="{{ route('delCart', ['id' => $data->id]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="border-0"><a href=""><i
                                                                class="fa-solid fa-circle-xmark"></i></a></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
            @endif
            <div class="order-summary mt-5">
                <h2 class="fw-bold mb-4">ORDER SUMMARY</h2>
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <div class="order-summary-subtotal mb-4 d-flex justify-content-between">
                            <span class="text-secondary">Subtotal</span>
                            <b>${{ $totalPrice }}</b>
                        </div>
                        <div class="order-summary-shipping mb-4 d-flex justify-content-between">
                            <span class="text-secondary">Shipping</span>
                            <b>Free Shipping</b>
                        </div>
                        <div class="order-summary-total d-flex justify-content-between">
                            <span class="text-secondary">Total</span>
                            <b>${{ $totalPrice }}</b>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="mb-4 mx-lg-5">
                            <span class="text-secondary">I have promo code</span>
                            <form action="" class="mt-2">
                                <div class="form-group">
                                    <input type="text" class="form-control mr-2">
                                    <button class="btn btn-warning rounded-0 text-white mt-2 float-end">Use</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="d-flex flex-column justify-content-between" style="transform: translateY(30px);">
                            @if ($cartItems->isEmpty())
                                <p>Your cart is empty >.< </h2>
                                        <span><a href="{{ route('product-page') }}">Shop here</a></span>
                                    @else
                                        <a href="{{ route('PagePay') }}"><button
                                                class="btn btn-warning rounded-0 text-white">Check out</button></a>
                                        <div class="mt-2">
                                            <a href="" class="text-secondary">Continue Shopping</a>
                                            <i class="fa-solid fa-circle-arrow-right mx-2 text-secondary"></i>
                                        </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- MORE PRODUCT -->
            <div class="more-product">
                <h5 class="title-more-product">More product</h5>
                <div class="row">
                    @foreach ($product as $item)
                        <div class="col-lg-2 col-md-4 col-sm-12">
                            <div class="product">
                                <div class="product-image position-relative">
                                    <a href="{{ route('show', ['id' => $item->id]) }}">
                                        <img src="{{ $item->img_product }}" class="w-100" alt>
                                    </a>
                                    <form action="{{ route('addToCart', ['id' => $item->id]) }}" method="post">
                                        @csrf
                                        <button class="btn-addtocart position-absolute"><i
                                                class="fa-solid fa-bag-shopping mx-2"></i>Add
                                            to cart</button>
                                    </form>
                                </div>
                                <div class="product-info">
                                    <div class="product-name my-2">
                                        <a href="{{ route('show', ['id' => $item->id]) }}" class="text-dark"
                                            style="text-decoration: none;">
                                            <h5 class="fw-bold" style="font-size: 15px;" class="font-size:20px">
                                                {{ $item->name_product }}</h5>
                                        </a>
                                    </div>
                                    <div class="product-description"
                                        style="overflow: hidden;
                                    text-overflow: ellipsis;
                                    white-space: nowrap;
                                    max-width: 100%">
                                        {{ $item->short_description }}
                                    </div>
                                    <div class="product-rate">
                                        <i class="fa-solid fa-star text-warning my-2"></i>
                                        <i class="fa-solid fa-star text-warning my-2"></i>
                                        <i class="fa-solid fa-star text-warning my-2"></i>
                                        <i class="fa-solid fa-star text-warning my-2"></i>
                                        <i class="fa-solid fa-star text-warning my-2"></i>
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
        <!-- END MORE PRODUCT -->

    </div>
    </div>
@endsection
