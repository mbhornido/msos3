    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Admin Orders - Manage your orders">
        <title>Admin Orders</title>
        <link rel="shortcut icon" href="<?php echo e(asset('images/download2.png')); ?>" type="image/svg+xml">

        <!-- Stylesheets -->
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

        <!-- Include Admin Header -->
        <?php echo $__env->make('includes.admin_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="dash-widget">
                            <div class="dash-widgetimg">
                                <span><img src="<?php echo e(asset('img/icons/dash1.svg')); ?>" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5>💡 <span class="counters" data-count="<?php echo e($totalOrders); ?>"><?php echo e($totalOrders); ?></span></h5>
                                <h6>Total Orders</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="dash-widget dash1">
                            <div class="dash-widgetimg">
                                <span><img src="<?php echo e(asset('img/icons/dash2.svg')); ?>" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5>₱<span class="counters" data-count="<?php echo e($totalRevenue); ?>"><?php echo e(number_format($totalRevenue, 2)); ?>.00</span></h5>
                                <h6>Total Revenue</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="dash-widget dash2">
                            <div class="dash-widgetimg">
                                <span><img src="<?php echo e(asset('img/icons/dash3.svg')); ?>" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5>₱<span class="counters" data-count="<?php echo e($totalFee); ?>"><?php echo e(number_format($totalFee, 2)); ?></span></h5>
                                <h6>Transaction Fee</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="dash-widget dash3">
                            <div class="dash-widgetimg">
                                <span><img src="<?php echo e(asset('img/icons/dash4.svg')); ?>" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5>💡<span class="counters" data-count="<?php echo e($pendingOrders); ?>"><?php echo e($pendingOrders); ?></span></h5>
                                <h6>New Orders</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count">
                            <div class="dash-counts">
                                <h4><?php echo e($topayOrders); ?></h4>
                                <h5>To Pay</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="user"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das1">
                            <div class="dash-counts">
                                <h4><?php echo e($toshipOrders); ?></h4>
                                <h5>To Ship</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="user-check"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das2">
                            <div class="dash-counts">
                                <h4><?php echo e($toreceiveOrders); ?></h4>
                                <h5>To Receive</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="file-text"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das3">
                            <div class="dash-counts">
                                <h4><?php echo e($deliveredOrders); ?></h4>
                                <h5>Delivered</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="file"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    

                    <div class="col-lg-5 col-sm-12 col-12 d-flex" style="width: 100%;">
                        <div class="card flex-fill">
                            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-0">New Orders</h4>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" class="dropset">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a href="productlist.html" class="dropdown-item">Product List</a></li>
                                        <li><a href="addproduct.html" class="dropdown-item">Product Add</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive dataview">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Products</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $lastPendingOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($order->id); ?></td>
                                                <td class="productimgname">
                                                    <a href="<?php echo e(url('admin_orders')); ?>" class="product-img">
                                                        <?php
                                                        // Decode the JSON string in the 'image' column
                                                        $orderImages = json_decode($order->product->image, true); // Decode as an associative array
                                                        $firstOrderImage = !empty($orderImages) ? $orderImages[0] : 'default.png'; // Fallback to default image
                                                    ?>
                                                    <img src="/products/<?php echo e($firstOrderImage); ?>" alt="<?php echo e($order->product->title); ?>" style="width: 100px; height: 100px;">
                                                    
                                                    </a>
                                                    <a href="productlist.html"><?php echo e($order->product->title ?? 'N/A'); ?></a>
                                                </td>
                                                <td><?php echo e(number_format($order->price, 2)); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="heading">Order Summary</div>

            <div class="charters">
                

                <div class="chart-container">
                    <h3>Orders in Last 7 Days</h3>
                    <canvas id="chart7Days"></canvas>
                </div>

                <div class="chart-container">
                    <h3>Orders in Last 4 Weeks</h3>
                    <canvas id="chart4Weeks"></canvas>
                </div>

                <div class="chart-container">
                    <h3>Orders in Last 4 Months</h3>
                    <canvas id="chart4Months"></canvas>
                </div>
            </div>
        </div>


        
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data for charts (passed from controller)
    const dataLast7Days = <?php echo json_encode($ordersLast7Days->pluck('count'), 15, 512) ?>;
    const labelsLast7Days = <?php echo json_encode($ordersLast7Days->pluck('date'), 15, 512) ?>;

    const dataLast4Weeks = <?php echo json_encode($ordersLast4Weeks->pluck('count'), 15, 512) ?>;
    const labelsLast4Weeks = <?php echo json_encode($ordersLast4Weeks->pluck('week'), 15, 512) ?>;

    const dataLast4Months = <?php echo json_encode($ordersLast4Months->pluck('count'), 15, 512) ?>;
    const labelsLast4Months = <?php echo json_encode($ordersLast4Months->pluck('month'), 15, 512) ?>;

    // Chart Configuration
    const config7Days = {
        type: 'bar',
        data: {
            labels: labelsLast7Days,
            datasets: [{
                label: 'Orders',
                data: dataLast7Days,
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        }
    };

    const config4Weeks = {
        type: 'bar',
        data: {
            labels: labelsLast4Weeks,
            datasets: [{
                label: 'Orders',
                data: dataLast4Weeks,
                backgroundColor: 'rgba(153, 102, 255, 0.5)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        }
    };

    const config4Months = {
        type: 'bar',
        data: {
            labels: labelsLast4Months,
            datasets: [{
                label: 'Orders',
                data: dataLast4Months,
                backgroundColor: 'rgba(255, 159, 64, 0.5)',
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 1
            }]
        }
    };

    // Render Charts
    new Chart(document.getElementById('chart7Days'), config7Days);
    new Chart(document.getElementById('chart4Weeks'), config4Weeks);
    new Chart(document.getElementById('chart4Months'), config4Months);
</script>


        <!-- Scripts -->

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
<?php /**PATH C:\xampp\htdocs\msosfinal\msos3\resources\views/admin/summary.blade.php ENDPATH**/ ?>