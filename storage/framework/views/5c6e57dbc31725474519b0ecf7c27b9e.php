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
                    <h6>Manage and update orders in bulk</h6>
                </div>
            </div>

            <!-- Search and Bulk Update Form -->
            <div class="cards">
                <div class="card-bodys">

                    <!-- Search Form -->
                    <form action="<?php echo e(url('order_search')); ?>" method="GET" class="mb-3">
                        <div class="input-group mb-2">
                            <select name="status" class="form-control select2">
                                <option value="">Filter by Status</option>
                                <option value="Pending" <?php echo e(request('status') == 'Pending' ? 'selected' : ''); ?>>Pending</option>
                                <?php $__currentLoopData = $shippingOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($ship->shipping_name); ?>" <?php echo e(request('status') == $ship->shipping_name ? 'selected' : ''); ?>><?php echo e($ship->shipping_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <button type="submit" class="btn btn-primary">Filter</button>

                        </div>
                        
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search via order ID,Product Name,Customer Name " value="<?php echo e(request('search')); ?>">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>


                    <form action="<?php echo e(url('bulk_update_order_status')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        
                        <!-- Bulk Update Options -->
                        <div class="bulk-update-options mb-3">
                            <label for="bulk-status">Update Status: </label>
                            <select name="bulk_status" id="bulk-status" class="form-control select2">
                                <option value="Pending">Pending</option>
                                <?php $__currentLoopData = $shippingOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($ship->shipping_name); ?>"><?php echo e($ship->shipping_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                            <label for="bulk-track">Update Track: </label>
                            <select name="bulk_track" id="bulk-track" class="form-control select2">
                                <option value="Order is placed">Order is placed</option>

                                <?php $__currentLoopData = $paymentOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($payment->payment_name); ?>"><?php echo e($payment->payment_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                        <!-- Orders Table -->
                        <div class="table-responsives">
                            <table class="table cart-table datanews">
                                <thead>
                                    <tr>
                                        <th>Select</th>
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
                                                // Decode the JSON string in the 'image' column
                                                $orderImages = json_decode($order->product->image, true); // Decode as an associative array
                                                $firstOrderImage = !empty($orderImages) ? $orderImages[0] : 'default.png'; // Fallback to default image
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
                                            <button type="button" class="more" onclick="openOrderModal(<?php echo e($order->id); ?>)">
                                                <img src="<?php echo e(asset('/img/icons/eye1.svg')); ?>" class="me-2" alt="View Order">
                                            </button>
                                        </td>
                                    </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <!-- Pagination Links -->
                        <div class="pagination-wrapper">
                            <?php echo e($orders->appends(request()->input())->links()); ?>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Unique Modals for each order (placed outside table) -->
    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div id="orderModal_<?php echo e($order->id); ?>" class="order-modal">
        <div class="order-modal-content">
            <span class="order-close-btn" onclick="closeOrderModal(<?php echo e($order->id); ?>)">&times;</span>
            <h4>Order Details</h4>
            <table class="modal-table">
                <tr><th>Quantity</th><td><?php echo e($order->quantity); ?></td></tr>
                <tr><th>Size</th><td><?php echo e($order->size); ?></td></tr>
                <tr><th>Price</th><td>₱<?php echo e(number_format($order->product->price, 2)); ?></td></tr>
                <tr><th>Transaction Fee</th><td>₱<?php echo e($order->total_fee); ?></td></tr>
                <tr><th>Total</th><td>₱<?php echo e(number_format($order->price, 2)); ?></td></tr>
            </table>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
    <!-- Scripts -->
    <script src="<?php echo e(asset('js_admin/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js_admin/feather.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js_admin/jquery.slimscroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js_admin/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/select2/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/sweetalert/sweetalert2.all.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/sweetalert/sweetalerts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js_admin/script.js')); ?>"></script>

    <!-- Optional JS for Modal Toggle -->
    <script>
        function openOrderModal(id) {
            document.getElementById("orderModal_" + id).style.display = "block";
        }

        function closeOrderModal(id) {
            document.getElementById("orderModal_" + id).style.display = "none";
        }
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\msoshub1\resources\views/admin/orders.blade.php ENDPATH**/ ?>