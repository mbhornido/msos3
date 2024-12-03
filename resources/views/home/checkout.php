<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSOS | Checkout</title>
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        h1, h3 {
            margin: 0 0 10px;
            font-weight: bold;
        }

        .checkout-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .checkout-container h1 {
            text-align: center;
            color: #333;
        }

        /* User Info Section */
        .user-info {
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #f9f9f9;
        }

        .user-info p {
            margin: 5px 0;
        }

        /* Cart Table */
        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .cart-table th, .cart-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .cart-table th {
            background: #f1f1f1;
            font-weight: bold;
        }

        /* Payment Section */
        form {
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin: 10px 0;
        }

        button {
            display: inline-block;
            background: #28a745;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #218838;
        }

        /* Payment Summary */
        .pay {
            text-align: center;
            margin-top: 20px;
        }

        .pay h1 {
            margin: 5px 0;
        }

        .pay hr {
            margin: 20px 0;
            border: 1px solid #ddd;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .cart-table th, .cart-table td {
                padding: 8px;
            }

            .checkout-container {
                padding: 15px;
            }

            button {
                width: 100%;
                padding: 12px;
                font-size: 18px;
            }
        }

        @media (max-width: 576px) {
            .cart-table, .cart-table thead, .cart-table tbody, .cart-table th, .cart-table td, .cart-table tr {
                display: block;
            }

            .cart-table tr {
                margin-bottom: 15px;
            }

            .cart-table td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            .cart-table td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                text-align: left;
                font-weight: bold;
            }

            .user-info {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="checkout-container">
        <h1>Checkout</h1>

        <!-- User Info Section -->
        <div class="user-info">
            <h3>Shipping Information</h3>
            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Phone:</strong> {{ Auth::user()->phone }}</p>
            <p><strong>Address:</strong> {{ Auth::user()->address }}</p>
        </div>

        <!-- Cart Items -->
        <table class="cart-table">
            <thead> 
                <tr>
                    <th>Owner</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Transaction Fee</th>
                    <th>Total Fee</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                <tr>
                    <td data-label="Owner">Owner: {{ $item->product->owner->shop_name ?? 'N/A' }}</td>
                    <td data-label="Product">{{ $item->product->title }}</td>
                    <td data-label="Quantity">{{ $item->quantity }}</td>
                    <td data-label="Size">{{ $item->size }}</td>
                    <td data-label="Price">₱{{ number_format($item->price / $item->quantity, 2) }}</td>
                    <td data-label="Transaction Fee">₱{{ number_format($general_fee, 2) }}</td>
                    <td data-label="Total Fee">₱{{ number_format($item->quantity * $general_fee, 2) }}</td>
                    <td data-label="Total">₱{{ number_format($item->price + ($item->quantity * $general_fee), 2) }}</td>                 
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Payment Form -->
        <form action="{{ url('placeOrder') }}" method="POST">
            @csrf
            <h3>Select Payment Method:</h3>
            <label>
                <input type="radio" name="payment_method" value="Cash on Delivery" required> Cash on Delivery
            </label>
            <label>
                <input type="radio" name="payment_method" value="Gcash" required> Pay Via Counter
            </label>
            <br><br>
            @foreach($cart as $item)
                <input type="hidden" name="cart_items[]" value="{{ $item->id }}">
            @endforeach
            <button type="submit">Place Order</button>
        </form>

        <!-- Payment Summary -->
        <div class="pay">
            <h1>Merchandise Subtotal: ₱{{ number_format($merchandise_subtotal, 2) }}</h1>
            <h1>Transaction Fee: ₱{{ number_format($transaction_fee, 2) }}</h1>
            <hr>
            <h1>Total Payment: ₱{{ number_format($merchandise_subtotal + $transaction_fee, 2) }}</h1>
        </div>
    </div>
</body>
</html>
