    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="{{url('/dashboard')}}"><img src="{{asset('/images/logo.png')}}" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="{{url('mycart')}}"><i class="fa fa-cart-shopping"></i> <span>{{$count}}</span></a></li>    
                <li><a href="#"><i class="fa-solid fa-shopping-bag "></i> </a></li>
            </ul>
            <div class="header__cart__price">item: <span>₱{{ number_format($totalPrice, 2) }}</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="{{url('/profile_edit')}}"><i class="fa fa-user"></i> Profile</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="{{url('view_shop')}}">Shop</a></li>
                <li><a href="#">Sellers</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="{{url('view_seller')}}">CTU - DC</a></li>
                    
                    </ul>
                </li>
                <li><a href="{{url('contact')}}">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa-solid fa-truck"></i><a href="">Track Your Order</a></li>
                <li>MSOS Shop</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa-solid fa-truck"></i><a href="">Track Your Order</a></li>
                                <li>Multifunctional Student Organizational System Shop</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="{{url('profile_edit')}}"><i class="fa fa-user"></i> Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{url('/dashboard')}}"><img src="{{asset('/images/logo.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{url('/dashboard')}}">Home</a></li>
                            <li><a href="{{url('view_shop')}}">Shop</a></li>
                            <li><a href="#">Sellers</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{url('view_seller ')}}">CTU - DC</a></li>

                                </ul>
                            </li>
                            <li><a href="{{url('contact')}}">Contact</a></li>
                            <li><a href="./contact.html">About Us</a></li>

                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>          
                            <li><a href="{{url('mycart')}}"><i class="fa fa-cart-shopping"></i> <span>{{$count}}</span></a></li>    
                            <li><a href="#"><i class="fa-solid fa-shopping-bag "></i> </a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>₱{{ number_format($totalPrice, 2) }}</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
