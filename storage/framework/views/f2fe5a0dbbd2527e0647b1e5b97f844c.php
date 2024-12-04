
<div class="container">
    <h1>Dashboard</h1>
    <h2>Users</h2>
    <ul>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <a href="<?php echo e(url('chat', $user->id)); ?>"><?php echo e($user->name); ?></a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>



<?php /**PATH C:\xampp\htdocs\msosfinal\msos3\resources\views/chat/dashboard.blade.php ENDPATH**/ ?>