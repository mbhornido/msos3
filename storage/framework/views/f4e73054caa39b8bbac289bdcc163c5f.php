<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSOS | SHOP</title>
    <link rel="shortcut icon" href="<?php echo e(asset('images/download2.png')); ?>" type="image/svg+xml">
    <link rel="stylesheet" href="<?php echo e(asset('css/css_file.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #autocomplete-results {
            position: absolute;
            background: white;
            border: 1px solid #ccc;
            z-index: 1000;
            max-width: 280px;
            width: 100%;
            border-radius: 16px;
            margin-top: .3rem;
            max-height: 200px;
            overflow-y: auto;
            text-align: left;
        }

        #autocomplete-results ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        #autocomplete-results li {
            padding: 8px;
            cursor: pointer;
        }

        #autocomplete-results li:hover {
            background-color: #f0f0f0;
        } 
    </style>
</head>
<body>

<div class="container">



<nav class="top_header">
        <div class="top_left">
            <a href="<?php echo e(url('search-order')); ?>">Track Order</a>
            <a href="<?php echo e(url('start_sell')); ?>">Start Selling</a>
            <a href="">Download</a>
            <a href="">Follow us on <i class="fa-brands fa-facebook"></i></a>

        </div>
        <div class="top_right">
            <a href="<?php echo e(url('faq')); ?>"><i class="fa-solid fa-circle-question"></i> Help</a>
            <a href="<?php echo e(url('developer')); ?>">Developers</a>
            <a href="<?php echo e(url('profile_edit')); ?>" class="tab_none">Profile</a>
        </div>
    </nav>

<section class="section_header">
        <header class="header ">
            <a href="<?php echo e(url('dashboard')); ?>" class="logo">
                <img src="<?php echo e(asset('images/download2.png')); ?>" alt="">

                <div class="logo_text">
                    <h3>MSOS</h3>
                    <p>Online Shop</p>
                </div>
            </a>
            <div class="search-bar">
                <form action="<?php echo e(url('search')); ?>" method="GET">
                    <input type="text" id="search-input" name="search" placeholder="Search for products..." value="<?php echo e(request('search')); ?>">
                    <button type="submit" class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <div id="autocomplete-results" style="display: none;"></div>
            </div> 

            <div class="header-icons">
                <a href="<?php echo e(url('mycart')); ?>" class="icon1"><i class="fa-solid fa-cart-shopping"></i><span><?php echo e($count); ?></span></a>
                <a href="<?php echo e(url('order_status')); ?>" class="icon"><i class="fa-solid fa-user"></i></a>
            </div>
        </header>
        <div class="admin_categories">
            <?php $__currentLoopData = $scategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(url('product_super',['superCategory' => $scategory->super_category])); ?>"><?php echo e($scategory->super_category); ?></a>       
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div> 
    </section>


    <section id="products" class="products-section">
        <?php if($products->isEmpty()): ?>
            <p>No products found matching your search.</p>
        <?php else: ?>
            <div class="products-grid">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        // Decode the JSON string in the 'image' column
                        $productImages = json_decode($product->image); // Corrected $products to $product
                        $firstImage = !empty($productImages) ? $productImages[0] : 'default.png'; // Default image if none exists
                    ?>
                    <a href="<?php echo e(url('product_details', $product->id)); ?>" class="product-card">
                        <img src="/products/<?php echo e($firstImage); ?>" alt="<?php echo e($product->title); ?>">
                        <div class="product_data">
                            <h3><?php echo e($product->title); ?></h3>
                            <p>₱<?php echo e(number_format($product->price, 2)); ?></p>
                        </div>
                        <button class="product_cart_btn">
                            <i class="fa-solid fa-cart-arrow-down"></i> Add to cart
                        </button>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </section>
    
    </div>


    <footer class="floating-footer">
        <div class="footer-links">
            <a href="<?php echo e(url('dashboard')); ?>" class="active">
                <i class="fa-solid fa-house"></i>
                <p class="footer_p">Home</p>
            </a>
            <a href="<?php echo e(url('seller_department')); ?>">
                <i class="fa-solid fa-shop"></i>
                <p class="footer_p" >Shops</p>

            </a>
            <a href="<?php echo e(url('profile_edit')); ?>">
                <i class="fa-solid fa-circle-info"></i>
                <p class="footer_p">About</p>

            </a>
            <a href="<?php echo e(url('user_page')); ?>">
                <i class="fa-solid fa-user"></i>
                <p class="footer_p">User</p>

            </a>
        </div>
    </footer>
    <script>
        $(document).ready(function () {
            $('#search-input').on('input', function () {
                let query = $(this).val();

                if (query.length >= 2) {
                    $.ajax({
                        url: "<?php echo e(url('autocomplete')); ?>",
                        data: { term: query },
                        success: function (data) {
                            let suggestions = data.map(title => `<li>${title}</li>`).join('');
                            $('#autocomplete-results').html(`<ul>${suggestions}</ul>`).show();
                        }
                    });
                } else {
                    $('#autocomplete-results').hide();
                }
            });

            $(document).on('click', function () {
                $('#autocomplete-results').hide();
            });

            $(document).on('click', '#autocomplete-results li', function () {
                let selectedValue = $(this).text();
                $('#search-input').val(selectedValue);
                $('#autocomplete-results').hide();
            });
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\msoshub1\resources\views/home/search_results.blade.php ENDPATH**/ ?>