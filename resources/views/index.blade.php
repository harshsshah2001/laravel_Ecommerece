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
    <div class="navbar">
        <div>
            <a href="{{ route('shop') }}">Home</a>
            <a href="{{ route('shop') }}">Men</a>
            <a href="{{ route('shop') }}">Women</a>
            <a href="{{ route('shop') }}">Shop</a>


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
                <p style="margin-right:15px;color:aliceblue">Welcome {{ session('name_session') }}</p>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="button">Logout</button>
                </form>
            @endif



        </div>
    </div>

    <!-- Font Awesome CDN for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Header Area End -->

    <main>
        <!--Banner Area Start -->
        @foreach ($datas as $data)
            <section class="banner-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 order-2 order-lg-1">
                            <div class="banner-area__content">
                                <h2>Premium care for
                                    premium people.</h2>
                                <p>Not ready for a subscription? Shop all a la carté skin, hair, and body care.</p>
                                <a class="btn bg-primary" href="{{ route('product-details') }}">Shop Now</a>
                            </div>
                        </div>


                        <div class="col-lg-6 order-1 order-lg-2">
                            <div class="banner-area__img">

                                <img src="{{ asset('storage/' . $data->image) }}" height="120px" width="300px"
                                    alt="banner-img" class="img-fluid">

                            </div>

                        </div>
                    </div>

                </div>
        @endforeach

        <!-- Image and Product Info -->
        <h2 style="display: flex;justify-content:center;">Our Product's</h2>
        <div class="flexing" style="display: flex;justify-content:center;margin-top:20px;margin-bottom:30px">
            <div id="carousel"
                style="position: relative; width: 300px; height: 420px; border-radius: 10px; overflow: hidden; background-color: white; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">

                <!-- Left Arrow -->
                <div onclick="prevProduct()"
                    style="position: absolute; top: 50%; left: 10px; transform: translateY(-50%); cursor: pointer;">
                    <span style="font-size: 30px;">&#10094;</span>
                </div>

                <!-- Image and Product Info -->
                <div id="product-info" style="text-align: center;">
                    <img id="product-image" src="{{ asset('images/product/01.jpg') }}" alt="Product Image"
                        style="width: 100%; height: auto; border-radius: 10px 10px 0 0; border-bottom: 2px solid #eee;">
                    <div style="padding: 15px;">
                        <h2 id="product-name" style="margin: 0; font-size: 20px; color: #333;">Product Name</h2>
                        <p id="product-price" style="margin: 5px 0; font-size: 18px; color: #e67e22;">$29.99</p>
                    </div>
                </div>
                <a href="{{ route('product-details') }}"> <button class="btn btn-success"
                        style="color: white; height: 40px; padding: 0 20px; margin-left:89px">Buy Now</button></a>

                <!-- Right Arrow -->
                <div onclick="nextProduct()"
                    style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;">
                    <span style="font-size: 30px;">&#10095;</span>
                </div>
            </div>

            <script>
                // Array of products
                const products = [{
                        name: "Product Name 1",
                        price: "$29.99",
                        imageUrl: "{{ asset('images/product/01.jpg') }}"
                    },
                    {
                        name: "Product Name 2",
                        price: "$39.99",
                        imageUrl: "{{ asset('images/product/02.jpg') }}"
                    },
                    {
                        name: "Product Name 3",
                        price: "$49.99",
                        imageUrl: "{{ asset('images/product/03.jpg') }}"
                    }
                ];

                let currentIndex = 0;

                function updateProduct() {
                    const product = products[currentIndex];
                    document.getElementById('product-name').innerText = product.name;
                    document.getElementById('product-price').innerText = product.price;
                    document.getElementById('product-image').src = product.imageUrl;
                }

                function nextProduct() {
                    currentIndex = (currentIndex + 1) % products.length;
                    updateProduct();
                }

                function prevProduct() {
                    currentIndex = (currentIndex - 1 + products.length) % products.length;
                    updateProduct();
                }

                // Auto change product every 5 seconds
                setInterval(nextProduct, 5000);
            </script>



            </section>
            <!--Banner Area End -->

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
                            <div class="product-item">
                                <div class="product-item-image">
                                    <a href=""><img src="{{ asset('images/product/05.jpg') }}"
                                            alt="Product Name" class="img-fluid"></a>
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
                                    <a href="{{ route('product-details') }}">BERRY TYPE-II: C1N Backpack</a>
                                    <span>$975</span> <del>$999</del>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="product-item-image">
                                    <a href="{{ route('product-details') }}"> <img
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
                                    <a href="{{ route('product-details') }}">BERRY TYPE-II: C1N Backpack</a>
                                    <span>$975</span> <del>$999</del>
                                </div>
                            </div>
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
                                    <a href="{{ route('product-details') }}">BERRY TYPE-II: C1N Backpack</a>
                                    <span>$975</span> <del>$999</del>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="product-item-image">
                                    <a href="{{ route('product-details') }}"> <img
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
                                    <a href="{{ route('product-details') }}">BERRY TYPE-II: C1N Backpack</a>
                                    <span>$975</span> <del>$999</del>
                                </div>
                            </div>
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
                                    <a href="{{ route('product-details') }}">BERRY TYPE-II: C1N Backpack</a>
                                    <span>$975</span> <del>$999</del>
                                </div>
                            </div>
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
                                        d="M13.5,23l5.25-5.25.438-.437L20.5,16l-7-7"
                                        transform="translate(-12.086 -7.586)" fill="none" stroke="#1a2224"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>
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
                                    <a href="{{ route('product-details') }}">PUMA air max 97</a>
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
                                    <a href="{{ route('product-details') }}">Echo Studio. Amazon Echo Studio</a>
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
                                    <a href="{{ route('product-details') }}">Corning Sunglasses for Men.</a>
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
                                    <a href="{{ route('product-details') }}">Canon PowerShot SX540</a>
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
                                    <a href="{{ route('product-details') }}">BERRY TYPE-II: C1N Backpack</a>
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
                                    <a href="{{ route('product-details') }}">Kauri Marine Blue (Green Sole)</a>
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
                                    <a href="{{ route('product-details') }}">Full Set for photographer</a>
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
                                    <a href="{{ route('product-details') }}">Face Masks,Face Masks of 50 Pack</a>
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
                                    <a href="{{ route('product-details') }}">Fossil Men's Nate Stainless Steel
                                        Chronograph
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
            <section class="categorys">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="section-title">
                                <h2>Shop with top categorys</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="productcategory text-center">
                                <div class="productcategory-img">
                                    <a href="#"><img src="{{ asset('images/categorys/tree dasher.jpg') }}"
                                            alt="images"></a>
                                </div>
                                <div class="productcategory-text">
                                    <a href="#">
                                        <h6>Tree Dasher</h6>
                                        <span>480 Products</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="productcategory text-center">
                                <div class="productcategory-img">
                                    <a href="#"><img src="{{ asset('images/categorys/wool-shoe.jpg') }}"
                                            alt="images"> </a>
                                </div>
                                <div class="productcategory-text">
                                    <a href="#">
                                        <h6>Wool Runner Shoes</h6>
                                        <span>40 Products</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="productcategory text-center">
                                <div class="productcategory-img">
                                    <a href="#"><img src="{{ asset('images/categorys/jumper.jpg') }}"
                                            alt="images"></a>
                                </div>
                                <div class="productcategory-text">
                                    <a href="#">
                                        <h6>Jumper</h6>
                                        <span>75 Products</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="productcategory text-center">
                                <div class="productcategory-img">
                                    <a href="#"><img src="{{ asset('images/categorys/iphone.jpg') }}"
                                            alt="images"></a>
                                </div>
                                <div class="productcategory-text">
                                    <a href="#">
                                        <h6>Apple</h6>
                                        <span>12 Products</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="productcategory text-center">
                                <div class="productcategory-img">
                                    <a href="#"><img src="{{ asset('images/categorys/iphone.jpg') }}"
                                            alt="images"></a>
                                </div>
                                <div class="productcategory-text">
                                    <a href="#">
                                        <h6>Electronic</h6>
                                        <span>50 Products</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="productcategory text-center">
                                <div class="productcategory-img">
                                    <a href="#"><img src="{{ asset('images/categorys/drone.jpg') }}"
                                            alt="images"></a>
                                </div>
                                <div class="productcategory-text">
                                    <a href="#">
                                        <h6>Drone</h6>
                                        <span>20 Products</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="productcategory text-center">
                                <div class="productcategory-img">
                                    <a href="#"><img src="{{ asset('images/categorys/headphone.jpg') }}"
                                            alt="images"></a>
                                </div>
                                <div class="productcategory-text">
                                    <a href="#">
                                        <h6>Headphone</h6>
                                        <span>10 Products</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="productcategory text-center">
                                <div class="productcategory-img">
                                    <a href="#"><img src="{{ asset('images/categorys/chosma.jpg') }}"
                                            alt="images"></a>
                                </div>
                                <div class="productcategory-text">
                                    <a href="#">
                                        <h6>Sunglass</h6>
                                        <span>25 Products</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- Categorys Section End -->

            <!-- Features Section Start -->

            <!-- Features Section End -->
    </main>

    <!-- Footer -->
    <footer>
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
    </footer>
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
