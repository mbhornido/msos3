<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Summary</title>
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .chart-container {
            width: 80%;
            margin: 20px auto;
            text-align: center;
        }
        canvas {
            width: 100%;
            max-width: 700px;
            height: 400px;
            margin: 20px auto;
        }
        .heading {
            text-align: center;
            font-size: 24px;
            margin-top: 20px;
        }

        .order-card{
            display: flex;
        }
    </style>
</head>
<body>


<div class="summary">
    <h1>Total Orders Summary</h1>
    <p>Total Orders for Your Account: <strong>{{ $totalOrders }}</strong></p>
    <p>Total Revenue for Your Account: <strong>${{ number_format($totalRevenue, 2) }}</strong></p>
    <p>Total transaction fee to pay: <strong>${{ number_format($totalFee, 2) }}</strong></p>
    <p>New Sales: <strong>{{ $pendingOrders }}</strong></p>
    <p>To pay: <strong>{{ $topayOrders }}</strong></p>
    <p>To ship: <strong>{{ $toshipOrders }}</strong></p>
    <p>To receive: <strong>{{ $toreceiveOrders }}</strong></p>
    <p>To delivered: <strong>{{ $deliveredOrders }}</strong></p>


</div>

<br>
<div class="pending-orders">
    <h2>Last 4 Pending Orders</h2>
    @foreach($lastPendingOrders as $order)
        <div class="order-card">

            <img src="/products/{{ $order->product->image }}" alt="{{ $order->product->title }}" style="width: 100px;">
            <div class="order-details">
                <p><strong>Order ID:</strong> {{ $order->id }}</p>
                <p><strong>Product:</strong> {{ $order->product->title }}</p>
                <p><strong>Price:</strong> ${{ number_format($order->price, 2) }}</p>
            </div>
        </div>
    @endforeach
</div>



<div class="heading">Order Summary</div>

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

<!-- Chart.js Library -->
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
</body>
</html>
