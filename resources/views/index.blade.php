@extends('layouts.master')

@section('content')
<!-- BANNER  -->
<div class="banner">
    <img src="{{ asset('img/banner/banner.jpg') }}" class="w-100" alt>
    <div class="content-banner d-lg-block d-none">
        <h1 class="title-content-banner" style="font-size: 60px;"><b
                class="underline-custom">Enhance</b> your space with
            beautiful furniture</h1>
        <button class="button-banner">Furniture catelog<i
                class="fa-solid fa-circle-chevron-right mx-2"></i></button>
    </div>
    <div class="content-banner d-md-block d-lg-none">
        <h1 class="title-content-banner" style="font-size: 30px;"><b
                class="underline-custom">Enhance</b> your space with
            beautiful furniture</h1>
        <button class="button-banner">Furniture catelog<i
                class="fa-solid fa-circle-chevron-right mx-2"></i></button>
    </div>
    <div class="product-introduce position-absolute d-lg-block d-none">
        <div class="row text-center">
            <div class="col-md-3 product-introduce-item mx-3 px-2 py-3">
                <img src="{{ asset('img/more/Armchair -2 1.png') }}"
                    class="w-100" alt>
                <h5>Chairs</h5>
                <span>24 products</span>
            </div>
            <div class="col-md-3 product-introduce-item mx-3 px-2 py-3">
                <img src="{{ asset('img/more/Sofa -9 1.png') }}" class="w-100"
                    alt>
                <h5>Sofa</h5>
                <span>24 products</span>
            </div>
            <div class="col-md-3 product-introduce-item mx-3 px-2 py-3">
                <img src="{{ asset('img/more/Slipper -2 1.png') }}"
                    class="w-100" alt>
                <h5>Chairs</h5>
                <span>24 products</span>
            </div>
        </div>
    </div>
</div>
<!-- END BANNER -->
<!-- START ARTICLE -->
<div class="article">
    <div class="container">
        <!-- TRENDING PRODUCT -->
        <div class="row my-4">
            <div class="col-lg-3 col-md-12 col-sm-12">
                <span class="text-warning">HIGHT QUALITY</span>
                <h2 class="fs-1">Our Trending Products</h2>
                <p class="text-secondary">Lorem ipsum dolor sit, amet
                    consectetur adipisicing elit. Dolores a nam nulla
                    cupiditate voluptatum itaque praesentium accusamus
                    et, corrupti, doloribus eos suscipit voluptas ea
                    iusto animi hic consequatur sit vero!</p>
                <button class="button-trending"><a href>View all<i
                            class="fa-solid fa-arrow-right mx-2"></i></a></button>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12">
                <div class="row">
                    @foreach ($data as $item)
                        <div class="col-md-3">
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
        <!-- END TRENDING PRODUCT -->

        <!-- START ADVERTISEMENT -->
        <div class="banner-advertisement my-5 position-relative">
            <img src="{{ asset('img/banner/banner-2.jpg') }}"
                class="w-100 rounded-4" alt>
            <div
                class="content-advertisement-1 position-absolute text-center">
                <span class="fs-4">28 % OFF</span>
                <h2 class="title-advertisement"
                    style="font-size: 50px;">Luxurious table and chair
                    set</h2>
                <p>Dont miss our best discount for this month for our
                    subscribers</p>
                <button><a href>subscribe now <i
                            class="fa-solid fa-arrow-right-long"></i></a></button>
            </div>
        </div>
        <!-- END ADVERTISEMENT -->

        <!-- START OUR SERVICE -->
        <div class="our-service my-4 text-center">
            <div class="title-our-service">
                <span class="text-warning">THE BEST</span>
                <h2 class="fs-1">Our Services</h2>
            </div>
            <div class="row my-5 mx-5">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <img src="{{ asset('img/more/service.jpg') }}"
                        class="w-100 rounded-4" alt>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <i
                        class="fa-solid fa-truck-fast fs-1 my-2 text-warning"></i>
                    <h5 class="my-2">Delivery adn installation</h5>
                    <p style="font-size: 13px;"
                        class="text-secondary my-2">Lorem ipsum dolor
                        sit amet consectetur adipisicing elit. Tempore
                        perferendis, dolore, blanditiis animi ipsam
                        aliquid officia suscipit voluptate cupiditate
                        illum totam omnis ad modi labore assumenda a!
                        Possimus, iste quaerat.</p>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <img src="{{ asset('img/more/service-1.jpg') }}"
                        class="w-100 rounded-4" alt>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                    <i
                        class="fa-solid fa-pen-nib fs-1 my-2 text-warning"></i>
                    <h5 class="my-2">Furniture Design</h5>
                    <p style="font-size: 13px;"
                        class="text-secondary my-2">Lorem ipsum dolor
                        sit amet consectetur adipisicing elit. Tempore
                        perferendis, dolore, blanditiis animi ipsam
                        aliquid officia suscipit voluptate cupiditate
                        illum totam omnis ad modi labore assumenda a!
                        Possimus, iste quaerat.</p>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                    <img src="{{ asset('img/more/service-2.jpg') }}"
                        class="w-100 rounded-4" alt>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                    <i
                        class="fa-solid fa-box fs-1 my-2 text-warning"></i>
                    <h5 class="my-2">Furniture Manufacturing</h5>
                    <p style="font-size: 13px;"
                        class="text-secondary my-2">Lorem ipsum dolor
                        sit amet consectetur adipisicing elit. Tempore
                        perferendis, dolore, blanditiis animi ipsam
                        aliquid officia suscipit voluptate cupiditate
                        illum totam omnis ad modi labore assumenda a!
                        Possimus, iste quaerat.</p>
                </div>
            </div>
        </div>
        <!-- END OUR SERVICE -->

        <!-- START WHY CHOOSE US -->
        <div class="why-choose-us">
            <img src="{{ asset('img/more/whychooseus.png') }}"
                class="w-100 rounded-4 my-4" alt>
        </div>
        <!-- END WHY CHOOSE US -->
    </div>

    <!-- START FAQ FROM OUR SUPPORT -->
    <div class="faq-support my-5">
        <div class="row w-100">
            <div class="col-md-6 col-sm-12">
                <img src="{{ asset('img/more/support.jpg') }}" class="w-100"
                    alt>
            </div>
            <div class="col-md-6 col-sm-12 px-5">
                <span class="text-warning">POPULAR FAQS</span>
                <h2 class="fs-1 fw-bold"
                    style="font-size: 40px;">Discover FAQs from Our
                    Support</h2>
                <p class="text-warning mt-5">How do i place an order
                    ?</p>
                <p class="text-decoration">Lorem ipsum dolor sit amet
                    consectetur adipisicing elit. Reprehenderit illo
                    accusamus voluptate! Repudiandae earum amet ipsam
                    optio. Neque corporis excepturi rerum assumenda quo!
                    A iure modi asperiores tempora eaque
                    dignissimos.</p>
                <div
                    class="answer-popular d-flex justify-content-between py-3">
                    <p class="fw-bold">What payment methods do you
                        accept ?</p>
                    <i class="fa-solid fa-plus"
                        style="transform: translateY(1px);"></i>
                </div>
                <div
                    class="answer-popular d-flex justify-content-between py-3">
                    <p class="fw-bold">Do you offer customazation
                        options for furniture ?</p>
                    <i class="fa-solid fa-plus"
                        style="transform: translateY(1px);"></i>
                </div>
                <div
                    class="answer-popular d-flex justify-content-between py-3">
                    <p class="fw-bold">What is your return policy ?</p>
                    <i class="fa-solid fa-plus"
                        style="transform: translateY(1px);"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- END FAQ FROM OUR SUPPORT -->

    <div class="container">
        <!-- START FEEDBACK -->
        <div
            class="mx-5 feedback-title my-2 d-flex justify-content-between">
            <div class="title-feedback">
                <span class="text-warning">REAL TESTIMONIALS</span>
                <h2 class="fs-1">What People Say About Us</h2>
            </div>
            <div class="load-all-feedback">
                <button>
                    <a href>All Testimonials<i
                            class="fa-solid fa-arrow-right mx-1"></i></a>
                </button>
            </div>
        </div>
        <div class="feedback-content mx-5 ">
            <div class="row">
                <div class="col-md-4 col-sm-12 my-2">
                    <div class="feedback-img">
                        <img src="{{ asset('img/more/feedback-1.png') }}"
                            class="w-100 rounded-4" alt>
                    </div>
                    <div class="feedback-date my-2">
                        <span class="text-secondary">SEPTEMBER 7,
                            2004</span>
                    </div>
                    <div class="feedback-description">
                        <p>Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Excepturi nobis recusandae
                            rerum minus perspiciatis repellat aliquid
                            et.</p>
                    </div>
                    <div class="feedback-user-in4 d-flex">
                        <div class="feedback-user-avt rounded-circle">
                            <img src="{{ asset('img/avt/avt3.jpg') }}" alt>
                        </div>
                        <span class="mx-2">PHAMAN</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 my-2">
                    <div class="feedback-img">
                        <img src="{{ asset('img/more/feedback-2.png') }}"
                            class="w-100 rounded-4" alt>
                    </div>
                    <div class="feedback-date my-2">
                        <span class="text-secondary">SEPTEMBER 7,
                            2004</span>
                    </div>
                    <div class="feedback-description">
                        <p>Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Excepturi nobis recusandae
                            rerum minus perspiciatis repellat aliquid
                            et.</p>
                    </div>
                    <div class="feedback-user-in4 d-flex">
                        <div class="feedback-user-avt rounded-circle">
                            <img src="{{ asset('img/avt/avt1.jpg') }}" alt>
                        </div>
                        <span class="mx-2">ANPHAM</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 my-2">
                    <div class="feedback-img">
                        <img src="{{ asset('img/more/feedback-3.png') }}"
                            class="w-100 rounded-4" alt>
                    </div>
                    <div class="feedback-date my-2">
                        <span class="text-secondary">SEPTEMBER 7,
                            2004</span>
                    </div>
                    <div class="feedback-description">
                        <p>Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Excepturi nobis recusandae
                            rerum minus perspiciatis repellat aliquid
                            et.</p>
                    </div>
                    <div class="feedback-user-in4 d-flex">
                        <div class="feedback-user-avt rounded-circle">
                            <img src="{{ asset('img/avt/avt2.jpg') }}" alt>
                        </div>
                        <span class="mx-2">BAOAN</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- END FEEDBACK -->

        <!-- START Galery Image -->
        <div class="container">
            <div class="gallery-image my-5">
                <div class="title-our-service text-center">
                    <span class="text-warning">@NAMEFERNITURE</span>
                    <h2 class="fs-1">Our Instagram</h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('img/more/feedback-1.png') }}"
                            class="w-100" alt>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset('img/banner/banner.jpg') }}"
                            class="w-100" alt>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset('img/more/feedback-3.png') }}"
                            class="w-100" alt>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <img src="{{ asset('img/more/feedback-2.png') }}"
                            class="w-100" alt>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <img
                                    src="{{ asset('img/more/feedback-4.png') }}"
                                    class="w-100" alt>
                            </div>
                            <div class="col-md-6">
                                <img
                                    src="{{ asset('img/more/feedback-5.png') }}"
                                    class="w-100" alt>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Galery Image -->
    </div>
@endsection
