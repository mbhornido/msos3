<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Orders - To Pay">
    <title>Orders - To Pay</title>

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
            <!-- Page Header -->
            <div class="page-header">
                <div class="page-title">
                    <h4>Orders with Status: "To Pay"</h4>
                </div>

                <div class="mb-3">
                    <a href="{{ route('orders.toPay.pdf') }}" class="btn btn-primary">Download PDF</a>
                </div>
                
            </div>

            <!-- Orders Table -->
            <div class="table-responsives">
                <table class="table cart-table datanews">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Product</th> 
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->name }}<br>{{ $order->rec_address }}</td>
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
                                <button type="button" class="more" onclick="openOrderModal({{ $order->id }})"><img src="{{ asset('/img/icons/eye1.svg') }}" class="me-2" alt="img"></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            <div class="pagination-wrapper">
                {{ $orders->links() }}
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
