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
    <div class="d_hide">
        <br><br>
    </div>

    <!-- Shop Header -->
    <header class="shop-header">
        <img src="{{ asset('logo/' . $admin->logo) }}"  alt="">
        <div class="shop-header-profile">
            <h1> {{ $admin->shop_name }}</h1>
            <p> {{ $admin->college }}</p>
             

            <button class="message-button" onclick="window.location.href='{{ url('chat', $admin->id) }}'">
                <i class="fa-solid fa-envelope"></i> CHAT
            </button>
        </div>
    </header>
    <div class="shop">
    <div class="shop-container">
        <!-- Sidebar for Product Categories and Sort Options -->
        <aside class="shop-sidebar">
        <h3>Shop Categories</h3>
            <ul>
                @foreach($categories as $category) 
                    <li>
                        <input type="checkbox" id="category-{{ $category->id }}" 
                            onchange="window.location.href='{{ url('category_products', $category->id) }}'">
                        {{ $category->category_name }} - {{ $category->products_count }}
                    </li>
                @endforeach
            </ul>
        </aside>

        <!-- Product Grid -->
        <section class="shop-product-grid">
            <div class="shop-product-header">
                <p>Showing {{ $products->count() }} of {{ $products->total() }} Products</p>
            </div>
            <div id="shop-products" class="products-grid">
                @foreach($products as $product)
                    @php
                        // Decode the JSON string in the 'image' column
                        $productImages = json_decode($product->image, true); // Decode as an associative array
                        $firstImage = !empty($productImages) ? $productImages[0] : 'default.png'; // Fallback to default image
                    @endphp

                    <div class="product-card">
                        <img src="{{ asset('products/' . $firstImage) }}" alt="{{ $product->title }}">
                        <div class="product_data">
                            <h3>{{ $product->title }}</h3>
                            <p>₱{{ number_format($product->price, 2) }}</p>
                        </div>
                        <button class="product_cart_btn" onclick="window.location.href='{{ url('product_details', $product->id) }}'">
                            <i class="fa-solid fa-cart-arrow-down"></i> Add to cart
                        </button>
                    </div>
                @endforeach
            </div>
            @if($products->hasMorePages())
                <button id="load-more" class="secondary-button" data-next-page="{{ $products->nextPageUrl() }}">
                    Show More
                </button>
            @endif
        </section>


        <script>
document.getElementById('load-more')?.addEventListener('click', function() {
    const button = this;
    const nextPageUrl = button.getAttribute('data-next-page');

    fetch(nextPageUrl, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
        .then(response => response.text())
        .then(data => {
            // Parse the returned HTML and append to the product container
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, 'text/html');
            const newProducts = doc.querySelector('#shop-products').innerHTML;

            document.getElementById('shop-products').insertAdjacentHTML('beforeend', newProducts);

            // Update or remove the load-more button
            const newButton = doc.querySelector('#load-more');
            if (newButton) {
                button.setAttribute('data-next-page', newButton.getAttribute('data-next-page'));
            } else {
                button.remove();
            }
        })
        .catch(error => console.error('Error loading more products:', error));
});
</script>
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
            <a href="{{url('user_page')}}">
                <i class="fa-solid fa-user"></i>
                <p class="footer_p">User</p>

            </a>
        </div>
    </footer> 
</div>

<!--Start of Tawk.to Script-->
{{-- <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/674271d72480f5b4f5a30e8b/1iddopco5';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script> --}}
    <!--End of Tawk.to Script-->
</body>
</html>
