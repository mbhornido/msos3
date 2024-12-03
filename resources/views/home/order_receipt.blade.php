<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSOS | Order Receipt</title>
    <link rel="shortcut icon" href="{{ asset('images/download2.png') }}" type="image/svg+xml">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f9;
            color: #333;
        }
        .receipt-container {
            max-width: 700px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .receipt-header {
            text-align: center;
            border-bottom: 2px solid #007bff;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .receipt-header h1 {
            margin: 0;
            font-size: 24px;
            color: #007bff;
        }
        .receipt-header p {
            font-size: 16px;
            color: #555;
        }
        .receipt-section {
            margin-bottom: 20px;
        }
        .receipt-section p {
            margin: 8px 0;
            font-size: 16px;
            line-height: 1.6;
        }
        .receipt-section p strong {
            color: #555;
        }
        .product-image {
            display: block;
            margin: 15px auto;
            max-width: 100%;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .receipt-footer {
            text-align: center;
            padding-top: 15px;
            border-top: 2px solid #eee;
        }
        .receipt-footer button {
            padding: 10px 20px;
            font-size: 16px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .receipt-footer button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <!-- Header Section -->
        <div class="receipt-header">
            <h1>Order Receipt</h1>
            <p><strong>Order ID:</strong> {{ htmlspecialchars($order->id) }}</p>
        </div>

        <!-- Order Details -->
        <div class="receipt-section">
            <p><strong>Shop:</strong> {{ htmlspecialchars($order->product->owner->shop_name ?? 'N/A') }}</p>
            <p><strong>Name:</strong> {{ htmlspecialchars($order->name) }}</p>
            <p><strong>ID:</strong> {{ htmlspecialchars($order->phone) }}</p>
            <p><strong>Address:</strong> {{ htmlspecialchars($order->rec_address) }}</p>

            @php
                $productImages = json_decode($order->product->image, true) ?? [];
                $firstImage = !empty($productImages) ? basename($productImages[0]) : 'default.png';
            @endphp
            <img src="{{ asset('products/' . $firstImage) }}" alt="{{ htmlspecialchars($order->product->title) }}" class="product-image">

            <p><strong>Quantity:</strong> {{ htmlspecialchars($order->quantity) }}</p>
            <p><strong>Size:</strong> {{ htmlspecialchars($order->size) }}</p>
            <p><strong>Price:</strong> ₱{{ number_format($order->product->price, 2) }}</p>
            <p><strong>Total Fee:</strong> ₱{{ number_format($order->total_fee, 2) }}</p>
            <p><strong>Total Payable:</strong> 
                ₱{{ number_format($order->quantity * $order->product->price + $order->total_fee, 2) }}
            </p>
        </div>

        <!-- Footer Section -->
        <div class="receipt-footer">
            <button id="download-btn">Download as Image</button>
        </div>
    </div>

    <!-- Script for Download Functionality -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        document.getElementById('download-btn').addEventListener('click', () => {
            const downloadButton = document.getElementById('download-btn');
            downloadButton.style.display = 'none';

            html2canvas(document.querySelector('.receipt-container')).then(canvas => {
                const link = document.createElement('a');
                link.download = 'order_receipt.png';
                link.href = canvas.toDataURL();
                link.click();

                downloadButton.style.display = 'block';
            });
        });
    </script>
    
</body>
</html>
