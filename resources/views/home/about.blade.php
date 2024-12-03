<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset ('css/css_file.css')}}">
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>MSOS | About Us</title>
    <style>


        .about-section {
            text-align: center;
            margin-bottom: 40px;
            padding: 20px;
            background: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .about-section h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .about-section p {
            font-size: 16px;
            line-height: 1.8;
            color: #555;
        }

        .team-section {
            margin: 40px 0;
        }

        .team-section h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 30px;
        }

        .team-member {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .team-member img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .team-member .info {
            flex: 1;
        }

        .team-member .info h3 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        .team-member .info p {
            margin: 5px 0 0;
            font-size: 14px;
            color: #555;
        }

        /* Responsive Design */
        @media (max-width: 768px) {

            body{
                background-color: white;
            }
            .about-section {
                margin-top: 10%;
                box-shadow: none;
                border-radius: 0px;
            }
            .team-member {
                flex-direction: column;
                text-align: center;
                box-shadow: none;
                border-radius: 0px;
            }

            

            .team-member img {
                margin: 0 auto 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        @include('includers.mobile_back_header')
        @include('includers.user_header')

        <!-- About Section -->
        <div class="about-section">
            <h1>About Us</h1>
            <p>
                Welcome to MSOS Online Shop! <br> 
We are a passionate team of student developers from CTU Danao Campus, 
driven by a shared vision: to tackle organizational challenges through innovative solutions.
            </p>
        </div>

        <!-- Mission Section -->
        <div class="about-section">
            <h1>Our Mission</h1>
            <p>
                Our mission is to innovate and lead by example, offering sustainable and forward-thinking solutions to our clients. 
                We strive to build long-term relationships based on trust, quality, and mutual growth.
            </p>
        </div>

        <!-- Team Section -->
        <!-- <div class="team-section">
            <h2>Meet Our Team</h2>

            <div class="team-member">
                <img src="{{ asset('images/team1.jpg') }}" alt="Team Member">
                <div class="info">
                    <h3>John Doe</h3>
                    <p>CEO & Founder</p>
                </div>
            </div>

            <div class="team-member">
                <img src="{{ asset('images/team2.jpg') }}" alt="Team Member">
                <div class="info">
                    <h3>Jane Smith</h3>
                    <p>Chief Operating Officer</p>
                </div>
            </div>

            <div class="team-member">
                <img src="{{ asset('images/team3.jpg') }}" alt="Team Member">
                <div class="info">
                    <h3>Emily Johnson</h3>
                    <p>Head of Marketing</p>
                </div>
            </div>
        </div> -->
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
