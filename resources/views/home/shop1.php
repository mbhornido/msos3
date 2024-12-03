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
    <section class="hero">
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
                        <a href=""class="hide">
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-facebook"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5> Alliance of Coders</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="hero__items set-bgs">
                        <div class="hero__text">
                            <span>MSOS SHOP</span>
                            <h2>The first Online Shop of <br class="hide"> The Alliance of Coders</h2>
                            <p>Safe and secured ordering!</p>
                            <a href="{{url('view_shop')}}" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <!-- <section class="categories">
        <div class="section-title from-blog__title">
            <h2>Our Partners</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{asset('/images/cot1.png')}}">
                            <h5><a href="#">College of Technology</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{asset('/images/caoc.png')}}">
                            <h5><a href="#">Alliance of Coders</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{asset('/images/cot1.png')}}">
                            <h5><a href="#">College of Technology</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{asset('/images/caoc.png')}}">
                            <h5><a href="#">Alliance of Coders</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{asset('/images/cot1.png')}}">
                            <h5><a href="#">College of Technology</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Categories Section End -->


        <!-- Product Section Begin -->
        <section class="product spad center_product">

        
            <div class="section-title product__discount__title">
                <h2>ALL Products</h2>
            </div>    

            <div class="product_subtitle">
                <div class="box">.</div> New Arrival
            </div>
            <div class="shop-container">

                @foreach($product as $products)
                <a href="{{url('product_details',$products->id)}}" class="product-cards">          
                        <div class="image-container">
                            <img src="products/{{$products->image}}" alt="Product 1">
                        </div>
                        <div class="product_text">
                            <div class="product_bottom">
                                ADD TO CART <i class="fa-solid fa-cart-plus"></i>
                            </div>


                            <div class="product_inside">

                                <h2>{{$products->title}}</h2>
                                
                                <p class="price">₱{{$products->price}}.00</p>
                                
                            </div>
                            
                        </div>

                </a>
                @endforeach 

            </div>
                            


        </section>
        <!-- Product Section End -->


<br><br>
    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->



    @include('includes.footer_user')

</body>

</html>