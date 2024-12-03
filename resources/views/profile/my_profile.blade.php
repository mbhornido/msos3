<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>MSOS | ADMIN</title>
<link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.jpg">

    <link rel="stylesheet" href="{{asset('css_admin/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css_admin/animate.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css_admin/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css_admin/style.css')}}">
    <link rel="stylesheet" href="{{asset('css_admin/new.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
    .toast {
        z-index: 99;
    }

   

</style>
</style>

</head>
<body>

@include('includes.user_header')

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Profile</h4>
                <h6>User Profile</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="profile-set">
                    <div class="profile-head">
                    </div>
                    <div class="profile-top">
                        <div class="profile-content">
                        <div class="profile-contentimg">
                            @if($user->logo)
                                <img src="{{ asset('logo/' . $user->logo) }}" alt="Current Logo" id="blah" class="mt-2 w-32 h-32 object-cover">
                            @endif

                          
                        </div>
                            <div class="profile-contentname">
                                <h2>{{ $user->name ?? 'Mark Hornido' }}</h2>
                                <h4>Update Your Photo and Personal Details.</h4>
                            </div>
                        </div>

                    </div>
                </div>

                <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-4">
                    @csrf
                    @method('patch')

                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Fullname</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="William" value="{{ old('name', $user->name) }}" required>
                            </div>
                        </div>



                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="william@example.com" value="{{ old('email', $user->email) }}" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="+1452 876 5432" value="{{ old('phone', $user->phone) }}" required>
                            </div>
                        </div>


                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <select name="address" id="address" class="form-control">
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->section_name }}" {{ old('address', $user->address) == $section->section_name ? 'selected' : '' }}>
                                            {{ $section->section_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-lg-6 col-sm-12 mt-3">
                            <div class="form-group">
                                <label for="logo">Profile Logo</label>
                                <div class="profile-contentimg">
                                    <!-- @if($user->logo)
                                        <img src="{{ asset('logo/' . $user->logo) }}" alt="Current Logo" id="blah" class="mt-2 w-32 h-32 object-cover">
                                    @endif -->
                                    <input type="file" id="imgInp" name="logo" class="form-control" accept="image/*" onchange="previewImage(event)">
                                </div>
                            </div>
                        </div>

                        <!-- Submit and Cancel Buttons -->
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <!-- <button type="reset" class="btn btn-cancel">Cancel</button> -->
                        </div>




                    </div>
                </form>



            </div>


  
        </div>
    </div>
</div>



<!-- Include Toastr CSS and JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Success notification
        @if(session('success'))
            toastr.success("{{ session('success') }}", "Success", {
                closeButton: true,
                progressBar: true,
                timeOut: "5000"
            });
        @endif

        // Error notifications (from validation errors)
        @if($errors->any())
            @foreach($errors->all() as $error)
                toastr.error("{{ $error }}", "Error", {
                    closeButton: true,
                    progressBar: true,
                    timeOut: "5000"
                });
            @endforeach
        @endif
    });
</script>

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