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
                <li>Seller 1</li>
                <li>Seller 2</li>
                <li>Seller 3</li>
                <li>Seller 4</li>
            </ul>
        </aside>

        <main class="product-list">
            <h1>Products</h1>
            <div class="products">

            @foreach($product as $products)

                <div class="product">
                    <img src="products/{{$products->image}}" alt="Product 1">
                    <h2>{{$products->title}}</h2>
                    <p>₱{{$products->price}}.00</p>

                    <div class="btn_container">
                        <a href="{{url('product_details',$products->id)}}">View</a>

                    </div>
                    
                </div>

            @endforeach


            </div>
        </main>
    </div>
</body>
</html>
