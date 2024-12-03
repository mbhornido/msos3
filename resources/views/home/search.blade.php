<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset ('css/css_file.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>MSOS | Search Order</title>
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
    <style>
  

        .search-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px 0;
            padding: 20px;
            background: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .search-form h1 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        .search-form form {
            width: 100%;
            max-width: 500px;
        }

        .search-form label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .search-form input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .search-form button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .search-form button:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            font-weight: bold;
            text-align: center;
            margin-top: 10px;
        }

        .order-info {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .order-info h2 {
            font-size: 22px;
            margin-bottom: 15px;
        }

        .order-info p {
            margin: 5px 0;
            line-height: 1.6;
        }

     

        .order-info ul li {
            list-style: none;
        }

        /* Responsive Design */
        @media (max-width: 768px) {

            body{
                background: white;
            }
           

            .search-form, .order-info {
                padding: 15px;
            }

            .search-form h1 {
                font-size: 20px;
            }

            .search-form button {
                font-size: 14px;
                padding: 8px;
            }

            .order-info{
                border-radius: 0;
                box-shadow: none;
                border: none
            }
            .order-info h2 {
                font-size: 18px;
            }

            .order-info p {
                font-size: 14px;
            }
        }

        
@media (max-width: 480px) {
    .search-form {
                margin-top: 15%;
            }

}
    </style>
</head>
<body>
    <div class="container">
        @include('includers.mobile_back_header')
        @include('includers.user_header')

        <!-- Search Form -->
        <div class="search-form">
            <h1>Search Order </h1>
            <form action="{{ url('search-order') }}" method="POST">
                @csrf
                <label for="order_id">Order ID:</label>
                <input type="text" id="order_id" name="order_id" placeholder="Enter Order ID" required>
                <button type="submit">Search</button>
            </form>
            <a href="{{url('faq')}}" class="help"> <i class="fa-solid fa-circle-question"></i> Help</a>
        </div>
 
        <!-- Display Error -->
        @if (session('error'))
            <p class="error-message">{{ session('error') }}</p>
        @endif

        <!-- Display Order Information -->
        @isset($order)
        <div class="order-info">
            <h2>Order Details</h2>
            <p><strong>Order ID:</strong> {{ $order->id }}</p>
            <p><strong>Status:</strong> {{ $order->status }}</p>
            <p><strong>Tracking Info:</strong></p>
            @php
                $trackHistory = json_decode($order->track, true) ?? [];
            @endphp
            <ul>
                @foreach ($trackHistory as $track)
                <li>{{ $track['change'] }} <br>⌛:({{ \Carbon\Carbon::parse($track['timestamp'])->format('d M Y, h:i A') }})</li>
                <hr>
                @endforeach
            </ul>
        </div>
        @endisset

        <div class="d_hide">
            <br><br><br>
        </div>
        <footer class="floating-footer">
            <div class="footer-links">
                <a href="{{url('dashboard')}}">
                    <i class="fa-solid fa-house"></i>
                    <p class="footer_p">Home</p>
                </a>
                <a href="{{url('seller_department')}}">
                    <i class="fa-solid fa-shop"></i>
                    <p class="footer_p" >Shops</p>
    
                </a>
                <a href="{{url('search-order')}}"  class="active">
                    <i class="fa-solid fa-earth-americas"></i>
                    <p class="footer_p">Tracker</p>
    
                </a>
                <a href="{{url('user_page')}}">
                    <i class="fa-solid fa-user"></i>
                    <p class="footer_p">User</p>
    
                </a>
            </div>
        </footer>
    </div>
</body>
</html>
