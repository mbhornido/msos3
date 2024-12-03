<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSOS | SHOP</title>
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <!-- user header -->
    @include('components.header')

    <div class="container">
        <aside class="sidebar">
            <ul>
                <li>Category 1</li>
                <li>Category 2</li>
                <li>Category 3</li>
                <li>Category 4</li>
            </ul>
        </aside>

        <main class="product-list">
            <h1>Products</h1>
            <div class="products">
                <div class="product">
                    <img src="https://via.placeholder.com/150" alt="Product 1">
                    <h2>Product 1</h2>
                    <p>$20.00</p>
                </div>
                <div class="product">
                    <img src="https://via.placeholder.com/150" alt="Product 2">
                    <h2>Product 2</h2>
                    <p>$35.00</p>
                </div>
                <div class="product">
                    <img src="https://via.placeholder.com/150" alt="Product 3">
                    <h2>Product 3</h2>
                    <p>$25.00</p>
                </div>
                <div class="product">
                    <img src="https://via.placeholder.com/150" alt="Product 4">
                    <h2>Product 4</h2>
                    <p>$15.00</p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
