<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MSOS | SHOP</title>
  <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
  <link rel="stylesheet" href="{{ asset('css/css_file.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<div class="container">
  <!-- @include('includers.mobile_back_header') -->
  @include('includers.user_header')

  <div class="shop_user_header">
    <!-- Shop Header -->
    <div class="d_hide">
        <br><br>
    </div>

    <header class="shop-user">
      <div class="shop-user-top">
        <a href="{{url('start_sell')}}" class="shop-user-left">
          <i class="fa-solid fa-shop-lock"></i>
          <p>Start Selling</p>
        </a>
        <a href="{{url('mycart')}}" class="shop-user-right">
          <i class="fa-solid fa-cart-shopping"></i>
        </a>
      </div>

      <img  src="{{ $user->logo && file_exists(public_path('logo/' . $user->logo)) ? asset('logo/' . $user->logo) : asset('images/default.png') }}"  alt="M" />
{{-- 
        <img src="{{ asset('logo/' . $user->logo) }}"  alt=""> --}}
        <div class="shop-user-profile">
            <h1>Welcome {{ $user->name }}</h1>
            <p>Student</p>
        </div>
    </header>

    
    <section class="user_page">
      <div class="user-header">
          <p>My Shortcuts </p>
      </div>
      <div class="option-grid">

      
          <a href="{{url('order_status')}}" class="options_container">
            <i class="fa-solid fa-bag-shopping"></i>
            <p>Purchases</p>
          </a>
          <a href="{{url('profile_edit')}}" class="options_container">
            <i class="fa-solid fa-user"></i>
            <p>Profile</p>
          </a>
          <a href="{{url('update_password')}}"  class="options_container">
            <i class="fa-solid fa-lock"></i>
            <p>Password</p>
          </a>
          <a href="#" class="options_container" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fa-solid fa-right-from-bracket"></i>
              <p>Logout</p>
          </a>

<!-- Hidden Logout Form -->
<form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
    @csrf
</form>

      </div>
      <div class="option-grid">

      
          <a href="{{url('faq')}}" class="options_container">
          <i class="fa-solid fa-circle-question"></i>
            <p>FAQ</p>
          </a>
          <a href="{{url('about')}}" class="options_container">
          <i class="fa-solid fa-circle-info"></i>
            <p>About</p>
          </a>
          <a href="{{url('search-order')}}" class="options_container">
          <i class="fa-solid fa-earth-americas"></i>
            <p>Tracker</p>
          </a>
          <a href="{{url('developer')}}"  class="options_container">
          <i class="fa-solid fa-code"></i>
            <p>Developers</p>
          </a>
   
    
      </div>
      {{-- <div class="option-grid">

      
        <a href="{{url('faq')}}" class="options_container">
        <i class="fa-solid fa-circle-question"></i>
          <p>Survey</p>
        </a>
        <a href="{{url('about')}}" class="options_container">
        <i class="">📱</i>
          <p>Download</p>
        </a>
        <a href="{{url('search-order')}}" class="options_container">
        <i class="fa-solid fa-earth-americas"></i>
          <p>CS</p>
        </a>
        <a href="{{url('developer')}}"  class="options_container">
        <i class="fa-solid fa-code"></i>
          <p>Contact</p>
        </a>
 
  
    </div> --}}
  </section>
    
  </div>
</div>

<script>
  // JavaScript to handle checkbox click and redirect
  document.querySelectorAll('.redirect-checkbox').forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
      if (this.checked) {
        window.location.href = this.getAttribute('data-url');
      }
    });
  });
</script>
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
</body>
</html>
