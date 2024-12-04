


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Orders - To Pay">
    <title>Orders - To Pay</title>

    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css_admin/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css_admin/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css_admin/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css_admin/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css_admin/new.css') }}">
</head>
<body>

    <!-- Include Admin Header -->
    @include('includes.admin_header')

    <div class="page-wrapper">
        <div class="content">
            <!-- Page Header -->
            <div class="page-header">
                <div class="page-title">
                    <h4>Total Orders on Items</h4>
                </div>

                
            </div>

            <!-- Orders Table -->
            <div class="table-responsives">
                <table class="table cart-table datanews">
                    <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Size</th>
                            <th>Total Quantity Ordered</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderSummary as $summary)
                        <tr>
                            
                                    <td>{{ $summary->title }}</td>
                                    <td>{{ $summary->size ?? 'N/A' }}</td>
                                    <td>{{ $summary->total_quantity }}</td>
                             
               
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
       
        </div>
    </div>



    <!-- Scripts -->
    <script src="{{ asset('js_admin/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js_admin/feather.min.js') }}"></script>
    <script src="{{ asset('js_admin/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js_admin/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert/sweetalerts.min.js') }}"></script>
    <script src="{{ asset('js_admin/script.js') }}"></script>

    <!-- Optional JS for Modal Toggle -->
    <script>
        function openOrderModal(id) {
            document.getElementById("orderModal_" + id).style.display = "block";
        }

        function closeOrderModal(id) {
            document.getElementById("orderModal_" + id).style.display = "none";
        }
    </script>
</body>
</html> 
