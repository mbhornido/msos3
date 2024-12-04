<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSOS | Shipping Dashboard</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/super.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <div class="msos-container">
        <?php echo $__env->make('superadmin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <main class="msos-main-content">
            <div class="msos-profile">
                <div class="msos-profile-content">
                    <img src="./images/COTLogo.png" alt="Logo">
                    <div>
                        <p>Alliance of Coders</p>
                        <p>Super</p>
                    </div>
                </div>
            </div>

            <div class="msos-all-content">
                <header class="msos-header">
                    <div class="msos-logo">Shipping Status</div>
                </header>

                

                <div class="msos-content">
                    <h3 class="msos-title">Shipping Fees</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Fee</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>₱<?php echo e(number_format($fee->general_fee, 2)); ?></td>
                                <td>
                                    <a 
                                        class="msos-update-btn" 
                                        href="<?php echo e(url('edit_fee', $fee->id)); ?>">
                                        <i class="fas fa-edit"></i> Update
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <br><br><br>
                <?php if(isset($editFee)): ?>
                <div class="msos-content">
                    <h3 class="msos-title">Update Shipping Fee</h3>
                    <form action="<?php echo e(url('update_fee', $editFee->id)); ?>" method="post" class="msos-form">
                        <?php echo csrf_field(); ?>
                        <div class="unique-form-group">
                            <input 
                                type="number" 
                                name="fee" 
                                value="<?php echo e($editFee->general_fee); ?>" 
                                placeholder="Enter updated fee price" 
                                class="unique-input-text">
                        </div>
                        <div class="unique-form-group">
                            <input 
                                type="submit" 
                                value="Update Fee" 
                                class="unique-submit-button">
                        </div>
                    </form>
                </div>
                <?php endif; ?>
            </div>
        </main>
    </div>

    <!-- JS Files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo e(asset('js/sweet.js')); ?>"></script>

    <script>
        document.querySelectorAll('.msos-dropdown-toggle').forEach(item => {
            item.addEventListener('click', () => {
                const dropdown = item.parentElement;
                dropdown.classList.toggle('active');
            });
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\msosfinal\msos3\resources\views/superadmin/fee.blade.php ENDPATH**/ ?>