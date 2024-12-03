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
            <h3>Add Category</h3>
                <br>
            <form action="{{url('add_category')}}" method="post">
                @csrf
                <div>
                    <input type="text" name="category" id="" placeholder="enter category">
                </div>
                <br>
                <div>
                    <input type="submit" value="Add Category">
                </div>
            </form>

            <br><br><br>
            <div>
                <table>
                    <tr>
                        <th>Category Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    @foreach($cat_data as $cat_data)
                    <tr>
                        <td>{{$cat_data->category_name}}</td>
                        <td>
                            <a href="{{url('edit_category',$cat_data->id)}}">Edit</a>
                        </td>
                        <td>
                            <a href="{{url('delete_category',$cat_data->id)}}"
                            onclick="confirmation(event)">Delete</a>
                        </td>
                    </tr>

                    @endforeach
                </table>
            </div>
        </main>
    </div>

    <!-- js files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/sweet.js') }}"></script>
</body>
</html>
