<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MSOS | SHOP</title>
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
</head>

<body>

       <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{asset('/images/logo.png')}}" alt=""></a>
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
                <a href="{{url('/profile')}}"><i class="fa fa-user"></i> Profile</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="#">Sellers</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="{{url('mycart')}}">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="{{url('contact')}}">Contact</a></li>
                <li><a href="./contact.html">About Us</a></li>

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
                                <a href="{{url('/profile')}}"><i class="fa fa-user"></i> Profile</a>
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
                        <a href="./index.html"><img src="{{asset('/images/logo.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{url('/dashboard')}}">Home</a></li>
                            <li><a href="./shop-grid.html">Shop</a></li>
                            <li><a href="#">Sellers</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>

            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">  
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                        @foreach($department as $departments)

                            <li><a href="">{{$departments->department_name}}</a></li>

                        @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                        
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <a href="">
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-facebook"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5> Alliance of Coders</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('/images/banner.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Shoping Cart Section Begin -->
    <form id="cart-form" action="{{ url('checkout') }}" method="GET">

    <section class="shoping-cart spad">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">

                        @if($cart->count() > 0)

                            <table>
                                <thead>
                                    <tr>
                                        <th>Select </th>
                                        <th class="shoping__product"> Products</th>
                                        <th>Size</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach($cart as $item)
                                        <tr>
                                            <td class="check">
                                                <input type="checkbox" class="cart-item-checkbox" name="cart_items[]" value="{{ $item->id }}" data-price="{{ $item->price }}">

                                                <div class="owner">
                                                <img src="{{ asset('logo/' . $item->product->owner->logo) }}" alt=" {{ $item->product->owner->shop_name }}" width="40px">

                                                    <p>{{ $item->product->owner->shop_name ?? 'N/A' }}</p>
                                                </div>

                                            </td>
                                            <td class="shoping__cart__item">
                                                <img src="/products/{{ $item->product->image }}" alt="" width="50px">
                                                <h5>{{ $item->product->title }}</h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                {{ $item->size }}
                                            </td> 
                                            <td class="shoping__cart__price">
                                                ₱{{ number_format($item->price / $item->quantity, 2) }}
                                            </td>
                                            <td class="shoping__cart__quantity">                                       
                                                        {{ $item->quantity }}
                                            </td>
                                            <td class="shoping__cart__total">
                                                ₱{{ number_format($item->price, 2) }}
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <button type="button" class="remove-btn" data-id="{{ $item->id }}"><i class="fa-solid fa-trash"></i></button>

                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                            
                            </table>
                            @else
                                <p>Your cart is empty.</p>
                            @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <!-- <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a> -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <div action="#" class="vouch">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Total ₱<span id="cart-total">0.00</span></li>
                        </ul>
                        <button class="primary-btn" type="submit" disabled id="checkout-btn">Proceed to Checkout</button>

                    </div>
                </div>


            
            </div>
        </div>
    </section>
    </form>

    <!-- Shoping Cart Section End -->

    <!-- Footer Section Begin -->
    @include('includes.footer_user')


    <script>
       $(document).ready(function() {
    let total = 0;

    // Update total when checkboxes are clicked
    $('.cart-item-checkbox').change(function() {
        total = 0;

        // Sum the selected items' prices
        $('.cart-item-checkbox:checked').each(function() {
            total += parseFloat($(this).data('price'));
        });

        // Update the total display
        $('#cart-total').text(total.toFixed(2));

        // Enable/disable checkout button
        $('#checkout-btn').prop('disabled', total === 0);
    });

    // Handle remove button click
    $('.remove-btn').click(function() {
        const itemId = $(this).data('id');
        const $row = $(this).closest('tr'); // Store the row for later removal

        // Confirm removal
        if (confirm('Are you sure you want to remove this item?')) {
            // Perform AJAX request to remove the item from the cart
            $.ajax({
                url: '/cart/remove/' + itemId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        // Remove the item row from the table
                        $row.remove();

                        // Optionally update the total amount
                        updateCartTotal();

                        // Show a success message (optional)
                        alert(response.message);
                    } else {
                        console.error('Error:', response.message);
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        }
    });

    // Function to update the total after an item is removed
    function updateCartTotal() {
        let newTotal = 0;
        $('.cart-item-checkbox:checked').each(function() {
            newTotal += parseFloat($(this).data('price'));
        });
        $('#cart-total').text(newTotal.toFixed(2));

        // Disable checkout button if no items are selected
        $('#checkout-btn').prop('disabled', newTotal === 0);
    }
});

    </script>

</body>

</html>