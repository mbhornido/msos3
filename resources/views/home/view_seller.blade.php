<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MSOS | SHOP</title>
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/new.css')}}" type="text/css">

</head>

<body>

@include('includes.top_header_user')
        

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>


                        @foreach($department as $departments)
                            <li>
                                <a href="{{ url('seller_departments', $departments->id) }}">
                                {{ $departments->department_name }}
                                </a>
                            </li>
                        @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                               
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone hide">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-facebook"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5> Alliance of Coders</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
 
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad center_product">

   
        <main class="main-content">
        <!-- Seller Details -->
        <section class="seller-details">
            <div class="seller-info">
                <img src="{{asset('images/logo.jpg')}}" alt="Seller Profile Picture" class="seller-img">
                <div>
                    <h3>All Sellers</h3>
                    <p>Cebu Technological University - Danao Campus</p>
                </div>
            </div>
            <!-- <button class="primary-button">Edit Profile</button> -->
        </section>




        <!-- Product Showcase -->
        <section class="products">
            <h2>Organization Shops</h2>
            <div class="product-grid">
                @foreach($admins as $admin)
                    <div class="product-card">
                        
                        <img src="{{ asset('logo/' . $admin->logo) }}" alt="Shop Logo">
                        <h5>{{ $admin->shop_name }}</h5>
                        <p>{{ $admin->college }}</p>
                        <a href="{{ url('view_seller_profile/' . $admin->id) }}" class="secondary-button"><i class="fa-solid fa-shop"></i> View Shop</a>
                    </div>
                @endforeach
            </div>
        </section>


        </main>

    </section>
    <!-- Product Section End -->

    @include('includes.footer_user')

</body>

</html>