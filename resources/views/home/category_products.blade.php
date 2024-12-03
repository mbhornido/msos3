    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSOS | SHOP</title>
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
    <link rel="stylesheet" href="{{asset('css/css_file.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body>

    <div class="container">

    @include('includers.mobile_back_header')

        
    @include('includers.user_header')

        
        <!-- Shop Header -->
        <div class="d_hide">
            <br><br>
        </div>
        <header class="shop-header">
            <img src="{{ asset('logo/' . $admin->logo) }}"  alt="">
            <div class="shop-header-profile">
                <h1> {{ $admin->shop_name }}</h1>
                <p>Explore our wide range of products</p>
            </div>
        </header>
        <div class="shop">
        <div class="shop-container">
            <!-- Sidebar for Product Categories and Sort Options -->
            <aside class="shop-sidebar">
            <h3>Shop Categories</h3>
            <ul>
            <li>
                <!-- Redirect to the seller's profile when 'ALL' is checked -->
                <input type="checkbox" 
                    onchange="window.location.href='{{ url('view_seller_profile/' . $category->user_id) }}'">
                ALL
            </li>
            @foreach($categories as $categoryItem)
                <li>
                    <input type="checkbox" id="category-{{ $categoryItem->id }}" 
                        onchange="window.location.href='{{ url('category_products', $categoryItem->id) }}'">
                    {{ $categoryItem->category_name }} - {{ $categoryItem->products_count }}
                </li>
            @endforeach
        </ul>

            </aside>

<!-- Product Grid -->
<section class="shop-product-grid">
    <div class="shop-product-header">
        <p>Showing category {{ $category->category_name }}</p>
    </div>
    <div class="products-grid">
        @foreach($category->products as $product)
            @php
                // Decode the JSON string in the 'image' column
                $productImages = json_decode($product->image, true); // Decode as an associative array
                $firstImage = !empty($productImages) ? $productImages[0] : 'default.png'; // Fallback to default image
            @endphp

            <div class="product-card">
                <img src="{{ asset('products/' . $firstImage) }}" alt="{{ $product->title }}">

                <div class="product_data">
                    <h3>{{ $product->title }}</h3>
                    <p>{{ $category->category_name }}</p>
                </div>

                <button class="product_cart_btn" onclick="window.location.href='{{ url('product_details', $product->id) }}'">
                    <i class="fa-solid fa-cart-arrow-down"></i> Add to cart
                </button>
            </div>
        @endforeach
    </div>
</section>

        </div>
        </div>

        <div class="d_hide">
            <br><br><br>
        </div>
        <footer class="floating-footer">
            <div class="footer-links">
                <a href="{{url('dashboard')}}" >
                    <i class="fa-solid fa-house"></i>
                    <p class="footer_p">Home</p>
                </a>
                <a href="{{url('seller_department')}}" class="active"  >
                    <i class="fa-solid fa-shop"></i>
                    <p class="footer_p" >Shops</p>

                </a>
                <a href="{{url('search-order')}}">
                    <i class="fa-solid fa-earth-americas"></i>
                    <p class="footer_p">Tracker</p>
    
                </a>
                <a href="{{url('order_status')}}">
                    <i class="fa-solid fa-user"></i>
                    <p class="footer_p">User</p>

                </a>
            </div>
        </footer>
    </div>
    </body>
    </html>
