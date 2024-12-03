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
            <h3>Add product</h3>
                <br>
            <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="">Product title</label>
                    <input type="text" name="title" placeholder="enter product name" required>
                </div>
                <br>
                <div>
                    <label for="">Product Description</label>
                    <textarea name="description" id="" required></textarea>
                </div>
                <br>
                <div>
                    <label for="">Product price</label>
                    <input type="" name="price">
                </div>
                <br>
                <div>
                    <label for="">Product available</label>
                    <input type="number" name="qty">
                </div>
                <br>
                <div>
                    <label for="">Product category</label>
                    <select name="category" required>
                        <option>Select option</option>

                @foreach($category_data as $category_data)

                    <option value="{{$category_data->category_name}}"
                    >{{$category_data->category_name}}</option>

                @endforeach
                    </select>
                </div>

                <div>
                    <label for="">Product Sizes</label>
                    <div class="checkbox-container">
                        @foreach($sizes as $size)
                            <label>
                                <input type="checkbox" name="sizes[]" value="{{ $size->size_name }}"> {{ $size->size_name }}
                            </label><br>
                        @endforeach
                    </div>
                </div>


                <br>
                <div>
                    <label for="">Product price</label>
                    <input type="file" name="image">
                </div>

                <div>
                    <input type="submit" value="Add product">
                </div>
            </form>


        </main>
    </div>

    <!-- js files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/sweet.js') }}"></script>
</body>
</html>
