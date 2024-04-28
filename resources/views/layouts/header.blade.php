<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nội thất Phạm An</title>

<body>
    <!-- START HEADER -->
    <nav class="navbar navbar-expand-lg navbar-dark blurred-header">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <a href="{{ route('index') }}" style="text-decoration: none; color: white;"><h5><i class="fa-solid fa-couch mx-1 text-warning"></i>AN DEV</h5></a>
            </a>

            <!-- Toggler button for mobile -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu Items -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 py-2">
                    <li class="nav-item px-lg-3">
                        <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="nav-item px-lg-3">
                        <a class="nav-link text-white" href="{{ route('product-page') }}">Product</a>
                    </li>
                    <li class="nav-item px-lg-3">
                        <a class="nav-link text-white" href="#">Contact
                            Us</a>
                    </li>
                    <li class="nav-item px-lg-3">
                        <a class="nav-link text-white" href="#">About Us</a>
                    </li>
                    <li class="nav-item px-lg-3 d-lg-none d-md-block">
                        <a class="nav-link text-white" href="#">Cart</a>
                    </li>
                    @if (session()->has('role'))
                        @if (session()->get('role') == 1)
                            <li class="nav-item d-lg-none d-md-block">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="text-white">Hi: {{ session()->get('name') }}</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('order-history') }}">Order
                                                History</a></li>
                                        <li><a class="dropdown-item" href="#">Setting</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}">Log out</a></li>
                                    </ul>
                                </div>
                            </li>
                        @else
                            <li class="nav-item d-lg-none d-md-block">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="text-white">Hi: {{ session()->get('name') }}</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('order-history') }}">Products
                                                Manager</a></li>
                                        <li><a class="dropdown-item" href="{{ route('order-history') }}">Categories
                                                Manager</a></li>
                                        <li><a class="dropdown-item" href="{{ route('order-history') }}">Brands
                                                Manager</a></li>
                                        <li><a class="dropdown-item" href="{{ route('order-history') }}">Orders
                                                Manager</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}">Log out</a></li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                    @else
                        <li class="nav-item px-lg-3 d-md-none d-block">
                            <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item px-lg-3 d-md-none d-block">
                            <a class="nav-link text-white" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                </ul>
            </div>

            <!-- Shopping Cart -->
            <div class="menu-right d-none d-lg-block">
                <ul class="d-flex align-items-center mt-4">
                    @if (session()->has('role'))
                        @if (session()->get('role') == 1)
                            <li class="nav-item d-none d-lg-block">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="text-white">Hi: {{ session()->get('name') }}</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('order-history') }}">Order
                                                History</a></li>
                                        <li><a class="dropdown-item" href="#">Setting</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}">Log out</a></li>
                                    </ul>
                                </div>
                            </li>
                        @else
                            <li class="nav-item d-none d-lg-block">
                                <li class="nav-item d-none d-lg-block">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="text-white">Hi: {{ session()->get('name') }}</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('Product.index') }}">Products
                                                    Manager</a></li>
                                            <li><a class="dropdown-item" href="{{ route('Category.index') }}">Categories
                                                    Manager</a></li>
                                            <li><a class="dropdown-item" href="{{ route('Brand.index') }}">Brands
                                                    Manager</a></li>
                                            <li><a class="dropdown-item" href="{{ route('order-history') }}">Orders
                                                    Manager</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="{{ route('logout') }}">Log out</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </li>
                        @endif
                    @else
                        <li class="menu-item">
                            <div class="auth-menu">
                                <a href="{{ route('login') }}"><i class="fa-solid fa-user text-white fs-5"></i></a>
                            </div>
                        </li>
                    @endif
                    <li class="menu-item px-3">
                        <div class="cart-menu position-relative">
                            <a href="{{ route('ViewCart') }}" class="text-decoration-none"><i class="fa-solid fa-bag-shopping text-white fs-5"></i></a>
                            <span
                                class="position-absolute quantity-product-incart rounded-5">{{ $totalQuantity }}</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END HEADER -->
