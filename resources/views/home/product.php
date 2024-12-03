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

        <div class="center_container">
            <div class="product-details">
            <a href="{{url('/dashboard')}}" class="back"><i class="fa-solid fa-arrow-left"></i></a>

                <div class="product-image">
                    <img src="/products/{{$product_data->image}}" alt="Product Image">
                </div> 
                <div class="product-info">    
                <h3>Product Owner: {{ $product_data->owner->shop_name }}</h3>
                <img src="{{ asset('logo/' . $product_data->owner->logo) }}" alt=" {{ $product_data->owner->shop_name }}" width="100px">
                    <h1>{{$product_data->title}}</h1>
                    <p>{{$product_data->description}}</p>
                    <h2>Sizes</h2>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product_data->id }}">
                        <p>
                            <select name="size" required>
                                @foreach(explode(',', $product_data->size) as $size)
                                    <option value="{{ $size }}">{{ $size }}</option>
                                @endforeach
                            </select>
                        </p>
                        <h2>Available Product</h2>
                        <p>{{ $product_data->quantity }}</p>
                        <h2>Quantity</h2>
                        <input type="number" name="quantity" min="1" max="{{ $product_data->quantity }}" required>
                        <p class="price">₱{{ $product_data->price }}.00</p>
                        <button type="submit">Add to Cart</button>
                    </form>
                </div>

            </div>
        </div>
    </body>
    </html>
