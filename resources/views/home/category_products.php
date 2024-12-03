<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Product List">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSOS | Category Products</title>
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
</head>

<body>
    @include('includes.top_header_user')

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <h2>{{ $category->category_name }} Products</h2>
                </div>
                <div class="col-lg-3">
                    <p>Cart Items: {{ $count }} | Total: ${{ $totalPrice }}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Product List Section Begin -->
    <section class="product spad">
    <div class="container">
        <div class="product-grid">
            @foreach($category->products as $product)
                <div class="product-card">
                    <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->title }}" class="product-image">
                    <h3>{{ $product->title }}</h3>
                    <p>Category: {{ $category->category_name }}</p> <!-- Display category name -->
                    <p>Price: ₱{{ $product->price }}.00</p>
                    <button class="secondary-button" onclick="window.location.href='{{ url('product_details', $product->id) }}'">View Details</button>
                </div>
            @endforeach
        </div>
    </div>
</section>

    <!-- Product List Section End -->

    @include('includes.footer_user')
</body>

</html>
