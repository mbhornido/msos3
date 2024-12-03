<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MSOS | SHOP</title>
  <link rel="shortcut icon" href="<?php echo e(asset('images/download2.png')); ?>" type="image/svg+xml">
  <link rel="stylesheet" href="<?php echo e(asset('css/css_file.css')); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<div class="container">
  <!-- <?php echo $__env->make('includers.mobile_back_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
  <?php echo $__env->make('includers.user_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <div class="shop_user_header">
    <!-- Shop Header -->
    <div class="d_hide">
        <br><br>
    </div>

    <header class="shop-user">
      <div class="shop-user-top">
        <a href="<?php echo e(url('start_sell')); ?>" class="shop-user-left">
          <i class="fa-solid fa-shop-lock"></i>
          <p>Start Selling</p>
        </a>
        <a href="<?php echo e(url('mycart')); ?>" class="shop-user-right">
          <i class="fa-solid fa-cart-shopping"></i>
        </a>
      </div>

      <img  src="<?php echo e($user->logo && file_exists(public_path('logo/' . $user->logo)) ? asset('logo/' . $user->logo) : asset('images/default.png')); ?>"  alt="M" />

        <div class="shop-user-profile">
            <h1>Welcome <?php echo e($user->name); ?></h1>
            <p>Student</p>
        </div>
    </header>

    
    <section class="user_page">
      <div class="user-header">
          <p>My Shortcuts </p>
      </div>
      <div class="option-grid">

      
          <a href="<?php echo e(url('order_status')); ?>" class="options_container">
            <i class="fa-solid fa-bag-shopping"></i>
            <p>Purchases</p>
          </a>
          <a href="<?php echo e(url('profile_edit')); ?>" class="options_container">
            <i class="fa-solid fa-user"></i>
            <p>Profile</p>
          </a>
          <a href="<?php echo e(url('update_password')); ?>"  class="options_container">
            <i class="fa-solid fa-lock"></i>
            <p>Password</p>
          </a>
          <a href="#" class="options_container" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fa-solid fa-right-from-bracket"></i>
              <p>Logout</p>
          </a>

<!-- Hidden Logout Form -->
<form id="logout-form" method="POST" action="<?php echo e(route('logout')); ?>" style="display: none;">
    <?php echo csrf_field(); ?>
</form>

      </div>
      <div class="option-grid">

      
          <a href="<?php echo e(url('faq')); ?>" class="options_container">
          <i class="fa-solid fa-circle-question"></i>
            <p>FAQ</p>
          </a>
          <a href="<?php echo e(url('about')); ?>" class="options_container">
          <i class="fa-solid fa-circle-info"></i>
            <p>About</p>
          </a>
          <a href="<?php echo e(url('search-order')); ?>" class="options_container">
          <i class="fa-solid fa-earth-americas"></i>
            <p>Tracker</p>
          </a>
          <a href="<?php echo e(url('developer')); ?>"  class="options_container">
          <i class="fa-solid fa-code"></i>
            <p>Developers</p>
          </a>
   
    
      </div>
      
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
            <a href="<?php echo e(url('dashboard')); ?>" >
                <i class="fa-solid fa-house"></i>
                <p class="footer_p">Home</p>
            </a>
            <a href="<?php echo e(url('seller_department')); ?>">
                <i class="fa-solid fa-shop"></i>
                <p class="footer_p" >Shops</p>

            </a>
            <a href="<?php echo e(url('search-order')); ?>">
              <i class="fa-solid fa-earth-americas"></i>
              <p class="footer_p">Tracker</p>

          </a>
            <a href="<?php echo e(url('user_page')); ?>" class="active" >
                <i class="fa-solid fa-user"></i>
                <p class="footer_p">User</p>

            </a>
        </div>
    </footer>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\msoshub1\resources\views/home/user_page.blade.php ENDPATH**/ ?>