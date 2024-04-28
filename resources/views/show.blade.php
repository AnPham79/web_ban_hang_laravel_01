@extends('layouts.master')

@section('content')
    <div class="product-detail">
        <div class="container my-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-dark">Detail</a></li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">

                        <!-- PRODUCT IMAGE -->
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ $data->img_product }}" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('img/product/product-2.jpg') }}" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('img/product/product-3.jpg') }}" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <div class="gallery-product">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="{{ asset('img/product/product-1.jpg') }}" class="w-100" alt="">
                                    </div>
                                    <div class="col-4">
                                        <img src="{{ asset('img/product/product-2.jpg') }}" class="w-100" alt="">
                                    </div>
                                    <div class="col-4">
                                        <img src="{{ asset('img/product/product-3.jpg') }}" class="w-100" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PRODUCT IMAGE -->

                        <!-- DESCRIPTION PRODUCT -->
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="product-detail-rate py-2">
                                <i class="fa-solid fa-star" style="font-size: 13px;"></i>
                                <i class="fa-solid fa-star" style="font-size: 13px;"></i>
                                <i class="fa-solid fa-star" style="font-size: 13px;"></i>
                                <i class="fa-solid fa-star" style="font-size: 13px;"></i>
                                <i class="fa-solid fa-star" style="font-size: 13px;"></i>
                                <span class="text-secondary">(05
                                    review)</span>
                            </div>
                            <div class="product-detail-name">
                                <h5>{{ $data->name_product }}</h5>
                            </div>
                            <div class="product-detail-short--description my-4">
                                <p class="text-secondary">{{ $data->short_description }}</p>
                            </div>
                            <div class="product-detail-social--list">
                                <img src="./public/img/more/social-list.png" alt>
                            </div>
                            <div class="product-detail-price my-2">
                                <span>Price: <b>$ {{ $data->price_product }}</b></span>
                            </div>
                            <div class="product-detail-Availability">
                                <span class="text-secondary" style="font-size: 13px;">Availability:
                                    <b class="text-warning">
                                        @if ($data->stock_status == 'in_stock')
                                            in stock
                                        @else
                                            out of stock
                                        @endif
                                    </b>
                                </span>
                            </div>
                            <div class="product-detail-button-atc">
                                <form action="{{ route('addToCartInDetail', ['id' => $data->id]) }}" method="post">
                                    @csrf
                                    <div class="product-detail-quantity">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="quantity-btn" onclick="decreaseQuantity()">-</button>
                                            </span>
                                            <input type="number" min="1" value="1" id="quantity" name="quantity" class="form-control">
                                            <span class="input-group-btn">
                                                <button type="button" class="quantity-btn" onclick="increaseQuantity()">+</button>
                                            </span>
                                        </div>
                                    </div>
                                    <button class="btn btn-warning text-white rounded-0 w-100 my-3 add-to-cart-btn">Add
                                        to cart</button>
                                </form>
                            </div>
                            <div class="product-detail-more--action">
                                <ul>
                                    <li><a href class="text-secondary"><i class="fa-solid fa-code-compare mx-2"></i>Add
                                            Compare</a></li>
                                    <li><a href class="text-secondary"><i class="fa-solid fa-heart mx-2"></i>Add
                                            Wishlish</a></li>
                                </ul>
                            </div>
                            <div class="product-detail-description">
                                <h5>Description</h5>
                                <p>{!! nl2br($data->description_product) !!}</p>
                            </div>
                        </div>
                    </div>
                    <!-- END DESCRIPTION PRODUCT -->

                    <!-- COMMIT -->
                    <div class="commit">
                        <h5>Commit</h5>
                        <p class="text-secondary">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde animi
                            commodi ex harum, ea quas aspernatur quos qui alias eveniet! Autem rerum quia est dolorem
                            provident at, doloremque quidem. Nihil.
                            Eius modi consequatur, delectus excepturi aut magni. Magnam sunt nisi voluptatem eligendi facere
                            maxime impedit vitae vero placeat reprehenderit illum numquam in minus, tempore exercitationem,
                            quam laboriosam, fugiat nam aperiam.
                            Obcaecati aut delectus aliquam odit, ducimus unde veniam culpa atque? Asperiores natus dolores
                            consequuntur atque voluptatum eum quos? Similique provident magni enim soluta perspiciatis
                            aliquid suscipit. Nam magnam dignissimos dolores.</p>
                    </div>
                    <!-- END COMMIT -->

                    <!-- COMMENT -->
                    <div class="comment">
                        <h5>Comment</h5>
                            @if(session()->has('role'))
                                @if ($comment->count() > 0)
                                    @foreach ($comment as $each)
                                        <div class="row align-items-center border-top border-bottom py-3 my-3">
                                            <div class="col-lg-2 col-md-12 col-sm-12 d-flex avt-comment">
                                                <img src="./public/img/avt/avt1.jpg"
                                                    class="rounded-circle overflow-hidden object-fit-cover me-3" alt="Avatar">
                                                <span class="name-user fw-bold">{{ $each->name }}</span>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-10">
                                                <div class="rate d-flex align-items-center">
                                                    <i class="fa-solid fa-star text-warning" style="font-size: 13px;"></i>
                                                    <i class="fa-solid fa-star text-warning" style="font-size: 13px;"></i>
                                                    <i class="fa-solid fa-star text-warning" style="font-size: 13px;"></i>
                                                    <i class="fa-solid fa-star text-warning" style="font-size: 13px;"></i>
                                                    <i class="fa-solid fa-star text-warning" style="font-size: 13px;"></i>
                                                    <div class="date text-secondary ms-auto">
                                                        <i>22/5/2024</i>
                                                    </div>
                                                </div>
                                                <div class="comment">
                                                    <p class="mb-0">{{ $each->feedback }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else 
                                    <p class="text-secondary" style="font-size: 13px">Product has no comments</p>
                                @endif
                                <h3 class="mt-5">What do you think ?</h3>
                                <form action="{{ route('comment', ['id' => $data->id]) }}" method="POST" class="mb-5">
                                    @csrf
                                    @method('POST')
                                    <div class="mb-3">
                                        <label for class="form-label">Write your comment</label>
                                        <input type="text" class="form-control border-primary" name="feedback"
                                            placeholder="Write comment here" style="height: 100px;">
                                    </div>
                                    <div class="mb-3 text-end">
                                        <button class="btn btn-warning text-white" type="submit">Submit</button>
                                    </div>
                                </form>
                            @else
                                <p class="text-secondary" style="font-size: 13px">please login <a href="{{ route('login') }}">here</a> to comment !</p>
                            @endif
                    </div>
                    <!-- END COMMENT -->
                </div>

                <!-- ENDOW AND POPULAR PRODUCT -->
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="cr7">
                        <div class="endow-all">
                            <div class="product-detail-endow-from--shop my-3">
                                <div class="product-detail-endow-icon fs-1 text-warning">
                                    <i class="fa-solid fa-truck-fast mx-4"></i>
                                </div>
                                <div class="product-detail-endow-desciption">
                                    <h5 class="fw-bold">Free Shipping</h5>
                                    <span class="text-secondary">Free On Oder Over $99</span>
                                    <p>Lorem
                                        ipsum dolor sit amet consectetur adipisicing
                                        elit...
                                    </p>
                                </div>
                            </div>
                            <div class="product-detail-endow-from--shop my-3">
                                <div class="product-detail-endow-icon fs-1 text-warning">
                                    <i class="fa fa-credit-card-alt mx-4"></i>
                                </div>
                                <div class="product-detail-endow-desciption">
                                    <h5 class="fw-bold">Safe Payment</h5>
                                    <span class="text-secondary">Safe your online payment</span>
                                    <p>Lorem
                                        ipsum dolor sit amet consectetur adipisicing
                                        elit...
                                    </p>
                                </div>
                            </div>
                            <div class="product-detail-endow-from--shop my-3">
                                <div class="product-detail-endow-icon fs-1 text-warning">
                                    <i class="fa fa-recycle mx-4"></i>
                                </div>
                                <div class="product-detail-endow-desciption">
                                    <h5 class="fw-bold">Guarantee</h5>
                                    <span class="text-secondary">30 Days Money Back</span>
                                    <p>Lorem
                                        ipsum dolor sit amet consectetur adipisicing
                                        elit...
                                    </p>
                                </div>
                            </div>
                            <div class="product-detail-endow-from--shop my-3">
                                <div class="product-detail-endow-icon fs-1 text-warning">
                                    <i class="fa fa-life-ring mx-4"></i>
                                </div>
                                <div class="product-detail-endow-desciption">
                                    <h5 class="fw-bold">Online Suport</h5>
                                    <span class="text-secondary">We Have Support 24/7</span>
                                    <p>Lorem
                                        ipsum dolor sit amet consectetur adipisicing
                                        elit...
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="product-popular-in--detail">
                            <h5 class="text-warning fw-bold">POPULAR PRODUCTS</h5>
                            <div class="product-popular-from--shop my-3">
                                @foreach($product_popular as $product)
                                    <div class="row my-2">
                                        <div class="col-4">
                                            <div class="product-popular-endow-img fs-1 text-warning">
                                                <img src="{{ $product->img_product }}" class="w-100" alt="">
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="product-popular-desciption">
                                                <div class="product-popular-name">
                                                    <a href="">
                                                        <p>{{ $product->name_product }}</p>
                                                    </a>
                                                </div>
                                                <div class="product-popular-price">
                                                    <span class="text-secondary">Price: <b>$ {{ $product->price_product }}</b></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END ENDOW AND POPULAR PRODUCT -->


            </div>
            <!-- MORE PRODUCT -->
            <div class="more-product">
                <h5 class="title-more-product">More product</h5>
                <div class="row">
                    @foreach ($more_product as $item)
                        <div class="col-lg-2 col-md-4 col-sm-12">
                            <div class="product">
                                <div
                                    class="product-image position-relative">
                                    <a href="{{ route('show', ['id' => $item->id]) }}">
                                        <img
                                            src="{{ $item->img_product }}"
                                            class="w-100" alt>
                                    </a>
                                    <form action="{{ route('addToCartInDetail', ['id' => $item->id]) }}" method="post">
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
        <!-- END MORE PRODUCT -->
    </div>

    <script>
        function increaseQuantity() {
            var quantityInput = document.getElementById('quantity');
            quantityInput.value = parseInt(quantityInput.value) + 1;
        }

        function decreaseQuantity() {
            var quantityInput = document.getElementById('quantity');
            if (parseInt(quantityInput.value) > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        }
    </script>
@endsection
