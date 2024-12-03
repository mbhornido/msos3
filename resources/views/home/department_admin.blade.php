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
  @include('includers.mobile_back_header')
  @include('includers.user_header')

    <!-- Shop Header -->
    <div class="d_hide">
        <br><br>
    </div>

    <header class="shop-header">
        <img src="{{ asset('images/logo.jpg') }}"  alt="">
        <div class="shop-header-profile">
            <h1>Welcome to <br> CTU - Danao Campus</h1>
            <p>Students Organization Shops</p>
        </div>
    </header>
    <div class="shop">

    <div class="shop-container">
      <!-- Sidebar for Product Categories and Filter Options -->
      <aside class="shop-sidebar">
        <h3>Filter Shops</h3>
        <form id="filter-form">
            @csrf
            <ul>
            <!-- Add "All Shops" option -->
            <li>
                <label>
                <input type="checkbox" class="redirect-checkbox" data-url="{{ url('seller_department') }}" {{ request()->is('seller_departments') ? 'checked' : '' }}>
                All Shops
                </label>
            </li>

            @foreach($allDepartments as $departmentItem)
                <li>
                <label>
                    <input type="checkbox" class="redirect-checkbox" data-url="{{ url('seller_departments', $departmentItem->id) }}" {{ request()->is('seller_departments/' . $departmentItem->id) ? 'checked' : '' }}>
                    {{ $departmentItem->department_name }}
                </label>
                </li>
            @endforeach
            </ul>
        </form>
        </aside> 

      <!-- Product Grid -->
      <section class="shop-product-grid">
        <div class="shop-product-header">
          <p>Showing sellers from {{ $department->department_name }}</p>
        </div>
        <div class="shop-products" id="shop-products">
          <!-- Initial list of admins -->
          @foreach($admins as $admin)
            <div class="shop-product-card" style="display: {{ $admin->view_shop }};">
              <img src="{{ asset('logo/' . $admin->logo) }}" alt="">

              <div class="shop-card-details">
                <h4>{{ $admin->shop_name }}</h4>
                <p>{{ $admin->college }}</p>
                <a href="{{ url('view_seller_profile/' . $admin->id) }}" class="shop-view"><i class="fa-solid fa-shop"></i> View Shop</a>
              </div>
            </div>
          @endforeach
        </div>
      </section>
    </div>
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
            <a href="#" class="active"  >
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
</body>
</html>
