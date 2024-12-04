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
                <h4>Product Add Size</h4>
                <h6>Create new product Size</h6>
            </div>
        </div>

        <form action="<?php echo e(url('add_size')); ?>" method="post">
        <?php echo csrf_field(); ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Sizes Name</label>
                                <input type="text" name="size"  placeholder="Enter size">
                            </div>
                        </div>
            
    
                    
                        
                        <div class="col-lg-12">
                            <input type="submit" class="btn btn-submit me-2" value="Submit">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
</div>


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
<?php /**PATH C:\xampp\htdocs\msosfinal\msos3\resources\views/admin/size.blade.php ENDPATH**/ ?>