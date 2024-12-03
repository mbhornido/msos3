    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/css_file.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>MSOS | Order tracking</title>
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
    <style>
        /* Hero Section */
        .hero {
            text-align: center;
            background: linear-gradient(105deg, #6a11cb, #2575fc);
            color: white;
            padding: 60px 20px;
            border-radius: 8px;
            margin-bottom: 40px; 
        }

        .hero h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 18px;
            line-height: 1.6;
        }

        /* Tracking Section */
        .tracking {
            background: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            margin: 0 auto;
            max-width: 800px;
        }

        .tracking h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .tracking p {
            font-size: 16px;
            color: #555;
        }

        .tracking ul {
            list-style: none;
            padding: 0;
        }

        .tracking li {
            font-size: 16px;
            color: #333;
            padding: 10px 0;
            border-bottom: 1px solid #eaeaea;
        }

        .tracking li:last-child {
            border-bottom: none;
        }

        .hero .track_id{
            font-size: 2rem;
            text-shadow: 0px 0px 5px black;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body{
                background: white;
            }
            .hero {
                margin-top: 2rem;
                border-radius: 0;
            }
            .hero h1 {
                font-size: 28px;
            }

            .hero p {
                font-size: 16px;
            }

            .tracking h2 {
                font-size: 20px;
            }

            .tracking {
                box-shadow: none;
            }
            .tracking li {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        @include('includers.mobile_back_header')
        @include('includers.user_header')

        <!-- Hero Section -->
        <div class="hero">
            <h1>Track Your Order</h1>
            <p>Stay updated with the latest status of your order. Below is the complete history of changes.</p>
            <br>
            <p class="track_id">Order ID: {{ $order->id }}</p>
        </div>

        <!-- Tracking Section -->
        <div class="tracking">
            <h2>Order Tracking Details</h2>
            @php
                $trackHistory = json_decode($order->track, true) ?? [];
            @endphp

            @if (!empty($trackHistory))
                <p><strong>Tracking History:</strong></p>
                <ul>
                    @foreach ($trackHistory as $track)
                        <li>{{ $track['change'] }} <br>⌛:({{ \Carbon\Carbon::parse($track['timestamp'])->format('d M Y, h:i A') }})</li>

                    @endforeach
                </ul>
            @else
                <p><strong>Tracking History:</strong></p>
                <p style="color: #888;">🚫 The seller hasn't updated the tracking information for your order yet. Please check back later.</p>
            @endif
        </div>
    </div>

    <div class="d_hide">
        <br><br><br>
    </div>
    <footer class="floating-footer">
        <div class="footer-links">
            <a href="{{url('dashboard')}}" >
                <i class="fa-solid fa-house"></i>
                <p class="footer_p">Home</p>
            </a>
            <a href="{{url('seller_department')}}">
                <i class="fa-solid fa-shop"></i>
                <p class="footer_p">Shops</p>
            </a>
            <a href="{{url('search-order')}}" class="active">
                <i class="fa-solid fa-earth-americas"></i>
                <p class="footer_p">Tracker</p>

            </a>
            <a href="{{url('user_page')}}" >
                <i class="fa-solid fa-user"></i>
                <p class="footer_p">User</p>
            </a>
        </div>
    </footer>
</body>
</html>
