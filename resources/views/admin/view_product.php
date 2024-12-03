<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
</head>
<body>
        <!-- user header -->
        @include('components.header_seller')


    <div class="container">
        @include('components.sidebar_seller')
 

        <main class="seller-content">
            <h1>Welcome, Seller!</h1>
            <h3>View product</h3>
                <br>
                <br>

                <form action="{{url('product_search')}}" method="get">
                    @csrf
                    <input type="search" name="search" placeholder="Search product ">
                    <input type="submit" value="Search">
                </form>


                <br><br>
                <table>
                    <tr>
                        <th>Product name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Size</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>

                    @foreach($product as $products)
                    <tr>
                        <td>{{$products->title}}</td>
                        <!-- <td>{!!Str::limit($products->description,10)!!}</td> -->
                        <!-- <td>{!!Str::words($products->description,5)!!}</td> -->
                        <td>{{$products->description}}</td>
                        <td>{{$products->category}}</td>
                        <td>{{$products->price}}</td>
                        <td>{{$products->quantity}}</td>
                        <td><img src="{{ asset('products/' . $products->image) }}" alt="Product Image" width="100"></td>
                        <td>{{$products->size}}</td>
                        <td>
                            <a href="{{url('delete_product',$products->id)}}"
                            onclick="confirmation(event)">Delete</a>
                        </td>
                        <td>
                            <a href="{{url('update_product',$products->id)}}">Edit</a>
                        </td>
                    </tr>

                    @endforeach
                </table>
                <div class="pagination-container">
                    {{ $product->onEachSide(1)->links() }}
                </div>

        </main>
    </div>

    <!-- js files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/sweet.js') }}"></script>
</body>
</html>
