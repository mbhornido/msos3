<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSOS | SHOP</title>
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/css_file.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
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
        <img src="{{ asset('images/logo.jpg') }}"  alt="">
        <div class="shop-header-profile">
            <h1>Welcome to MSOS SHOP</h1>
            <p>Students Organization Shops</p>
        </div>
    </header>
    <div class="shop">
    <div class="shop-container">
        <aside class="shop-sidebar">
            <h3>Filter Products</h3>
            <ul>
                <li>
                    <input type="radio" onchange="window.location.href='{{ url('view_shop?sort=newest') }}'"
                           {{ $sort == 'newest' ? 'checked' : '' }}> Newest to Oldest
                </li>
                <li>
                    <input type="radio" onchange="window.location.href='{{ url('view_shop?sort=oldest') }}'"
                           {{ $sort == 'oldest' ? 'checked' : '' }}> Oldest to Newest
                </li>
                <li>
                    <input type="radio" onchange="window.location.href='{{ url('view_shop?sort=price_asc') }}'"
                           {{ $sort == 'price_asc' ? 'checked' : '' }}> Price: Low to High
                </li>
                <li>
                    <input type="radio" onchange="window.location.href='{{ url('view_shop?sort=price_desc') }}'"
                           {{ $sort == 'price_desc' ? 'checked' : '' }}> Price: High to Low
                </li>
            </ul>
        </aside>

        <!-- Product Grid -->
<!-- Product Grid -->
        <section class="shop-product-grid">
            <div id="shop-products" class="products-grid">
                @foreach($products as $product)

                @php 
                    // Decode the JSON string in the 'image' column
                    $productImages = json_decode($product->image);
                    $firstImage = !empty($productImages) ? $productImages[0] : 'default.png'; // Fallback to default image
                @endphp

                <div class="product-card">
                    <img src="{{ asset('products/' . $firstImage) }}" alt="{{ $product->title }}">
                    <div class="product_data">
                        <h3>{{ $product->title }}</h3>
                        <p>₱{{ number_format($product->price, 2) }}</p>
                    </div>
                    <button class="product_cart_btn"
                            onclick="window.location.href='{{ url('product_details', $product->id) }}'">
                        <i class="fa-solid fa-cart-arrow-down"></i> Add to cart
                    </button>
                </div>
                
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="pagination">
                {{ $products->links('pagination::bootstrap-4') }}
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
