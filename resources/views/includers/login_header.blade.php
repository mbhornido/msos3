<header>
        <div class="main_header">
            <a href="{{url('/')}}" class="logo">

                <img src="{{asset('images/download2.png')}}" alt="">

                <div class="logo_text">
                    <h3>MSOS</h3>
                    <p>DIGITAL SHOP</p>
                </div> 
            </a>
            <nav>
                <a href="{{url('https://msoshub.com/')}}">Home</a>
                <a href="{{url('/')}}">Sites</a>
                {{-- <a href="">About Us</a> --}}
                <a href="{{url('login')}}" class="sign_btn">Sign In</a>
            </nav> 
        </div>


        <div class="burger-menu hide">
            <i class="fas fa-bars"></i>
        </div> 
    </header>

    <aside class="sidebar">
        <ul>
            <li><a href="{{url('https://msoshub.com/')}}">Home</a></li>
            <li><a href="{{url('/')}}">Sites</a></li>
            <li><a href="{{url('login')}}">Login</a></li>
            <li><a href="{{url('register')}}">Register</a></li>
        </ul>
    </aside>