<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Orders</title>
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>

  <!-- user header -->
  @include('components.header_seller')
  <div class="container">
  @include('components.sidebar_seller')
    <div class="center_container">
        <h1>Your Product Orders</h1>

        <!-- Bulk update form -->
        <form action="{{ url('bulk_update_order_status') }}" method="POST">
            @csrf

            <!-- Status and Track dropdowns at the top -->
            <div class="bulk-update-options">
                <label for="bulk-status">Update Status: </label>
                <select name="bulk_status" id="bulk-status">
                    @foreach($shippingOptions as $ship)
                        <option value="{{ $ship->shipping_name }}">{{ $ship->shipping_name }}</option>
                    @endforeach
                </select>

                <label for="bulk-track">Update Track: </label>
                <select name="bulk_track" id="bulk-track">
                    @foreach($paymentOptions as $payment)
                        <option value="{{ $payment->payment_name }}">{{ $payment->payment_name }}</option>
                    @endforeach
                </select>

                <button type="submit" class="btn btn-primary">Update Selected Orders</button>
            </div>

            <br><br><br><br>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Transaction Fee</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Track Order</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td><input type="checkbox" name="order_ids[]" value="{{ $order->id }}"></td>
                        <td>{{ $order->id }}</td>
                        <td>
                            <p>{{ $order->name }}</p>
                            <p>{{ $order->rec_address }}</p>
                        </td>
                        <td>
                            <img src="/products/{{ $order->product->image }}" alt="{{ $order->product->title }}" style="width:100px;">
                            <p>{{ $order->product->title }}</p>
                        </td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->size }}</td>
                        <td>₱{{ number_format($order->product->price, 2) }}</td>
                        <td>₱{{ number_format($order->transaction_fee, 2) }}</td>
                        <td>₱{{ number_format($order->price, 2) }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->track }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>
</div>
</body>
</html>
