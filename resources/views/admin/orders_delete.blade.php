<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Orders - Manage your orders">
    <title>Admin Orders</title>
    <link rel="shortcut icon" href="{{ asset('images/download2.png') }}" type="image/svg+xml">

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
            <!-- Page Header -->
            <div class="page-header">
                <div class="page-title">
                    <h4>Your Product Orders</h4>
                    <h6>Manage and delete orders in bulk</h6>
                </div>
            </div>

            <!-- Search Form -->
            {{-- <form action="{{ url('order_search') }}" method="GET" class="mb-3">
                <div class="input-group mb-2">
                    <select name="status" class="form-control select2">
                        <option value="">Filter by Status</option>
                        <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                        @foreach($shippingOptions as $ship)
                            <option value="{{ $ship->shipping_name }}" {{ request('status') == $ship->shipping_name ? 'selected' : '' }}>
                                {{ $ship->shipping_name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>

                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search via order ID, Product Name, Customer Name" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form> --}}

            <!-- Bulk Delete Form -->
            <form action="{{ route('bulk_delete_orders') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete the selected orders?');">
                @csrf
                @method('DELETE')

                <!-- Bulk Delete Button -->
                <button type="submit" class="btn btn-danger mb-3">Delete Selected Orders</button>

                <!-- Orders Table -->
                <div class="table-responsive">
                    <table class="table cart-table datanews">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all"></th>
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
                                        $orderImages = json_decode($order->product->image, true) ?? ['default.png'];
                                        $firstOrderImage = $orderImages[0];
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
                                    <form action="{{ route('delete_order', $order->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this order?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Links -->
                <div class="pagination-wrapper">
                    {{ $orders->appends(request()->input())->links() }}
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js_admin/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js_admin/feather.min.js') }}"></script>
    <script src="{{ asset('js_admin/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js_admin/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert/sweetalerts.min.js') }}"></script>
    <script src="{{ asset('js_admin/script.js') }}"></script>

    <!-- Select All Checkboxes -->
    <script>
        document.getElementById('select-all').addEventListener('change', function () {
            const checkboxes = document.querySelectorAll('input[name="order_ids[]"]');
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });
    </script>
</body>
</html>
