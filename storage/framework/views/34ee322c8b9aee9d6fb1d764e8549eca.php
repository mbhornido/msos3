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
  <?php echo $__env->make('includers.mobile_back_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('includers.user_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Shop Header -->
    <div class="d_hide">
        <br><br>
    </div>
    <header class="shop-header">
        <img src="<?php echo e(asset('images/logo.jpg')); ?>"  alt="">
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
          <?php echo csrf_field(); ?>
          <ul>
            <li>
                <label>
                <input type="checkbox" class="redirect-checkbox" data-url="<?php echo e(url('seller_department')); ?>" <?php echo e(request()->is('seller_departments') ? 'checked' : ''); ?>>
                All Shops
                </label>
            </li>

            <?php $__currentLoopData = $allDepartments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $departmentItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                <label>
                    <input type="checkbox" class="redirect-checkbox" data-url="<?php echo e(url('seller_departments', $departmentItem->id)); ?>">
                    <?php echo e($departmentItem->department_name); ?>

                </label>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </form>
      </aside>

      <!-- Product Grid -->
      <section class="shop-product-grid">
        <div class="shop-product-header">
          <p>Showing sellers from <?php echo e($department->department_name); ?></p>
        </div>
        <div class="shop-products" id="shop-products">
          <!-- Initial list of admins -->
          <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="shop-product-card" style="display: <?php echo e($admin->view_shop); ?>;">
              <img src="<?php echo e(asset('logo/' . $admin->logo)); ?>" alt="">
              <div class="shop-card-details">
                <h4><?php echo e($admin->shop_name); ?></h4>
                <p><?php echo e($admin->college); ?></p>
                <a href="<?php echo e(url('view_seller_profile/' . $admin->id)); ?>" class="shop-view"><i class="fa-solid fa-shop"></i> View Shop</a>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <a href="<?php echo e(url('dashboard')); ?>" >
                <i class="fa-solid fa-house"></i>
                <p class="footer_p">Home</p>
            </a>
            <a href="<?php echo e(url('seller_department')); ?>" class="active"  >
                <i class="fa-solid fa-shop"></i>
                <p class="footer_p" >Shops</p>

            </a>
            <a href="<?php echo e(url('search-order')); ?>">
              <i class="fa-solid fa-earth-americas"></i>
              <p class="footer_p">Tracker</p>

          </a>
            <a href="<?php echo e(url('user_page')); ?>">
                <i class="fa-solid fa-user"></i>
                <p class="footer_p">User</p>

            </a>
        </div>
    </footer>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\msosfinal\msos3\resources\views/home/department_admins.blade.php ENDPATH**/ ?>