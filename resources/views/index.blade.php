<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Olog - Home</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

    <style>
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 10px 20px;
            position: sticky;
            /* Make the navbar sticky */
            top: 0;
            /* Stick to the top */
            z-index: 1000;
            /* Ensure it stays above other content */
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            transition: background-color 0.3s;
        }

        .navbar a:hover {
            background-color: #575757;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .navbar-icons {
            display: flex;
            align-items: center;
        }

        .navbar-icons i {
            color: white;
            font-size: 20px;
            margin-left: 15px;
            cursor: pointer;
        }

        .button {
            background-color: #28a745;
            /* Green background */
            color: white;
            /* White text */
            border: none;
            /* No border */
            padding: 10px 20px;
            /* Padding */
            border-radius: 5px;
            /* Rounded corners */
            cursor: pointer;
            /* Pointer cursor on hover */
            font-size: 16px;
            /* Font size */
            transition: transform 0.3s ease, background-color 0.3s ease;
            /* Transition for hover effects */
            position: relative;
            /* Position for pseudo-element */
            overflow: hidden;
            /* Hide overflow for pseudo-element */
        }

        .button:hover {
            background-color: #218838;
            /* Darker green on hover */
            transform: translateY(-3px);
            /* Slight lift effect on hover */
        }

        .button::before {
            content: '';
            /* Pseudo-element for animation effect */
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            /* Larger than button to create ripple effect */
            height: 300%;
            /* Larger than button to create ripple effect */
            background-color: rgba(255, 196, 0, 0.5);
            /* White color with transparency */
            border-radius: 50%;
            /* Circular shape */
            transform: translate(-50%, -50%) scale(0);
            /* Start scaled down */
            transition: transform 0.5s ease;
            /* Transition for scaling effect */
        }

        .button:hover::before {
            transform: translate(-50%, -50%) scale(1);
            /* Scale up on hover */
        }
    </style>



</head>

<body>
    <!-- Header Area Start -->
    <header class="header">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="header-top-wrapper">
                            <div class="header-top-info">
                                <div class="email">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16.95" height="13.4"
                                            viewBox="0 0 16.95 13.4">
                                            <g id="Mail" transform="translate(0.975 0.7)">
                                                <path id="Path_1" data-name="Path 1"
                                                    d="M3.5,4h12A1.5,1.5,0,0,1,17,5.5v9A1.5,1.5,0,0,1,15.5,16H3.5A1.5,1.5,0,0,1,2,14.5v-9A1.5,1.5,0,0,1,3.5,4Z"
                                                    transform="translate(-2 -4)" fill="none" stroke="#1a2224"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" />
                                                <path id="Path_2" data-name="Path 2" d="M17,6,9.5,11.25,2,6"
                                                    transform="translate(-2 -4.5)" fill="none" stroke="#1a2224"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" />
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="text">
                                        <span>olog.wetbise@mail.com</span>
                                    </div>
                                </div>
                                <div class="cta">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13.401" height="13.401"
                                            viewBox="0 0 13.401 13.401">
                                            <g id="Phone_Icon" data-name="Phone Icon" transform="translate(0.7 0.7)">
                                                <path id="Phone_Icon-2" data-name="Phone Icon"
                                                    d="M14.111,10.984v1.806A1.206,1.206,0,0,1,12.8,14a11.956,11.956,0,0,1-5.207-1.849,11.754,11.754,0,0,1-3.62-3.613A11.9,11.9,0,0,1,2.117,3.313,1.205,1.205,0,0,1,3.317,2h1.81A1.206,1.206,0,0,1,6.334,3.036a7.719,7.719,0,0,0,.422,1.692A1.2,1.2,0,0,1,6.485,6l-.766.765a9.644,9.644,0,0,0,3.62,3.613l.766-.765a1.208,1.208,0,0,1,1.273-.271,7.76,7.76,0,0,0,1.7.422,1.205,1.205,0,0,1,1.038,1.222Z"
                                                    transform="translate(-2.112 -2)" fill="none" stroke="#1a2224"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" />
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="text">
                                        <span>+8801658 874521</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="d-none d-lg-block">
                    <nav class="menu-area d-flex align-items-center">
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('images/logo/logo.png') }}" alt="logo" /></a>
                        </div>
                        <ul class="main-menu d-flex align-items-center">
                            <a href="{{ route('shop') }}" style="margin-right: 10px">Home</a>
                            <a href="{{ route('shop') }}" style="margin-right: 10px">Men</a>
                            <a href="{{ route('shop') }}" style="margin-right: 10px">Women</a>
                            <a href="{{ route('shop') }}" style="margin-right: 10px">Shop</a>


                        </ul>

                        <div class="menu-icon ml-auto">
                            <ul>
                                <li>
                                    <a href="wishlist.html">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20"
                                            viewBox="0 0 22 20">
                                            <g id="Heart" transform="translate(1 1)">
                                                <path id="Heart-2" data-name="Heart"
                                                    d="M20.007,4.59a5.148,5.148,0,0,0-7.444,0L11.548,5.636,10.534,4.59a5.149,5.149,0,0,0-7.444,0,5.555,5.555,0,0,0,0,7.681L4.1,13.317,11.548,21l7.444-7.681,1.014-1.047a5.553,5.553,0,0,0,0-7.681Z"
                                                    transform="translate(-1.549 -2.998)" fill="#fff" stroke="#1a2224"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            </g>
                                        </svg>
                                        <span class="heart">3</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="cart.html"><svg xmlns="http://www.w3.org/2000/svg" width="22"
                                            height="22" viewBox="0 0 22 22">
                                            <g id="Icon" transform="translate(-1524 -89)">
                                                <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.909"
                                                    cy="0.952" rx="0.909" ry="0.952"
                                                    transform="translate(1531.364 108.095)" fill="none"
                                                    stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" />
                                                <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.909"
                                                    cy="0.952" rx="0.909" ry="0.952"
                                                    transform="translate(1541.364 108.095)" fill="none"
                                                    stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" />
                                                <path id="Path_3" data-name="Path 3"
                                                    d="M1,1H4.636L7.073,13.752a1.84,1.84,0,0,0,1.818,1.533h8.836a1.84,1.84,0,0,0,1.818-1.533L21,5.762H5.545"
                                                    transform="translate(1524 89)" fill="none" stroke="#1a2224"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" />
                                            </g>
                                        </svg>
                                        <span class="cart">3</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="account.html"><svg xmlns="http://www.w3.org/2000/svg" width="18"
                                            height="20" viewBox="0 0 18 20">
                                            <g id="Account" transform="translate(1 1)">
                                                <path id="Path_86" data-name="Path 86"
                                                    d="M20,21V19a4,4,0,0,0-4-4H8a4,4,0,0,0-4,4v2"
                                                    transform="translate(-4 -3)" fill="none" stroke="#000"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" />
                                                <circle id="Ellipse_9" data-name="Ellipse 9" cx="4"
                                                    cy="4" r="4" transform="translate(4)" fill="#fff"
                                                    stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" />
                                            </g>
                                        </svg></a>
                                </li>
                            </ul>
                        </div>
                        <div class="navbar-icons">
                            <i class="fas fa-shopping-cart" style="margin-right: 11px" title="Cart"></i>


                            @if (!session('email_session'))
                                <a href="{{ route('loginform') }}">
                                    <button class="button">Login</button>
                                </a>
                                <a href="{{ route('registerform') }}">
                                    <button class="button" style="margin-left: 10px;">Signup</button>
                                </a>
                            @else
                                <p style="margin-right:15px;color:rgb(0, 0, 0)">Welcome {{ session('name_session') }}
                                </p>

                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="button">Logout</button>
                                </form>
                            @endif
                    </nav>
                </div>
                <!-- Mobile Menu -->
                <aside class="d-lg-none">
                    <div id="mySidenav" class="sidenav">
                        <div class="close-mobile-menu">
                            <a href="javascript:void(0)" id="menu-close" class="closebtn"
                                onclick="closeNav()">&times;</a>
                        </div>
                        <div class="search-bar">
                            <input type="text" placeholder="Search for product...">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20.414" height="20.414"
                                    viewBox="0 0 20.414 20.414">
                                    <g id="Search_Icon" data-name="Search Icon" transform="translate(1 1)">
                                        <ellipse id="Ellipse_1" data-name="Ellipse 1" cx="8.158" cy="8"
                                            rx="8.158" ry="8" fill="none" stroke="#1a2224"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        <line id="Line_4" data-name="Line 4" x1="3.569" y1="3.5"
                                            transform="translate(14.431 14.5)" fill="none" stroke="#1a2224"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="shop.html">Men</a></li>
                        <li><a href="shop.html">Women</a></li>
                        <li><a href="shop.html">Shop</a></li>
                        <li>
                            <a href="javascript:void(0)">Category
                                <svg xmlns="http://www.w3.org/2000/svg" width="9.98" height="5.69"
                                    viewBox="0 0 9.98 5.69">
                                    <g id="Arrow" transform="translate(0.99 0.99)">
                                        <path id="Arrow-2" data-name="Arrow" d="M1474.286,26.4l4,4,4-4"
                                            transform="translate(-1474.286 -26.4)" fill="none" stroke="#1a2224"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" />
                                    </g>
                                </svg>
                            </a>

                        </li>
                    </div>
                    <div class="mobile-nav d-flex align-items-center justify-content-between">


                        <div class="menu-icon">
                            <ul>
                                <li> <a href="wishlist.html">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20"
                                            viewBox="0 0 22 20">
                                            <g id="Heart" transform="translate(1 1)">
                                                <path id="Heart-2" data-name="Heart"
                                                    d="M20.007,4.59a5.148,5.148,0,0,0-7.444,0L11.548,5.636,10.534,4.59a5.149,5.149,0,0,0-7.444,0,5.555,5.555,0,0,0,0,7.681L4.1,13.317,11.548,21l7.444-7.681,1.014-1.047a5.553,5.553,0,0,0,0-7.681Z"
                                                    transform="translate(-1.549 -2.998)" fill="#fff"
                                                    stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" />
                                            </g>
                                        </svg>
                                        <span class="heart">3</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="cart.html">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 22 22">
                                            <g id="Icon" transform="translate(-1524 -89)">
                                                <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.909"
                                                    cy="0.952" rx="0.909" ry="0.952"
                                                    transform="translate(1531.364 108.095)" fill="none"
                                                    stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" />
                                                <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.909"
                                                    cy="0.952" rx="0.909" ry="0.952"
                                                    transform="translate(1541.364 108.095)" fill="none"
                                                    stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" />
                                                <path id="Path_3" data-name="Path 3"
                                                    d="M1,1H4.636L7.073,13.752a1.84,1.84,0,0,0,1.818,1.533h8.836a1.84,1.84,0,0,0,1.818-1.533L21,5.762H5.545"
                                                    transform="translate(1524 89)" fill="none" stroke="#1a2224"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" />
                                            </g>
                                        </svg>
                                        <span class="cart">3</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="account.html">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20"
                                            viewBox="0 0 18 20">
                                            <g id="Account" transform="translate(1 1)">
                                                <path id="Path_86" data-name="Path 86"
                                                    d="M20,21V19a4,4,0,0,0-4-4H8a4,4,0,0,0-4,4v2"
                                                    transform="translate(-4 -3)" fill="none" stroke="#000"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" />
                                                <circle id="Ellipse_9" data-name="Ellipse 9" cx="4"
                                                    cy="4" r="4" transform="translate(4)" fill="#fff"
                                                    stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" />
                                            </g>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="hamburger-menu">
                            <a style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</a>
                        </div>
                    </div>
                </aside>
                <!-- Body overlay -->
                <div class="overlay" id="overlayy"></div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->




    <main>
        <!--Banner Area Start -->
        @foreach ($data as $banner_picture)
            <section class="banner-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 order-2 order-lg-1">
                            <div class="banner-area__content">
                                <h2>Premium care for
                                    premium people.</h2>
                                <p>Not ready for a subscription? Shop all a la carté skin, hair, and body care.</p>
                                <a class="btn bg-primary" href="#">{{ $banner_picture->tag }}</a>
                            </div>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2">
                            <div class="banner-area__img">
                                <img src="{{ asset('storage/' . $banner_picture->image) }}" alt="banner-img"
                                    class="img-fluid">

                            </div>
                        </div>
                    </div>
        @endforeach

        <div class="row">
            <div class="col-sm-12">
                <div class="brand-area">
                    <div class="brand-area-image">
                        <img src="{{ asset('images/brand/01.png') }}" alt="Brand" class="img-fluid">
                    </div>
                    <div class="brand-area-image">
                        <img src="{{ asset('images/brand/02.png') }}" alt="Brand" class="img-fluid">
                    </div>
                    <div class="brand-area-image">
                        <img src="{{ asset('images/brand/03.png') }}" alt="Brand" class="img-fluid">
                    </div>
                    <div class="brand-area-image">
                        <img src="{{ asset('images/brand/04.png') }}" alt="Brand" class="img-fluid">
                    </div>
                    <div class="brand-area-image">
                        <img src="{{ asset('images/brand/05.png') }}" alt="Brand" class="img-fluid">
                    </div>
                    <div class="brand-area-image">
                        <img src="{{ asset('images/brand/06.png') }}" alt="Brand" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        </div>
        </section>

        <!--Banner Area End -->
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

        <!-- Features Section Start -->
        <section class="features">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-title">
                            <h2>Featured Products</h2>
                        </div>
                    </div>
                </div>

                <div class="features-wrapper">
                    <div class="features-active">
                        @foreach ($popular_products_data as $products_data)
                            <div class="product-item">
                                <div class="product-item-image">
                                    <a href="{{ route('product-details') }}"><img
                                            src="{{ asset('storage/' . $products_data->image) }}" alt="Product Name"
                                            class="img-fluid"></a>

                                    <div class="cart-icon">
                                        <a href="#"><i class="far fa-heart"></i></a>
                                        <a href="{{ route('product-cart_page', $products_data->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16.75" height="16.75"
                                                viewBox="0 0 16.75 16.75">
                                                <g id="Your_Bag" data-name="Your Bag" transform="translate(0.75)">
                                                    <g id="Icon" transform="translate(0 1)">
                                                        <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.682"
                                                            cy="0.714" rx="0.682" ry="0.714"
                                                            transform="translate(4.773 13.571)" fill="none"
                                                            stroke="#1a2224" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="1.5" />
                                                        <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.682"
                                                            cy="0.714" rx="0.682" ry="0.714"
                                                            transform="translate(12.273 13.571)" fill="none"
                                                            stroke="#1a2224" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="1.5" />
                                                        <path id="Path_3" data-name="Path 3"
                                                            d="M1,1H3.727l1.827,9.564a1.38,1.38,0,0,0,1.364,1.15h6.627a1.38,1.38,0,0,0,1.364-1.15L16,4.571H4.409"
                                                            transform="translate(-1 -1)" fill="none"
                                                            stroke="#1a2224" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="1.5" />
                                                    </g>
                                                </g>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-item-info">
                                    <a href="product-details.html">{{ $products_data->image_name }}</a>
                                    <span>{{ $products_data->price }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="slider-arrows">
                        <div class="prev-arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                                viewBox="0 0 9.414 16.828">
                                <path id="Icon_feather-chevron-left" data-name="Icon feather-chevron-left"
                                    d="M20.5,23l-7-7,7-7" transform="translate(-12.5 -7.586)" fill="none"
                                    stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" />
                            </svg>
                        </div>
                        <div class="next-arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                                viewBox="0 0 9.414 16.828">
                                <path id="Icon_feather-chevron-right" data-name="Icon feather-chevron-right"
                                    d="M13.5,23l5.25-5.25.438-.437L20.5,16l-7-7" transform="translate(-12.086 -7.586)"
                                    fill="none" stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="features-morebutton text-center">
                            {{-- <a class="btn bt-glass" href="#">View All Products</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Features Section End -->

        <!-- About Area Start -->
        <section class="about-area">
            <div class="container">
                <div class="about-area-content">
                    <div class="row align-items-center">
                        <div class="col-lg-6 ">
                            <div class="about-area-content-img">
                                <img src="{{ asset('images/feature/medicine.jpg') }}" alt="img"
                                    class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-area-content-text">
                                <h3>Why Shop with Olog</h3>
                                <p>Fortify your hair follicles, give thinning areas some volume, and treat your
                                    body’s
                                    skin like driving your dream car off the lot.</p>
                                <div class="icon-area-content">
                                    <div class="icon-area">
                                        <i class="far fa-check-circle"></i>
                                        <span>Secure Payment Method.</span>
                                    </div>
                                    <div class="icon-area">
                                        <i class="far fa-check-circle"></i>
                                        <span>24/7 Customers Services.</span>
                                    </div>
                                    <div class="icon-area">
                                        <i class="far fa-check-circle"></i>
                                        <span>Shop in 2 languages</span>
                                    </div>
                                    <div class="icon-area">
                                        <i class="far fa-check-circle"></i>
                                        <span>Mauris congue eros in iaculis.</span>
                                    </div>
                                </div>

                                <a class="btn bg-primary" href="#">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Area End -->

        <!-- Populer Product Strat -->
        <section class="populerproduct">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-title">
                            <h2>Popular Products</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="product-item-image">
                                <a href="{{ route('product-details') }}"><img
                                        src="{{ asset('images/product/01.jpg') }}" alt="Product Name"
                                        class="img-fluid"></a>

                                <div class="cart-icon">
                                    <a href="#"><i class="far fa-heart"></i></a>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16.75" height="16.75"
                                            viewBox="0 0 16.75 16.75">
                                            <g id="Your_Bag" data-name="Your Bag" transform="translate(0.75)">
                                                <g id="Icon" transform="translate(0 1)">
                                                    <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.682"
                                                        cy="0.714" rx="0.682" ry="0.714"
                                                        transform="translate(4.773 13.571)" fill="none"
                                                        stroke="#1a2224" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                    <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.682"
                                                        cy="0.714" rx="0.682" ry="0.714"
                                                        transform="translate(12.273 13.571)" fill="none"
                                                        stroke="#1a2224" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                    <path id="Path_3" data-name="Path 3"
                                                        d="M1,1H3.727l1.827,9.564a1.38,1.38,0,0,0,1.364,1.15h6.627a1.38,1.38,0,0,0,1.364-1.15L16,4.571H4.409"
                                                        transform="translate(-1 -1)" fill="none" stroke="#1a2224"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5" />
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="product-item-info">
                                <a href="product-details.html">PUMA air max 97</a>
                                <span>$975</span> <del>$999</del>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="product-item-image">
                                <a href="{{ route('product-details') }}"><img
                                        src="{{ asset('images/product/02.jpg') }}" alt="Product Name"
                                        class="img-fluid"></a>

                                <div class="cart-icon">
                                    <a href="#"><i class="far fa-heart"></i></a>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16.75" height="16.75"
                                            viewBox="0 0 16.75 16.75">
                                            <g id="Your_Bag" data-name="Your Bag" transform="translate(0.75)">
                                                <g id="Icon" transform="translate(0 1)">
                                                    <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.682"
                                                        cy="0.714" rx="0.682" ry="0.714"
                                                        transform="translate(4.773 13.571)" fill="none"
                                                        stroke="#1a2224" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                    <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.682"
                                                        cy="0.714" rx="0.682" ry="0.714"
                                                        transform="translate(12.273 13.571)" fill="none"
                                                        stroke="#1a2224" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                    <path id="Path_3" data-name="Path 3"
                                                        d="M1,1H3.727l1.827,9.564a1.38,1.38,0,0,0,1.364,1.15h6.627a1.38,1.38,0,0,0,1.364-1.15L16,4.571H4.409"
                                                        transform="translate(-1 -1)" fill="none" stroke="#1a2224"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5" />
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="product-item-info">
                                <a href="product-details.html">Echo Studio. Amazon Echo Studio</a>
                                <span>$175</span> <del>$199</del>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="product-item-image">
                                <a href="{{ route('product-details') }}"><img
                                        src="{{ asset('images/product/03.jpg') }}" alt="Product Name"
                                        class="img-fluid"></a>

                                <div class="cart-icon">
                                    <a href="#"><i class="far fa-heart"></i></a>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16.75" height="16.75"
                                            viewBox="0 0 16.75 16.75">
                                            <g id="Your_Bag" data-name="Your Bag" transform="translate(0.75)">
                                                <g id="Icon" transform="translate(0 1)">
                                                    <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.682"
                                                        cy="0.714" rx="0.682" ry="0.714"
                                                        transform="translate(4.773 13.571)" fill="none"
                                                        stroke="#1a2224" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                    <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.682"
                                                        cy="0.714" rx="0.682" ry="0.714"
                                                        transform="translate(12.273 13.571)" fill="none"
                                                        stroke="#1a2224" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                    <path id="Path_3" data-name="Path 3"
                                                        d="M1,1H3.727l1.827,9.564a1.38,1.38,0,0,0,1.364,1.15h6.627a1.38,1.38,0,0,0,1.364-1.15L16,4.571H4.409"
                                                        transform="translate(-1 -1)" fill="none" stroke="#1a2224"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5" />
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="product-item-info">
                                <a href="product-details.html">Corning Sunglasses for Men.</a>
                                <span>$175</span> <del>$199</del>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="product-item-image">
                                <a href="{{ route('product-details') }}"><img
                                        src="{{ asset('images/product/04.jpg') }}" alt="Product Name"
                                        class="img-fluid"></a>

                                <div class="cart-icon">
                                    <a href="#"><i class="far fa-heart"></i></a>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16.75" height="16.75"
                                            viewBox="0 0 16.75 16.75">
                                            <g id="Your_Bag" data-name="Your Bag" transform="translate(0.75)">
                                                <g id="Icon" transform="translate(0 1)">
                                                    <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.682"
                                                        cy="0.714" rx="0.682" ry="0.714"
                                                        transform="translate(4.773 13.571)" fill="none"
                                                        stroke="#1a2224" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                    <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.682"
                                                        cy="0.714" rx="0.682" ry="0.714"
                                                        transform="translate(12.273 13.571)" fill="none"
                                                        stroke="#1a2224" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                    <path id="Path_3" data-name="Path 3"
                                                        d="M1,1H3.727l1.827,9.564a1.38,1.38,0,0,0,1.364,1.15h6.627a1.38,1.38,0,0,0,1.364-1.15L16,4.571H4.409"
                                                        transform="translate(-1 -1)" fill="none" stroke="#1a2224"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5" />
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="product-item-info">
                                <a href="product-details.html">Canon PowerShot SX540</a>
                                <span>$175</span> <del>$199</del>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="product-item-image">
                                <a href="{{ route('product-details') }}"><img
                                        src="{{ asset('images/product/05.jpg') }}" alt="Product Name"
                                        class="img-fluid"></a>

                                <div class="cart-icon">
                                    <a href="#"><i class="far fa-heart"></i></a>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16.75" height="16.75"
                                            viewBox="0 0 16.75 16.75">
                                            <g id="Your_Bag" data-name="Your Bag" transform="translate(0.75)">
                                                <g id="Icon" transform="translate(0 1)">
                                                    <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.682"
                                                        cy="0.714" rx="0.682" ry="0.714"
                                                        transform="translate(4.773 13.571)" fill="none"
                                                        stroke="#1a2224" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                    <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.682"
                                                        cy="0.714" rx="0.682" ry="0.714"
                                                        transform="translate(12.273 13.571)" fill="none"
                                                        stroke="#1a2224" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                    <path id="Path_3" data-name="Path 3"
                                                        d="M1,1H3.727l1.827,9.564a1.38,1.38,0,0,0,1.364,1.15h6.627a1.38,1.38,0,0,0,1.364-1.15L16,4.571H4.409"
                                                        transform="translate(-1 -1)" fill="none" stroke="#1a2224"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5" />
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="product-item-info">
                                <a href="product-details.html">BERRY TYPE-II: C1N Backpack</a>
                                <span>$175</span> <del>$199</del>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="product-item-image">
                                <a href="{{ route('product-details') }}"><img
                                        src="{{ asset('images/product/06.jpg') }}" alt="Product Name"
                                        class="img-fluid"></a>

                                <div class="cart-icon">
                                    <a href="#"><i class="far fa-heart"></i></a>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16.75" height="16.75"
                                            viewBox="0 0 16.75 16.75">
                                            <g id="Your_Bag" data-name="Your Bag" transform="translate(0.75)">
                                                <g id="Icon" transform="translate(0 1)">
                                                    <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.682"
                                                        cy="0.714" rx="0.682" ry="0.714"
                                                        transform="translate(4.773 13.571)" fill="none"
                                                        stroke="#1a2224" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                    <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.682"
                                                        cy="0.714" rx="0.682" ry="0.714"
                                                        transform="translate(12.273 13.571)" fill="none"
                                                        stroke="#1a2224" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                    <path id="Path_3" data-name="Path 3"
                                                        d="M1,1H3.727l1.827,9.564a1.38,1.38,0,0,0,1.364,1.15h6.627a1.38,1.38,0,0,0,1.364-1.15L16,4.571H4.409"
                                                        transform="translate(-1 -1)" fill="none" stroke="#1a2224"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5" />
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="product-item-info">
                                <a href="product-details.html">Kauri Marine Blue (Green Sole)</a>
                                <span>$175</span> <del>$199</del>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="product-item-image">
                                <a href="{{ route('product-details') }}"><img
                                        src="{{ asset('images/product/07.jpg') }}" alt="Product Name"
                                        class="img-fluid"></a>

                                <div class="cart-icon">
                                    <a href="#"><i class="far fa-heart"></i></a>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16.75" height="16.75"
                                            viewBox="0 0 16.75 16.75">
                                            <g id="Your_Bag" data-name="Your Bag" transform="translate(0.75)">
                                                <g id="Icon" transform="translate(0 1)">
                                                    <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.682"
                                                        cy="0.714" rx="0.682" ry="0.714"
                                                        transform="translate(4.773 13.571)" fill="none"
                                                        stroke="#1a2224" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                    <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.682"
                                                        cy="0.714" rx="0.682" ry="0.714"
                                                        transform="translate(12.273 13.571)" fill="none"
                                                        stroke="#1a2224" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                    <path id="Path_3" data-name="Path 3"
                                                        d="M1,1H3.727l1.827,9.564a1.38,1.38,0,0,0,1.364,1.15h6.627a1.38,1.38,0,0,0,1.364-1.15L16,4.571H4.409"
                                                        transform="translate(-1 -1)" fill="none" stroke="#1a2224"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5" />
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="product-item-info">
                                <a href="product-details.html">Full Set for photographer</a>
                                <span>$175</span> <del>$199</del>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="product-item-image">
                                <a href="{{ route('product-details') }}"><img
                                        src="{{ asset('images/product/08.jpg') }}" alt="Product Name"
                                        class="img-fluid"></a>

                                <div class="cart-icon">
                                    <a href="#"><i class="far fa-heart"></i></a>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16.75" height="16.75"
                                            viewBox="0 0 16.75 16.75">
                                            <g id="Your_Bag" data-name="Your Bag" transform="translate(0.75)">
                                                <g id="Icon" transform="translate(0 1)">
                                                    <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.682"
                                                        cy="0.714" rx="0.682" ry="0.714"
                                                        transform="translate(4.773 13.571)" fill="none"
                                                        stroke="#1a2224" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                    <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.682"
                                                        cy="0.714" rx="0.682" ry="0.714"
                                                        transform="translate(12.273 13.571)" fill="none"
                                                        stroke="#1a2224" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                    <path id="Path_3" data-name="Path 3"
                                                        d="M1,1H3.727l1.827,9.564a1.38,1.38,0,0,0,1.364,1.15h6.627a1.38,1.38,0,0,0,1.364-1.15L16,4.571H4.409"
                                                        transform="translate(-1 -1)" fill="none" stroke="#1a2224"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5" />
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="product-item-info">
                                <a href="product-details.html">Face Masks,Face Masks of 50 Pack</a>
                                <span>$175</span> <del>$199</del>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="product-item-image">
                                <a href="{{ route('product-details') }}"><img
                                        src="{{ asset('images/product/09.jpg') }}" alt="Product Name"
                                        class="img-fluid"></a>

                                <div class="cart-icon">
                                    <a href="#"><i class="far fa-heart"></i></a>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16.75" height="16.75"
                                            viewBox="0 0 16.75 16.75">
                                            <g id="Your_Bag" data-name="Your Bag" transform="translate(0.75)">
                                                <g id="Icon" transform="translate(0 1)">
                                                    <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.682"
                                                        cy="0.714" rx="0.682" ry="0.714"
                                                        transform="translate(4.773 13.571)" fill="none"
                                                        stroke="#1a2224" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                    <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.682"
                                                        cy="0.714" rx="0.682" ry="0.714"
                                                        transform="translate(12.273 13.571)" fill="none"
                                                        stroke="#1a2224" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                    <path id="Path_3" data-name="Path 3"
                                                        d="M1,1H3.727l1.827,9.564a1.38,1.38,0,0,0,1.364,1.15h6.627a1.38,1.38,0,0,0,1.364-1.15L16,4.571H4.409"
                                                        transform="translate(-1 -1)" fill="none" stroke="#1a2224"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5" />
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="product-item-info">
                                <a href="product-details.html">Fossil Men's Nate Stainless Steel Chronograph
                                    Quartz
                                    Watch</a>
                                <span>$175</span> <del>$199</del>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Populer Product End -->

        <!-- Categorys Section Start -->

        <!-- Categorys Section End -->

        <!-- Features Section Start -->

        <!-- Features Section End -->
    </main>

    <!-- Footer -->
    {{-- <footer>
            <div class="container">
                <div class="row align-items-center newsletter-area">
                    <div class="col-lg-5">
                        <div class="newsletter-area-text">
                            <h4 class="text-white">Subscribe to get notification.</h4>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1">
                        <div class="newsletter-area-button">
                            <form action="#">
                                <div class="form">
                                    <input type="email" name="email" id="mail"
                                        placeholder="Enter your email address" class="form-control">
                                    <button class="btn bg-secondary border text-capitalize">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row main-footer">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="main-footer-info">
                            <img src="dist/images/logo/white.png" alt="Logo" class="img-fluid">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam molestie malesuada
                                metus, non molestie ligula laoreet vitae. Ut et fringilla risus, vel.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-2 offset-lg-2 col-md-4 col-sm-6 col-12">
                        <div class="main-footer-quicklinks">
                            <h6>Company</h6>
                            <ul class="quicklink">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Help &amp; Support</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms of Service</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                        <div class="main-footer-quicklinks">
                            <h6>Quick links</h6>
                            <ul class="quicklink">
                                <li><a href="#">New Realease</a></li>
                                <li><a href="#">Customize</a></li>
                                <li><a href="#">Sale &amp; Discount</a></li>
                                <li><a href="#">Men</a></li>
                                <li><a href="#">Women</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                        <div class="main-footer-quicklinks">
                            <h6>Account</h6>
                            <ul class="quicklink">
                                <li><a href="#">Your Bag</a></li>
                                <li><a href="#">Profile</a></li>
                                <li><a href="#">Order Completed</a></li>
                                <li><a href="#">Log-out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright d-flex justify-content-between align-items-center">
                            <div class="copyright-text order-2 order-lg-1">
                                <p>&copy; 2020. Design and Developed by <a href="#">Zakir Soft</a></p>
                            </div>
                            <div class="copyright-links order-1 order-lg-2">
                                <a href="#" class="ml-0"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer> --}}
    <!-- Footer -->

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('scss/vendors/plugin/js/slick.min.js') }}"></script>
    <script src="{{ asset('scss/vendors/plugin/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        function openNav() {

            document.getElementById("mySidenav").style.width = "350px";
            $('#overlayy').addClass("active");
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            $('#overlayy').removeClass("active");
        }
    </script>
</body>
