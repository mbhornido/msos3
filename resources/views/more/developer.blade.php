<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/css_file.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>MSOS | Dev Page</title>
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
    <style>
 
        /* Hero Section */
        .hero {
            text-align: center;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
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

        /* Developers Section */
        .developers {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .developer-card {
            background: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .developer-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .developer-card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            object-position: center;
        }

        .developer-info {
            padding: 20px;
            text-align: center;
        }

        .developer-info h3 {
            margin: 10px 0;
            font-size: 20px;
            color: #333;
        }

        .developer-info p {
            font-size: 14px;
            color: #555;
            margin-bottom: 20px;
        }

        .social-links a {
            color: #007BFF;
            font-size: 20px;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        .social-links a:hover {
            color: #0056b3;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero{
                margin-top: 10%;
                border-radius: 0;
            }
            .hero h1 {
                font-size: 28px;
            }

            .hero p {
                font-size: 16px;
            }

            .developer-info h3 {
                font-size: 18px;
            }

            .developer-info p {
                font-size: 13px;
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
            <h1>Meet Our Developers</h1>
            <p>
                Our talented team of developers is dedicated to crafting cutting-edge solutions. 
                Each member brings unique skills and passion to the table, working together to turn ideas into reality.
            </p>
        </div>

        <!-- Developers Section -->
        <div class="developers">
            <!-- Developer 1 -->
            <div class="developer-card">
                <img src="https://attendance.msoshub.com/dev/mark.png" alt="Developer">
                <div class="developer-info">
                    <h3>Mark Angelo Hornido</h3>
                    <p>Full Stack Developer</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>

            <div class="developer-card">
                <img src="https://attendance.msoshub.com/dev/bry.png" alt="Developer">
                <div class="developer-info">
                    <h3>Keneth Bryan Mancao</h3>
                    <p>Full Stack Developer</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>

            <div class="developer-card">
                <img src="https://attendance.msoshub.com/dev/nat.png" alt="Developer">
                <div class="developer-info">
                    <h3>Nathaniel Rosell</h3>
                    <p>Manager</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>

            <!-- Developer 2 -->
            <div class="developer-card">
                <img src="https://attendance.msoshub.com/dev/john.png" alt="Developer">
                <div class="developer-info">
                    <h3>John Klevin Petralba</h3>
                    <p>Docs</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>

            <div class="developer-card">
                <img src="https://attendance.msoshub.com/dev/vin.png" alt="Developer">
                <div class="developer-info">
                    <h3>Arvin Forrosuelo</h3>
                    <p>Docs</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>

            <!-- Developer 3 -->
            <div class="developer-card">
                <img src="https://attendance.msoshub.com/dev/scot.png" alt="Developer">
                <div class="developer-info">
                    <h3>Scott</h3>
                    <p>Docs</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
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
                <p class="footer_p" >Shops</p>

            </a>
            <a href="{{url('search-order')}}">
                <i class="fa-solid fa-earth-americas"></i>
                <p class="footer_p">Tracker</p>

            </a>
            <a href="{{url('user_page')}}" class="active" >
                <i class="fa-solid fa-user"></i>
                <p class="footer_p">User</p>

            </a>
        </div>
    </footer>
</body>
</html>
