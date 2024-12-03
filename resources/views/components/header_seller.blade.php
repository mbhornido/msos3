<header>
        <div class="logo">Seller Dashboard</div>
        <div class="header-right">
            <div class="cart">
                <i class="fa-solid fa-bell"></i>
            </div>
            <div class="profile-dropdown">
            <i class="fa-solid fa-circle-user"></i>
                <div class="dropdown-content">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <input type="submit" value="Logout" class="btn-1">
                        </form>
                    <a href="{{url('/profile')}}" class="btn-1">Profile</a>

                </div>
            </div>
        </div>
    </header> 