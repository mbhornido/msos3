<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profile - Update Password</title>
<link rel="shortcut icon" href="<?php echo e(asset('images/download2.png')); ?>" type="image/svg+xml">
<link rel="stylesheet" href="<?php echo e(asset('css/css_file.css')); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<style>
  .toast {
    z-index: 99;
  }

</style>

</head>
<body>

<div class="container">
  <?php echo $__env->make('includers.mobile_back_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('includers.user_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  <div class="d_hide">
        <br><br>
    </div>
  <div class="order-container">
    <!-- Sidebar -->
        <div class="order-sidebar hide">
            <div class="order-profile">
                <div class="order-profile-pic">
                <img src="<?php echo e(asset('logo/' . $user->logo)); ?>" alt="M" />
                </div>
                <div class="order-profile-info">
                <p class="order-username"><?php echo e($user->name ?? 'User Name'); ?></p>
                <a href="#" class="order-edit-profile"><i class="fa-solid fa-pen"></i> Edit Profile</a>
                </div>
            </div>
        <hr>
        <nav class="order-nav"> 
                <a href="<?php echo e(url('profile_edit')); ?>" class="order-nav-item "><i class="fa-regular fa-user"></i> My Account</a>
                <a href="<?php echo e(url('order_status')); ?>" class="order-nav-item"><i class="fa-solid fa-table-list"></i> My Purchase</a>
                <a href="<?php echo e(url('update_password')); ?>" class="order-nav-item active"><i class="fa-solid fa-lock"></i> Password</a>
                
                <!-- Logout Form -->
                <form method="POST" action="<?php echo e(route('logout')); ?>" class="order-nav-item logout-form" >
                    <?php echo csrf_field(); ?>
                    <a class="logout-link"  style="color: black;" href="<?php echo e(route('logout')); ?>"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </a>
                </form>
            </nav>
        </div>
    <div class="profile-container">
        <h1 class="profile-title">Update Password</h1>
        <p class="profile-subtitle">Ensure your account is using a long, random password to stay secure.</p>
        <hr>

        <form method="post" action="<?php echo e(route('password.update')); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>

            
            <label for="current_password" class="profile-label">Current Password</label>
            <input type="password" id="current_password" name="current_password" class="profile-input" autocomplete="current-password" required >
            <?php if($errors->updatePassword->get('current_password')): ?>
                <span class="text-red-500"><?php echo e($errors->updatePassword->get('current_password')[0]); ?></span>
            <?php endif; ?>

            <label for="password" class="profile-label">New Password</label>
            <input type="password" id="password" name="password" class="profile-input" autocomplete="new-password" required>
            <?php if($errors->updatePassword->get('password')): ?>
                <span class="text-red-500"><?php echo e($errors->updatePassword->get('password')[0]); ?></span>
            <?php endif; ?>

            <label for="password_confirmation" class="profile-label">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="profile-input" autocomplete="new-password" required>
            <?php if($errors->updatePassword->get('password_confirmation')): ?>
                <span class="text-red-500"><?php echo e($errors->updatePassword->get('password_confirmation')[0]); ?></span>
            <?php endif; ?>

            <button type="submit" class="profile-save-btn">Save</button>

            <?php if(session('status') === 'password-updated'): ?>
                <p class="alert-message">Password updated successfully.</p>
            <?php endif; ?>
        </form>
    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
      <?php if(session('status') === 'password-updated'): ?>
          toastr.success("Password updated successfully.", "Success", {
              closeButton: true,
              progressBar: true,
              timeOut: 5000
          });
      <?php endif; ?>
  });
</script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\msoshub1\resources\views/profile/partials/update-password-form.blade.php ENDPATH**/ ?>