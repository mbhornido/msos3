<aside class="msos-sidebar">
    <h2>MSOS Super</h2>
    <nav>
        <ul>
            <li><a href="<?php echo e(url('super_dashboard')); ?>"> <i class="fas fa-tachometer-alt"></i> Dashboard </a></li>
            <li class="msos-dropdown">
                <div class="msos-dropdown-toggle">
                    <div class="msos-drop-toggle-left">
                        <i class="fas fa-box"></i> 
                        <p>Global Settings</p>
                    </div>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <ul class="msos-dropdown-menu">
                    <li><a href="<?php echo e(url('view_section')); ?>"><i class="fas fa-plus"></i> Sections </a></li>
                    <li><a href="<?php echo e(url('view_ship')); ?>"><i class="fas fa-plus"></i> Shipping </a></li>
                    <li><a href="<?php echo e(url('view_supercategory')); ?>"><i class="fas fa-plus"></i> Global Category </a></li>
                    <li><a href="<?php echo e(url('view_department')); ?>"><i class="fas fa-plus"></i> Departments </a></li>
                    <li><a href="<?php echo e(url('view_fee')); ?>"><i class="fas fa-plus"></i> Transaction Fee </a></li>
                
                </ul>
            </li>
            <li><i class="fas fa-chart-line"></i> Sales</li>
            <li><i class="fas fa-bullhorn"></i> Announcements</li>
        </ul>
    </nav>
</aside><?php /**PATH C:\xampp\htdocs\msosfinal\msos3\resources\views/superadmin/header.blade.php ENDPATH**/ ?>