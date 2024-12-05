<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSOS | SHOP</title>
    <link rel="shortcut icon" href="<?php echo e(asset('images/download2.png')); ?>" type="image/svg+xml">
    <link rel="stylesheet" href="<?php echo e(asset ('css/css_file.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="container">



        <header class="back_header">
            <a href="<?php echo e(url('dashboard')); ?>"><i class="fa-solid fa-arrow-left"></i></a>
           
                <a href="<?php echo e(url('mycart')); ?>" class="icon1"><i class="fa-solid fa-cart-shopping"></i><span><?php echo e($count); ?></span></a>
        </header>
    
     
    <?php echo $__env->make('includers.user_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="cart-header">
        <span>Product</span>
        <span>Unit Price</span>
        <span>Quantity</span>
        <span>Total Price</span>
        <span>Actions</span>
    </div>

    <div class="cart-container">
   
    <?php if($cart->count() > 0): ?>
        <form id="cart-form" action="<?php echo e(url('checkout')); ?>" method="GET">

            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="cart_check">
                <div class="cart_owner">
                    <i class="fa-solid fa-shop"></i>
                    <a href="">Owner: <?php echo e($item->product->owner->shop_name ?? 'N/A'); ?></a>
                    <hr>
                </div>
                <div class="cart-item">
                    <?php
                        // Decode the JSON string in the 'image' column
                        $productImages = json_decode($item->product->image, true); // Decode as an associative array
                        $firstImage = !empty($productImages) ? $productImages[0] : 'default.png'; // Fallback to default image
                    ?>

                    <input type="checkbox" class="cart-item-checkbox" name="cart_items[]" value="<?php echo e($item->id); ?>" data-price="<?php echo e($item->price); ?>">
                    <img src="<?php echo e(asset('products/' . $firstImage)); ?>" alt="Product Image" class="product-img">
                    <div class="product-details">
                        <h4><?php echo e($item->product->title); ?></h4>
                        <p>Variation: <?php echo e($item->size); ?></p>
                    </div>
                    <div class="cart_details">
                        <div class="unit-price">
                            <span class="d_hide">Price: </span>₱<?php echo e(number_format($item->price / $item->quantity, 2)); ?>

                        </div>
                        <div class="quantity">
                            <span class="d_hide">QTY: </span><?php echo e($item->quantity); ?> pc's.
                        </div>
                        <div class="total-price">
                            <span class="d_hide">Total: </span>₱<?php echo e(number_format($item->price, 2)); ?>

                        </div>
                        <div class="actions">
                            <a href="<?php echo e(url('product_details/' . $item->product->id)); ?>"><i class="fa-regular fa-eye"></i></a>
                            <button type="button" class="remove-btn" data-id="<?php echo e($item->id); ?>">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="cart-footer">
            <div class="check">
            <label><input type="checkbox"> Select All</label>
            </div>
                <div class="total">
                    <p><span id="total-item">Total (0 item):</span> <span id="cart-total">₱0</span></p>
                    <button type="submit" disabled id="checkout-btn" class="checkout">Checkout</button>

                </div>
            </div>
        </form>

        <?php else: ?>
        <div class="empty_cart">
            <img src="<?php echo e(asset('images/cry.png')); ?>" alt="">
            <p>Your cart is empty.</p>
        </div>
        <?php endif; ?>

        <br><br>
        
    </div>


    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    $(document).ready(function() {
        let total = 0;
        let selectedCount = 0;

        // Function to update total amount and selected items count
        function updateTotalAndCount() {
            total = 0;
            selectedCount = 0;

            // Calculate total price and count of selected items
            $('.cart-item-checkbox:checked').each(function() {
                total += parseFloat($(this).data('price'));
                selectedCount++;
            });

            // Update total price and item count display
            $('#cart-total').text(`₱${total.toFixed(2)}`);
            $('#total-item').text(`Total (${selectedCount} item${selectedCount !== 1 ? 's' : ''}):`);

            // Enable/disable checkout button based on selection
            $('#checkout-btn').prop('disabled', selectedCount === 0);
        }

        // Handle individual checkbox change
        $('.cart-item-checkbox').change(function() {
            updateTotalAndCount();

            // Check/uncheck "Select All" based on whether all items are selected
            const allChecked = $('.cart-item-checkbox').length === $('.cart-item-checkbox:checked').length;
            $('.check input[type="checkbox"]').prop('checked', allChecked);
        });

        // Handle "Select All" checkbox functionality
        $('.check input[type="checkbox"]').change(function() {
            const isChecked = $(this).is(':checked');
            $('.cart-item-checkbox').prop('checked', isChecked); // Select/deselect all items
            updateTotalAndCount();
        });

        // Handle remove button click
        $('.remove-btn').click(function() {
            const itemId = $(this).data('id');

            if (confirm('Are you sure you want to remove this item?')) {
                $.ajax({
                    url: '/cart/remove/' + itemId,
                    type: 'DELETE',
                    data: { _token: '<?php echo e(csrf_token()); ?>' },
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>


</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\msosfinal\msos3\resources\views/home/mycart.blade.php ENDPATH**/ ?>