<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSOS | Department Dashboard</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/super.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
                    <div class="msos-logo">Department List</div>
                </header>

                <div class="msos-content">
                    <form action="<?php echo e(url('add_department')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="unique-form-group">
                            <input 
                                type="text" 
                                name="department" 
                                placeholder="Enter department status" 
                                class="unique-input-text">
                        </div>
                        <br>
                        <div class="unique-form-group">
                            <label for="department_image">Upload Image:</label>
                            <input 
                                type="file" 
                                name="department_image" 
                                id="department_image" 
                                accept="image/*" 
                                class="unique-file-input">
                        </div>
                        <br>
                        <div class="unique-form-group">
                            <input 
                                type="submit" 
                                value="Add Department" 
                                class="unique-submit-button">
                        </div>
                    </form>
                </div>

                <br>
                <div class="msos-content">
                    <table>
                        <thead>
                            <tr>
                                <th>Department Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($data->department_name); ?></td>
                                <td>
                                    <?php if($data->department_image): ?>
                                        <img 
                                            src="<?php echo e(asset($data->department_image)); ?>" 
                                            alt="Department Image" 
                                            width="100" 
                                            class="msos-image-preview">
                                    <?php else: ?>
                                        <span class="msos-no-image">No Image</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a 
                                        class="msos-delete-btn" 
                                        href="<?php echo e(url('delete_department', $data->id)); ?>"
                                        onclick="confirmation(event)">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
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
<?php /**PATH C:\xampp\htdocs\msosfinal\msos3\resources\views/superadmin/department.blade.php ENDPATH**/ ?>