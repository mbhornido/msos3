<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSOS | SHOP</title>
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
    <link rel="stylesheet" href="{{asset ('css/css_file.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body> 

<div class="container">
    <nav class="top_header">
        <div class="top_left">

            <a href="{{url('search-order')}}">Track Order</a>
            <a href="{{url('start_sell')}}">Start Selling</a>
            <a href="{{asset('app/msosshop.apk')}}" download>Download</a>
            <a href="https://www.facebook.com/profile.php?id=100086240330686" target="_blank">Follow us on <i class="fa-brands fa-facebook"></i></a>

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

 

    <section class="banner_dash hide">
        <div class="sidebar">
            <h1><i class="fa-solid fa-bars"></i> Start Shopping</h1>
            <ul>
            @foreach($department as $departments)
                <a href="{{ url('seller_departments', $departments->id) }}">
                <li>{{ $departments->department_name }}</li>
                </a>
                <hr>
                @endforeach
            </ul>
        </div>
        <div class="ad-section">
            <div class="ad-separate">
                <div class="ad-content">
                    <div class="ad-logo">
                        <img src="{{asset ('images/download2.png')}}" alt="Apple Logo" class="apple-logo">
                        <h3>MSOS Shop</h3>
                    </div>
                    <h1>Newest Online Selling Platform in COT</h1> 
                    <a href="{{url('view_shop')}}" class="shop-now">Shop Now</a> 
                </div>
                <div class="ad-image">
                    <img src="{{asset ('images/250.png')}}" alt="" class="slide active">
                    <img src="{{asset ('images/2501.png')}}" alt="" class="slide">

                </div>
            </div>  
            <div class="carousel-dots">
                <span class="dot active" onclick="currentSlide(0)"></span>
                <span class="dot" onclick="currentSlide(1)"></span>

            </div>
        </div>

    </section> 
    <!-- Banner Section -->
     <header class="banner">
        <div class="banner-content">
            <h1>Unleash Innovation <br> In every Bite</h1>
            <p>💙 Newest Online Selling Platform in COT 💙</p>
            <a href="{{url('view_shop')}}" class="shop-now-btn">Shop Now</a>
        </div>
    </header> 

    <section class="scroll d_hide">
        <h1 class="header_title">Explore Organizations</h1>
        <div class="line"></div>


        <div class="horizontal-scroll">
            @foreach($department as $departments)
                <a href="{{ url('seller_departments', $departments->id) }}" class="scroll-item" style="background-image:  url('{{ asset($departments->department_image) }}')">
                    <p>{{ $departments->department_name }}</p>
                </a>   
            @endforeach
        </div>
      
        
    </section> 

    
    <!-- Products Section -->
    <section id="products" class="products-section"> 
        <h1 class="header_title"><i class="fa-solid fa-calendar-days"></i> Daily Discover</h1>
        <div class="line"></div>

        <div class="products-grid">
            <!-- Product Item -->
            @foreach($product as $products)

            @php
                // Decode the JSON string in the 'image' column
                $productImages = json_decode($products->image);
                $firstImage = !empty($productImages) ? $productImages[0] : 'default.png'; // Default image if none exists
            @endphp

            <a href="{{ url('product_details', $products->id) }}" class="product-card">
                <img src="/products/{{ $firstImage }}" alt="Product 1">

                <div class="product_data">
                    <h3>{{ $products->title }}</h3>
                    <p>₱{{ number_format($products->price, 2) }}</p>
                </div>

                <button class="product_cart_btn">
                    <i class="fa-solid fa-cart-arrow-down"></i> Add to cart
                </button>
            </a>
        
            @endforeach 

            <!-- Add more product cards as needed -->
            
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
  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        let slideIndex = 0;
        const slides = document.querySelectorAll(".slide");
        const dots = document.querySelectorAll(".dot");

        // Function to show the current slide based on the index
        function showSlide(index) {
            // Hide all slides and remove 'active' class from dots
            slides.forEach(slide => slide.classList.remove("active"));
            dots.forEach(dot => dot.classList.remove("active"));

            // Show the selected slide and add 'active' class to the corresponding dot
            slides[index].classList.add("active");
            dots[index].classList.add("active");
        }

        // Function to go to the next slide
        function nextSlide() {
            slideIndex = (slideIndex + 1) % slides.length; // Loop back to first slide
            showSlide(slideIndex);
        }

        // Function to set a specific slide
        function currentSlide(index) {
            slideIndex = index;
            showSlide(slideIndex);
        }

        // Automatically switch to the next slide every 3 seconds
        setInterval(nextSlide, 3000);
    </script>


<script>
        $(document).ready(function () {
            $('#search-input').on('input', function () {
                let query = $(this).val();

                if (query.length >= 2) {
                    $.ajax({
                        url: "{{ url('autocomplete') }}",
                        data: { term: query },
                        success: function (data) {
                            let suggestions = data.map(title => `<li>${title}</li>`).join('');
                            $('#autocomplete-results').html(`<ul>${suggestions}</ul>`).show();
                        }
                    });
                } else {
                    $('#autocomplete-results').hide();
                }
            });

            $(document).on('click', function () {
                $('#autocomplete-results').hide();
            });

            $(document).on('click', '#autocomplete-results li', function () {
                let selectedValue = $(this).text();
                $('#search-input').val(selectedValue);
                $('#autocomplete-results').hide();
            });
        });
    </script>
</body>
</html>
