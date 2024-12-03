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
                <h4>Product Add Tracking</h4>
                <h6>Create ncvew product Tracking</h6>
            </div>
        </div>

        <form action="{{url('add_payment')}}" method="post">
        @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Tracking Name</label>
                                <input type="text" name="payment"  placeholder="Enter tracking">
                            </div>
                        </div>
            
    
                    
                         
                        <div class="col-lg-12">
                            <input type="submit" class="btn btn-submit me-2" value="Submit">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
</div>


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
