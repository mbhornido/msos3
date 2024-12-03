<header>
        <div class="logo">Superadmin Dashboard</div>
        <div class="header-right">
            <div class="cart">
                <i class="fa-solid fa-bell"></i>
            </div>
            <div class="profile-dropdown">
            <i class="fa-solid fa-circle-user"></i>
                <div class="dropdown-content">
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>

                            <input type="submit" value="Logout" class="btn-1">
                        </form>
                    <a href="<?php echo e(url('/profile')); ?>" class="btn-1">Profile</a>

                </div>
            </div>
        </div>
    </header> <?php /**PATH C:\xampp\htdocs\msoshub1\resources\views/components/header_super.blade.php ENDPATH**/ ?>