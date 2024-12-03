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


@include('includers.mobile_back_header')


@include('includers.user_header')


  <div class="order-container">
    <!-- Sidebar -->
    <div class="order-sidebar hide">
      <div class="order-profile">
        <div class="order-profile-pic">
          <img src="{{ asset('logo/' . Auth::user()->logo) }}" alt="M">
        </div>
        <div class="order-profile-info">
          <p class="order-username">{{ Auth::user()->name }}</p>
          <a href="profile_edit" class="order-edit-profile"><i class="fa-solid fa-pen"></i> Edit Profile</a>
        </div>
      </div>
      <hr>
      <nav class="order-nav">
                <a href="{{url('profile_edit')}}" class="order-nav-item "><i class="fa-regular fa-user"></i> My Account</a>
                <a href="{{url('order_status')}}" class="order-nav-item active" ><i class="fa-solid fa-table-list"></i> My Purchase</a>
                <a href="{{url('update_password')}}" class="order-nav-item "><i class="fa-solid fa-lock"></i> Password</a>
                
                <!-- Logout Form -->
                <form method="POST" action="{{ route('logout') }}" class="order-nav-item logout-form" >
                    @csrf
                    <a class="logout-link"  style="color: black;" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </a>
                </form>
            </nav>  
    </div>
    
    <!-- Main Content -->
    <div class="order-main-content">
    <div class="order-tabs">
        <a href="{{ url('order_status') }}" class="order-tab {{ request('shipping_name') ? '' : 'active' }}">All</a>
        @foreach ($ships as $ship)
            <a href="{{ url('order_status') }}?shipping_name={{ $ship->shipping_name }}" 
              class="order-tab {{ request('shipping_name') == $ship->shipping_name ? 'active' : '' }}">
                {{ $ship->shipping_name }}
            </a>
        @endforeach
    </div>

      
    <div class="order-search-bar">
        <input 
            type="text" 
            id="search-bar" 
            placeholder="You can search by Seller Name, Order ID or Product name" 
            value="{{ request('search') }}"
        >
        <br><br>
        <p>Searching...</p>
        
    </div>
 

      
      <div class="order-no-orders">
        @if($orders->isEmpty())
            <img src="/images/cry.png" alt="No orders" class="order-no-orders-icon">
            <p>No products found.</p>
        @else
            <div class="orders-container">
    @foreach($orders as $order)
    <div class="order-card">
        <h3>Order ID: {{ $order->id }}</h3>
        <p><strong>Shop:</strong> {{ $order->product->owner->shop_name ?? 'N/A' }}</p>
        <p><strong>Name:</strong> {{ $order->name }}</p>
        <p><strong>Section:</strong> {{ $order->rec_address }}</p>
        <div class="order-product">
            @php
                $productImages = json_decode($order->product->image, true); // Decode images
                $firstImage = !empty($productImages) ? $productImages[0] : 'default.png'; // Fallback
            @endphp
            <img src="{{ asset('products/' . $firstImage) }}" alt="{{ $order->product->title }}" class="product-image">
            <p>{{ $order->product->title }}</p>
        </div>
        <p><strong>Quantity:</strong> {{ $order->quantity }}</p>
        <p><strong>Size:</strong> {{ $order->size }}</p>
        <p><strong>Price:</strong> ₱{{ number_format($order->product->price, 2) }}</p>
        <p><strong>Total Fee:</strong> ₱{{ number_format($order->total_fee, 2) }}</p>
        <p><strong>Status:</strong> {{ $order->status }}</p>

        {{-- Check if the order status is Pending --}}
        @if($order->status === 'Pending')
        <div class="order-pending-alert">
            <p style="color: red;"><strong>Note:</strong> This order is currently pending.</p>
            <form action="{{ url('delete_order', $order->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="order-delete-btn"><i class="fa-solid fa-xmark"></i> Cancel</button>
            </form>
        </div>
        @endif

        <br>
        <div class="order_btns">
            <a href="{{ url('order_receipt', $order->id) }}" class="order-receipt-btn">View Receipt</a>
            <br><br>
            <a href="{{ url('order_track', $order->id) }}" class="order-receipt-btn">View Tracking</a>
        </div>
    </div>
    @endforeach
    <div style="margin-bottom: 5rem;"></div>
</div>

        @endif
    </div>

    </div>
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
            <a href="{{url('seller_department')}}">
                <i class="fa-solid fa-shop"></i>
                <p class="footer_p" >Shops</p>

            </a>
            <a href="{{url('search-order')}}">
                <i class="fa-solid fa-earth-americas"></i>
                <p class="footer_p">Tracker</p>

            </a>
            <a href="{{url('user_page')}}" class="active" >
                <i class="fa-solid fa-user"></i>
                <p class="footer_p">User</p>

            </a>
        </div>
    </footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        let searchTimeout;
        const $searchBar = $('#search-bar'); // Input element
        const $searchMessage = $('.order-search-bar p'); // <p>Searching...</p> element

        // Show the "Searching..." message when the input field is focused
        $searchBar.on('focus', function () {
            $searchMessage.show();
        });

        // Hide the "Searching..." message if the input loses focus and is empty
        $searchBar.on('blur', function () {
            if ($(this).val().trim() === '') {
                $searchMessage.hide();
            }
        });

        // Handle input event for search functionality
        $searchBar.on('input', function () {
            clearTimeout(searchTimeout); // Clear previous timeout to prevent multiple triggers
            
            const searchQuery = $(this).val();
            const shippingName = "{{ request('shipping_name') }}"; // Keep the current shipping filter

            searchTimeout = setTimeout(function () {
                // Reload the page with updated query parameters
                const url = new URL(window.location.href);
                url.searchParams.set('search', searchQuery);
                if (shippingName) {
                    url.searchParams.set('shipping_name', shippingName);
                }

                window.location.href = url.toString();
            }, 2000); // 2000ms delay
        });

        // Hide the "Searching..." message on page load if results are already displayed
        if ("{{ request('search') }}" !== "") {
            $searchMessage.hide();
        }
    });
</script>

</body>
</html>
