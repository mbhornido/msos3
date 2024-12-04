


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Orders - To Pay">
    <title>Orders - To Pay</title>

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
                    <h4>Total Orders on Items</h4>
                </div>

                
            </div>

            <!-- Orders Table -->
            <div class="table-responsives">
                <table class="table cart-table datanews">
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
            </div>
       
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
<?php /**PATH C:\xampp\htdocs\msosfinal\msos3\resources\views/admin/order_product.blade.php ENDPATH**/ ?>