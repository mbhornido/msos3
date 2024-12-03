<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MSOS | SHOP</title>
  <link rel="shortcut icon" href="<?php echo e(asset('images/download2.png')); ?>" type="image/svg+xml">
  <link rel="stylesheet" href="<?php echo e(asset('css/css_file.css')); ?>">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
 
<div class="container">

<?php echo $__env->make('includers.mobile_back_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
<?php echo $__env->make('includers.user_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="d_hide">
        <br><br>
    </div>

    <!-- Shop Header -->
    <header class="shop-header">
        <img src="<?php echo e(asset('logo/' . $admin->logo)); ?>"  alt="">
        <div class="shop-header-profile">
            <h1> <?php echo e($admin->shop_name); ?></h1>
            <p> <?php echo e($admin->college); ?></p>
             

            <button class="message-button" onclick="window.location.href='<?php echo e(url('chat', $admin->id)); ?>'">
                <i class="fa-solid fa-envelope"></i> CHAT
            </button>
        </div>
    </header>
    <div class="shop">
    <div class="shop-container">
        <!-- Sidebar for Product Categories and Sort Options -->
        <aside class="shop-sidebar">
        <h3>Shop Categories</h3>
            <ul>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <li>
                        <input type="checkbox" id="category-<?php echo e($category->id); ?>" 
                            onchange="window.location.href='<?php echo e(url('category_products', $category->id)); ?>'">
                        <?php echo e($category->category_name); ?> - <?php echo e($category->products_count); ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </aside>

        <!-- Product Grid -->
        <section class="shop-product-grid">
            <div class="shop-product-header">
                <p>Showing <?php echo e($products->count()); ?> of <?php echo e($products->total()); ?> Products</p>
            </div>
            <div id="shop-products" class="products-grid">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        // Decode the JSON string in the 'image' column
                        $productImages = json_decode($product->image, true); // Decode as an associative array
                        $firstImage = !empty($productImages) ? $productImages[0] : 'default.png'; // Fallback to default image
                    ?>

                    <div class="product-card">
                        <img src="<?php echo e(asset('products/' . $firstImage)); ?>" alt="<?php echo e($product->title); ?>">
                        <div class="product_data">
                            <h3><?php echo e($product->title); ?></h3>
                            <p>₱<?php echo e(number_format($product->price, 2)); ?></p>
                        </div>
                        <button class="product_cart_btn" onclick="window.location.href='<?php echo e(url('product_details', $product->id)); ?>'">
                            <i class="fa-solid fa-cart-arrow-down"></i> Add to cart
                        </button>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php if($products->hasMorePages()): ?>
                <button id="load-more" class="secondary-button" data-next-page="<?php echo e($products->nextPageUrl()); ?>">
                    Show More
                </button>
            <?php endif; ?>
        </section>


        <script>
document.getElementById('load-more')?.addEventListener('click', function() {
    const button = this;
    const nextPageUrl = button.getAttribute('data-next-page');

    fetch(nextPageUrl, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
        .then(response => response.text())
        .then(data => {
            // Parse the returned HTML and append to the product container
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, 'text/html');
            const newProducts = doc.querySelector('#shop-products').innerHTML;

            document.getElementById('shop-products').insertAdjacentHTML('beforeend', newProducts);

            // Update or remove the load-more button
            const newButton = doc.querySelector('#load-more');
            if (newButton) {
                button.setAttribute('data-next-page', newButton.getAttribute('data-next-page'));
            } else {
                button.remove();
            }
        })
        .catch(error => console.error('Error loading more products:', error));
});
</script>
    </div>
    </div>

    <div class="d_hide">
        <br><br><br>
    </div>
    <footer class="floating-footer">
        <div class="footer-links">
            <a href="<?php echo e(url('dashboard')); ?>" >
                <i class="fa-solid fa-house"></i>
                <p class="footer_p">Home</p>
            </a>
            <a href="<?php echo e(url('seller_department')); ?>" class="active"  >
                <i class="fa-solid fa-shop"></i>
                <p class="footer_p" >Shops</p>

            </a>
            <a href="<?php echo e(url('search-order')); ?>">
                <i class="fa-solid fa-earth-americas"></i>
                <p class="footer_p">Tracker</p>

            </a>
            <a href="<?php echo e(url('user_page')); ?>">
                <i class="fa-solid fa-user"></i>
                <p class="footer_p">User</p>

            </a>
        </div>
    </footer> 
</div>

<!--Start of Tawk.to Script-->

    <!--End of Tawk.to Script-->
</body>
</html>
<?php /**PATH C:\xampp\htdocs\msoshub1\resources\views/home/view_seller_profile.blade.php ENDPATH**/ ?>