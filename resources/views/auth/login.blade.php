<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-adsense-account" content="ca-pub-6444619677143056">
    <title>MSOS Login</title>
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">

    <!-- Add necessary CSS -->
    <link rel="stylesheet" href="{{asset('css/partial.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #333;
            color: #333;
        }

        @media (max-width: 768px) {
            body {
                background: #fff;
            }
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .form-group input {
            width: 100%;
            padding-right: 40px; /* Add padding for the eye icon */
        }

        .form-group .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #888;
            font-size: 18px;
        }

        .form-group .toggle-password:hover {
            color: #333;
        }

        .text-danger {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
            display: block;
        }
    </style>
</head>
<body>

@include('includers.login_header')

<div class="login-container"> 
    <!-- Left Section (Form) -->
    <div class="login-content">
        <div class="login-logo">
            <img src="{{ asset('images/loginlog.png') }}" alt="Logo">
        </div>
        <div class="login-header">
            <h3>Sign In</h3>
            <p>Please login to your account</p>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div style="position: relative;">
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    <i class="fa fa-eye toggle-password" id="togglePassword"></i>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="forgot-password">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                @endif
            </div>
            <button type="submit" class="login-button">Sign In</button>
            <div class="signup-link">
                <p>Don’t have an account? <a href="{{ route('register') }}">Sign Up</a></p>
            </div>
        </form>
    </div>

    <!-- Right Section (Image) -->
    <div class="login-image">
        <img src="{{ asset('img/login.jpg') }}" alt="Login Image">
    </div>
</div>

<script>
    // Show/Hide Password Functionality
    document.getElementById("togglePassword").addEventListener("click", function () {
        const passwordField = document.getElementById("password");
        const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
        passwordField.setAttribute("type", type);

        // Toggle the eye icon class
        this.classList.toggle("fa-eye");
        this.classList.toggle("fa-eye-slash");
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="{{asset('js/script.js')}}"></script>

</body>
</html>
