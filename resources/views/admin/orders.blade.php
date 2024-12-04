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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <!-- Include Admin Header -->
    @include('includes.admin_header')

    <div class="page-wrapper">
        <div class="content">
            <!-- Page Header -->
            <div class="page-header">
                <div class="page-title">
                    <h4>Your Product Orders</h4>
                    <h6>Manage and update orders in bulk</h6>
                </div>
            </div>

            <!-- Search and Bulk Update Form -->
            <div class="cards">
                <div class="card-bodys">

                    <!-- Search Form -->
                    <form action="{{ url('order_search') }}" method="GET" class="mb-3">
                        <div class="input-group mb-2">
                            <select name="status" class="form-control select2">
                                <option value="">Filter by Status</option>
                                <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                @foreach($shippingOptions as $ship)
                                    <option value="{{ $ship->shipping_name }}" {{ request('status') == $ship->shipping_name ? 'selected' : '' }}>{{ $ship->shipping_name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary">Filter</button>

                        </div>
                        
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search via order ID,Product Name,Customer Name " value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>


                    <form action="{{ url('bulk_update_order_status') }}" method="POST">
                        @csrf
                        
                        <!-- Bulk Update Options -->
                        <div class="bulk-update-options mb-3">
                            <label for="bulk-status">Update Status: </label>
                            <select name="bulk_status" id="bulk-status" class="form-control select2">
                                <option value="Pending">Pending</option>
                                @foreach($shippingOptions as $ship)
                                    <option value="{{ $ship->shipping_name }}">{{ $ship->shipping_name }}</option>
                                @endforeach
                            </select>

                            <label for="bulk-track">Update Track: </label>
                            <select name="bulk_track" id="bulk-track" class="form-control select2">
                                <option value="Order is placed">Order is placed</option>

                                @foreach($paymentOptions as $payment)
                                    <option value="{{ $payment->payment_name }}">{{ $payment->payment_name }}</option>
                                @endforeach
                            </select>

                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{url('orders_delete')}}" class="btn btn-danger mb-3"><i class="fa-solid fa-repeat"></i> <i class="fa-solid fa-trash"></i></a>


                        </div>


                        <!-- Orders Table -->
                        <div class="table-responsives">
                            <table class="table cart-table datanews">
                                <thead>
                                    <tr>
                                        <th>Select</th>
                                        <th>Order ID</th>
                                        <th>Customer Name</th>
                                        <th>Product</th>
                                        <th>Status</th>
                                        <th>Track Order</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td><input type="checkbox" name="order_ids[]" value="{{ $order->id }}"></td>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->name }}<br>{{ $order->rec_address }}
                                            <br>{{ $order->created_at->format('d M Y, h:i A') }}
                                        </td>
                                        <td>
                                            @php
                                                // Decode the JSON string in the 'image' column
                                                $orderImages = json_decode($order->product->image, true); // Decode as an associative array
                                                $firstOrderImage = !empty($orderImages) ? $orderImages[0] : 'default.png'; // Fallback to default image
                                            @endphp
                                            <img src="/products/{{ $firstOrderImage }}" alt="{{ $order->product->title }}" style="width: 100px;">
                                            <p>{{ $order->product->title }}</p>
                                        </td>
                                        <td>{{ $order->status }}</td>
                                        <td>
                                            @php
                                                $trackHistory = json_decode($order->track, true) ?? [];
                                            @endphp

                                            <ul> 
                                                @foreach ($trackHistory as $track)
                                                <li>{{ $track['change'] }} ({{ \Carbon\Carbon::parse($track['timestamp'])->format('d M Y, h:i A') }})</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                                                                <td>
                                            <button type="button" class="more" onclick="openOrderModal({{ $order->id }})">
                                                <img src="{{ asset('/img/icons/eye1.svg') }}" class="me-2" alt="View Order">
                                            </button>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <!-- Pagination Links -->
                        <div class="pagination-wrapper">
                            {{ $orders->appends(request()->input())->links() }}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Unique Modals for each order (placed outside table) -->
    @foreach($orders as $order)
    <div id="orderModal_{{ $order->id }}" class="order-modal">
        <div class="order-modal-content">
            <span class="order-close-btn" onclick="closeOrderModal({{ $order->id }})">&times;</span>
            <h4>Order Details</h4>
            <table class="modal-table">
                <tr><th>Quantity</th><td>{{ $order->quantity }}</td></tr>
                <tr><th>Size</th><td>{{ $order->size }}</td></tr>
                <tr><th>Price</th><td>₱{{ number_format($order->product->price, 2) }}</td></tr>
                <tr><th>Transaction Fee</th><td>₱{{ $order->total_fee }}</td></tr>
                <tr><th>Total</th><td>₱{{ number_format($order->price, 2) }}</td></tr>
            </table>
        </div>
    </div>
    @endforeach
 
    <!-- Scripts -->
    <script src="{{ asset('js_admin/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js_admin/feather.min.js') }}"></script>
    <script src="{{ asset('js_admin/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js_admin/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert/sweetalerts.min.js') }}"></script>
    <script src="{{ asset('js_admin/script.js') }}"></script>

    <!-- Optional JS for Modal Toggle -->
    <script>
        function openOrderModal(id) {
            document.getElementById("orderModal_" + id).style.display = "block";
        }

        function closeOrderModal(id) {
            document.getElementById("orderModal_" + id).style.display = "none";
        }
    </script>
</body>
</html>
