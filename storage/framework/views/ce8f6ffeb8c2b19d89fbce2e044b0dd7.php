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
                    <h4>Product List</h4>
                    <h6>Manage your products</h6>
                </div>
                <div class="page-btn">
                    <a href="<?php echo e(url('add_product')); ?>" class="btn btn-added">
                        <img src="<?php echo e(asset('img/icons/plus.svg')); ?>" class="me-1" alt="img">Add New Product
                    </a>
                </div>
            </div>

            <div class="cards">
                <div class="card-bodys">
                <form action="<?php echo e(url('product_search')); ?>" method="get" >
                    <?php echo csrf_field(); ?>
                    <div class="input-group">
                        <input type="search" name="search" placeholder="Search Product"  class="form-control">
                        <input type="submit" value="Search"  class="btn btn-primary">
                    </div>
                </form>


                    <div class="table-responsives">
                        <table class="table datanews">
                            <thead>
                                <tr>
                                    
                                <th>Product name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Estimate </th>
                                <th>Image</th>
                                <th>Size</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tbody>
                            <tr>
                                <td class="productimgnames">
                                    <a href=""><?php echo e($products->title); ?></a>
                                </td>
                                <td class="productimgnames">
                                    <a href=""><?php echo e(Str::limit($products->description, 20)); ?></a>
                                </td>
                                <td class="productimgnames">
                                    <a href=""><?php echo e($products->category); ?></a>
                                </td>
                                <td class="productimgnames">
                                    <a href="">₱<?php echo e(number_format($products->price, 2)); ?></a>
                                </td>
                                <td class="productimgnames">
                                    <a href=""><?php echo e($products->estimate); ?></a>
                                </td>
                                <td class="productimgnames">
                                    <?php
                                        // Decode the JSON string in the 'image' column
                                        $productImages = json_decode($products->image, true); // Decode as an associative array
                                        $firstImage = !empty($productImages) ? $productImages[0] : 'default.png'; // Fallback to default image
                                    ?>
                                    <img src="<?php echo e(asset('products/' . $firstImage)); ?>" alt="Product Image" width="100">
                                </td>
                                <td class="productimgnames">
                                    <a href=""><?php echo e($products->size); ?></a>
                                </td>
                                <td>
                                    <a class="me-3" href="<?php echo e(url('update_product', $products->id)); ?>">
                                        <img src="<?php echo e(asset('img/icons/edit.svg')); ?>" alt="Edit">
                                    </a>
                                    <a class="me-3" href="<?php echo e(url('delete_product', $products->id)); ?>">
                                        <img src="<?php echo e(asset('img/icons/delete.svg')); ?>" alt="Delete">
                                    </a>
                                </td>
                            </tr>

                                
                            </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                        <br><br>
                        <div class="pagination-container">
                            <?php echo e($product->onEachSide(1)->links()); ?>

                        </div>
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
<?php /**PATH C:\xampp\htdocs\msosfinal\msos3\resources\views/admin/view_product.blade.php ENDPATH**/ ?>