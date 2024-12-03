<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSOS | SHOP</title>
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>


    <div class="center_container">
        <h1>Your Orders</h1>

     
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Order Id</th>
                    <th>Owner</th>
                    <th>Delivery Details</th>
                    <th>Product</th>
                    <th>Quantity</th> 
                    <th>Size</th>
                    <th>Price</th>
                    <th>Transaction fee</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Track Order</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $orders)
                <tr>
                    <td>{{ $orders->id }}</td>

                    <td>{{ $orders->product->owner->shop_name ?? 'N/A' }}</td>

                    <td>
                        <p>Name: {{ $orders->name }}</p>
                        <p>Section:   {{ $orders->rec_address }}</p>

                    </td>
                    <td>
                        <img src="/products/{{ $orders->product->image }}" alt="{{ $orders->product->title }}" style="width:100px;">
                        <p>{{ $orders->product->title }}</p>
                    </td>
                    <td>
                        
                        <p>{{ $orders->quantity }}</p>
                    </td>
                    <td>
                        
                        <p>{{ $orders->size }}</p>
                    </td>

                    <td>
                        
                        <p>{{ $orders->product->price }}</p>
                    </td>

                    <td>
                        
                        <p>{{ $orders->total_fee }}</p>
                    </td>

                    <td>
                        
                        <p>{{ $orders->price }}</p>
                    </td>
                    <td>
                        
                        <p>{{ $orders->status }}</p>
                    </td>
                    <td>
                        
                        <p>{{ $orders->track }}</p>
                    </td>



                </tr>
                @endforeach
            </tbody>

 
    </div>
</body>
</html>
