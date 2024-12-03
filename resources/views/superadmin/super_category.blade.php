<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSOS | Seller Dashboard</title>
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>
<body>
        <!-- user header -->
        @include('components.header_super')


    <div class="container">
        @include('components.sidebar_super')
 

        <main class="seller-content"> 
            <h1>Welcome, super!</h1> 
            <h3>Add super category status</h3>
                <br>
                <form action="{{url('add_supercategory')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <input type="text" name="supercategory" placeholder="Enter supercategory status">
                    </div>
                    <br>
                    <div>
                        <label for="super_image">Upload Image:</label>
                        <input type="file" name="super_image" id="super_image" accept="image/*">
                    </div>
                    <br>
                    <div>
                        <input type="submit" value="Add supercategory">
                    </div>
                </form>


            <br><br><br>
            <div>
                <table>
                    <tr>
                        <th>supercategory Status</th>
                        <th>Image</th>
                        <th>Delete</th>
                    </tr>

                    @foreach($data as $data)
                    <tr>
                        <td>{{$data->super_category}}</td>

                        <td>
                            <img src="{{ asset($data->super_image) }}" alt="Supercategory Image" width="100">
                        </td>
                        <td>
                            <a href="{{url('delete_supercategory',$data->id)}}"
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
