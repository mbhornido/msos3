<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>MSOS Shop</title>


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
                <h4>Product Add</h4>
                <h6>Create new product</h6>
            </div>
        </div>

        <form action="<?php echo e(url('upload_product')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Product name</label>
                                <input type="text" name="title" placeholder="Enter product name" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="select" name="category" required>
                                    <option>Choose Category</option>
                                    <?php $__currentLoopData = $category_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category_data->category_name); ?>">
                                            <?php echo e($category_data->category_name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Super Category</label>
                                <select class="select" name="Scategory" required>
                                    <option>Choose Super Category</option>
                                    <?php $__currentLoopData = $super_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $super_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($super_category->super_category); ?>">
                                            <?php echo e($super_category->super_category); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price" required placeholder="Enter product price">
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Estimate Delivery: </label>
                                <input type="text" name="estimate" required placeholder="Enter estimate delivery time">
                            </div>
                        </div>


                    

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" required></textarea>
                            </div>
                        </div>

                        <!-- Product Sizes Section -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Product Sizes</label>
                                <div class="checkbox-container">
                                    <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label>
                                            <input type="checkbox" name="sizes[]" value="<?php echo e($size->size_name); ?>"> <?php echo e($size->size_name); ?>

                                        </label><br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Product Images</label>
                                <div class="image-upload">
                                    <input type="file" name="images[]" id="imageInput" accept="image/*" multiple>
                                    <div class="image-uploads">
                                        <img src="<?php echo e(asset('img/icons/upload.svg')); ?>" alt="img">
                                        <h4>Drag and drop files to upload</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Image preview container -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Image Previews</label>
                                <div id="previewContainer" style="margin-top: 10px; display: flex; gap: 10px; flex-wrap: wrap;">
                                    <!-- Previews will be added here -->
                                </div>
                            </div>
                        </div>

                        <!-- Image preview container -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Image Preview</label>
                                <div id="previewContainer" style="margin-top: 10px;">
                                    <img id="imagePreview" src="#" alt="Image Preview" style="display: none; max-width: 200px;">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <input type="submit" class="btn btn-submit me-2" value="Add product">
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

<script>
    // JavaScript to preview image when a file is chosen
    document.getElementById('imageInput').addEventListener('change', function(event) {
    const files = event.target.files;
    const previewContainer = document.getElementById('previewContainer');
    previewContainer.innerHTML = ''; // Clear previous previews

    Array.from(files).forEach(file => {
        if (file.type.match('image.*')) {
            const reader = new FileReader();
            const img = document.createElement('img');
            img.style.maxWidth = '150px';
            img.style.margin = '5px';
            img.style.border = '1px solid #ddd';
            img.style.borderRadius = '5px';

            reader.onload = function(e) {
                img.src = e.target.result;
                previewContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    });
});

</script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\msosfinal\msos3\resources\views/admin/add_product.blade.php ENDPATH**/ ?>