<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

<div class="container">
    <h4>Filter Orders</h4>
    <form action="{{ url('filter_orders') }}" method="GET">
        <div class="form-group">
            <label for="status">Order Status</label>
            <select name="status" class="form-control">
                <option value="">--Select Status--</option>
                <option value="Pending">Pending</option>
                <option value="Shipped">Shipped</option>
                <option value="Delivered">Delivered</option>
                <!-- Add more statuses if needed -->
            </select>
        </div>

        <div class="form-group">
            <label for="rec_address">Recipient Address</label>
            <input type="text" name="rec_address" class="form-control" placeholder="Enter recipient address">
        </div>

        <button type="submit" class="btn btn-primary">Filter Orders</button>
    </form>

    <!-- Export Button -->
    <form action="{{ url('export_orders_pdf') }}" method="GET" class="mt-3">
        <input type="hidden" name="status" value="{{ request('status') }}">
        <input type="hidden" name="rec_address" value="{{ request('rec_address') }}">
        <button type="submit" class="btn btn-success">Download as PDF</button>
    </form>

    <!-- Display Filtered Orders -->
    @if($orders->isNotEmpty())
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Recipient Address</th>
                    <th>Status</th>
                    <th>Ordered Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->rec_address }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        {{ $orders->links() }}
    @else
        <p>No orders found.</p>
    @endif
</div>


</body>
</html>