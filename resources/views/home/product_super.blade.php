<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSOS | SHOP</title>
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/css_file.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <style>
        .header_title{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">

    <nav class="top_header">
        <div class="top_left">

            <a href="{{url('search-order')}}">Track Order</a>
            <a href="{{url('start_sell')}}">Start Selling</a>
            <a href="">Download</a>
            <a href="">Follow us on <i class="fa-brands fa-facebook"></i></a>

        </div>
        <div class="top_right">
            <a href="{{url('faq')}}"><i class="fa-solid fa-circle-question"></i> Help</a>
            <a href="{{url('developer')}}">Developers</a>
            <a href="" class="tab_none">Profile</a>
        </div>
    </nav>


    <section class="section_header">
        <header class="header ">
            <a href="{{url('dashboard')}}" class="logo">
                <img src="{{ asset('images/download2.png') }}" alt="">

                <div class="logo_text">
                    <h3>MSOS</h3>
                    <p>Online Shop</p>
                </div>
            </a>
            <div class="search-bar">
                <form action="{{ url('search') }}" method="GET">
                    <input type="text" id="search-input" name="search" placeholder="Search for products..." value="{{ request('search') }}">
                    <button type="submit" class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <div id="autocomplete-results" style="display: none;"></div>
            </div> 

            <div class="header-icons">
                <a href="{{url('mycart')}}" class="icon1"><i class="fa-solid fa-cart-shopping"></i><span>{{$count}}</span></a>
                <a href="{{url('profile_edit')}}" class="icon"><i class="fa-solid fa-user"></i></a>
            </div>
        </header>
        <div class="admin_categories">
            @foreach($scategory as $scategory)
                <a href="{{url('product_super',['superCategory' => $scategory->super_category]) }}">{{ $scategory->super_category }}</a>       
            @endforeach
        </div> 
    </section> 

  

    <section id="products" class="products-section">
        <h1 class="header_title"> Products in "{{ $superCategory }}"</h1>
        <div class="line"></div>
    
        <div class="products-grid">
            <!-- Check if there are products -->
            @if($products->isNotEmpty())
                @foreach($products as $product)
                    @php
                        // Decode the JSON string in the 'image' column
                        $productImages = json_decode($product->image);
                        $firstImage = !empty($productImages) ? $productImages[0] : 'default.png'; // Default image if none exists
                    @endphp
    
                    <a href="{{ url('product_details', $product->id) }}" class="product-card">
                        <img src="/products/{{ $firstImage }}" alt="Product Image">
    
                        <div class="product_data">
                            <h3>{{ $product->title }}</h3>
                            <p>₱{{ number_format($product->price, 2) }}</p>
                        </div>
    
                        <button class="product_cart_btn">
                            <i class="fa-solid fa-cart-arrow-down"></i> Add to cart
                        </button>
                    </a>
                @endforeach
            @else
                <!-- No Products Message -->
                <div class="no-products-message">
                    <p>🚫 No products available in this category yet. Please check back later.</p>
                </div>
            @endif
        </div>
    </section>
    
    
        <div class="d_hide">
            <br><br><br>
        </div>
        <footer class="floating-footer">
            <div class="footer-links">
                <a href="{{url('dashboard')}}" class="active">
                    <i class="fa-solid fa-house"></i>
                    <p class="footer_p">Home</p>
                </a>
                <a href="{{url('seller_department')}}">
                    <i class="fa-solid fa-shop"></i>
                    <p class="footer_p" >Shops</p>
    
                </a>
                <a href="{{url('search-order')}}">
                    <i class="fa-solid fa-earth-americas"></i>
                    <p class="footer_p">Tracker</p>
    
                </a>
                <a href="{{url('user_page')}}">
                    <i class="fa-solid fa-user"></i>
                    <p class="footer_p">User</p>
    
                </a>
            </div>
        </footer>
    </div>

    

</script>
</body>
</html>
