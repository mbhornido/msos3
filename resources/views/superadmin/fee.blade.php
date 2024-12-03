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
            <h3>Add shipping status</h3>
            <br>

            <!-- Add Fee Form
            <form action="{{url('add_fee')}}" method="post">
                @csrf
                <div>
                    <input type="number" name="fee" id="" placeholder="Enter fee price">
                </div>
                <br>
                <div>
                    <input type="submit" value="Add fee">
                </div> 
            </form> -->

            <br><br><br>
            <div>
                <table>
                    <tr>
                        <th>Ship Status</th>
                        <th>Update</th>
                    </tr>

                    @foreach($data as $fee)
                    <tr>
                        <td>{{$fee->general_fee}}</td>

                        <!-- Delete Fee -->
                        <!-- <td>
                            <a href="{{url('delete_fee', $fee->id)}}" onclick="confirmation(event)">Delete</a>
                        </td> -->

                        <!-- Update Fee: Link to open the update form -->
                        <td>
                            <a href="{{url('edit_fee', $fee->id)}}">Update</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>

            <!-- Display update form if a fee is being updated -->
            @if(isset($editFee))
            <br><br>
            <h3>Update Fee</h3>
            <form action="{{url('update_fee', $editFee->id)}}" method="post">
                @csrf
                <div>
                    <input type="number" name="fee" value="{{$editFee->general_fee}}" placeholder="Enter updated fee price">
                </div>
                <br>
                <div>
                    <input type="submit" value="Update fee">
                </div> 
            </form>
            @endif
        </main>
    </div>

    <!-- js files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/sweet.js') }}"></script>
</body>
</html>
