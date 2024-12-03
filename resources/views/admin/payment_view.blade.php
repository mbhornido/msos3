<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>MSOS ADMIN</title>

<link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">

    <link rel="stylesheet" href="{{asset('css_admin/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css_admin/animate.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css_admin/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css_admin/style.css')}}">
    <link rel="stylesheet" href="{{asset('css_admin/new.css')}}">

</head>
<body>

@include('includes.admin_header')

<div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Product Tracking List</h4>
                    <h6>View Product Tracking</h6>
                </div>
                <div class="page-btn">
                    <a href="{{url('view_payment')}}" class="btn btn-added">
                        <img src="{{asset('img/icons/plus.svg')}}" class="me-1" alt="img">Add Tracking
                    </a>
                </div>
            </div>

            <div class="cards">
                <div class="card-bodys">
                   

                    <div class="table-responsives">
                        <table class="table datanews">
                            <thead>
                                <tr>
                                    
                                    <th>Tracking Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach($pay_data as $pay_data)

                            <tbody>
                                <tr>
                                    <td class="productimgnames">
                                        <a href="">{{$pay_data->payment_name}}</a>
                                    </td>
                                    <td>
                                        <a class="me-3" href="{{url('edit_payment',$pay_data->id)}}">
                                            <img src="{{asset('img/icons/edit.svg')}}" alt="img">
                                        </a>
                                        <a class="me-3" href="{{url('delete_payment',$pay_data->id)}}">
                                            <img src="{{asset('img/icons/delete.svg')}}" alt="img">
                                        </a>
                                    </td>
                                </tr>
                                
                            </tbody>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    
<script src="{{ asset('js/sweet.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{ asset('js_admin/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js_admin/feather.min.js') }}"></script>
<script src="{{ asset('js_admin/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('js_admin/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js_admin/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js_admin/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('plugins/sweetalert/sweetalerts.min.js') }}"></script>
<script src="{{ asset('js_admin/script.js') }}"></script>



</body>
</html>
