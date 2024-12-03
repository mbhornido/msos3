<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary by Product and Size</title>
    <link rel="stylesheet" href="{{ asset('css_admin/bootstrap.min.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h2>Order Summary by Product and Size</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Size</th>
                    <th>Total Quantity Ordered</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderSummary as $summary)
                    <tr>
                        <td>{{ $summary->title }}</td>
                        <td>{{ $summary->size ?? 'N/A' }}</td>
                        <td>{{ $summary->total_quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ url('/admin/orders') }}" class="btn btn-primary">Back to Orders</a>
    </div>
</body>
</html>
