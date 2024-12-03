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
    <section class="breadcrumb-section set-bg "  data-setbg="{{asset('/images/banner.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>MSOS Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad center_product">

   
        <!-- <div class="section-title product__discount__title">
            <h2>ALL Products</h2>
        </div>     -->


        <div class="shop-filter-container mb-4">
            <form action="{{ url('view_shop') }}" method="GET" class="shop-filter-form">
                <!-- Alphabetical Filter -->
                 <div class="filter-left">

                    <div class="shop-filter-group hide">
                        <label for="letter" class="shop-filter-label">Filter by Letter:</label>
                        <select name="letter" id="letter" class="shop-filter-select">
                            <option value="">All</option>
                            @foreach(range('A', 'Z') as $letter)
                                <option value="{{ $letter }}">{{ $letter }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Sort by Timestamp -->
                    <div class="shop-filter-group">
                        <label for="sort" class="shop-filter-label">Sort by:</label>
                        <select name="sort" id="sort" class="shop-filter-select">
                            <option value="">Sort</option>
                            <option value="newest">Newest to Oldest</option>
                            <option value="oldest">Oldest to Newest</option>
                            <option value="price_asc">Price: Low to High</option>
                            <option value="price_desc">Price: High to Low</option>
                        </select>
                    </div>
                 </div>

                 <div class="filter-right">

                <!-- Submit Button -->
                    <button type="submit" class="shop-filter-button">Apply</button>
                    <a href="{{url('view_shop')}}" class="shop-filter-button">Reset</a>

                </div>
            </form>
        </div>





        <div class="products-container">

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

    @include('includes.footer_user')

</body>

</html>