<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSOS | Checkout Page</title>
    <link rel="shortcut icon" href="<?php echo e(asset('images/download2.png')); ?>" type="image/svg+xml">
    
  <link rel="stylesheet" href="<?php echo e(asset ('css/css_file.css')); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
    <style>


        .checkout-container {
            max-width: 1400px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .section {
            margin-bottom: 20px;
        }

        .section h3 {
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: bold;
        }

        .delivery-address, .payment-method, .order-summary {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #f9f9f9;
        }

        .delivery-address p, .order-summary p {
            margin: 5px 0;
        }

        .table-container {
            max-height: 300px; /* Adjust height as needed */
            overflow: auto;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #f9f9f9;
        }

        .order-table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-table th, .order-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .order-table th {
            background: #f1f1f1;
            font-weight: bold;
        }

        .payment-options {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .payment-option {
            
            padding: 10px 40px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
        }

        .payment-option.active {
            background-color: #007aff;
            color: #fff;
            border-color: #007aff;
        }

        .order-summary {
            text-align: left;
        }

        .order-summary p {
            font-size: 16px;
        }

        .order-summary p.total {
            font-size: 18px;
            font-weight: bold;
        }

        .place-order-btn {
            display: block;
            width: 100%;
            padding: 15px;
            background: #007aff;
            color: #fff;
            text-align: center;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            margin-top: 20px;
        }

        .place-order-btn:hover {
            background: #007aff;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body{
                background: white;
            }

            .payment-options {
                flex-direction: column;
            }

            .delivery-address{
                margin-top: 10%;
            }

            .checkout-container {
                
                border-radius: 0px;
                box-shadow: none;
            }
        }
    </style>
</head><body> 
    <div class="container">
    
    <?php echo $__env->make('includers.mobile_back_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('includers.user_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
        <div class="checkout-container">
    
            <!-- Delivery Address Section -->
            <div class="section delivery-address" id="deliveryAddressSection">
                <h3>Delivery Address</h3>
                <p><strong>Name:</strong> <span id="userName"><?php echo e(Auth::user()->name); ?></span></p>
                <p><strong>ID#:</strong> <span id="userPhone"><?php echo e(Auth::user()->phone); ?></span></p>
                <p><strong>Address:</strong> <span id="userAddress"><?php echo e(Auth::user()->address); ?></span></p>
                <a href="<?php echo e(url('profile_edit')); ?>" class="place-order-btn">Update Profile</a>
            </div>
    
            <!-- Products Ordered Section -->
            <div class="section">
                <h3>Products Ordered</h3>
                <div class="table-container">
                    <table class="order-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Variation</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Fee & Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item->product->title); ?></td>
                                <td><?php echo e($item->size); ?></td>
                                <td>₱<?php echo e(number_format($item->price / $item->quantity, 2)); ?></td>
                                <td><?php echo e($item->quantity); ?> pcs.</td>
                                <td>₱ FREE
                                    
                                    + 
                                    ₱<?php echo e(number_format($item->price, 2)); ?>

                                    = 
                                    ₱<?php echo e(number_format($item->price + ($item->quantity * $general_fee), 2)); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
    
            <form id="orderForm" action="<?php echo e(url('placeOrder')); ?>" method="POST">
            <?php echo csrf_field(); ?>
    
            <!-- Payment Method Section -->
            <div class="section payment-method">
                <h3>Payment Method</h3>
                <div class="payment-options">
                    <div class="payment-option active">
                        <label>
                            <input type="radio" name="payment_method" value="Pay on Counter" required> Pay on Counter
                        </label>
                    </div>
                </div>
            </div>
    
            <!-- Order Summary Section -->
            <div class="section order-summary">
                <p><strong>Merchandise Subtotal:</strong> ₱<?php echo e(number_format($merchandise_subtotal, 2)); ?></p>
                <p><strong>Transaction Fee Subtotal:</strong> ₱<?php echo e(number_format($transaction_fee, 2)); ?></p>
                <p class="total"><strong>Total Payment:</strong> ₱<?php echo e(number_format($merchandise_subtotal + $transaction_fee, 2)); ?></p>
            </div>
    
            <!-- Hidden Cart Items -->
            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="hidden" name="cart_items[]" value="<?php echo e($item->id); ?>">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
            <!-- Place Order Button -->
            <button type="button" id="placeOrderBtn" class="place-order-btn">Place Order</button>
            </form>
        </div>
    
    </div>
    
  
    
   
    </body>
    

    <div class="d_hide">
        <br><br>
    </div>
    <footer class="floating-footer">
        <div class="footer-links">
            <a href="<?php echo e(url('dashboard')); ?>" >
                <i class="fa-solid fa-house"></i>
                <p class="footer_p">Home</p>
            </a>
            <a href="<?php echo e(url('seller_department')); ?>">
                <i class="fa-solid fa-shop"></i>
                <p class="footer_p" >Shops</p>

            </a>
            <a href="<?php echo e(url('search-order')); ?>">
                <i class="fa-solid fa-earth-americas"></i>
                <p class="footer_p">Tracker</p>

            </a>
            <a href="<?php echo e(url('user_page')); ?>"  >
                <i class="fa-solid fa-user"></i>
                <p class="footer_p">User</p>

            </a>
        </div>
    </footer>
    <script src="<?php echo e(asset('js/sweet.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('placeOrderBtn').addEventListener('click', function() {
            const userName = document.getElementById('userName').textContent.trim();
            const userPhone = document.getElementById('userPhone').textContent.trim();
            const userAddress = document.getElementById('userAddress').textContent.trim();
    
            if (!userName || !userPhone || !userAddress) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Incomplete Delivery Address',
                    text: 'Please complete your delivery address before placing the order.',
                    confirmButtonText: 'OK'
                });
            } else {
                document.getElementById('orderForm').submit();
            }
        });
    </script>
    
</body>
</html>
<?php /**PATH C:\xampp\htdocs\msosfinal\msos3\resources\views/home/checkout.blade.php ENDPATH**/ ?>