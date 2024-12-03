<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Update Product</title>

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
                <h4>Update Product</h4>
                <h6>Modify product details</h6>
            </div>
        </div>

        <!-- Update Product Form -->
        <form action="{{ url('edit_product/' . $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <!-- Product Name -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" name="title" value="{{ $product->title }}" required>
                            </div>
                        </div>

                        <!-- Category -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="select" name="category" required>
                                    <option>Choose Category</option>
                                    @foreach($category_data as $category)
                                        <option value="{{ $category->category_name }}" 
                                            {{ $product->category == $category->category_name ? 'selected' : '' }}>
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Super Category -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Super Category</label>
                                <select class="select" name="Scategory" required>
                                    <option>Choose Super Category</option>
                                    @foreach($super_categories as $super_category)
                                        <option value="{{ $super_category->super_category }}" 
                                            {{ $product->global_category == $super_category->super_category ? 'selected' : '' }}>
                                            {{ $super_category->super_category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Price -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price" value="{{ $product->price }}" required>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Estimate Delivery: </label>
                                <input type="text" name="estimate" value="{{ $product->estimate}}" required>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" required>{{ $product->description }}</textarea>
                            </div>
                        </div>

                        <!-- Product Sizes -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Product Sizes</label>
                                <div class="checkbox-container">
                                    @foreach($sizes as $size)
                                        <label>
                                            <input type="checkbox" name="sizes[]" value="{{ $size->size_name }}" 
                                                {{ in_array($size->size_name, explode(',', $product->size)) ? 'checked' : '' }}>
                                            {{ $size->size_name }}
                                        </label><br>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Product Images -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Uploaded Images</label>
                                <div class="uploaded-images">
                                    @if($product->image)
                                        @foreach(json_decode($product->image, true) as $image)
                                            <img src="{{ asset('products/' . $image) }}" alt="Product Image" style="max-width: 100px; margin: 5px;">
                                        @endforeach
                                    @else
                                        <p>No images uploaded.</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Upload New Images</label>
                                <input type="file" name="images[]" accept="image/*" multiple>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-lg-12">
                            <input type="submit" class="btn btn-submit me-2" value="Update Product">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- JS Files -->
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
