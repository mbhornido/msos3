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
                    <h4>Product List</h4>
                    <h6>Manage your products</h6>
                </div>
                <div class="page-btn">
                    <a href="{{url('add_product')}}" class="btn btn-added">
                        <img src="{{asset('img/icons/plus.svg')}}" class="me-1" alt="img">Add New Product
                    </a>
                </div>
            </div>

            <div class="cards">
                <div class="card-bodys">
                <form action="{{url('product_search')}}" method="get" >
                    @csrf
                    <div class="input-group">
                        <input type="search" name="search" placeholder="Search Product"  class="form-control">
                        <input type="submit" value="Search"  class="btn btn-primary">
                    </div>
                </form>


                    <div class="table-responsives">
                        <table class="table datanews">
                            <thead>
                                <tr>
                                    
                                <th>Product name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Estimate </th>
                                <th>Image</th>
                                <th>Size</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            @foreach($product as $products)

                            <tbody>
                            <tr>
                                <td class="productimgnames">
                                    <a href="">{{ $products->title }}</a>
                                </td>
                                <td class="productimgnames">
                                    <a href="">{{ Str::limit($products->description, 20) }}</a>
                                </td>
                                <td class="productimgnames">
                                    <a href="">{{ $products->category }}</a>
                                </td>
                                <td class="productimgnames">
                                    <a href="">₱{{ number_format($products->price, 2) }}</a>
                                </td>
                                <td class="productimgnames">
                                    <a href="">{{ $products->estimate }}</a>
                                </td>
                                <td class="productimgnames">
                                    @php
                                        // Decode the JSON string in the 'image' column
                                        $productImages = json_decode($products->image, true); // Decode as an associative array
                                        $firstImage = !empty($productImages) ? $productImages[0] : 'default.png'; // Fallback to default image
                                    @endphp
                                    <img src="{{ asset('products/' . $firstImage) }}" alt="Product Image" width="100">
                                </td>
                                <td class="productimgnames">
                                    <a href="">{{ $products->size }}</a>
                                </td>
                                <td>
                                    <a class="me-3" href="{{ url('update_product', $products->id) }}">
                                        <img src="{{ asset('img/icons/edit.svg') }}" alt="Edit">
                                    </a>
                                    <a class="me-3" href="{{ url('delete_product', $products->id) }}">
                                        <img src="{{ asset('img/icons/delete.svg') }}" alt="Delete">
                                    </a>
                                </td>
                            </tr>

                                
                            </tbody>
                            @endforeach
                        </table>
                        <br><br>
                        <div class="pagination-container">
                            {{ $product->onEachSide(1)->links() }}
                        </div>
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
