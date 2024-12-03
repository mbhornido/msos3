<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Create Your Account</title>

    <!-- Add necessary CSS -->
    <link rel="stylesheet" href="{{ asset('css/partial.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partial2.css') }}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arima', Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #333;
            color: #333; 
        }

        @media (max-width: 768px) {
        body{
            background: #fff;
        }
    }
 
    </style>
</head>
<body>

@include('includers.login_header')


    <!-- Register Container -->
    <div class="register-container">
        <!-- Left Section (Form) -->
        <div class="register-content">
            <div class="register-logo">
                <img src="{{ asset('images/loginlog.png') }}" alt="Logo">
            </div>
            <div class="register-header">
                <h3>Create an Account</h3>
                <p>Start your journey with us</p>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="register-form-group">
                    <label for="name">Full Name</label>
                    <input id="name" type="text" name="name" placeholder="Enter your full name" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <span class="text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="register-form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" placeholder="Enter your email address" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="register-form-group">
                    <label for="password">Password</label>
                    <div style="position: relative;">
                        <input id="password" type="password" name="password" placeholder="Enter your password" required>
                        <i class="fa fa-eye toggle-password" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;" data-target="password"></i>
                    </div>
                    @error('password')
                        <span class="text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="register-form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <div style="position: relative;">
                        <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm your password" required>
                        <i class="fa fa-eye toggle-password" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;" data-target="password_confirmation"></i>
                    </div>
                    @error('password_confirmation')
                        <span class="text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                
                <button type="submit" class="register-button">Sign Up</button>
                <div class="signin-link">
                    <p>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
                </div>
            </form>
        </div>

        <!-- Right Section (Image) -->
        <div class="register-image">
            <img src="{{ asset('img/login.jpg') }}" alt="Register Image">
        </div>
    </div>

    <script>
        document.querySelectorAll('.toggle-password').forEach(icon => {
    icon.addEventListener('click', function() {
        const targetInput = document.getElementById(this.getAttribute('data-target'));
        const isPassword = targetInput.type === 'password';
        targetInput.type = isPassword ? 'text' : 'password';
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
});

    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>
