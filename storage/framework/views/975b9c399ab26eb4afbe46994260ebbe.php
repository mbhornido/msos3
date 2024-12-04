<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>MSOS ADMIN</title>

<link rel="shortcut icon" href="<?php echo e(asset('images/download2.png')); ?>" type="image/svg+xml">

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

<?php echo $__env->make('includes.admin_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Product Category List</h4>
                    <h6>View Product Category</h6>
                </div>
                <div class="page-btn">
                    <a href="<?php echo e(url('view_category')); ?>" class="btn btn-added">
                        <img src="<?php echo e(asset('img/icons/plus.svg')); ?>" class="me-1" alt="img">Add Category
                    </a>
                </div>
            </div>

            <div class="cards">
                <div class="card-bodys">
                   

                    <div class="table-responsives">
                        <table class="table datanews">
                            <thead>
                                <tr>
                                    
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php $__currentLoopData = $cat_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tbody>
                                <tr>
                                    <td class="productimgnames">
                                        <a href=""><?php echo e($cat_data->category_name); ?></a>
                                    </td>
                                    <td>
                                        <a class="me-3" href="<?php echo e(url('edit_category',$cat_data->id)); ?>">
                                            <img src="<?php echo e(asset('img/icons/edit.svg')); ?>" alt="img">
                                        </a>
                                        <a class="me-3" href="<?php echo e(url('delete_category',$cat_data->id)); ?>">
                                            <img src="<?php echo e(asset('img/icons/delete.svg')); ?>" alt="img">
                                        </a>
                                    </td>
                                </tr>
                                
                            </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    
<script src="<?php echo e(asset('js/sweet.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="<?php echo e(asset('js_admin/jquery-3.6.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('js_admin/feather.min.js')); ?>"></script>
<script src="<?php echo e(asset('js_admin/jquery.slimscroll.min.js')); ?>"></script>
<script src="<?php echo e(asset('js_admin/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('js_admin/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('js_admin/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/select2/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/sweetalert/sweetalert2.all.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/sweetalert/sweetalerts.min.js')); ?>"></script>
<script src="<?php echo e(asset('js_admin/script.js')); ?>"></script>



</body>
</html>
<?php /**PATH C:\xampp\htdocs\msosfinal\msos3\resources\views/admin/category_view.blade.php ENDPATH**/ ?>