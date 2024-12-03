    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Admin Orders - Manage your orders">
        <title>Admin Orders</title>
        <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="{{ asset('css_admin/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css_admin/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css_admin/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css_admin/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css_admin/new.css') }}">

        
    </head>
    <body>

        <!-- Include Admin Header -->
        @include('includes.admin_header')

        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="dash-widget">
                            <div class="dash-widgetimg">
                                <span><img src="{{asset('img/icons/dash1.svg')}}" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5>💡 <span class="counters" data-count="{{ $totalOrders }}">{{ $totalOrders }}</span></h5>
                                <h6>Total Orders</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="dash-widget dash1">
                            <div class="dash-widgetimg">
                                <span><img src="{{asset('img/icons/dash2.svg')}}" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5>₱<span class="counters" data-count="{{ $totalRevenue }}">{{ number_format($totalRevenue, 2) }}.00</span></h5>
                                <h6>Total Revenue</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="dash-widget dash2">
                            <div class="dash-widgetimg">
                                <span><img src="{{asset('img/icons/dash3.svg')}}" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5>₱<span class="counters" data-count="{{ $totalFee }}">{{ number_format($totalFee, 2) }}</span></h5>
                                <h6>Transaction Fee</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="dash-widget dash3">
                            <div class="dash-widgetimg">
                                <span><img src="{{asset('img/icons/dash4.svg')}}" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5>💡<span class="counters" data-count="{{ $pendingOrders }}">{{ $pendingOrders }}</span></h5>
                                <h6>New Orders</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count">
                            <div class="dash-counts">
                                <h4>{{ $topayOrders }}</h4>
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
                                <h4>{{ $toshipOrders }}</h4>
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
                                <h4>{{ $toreceiveOrders }}</h4>
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
                                <h4>{{ $deliveredOrders }}</h4>
                                <h5>Delivered</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="file"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-7 col-sm-12 col-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Purchase & Sales</h5>
                                <div class="graph-sets">
                                    <ul>
                                        <li><span>Sales</span></li>
                                        <li><span>Purchase</span></li>
                                    </ul>
                                    <div class="dropdown">
                                        <button class="btn btn-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            2022 <img src="assets/img/icons/dropdown.svg" alt="img" class="ms-2">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a href="javascript:void(0);" class="dropdown-item">2022</a></li>
                                            <li><a href="javascript:void(0);" class="dropdown-item">2021</a></li>
                                            <li><a href="javascript:void(0);" class="dropdown-item">2020</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="sales_charts"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-sm-12 col-12 d-flex">
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
                                        @foreach ($lastPendingOrders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td class="productimgname">
                                                    <a href="{{url('admin_orders')}}" class="product-img">
                                                        <img src="/products/{{ $order->product->image }}" alt="product">
                                                    </a>
                                                    <a href="productlist.html">{{ $order->product->title ?? 'N/A' }}</a>
                                                </td>
                                                <td>{{ number_format($order->price, 2) }}</td>
                                            </tr>
                                        @endforeach
                                                        
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
    const dataLast7Days = @json($ordersLast7Days->pluck('count'));
    const labelsLast7Days = @json($ordersLast7Days->pluck('date'));

    const dataLast4Weeks = @json($ordersLast4Weeks->pluck('count'));
    const labelsLast4Weeks = @json($ordersLast4Weeks->pluck('week'));

    const dataLast4Months = @json($ordersLast4Months->pluck('count'));
    const labelsLast4Months = @json($ordersLast4Months->pluck('month'));

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

        <script src="{{ asset('js_admin/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js_admin/feather.min.js') }}"></script>
        <script src="{{ asset('js_admin/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('js_admin/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js_admin/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('js_admin/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('plugins/sweetalert/sweetalerts.min.js') }}"></script>
        <script src="{{ asset('js_admin/script.js') }}"></script>
    </body>
    </html>
