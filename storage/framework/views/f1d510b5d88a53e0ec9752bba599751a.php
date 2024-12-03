<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSOS | Seller Dashboard</title>
    <link rel="shortcut icon" href="<?php echo e(asset('images/download2.png')); ?>" type="image/svg+xml">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>
<body>
        <!-- user header -->
        <?php echo $__env->make('components.header_super', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <div class="container">
        <?php echo $__env->make('components.sidebar_super', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 

        <main class="seller-content">
            <h1>Welcome, super!</h1>
            <h3>Add section</h3>
                <br>
            <form action="<?php echo e(url('add_section')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div>
                    <input type="text" name="section" id="" placeholder="enter section">
                </div>
                <br>
                <div>
                    <input type="submit" value="Add section">
                </div> 
            </form>

            <br><br><br>
            <div>
                <table>
                    <tr>
                        <th>Section Name</th>
                        <th>Delete</th>
                    </tr>

                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($data->section_name); ?></td>

                        <td>
                            <a href="<?php echo e(url('delete_section',$data->id)); ?>"
                            onclick="confirmation(event)">Delete</a>
                        </td>
                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </main>
    </div>

    <!-- js files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo e(asset('js/sweet.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\msoshub1\resources\views/superadmin/section.blade.php ENDPATH**/ ?>