<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/css_file.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>MSOS | Start Selling Now!</title>
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

        /* Instructions Section */
        .instructions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .instruction-card {
            background: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .instruction-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .instruction-card h3 {
            margin-bottom: 10px;
            font-size: 20px;
            color: #333;
        }

        .instruction-card p {
            font-size: 16px;
            color: #555;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero {
                margin-top: 10%;
                border-radius: 0;
            }

            .hero h1 {
                font-size: 28px;
            }

            .hero p {
                font-size: 16px;
            }

            .instruction-card h3 {
                font-size: 18px;
            }

            .instruction-card p {
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
            <h1>Start Selling on Our Platform</h1>
            <p>
                Follow these simple steps to set up your shop and start selling your products today. It's quick, easy, and hassle-free!
            </p>
        </div>

        <!-- Instructions Section -->
        <div class="instructions">
            <!-- Step 1 -->
            <div class="instruction-card">
                <h3>Step 1: Eligibility</h3>
                <p>
                    To participate, you must be a bona fide student of CTU Danao Campus and an active member of an organization.
                </p>
            </div>

            <!-- Step 2 -->
            <div class="instruction-card">
                <h3>Step 2: Register an Account</h3>
                <p>Create an account on our platform, then reach out to us through our official page for assistance and verification.
                    <a href="https://www.facebook.com/profile.php?id=100086240330686" style="color: blue"> Click here</a>
                </p>
            </div>

            <!-- Step 3 -->
            <div class="instruction-card">
                <h3>Step 3: Verification & Setup</h3>
                <p>Once your details are verified, we’ll guide you through setting up your shop and provide training on the shop's standards and regulations.</p>
            </div>

            <!-- Step 4 -->
            <div class="instruction-card">
                <h3>Step 4: Start Selling</h3>
                <p>You’re all set! Add your products, manage your orders, and begin earning.</p>
            </div>
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
            <a href="{{url('search-order')}}">
                <i class="fa-solid fa-earth-americas"></i>
                <p class="footer_p">Tracker</p>

            </a>
            <a href="{{url('user_page')}}" class="active">
                <i class="fa-solid fa-user"></i>
                <p class="footer_p">User</p>
            </a>
        </div>
    </footer>
</body>
</html>
