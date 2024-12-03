<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>MSOS Shop</title>


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
                <h4>Product Add</h4>
                <h6>Create new product</h6>
            </div>
        </div>

        <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Product name</label>
                                <input type="text" name="title" placeholder="Enter product name" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="select" name="category" required>
                                    <option>Choose Category</option>
                                    @foreach($category_data as $category_data)
                                        <option value="{{$category_data->category_name}}">
                                            {{$category_data->category_name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Super Category</label>
                                <select class="select" name="Scategory" required>
                                    <option>Choose Super Category</option>
                                    @foreach($super_categories as $super_category)
                                        <option value="{{ $super_category->super_category }}">
                                            {{ $super_category->super_category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price" required placeholder="Enter product price">
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Estimate Delivery: </label>
                                <input type="text" name="estimate" required placeholder="Enter estimate delivery time">
                            </div>
                        </div>


                    

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" required></textarea>
                            </div>
                        </div>

                        <!-- Product Sizes Section -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Product Sizes</label>
                                <div class="checkbox-container">
                                    @foreach($sizes as $size)
                                        <label>
                                            <input type="checkbox" name="sizes[]" value="{{ $size->size_name }}"> {{ $size->size_name }}
                                        </label><br>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Product Images</label>
                                <div class="image-upload">
                                    <input type="file" name="images[]" id="imageInput" accept="image/*" multiple>
                                    <div class="image-uploads">
                                        <img src="{{asset('img/icons/upload.svg')}}" alt="img">
                                        <h4>Drag and drop files to upload</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Image preview container -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Image Previews</label>
                                <div id="previewContainer" style="margin-top: 10px; display: flex; gap: 10px; flex-wrap: wrap;">
                                    <!-- Previews will be added here -->
                                </div>
                            </div>
                        </div>

                        <!-- Image preview container -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Image Preview</label>
                                <div id="previewContainer" style="margin-top: 10px;">
                                    <img id="imagePreview" src="#" alt="Image Preview" style="display: none; max-width: 200px;">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <input type="submit" class="btn btn-submit me-2" value="Add product">
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

<script>
    // JavaScript to preview image when a file is chosen
    document.getElementById('imageInput').addEventListener('change', function(event) {
    const files = event.target.files;
    const previewContainer = document.getElementById('previewContainer');
    previewContainer.innerHTML = ''; // Clear previous previews

    Array.from(files).forEach(file => {
        if (file.type.match('image.*')) {
            const reader = new FileReader();
            const img = document.createElement('img');
            img.style.maxWidth = '150px';
            img.style.margin = '5px';
            img.style.border = '1px solid #ddd';
            img.style.borderRadius = '5px';

            reader.onload = function(e) {
                img.src = e.target.result;
                previewContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    });
});

</script>

</body>
</html>
