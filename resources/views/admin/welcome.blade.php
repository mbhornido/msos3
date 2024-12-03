<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
        <!-- user header -->
        @include('components.header_seller')


    <div class="container">
        @include('components.sidebar_seller')
 

        <main class="seller-content">
            <h1>Welcome, Seller!</h1>
            <section class="manage-products">
                <h2>Manage Products</h2>
                <button class="btn-add-product">Add New Product</button>
                <div class="products">
                    <div class="product">
                        <img src="https://via.placeholder.com/150" alt="Product 1">
                        <h2>Product 1</h2>
                        <p>$20.00</p>
                        <button>Edit</button>
                        <button>Delete</button>
                    </div>
                    <div class="product">
                        <img src="https://via.placeholder.com/150" alt="Product 2">
                        <h2>Product 2</h2>
                        <p>$35.00</p>
                        <button>Edit</button>
                        <button>Delete</button>
                    </div>
                </div>
            </section>

            <section class="manage-orders">
                <h2>Recent Orders</h2>
                <div class="orders">
                    <p>Order #001 - Status: Shipped</p>
                    <p>Order #002 - Status: Processing</p>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
