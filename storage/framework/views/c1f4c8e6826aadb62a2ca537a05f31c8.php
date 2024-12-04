<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Orders - Manage your orders">
    <title>Admin Orders</title>
    <link rel="shortcut icon" href="<?php echo e(asset('images/download2.png')); ?>" type="image/svg+xml">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo e(asset('css_admin/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css_admin/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/select2/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css_admin/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome/css/fontawesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css_admin/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css_admin/new.css')); ?>">
</head>
<body>

    <!-- Include Admin Header -->
    <?php echo $__env->make('includes.admin_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="page-wrapper">
        <div class="content">
            <!-- Page Header -->
            <div class="page-header">
                <div class="page-title">
                    <h4>Your Product Orders</h4>
                    <h6>Manage and delete orders in bulk</h6>
                </div>
            </div>

            <!-- Search Form -->
            

            <!-- Bulk Delete Form -->
            <form action="<?php echo e(route('bulk_delete_orders')); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete the selected orders?');">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>

                <!-- Bulk Delete Button -->
                <button type="submit" class="btn btn-danger mb-3">Delete Selected Orders</button>

                <!-- Orders Table -->
                <div class="table-responsive">
                    <table class="table cart-table datanews">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all"></th>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Product</th>
                                <th>Status</th>
                                <th>Track Order</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><input type="checkbox" name="order_ids[]" value="<?php echo e($order->id); ?>"></td>
                                <td><?php echo e($order->id); ?></td>
                                <td><?php echo e($order->name); ?><br><?php echo e($order->rec_address); ?>

                                    <br><?php echo e($order->created_at->format('d M Y, h:i A')); ?>

                                </td>
                                <td>
                                    <?php
                                        $orderImages = json_decode($order->product->image, true) ?? ['default.png'];
                                        $firstOrderImage = $orderImages[0];
                                    ?>
                                    <img src="/products/<?php echo e($firstOrderImage); ?>" alt="<?php echo e($order->product->title); ?>" style="width: 100px;">
                                    <p><?php echo e($order->product->title); ?></p>
                                </td>
                                <td><?php echo e($order->status); ?></td>
                                <td>
                                    <?php
                                        $trackHistory = json_decode($order->track, true) ?? [];
                                    ?>
                                    <ul>
                                        <?php $__currentLoopData = $trackHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $track): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($track['change']); ?> (<?php echo e(\Carbon\Carbon::parse($track['timestamp'])->format('d M Y, h:i A')); ?>)</li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </td>
                                <td>
                                    <form action="<?php echo e(route('delete_order', $order->id)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this order?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Links -->
                <div class="pagination-wrapper">
                    <?php echo e($orders->appends(request()->input())->links()); ?>

                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js_admin/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js_admin/feather.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js_admin/jquery.slimscroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js_admin/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/select2/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/sweetalert/sweetalert2.all.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/sweetalert/sweetalerts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js_admin/script.js')); ?>"></script>

    <!-- Select All Checkboxes -->
    <script>
        document.getElementById('select-all').addEventListener('change', function () {
            const checkboxes = document.querySelectorAll('input[name="order_ids[]"]');
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\msosfinal\msos3\resources\views/admin/orders_delete.blade.php ENDPATH**/ ?>