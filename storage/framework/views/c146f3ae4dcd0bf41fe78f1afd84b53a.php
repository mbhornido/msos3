<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary by Product and Size</title>
    <link rel="stylesheet" href="<?php echo e(asset('css_admin/bootstrap.min.css')); ?>">
</head>
<body>
    <div class="container mt-5">
        <h2>Order Summary by Product and Size</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Size</th>
                    <th>Total Quantity Ordered</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orderSummary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $summary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($summary->title); ?></td>
                        <td><?php echo e($summary->size ?? 'N/A'); ?></td>
                        <td><?php echo e($summary->total_quantity); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <a href="<?php echo e(url('/admin/orders')); ?>" class="btn btn-primary">Back to Orders</a>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\msoshub1\resources\views/admin/order_product.blade.php ENDPATH**/ ?>