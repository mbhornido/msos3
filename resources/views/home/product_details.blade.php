<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSOS | SHOP</title>
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
    <link rel="stylesheet" href="{{asset ('css/css_file.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    
@media (max-width: 480px) {
    body{
        background: white;
    }
}
</style>

</head>
<body>

    <div class="container">

        <header class="back_header">
            <a href="{{ url('dashboard') }}"><i class="fa-solid fa-arrow-left"></i></a>
           
                <a href="{{url('mycart')}}" class="icon1"><i class="fa-solid fa-cart-shopping"></i><span>{{$count}}</span></a>
        </header>

    @include('includers.user_header')


        <section class="product-container">
            
                <div class="product-images"> 
                <div class="main-image">
                        @php
                            $productImages = json_decode($product_data->image); // Decode the JSON string
                        @endphp

                        @if (!empty($productImages))
                            <img id="mainImage" src="/products/{{ $productImages[0] }}" alt="Main Product Image">
                        @else
                            <img id="mainImage" src="/products/default.png" alt="Default Product Image">
                        @endif
                </div>
                <!-- Sub Images -->
                <div class="sub-images">
                    @if (!empty($productImages))
                        @foreach ($productImages as $index => $image)
                           <!-- Skip the first image -->
                                <img src="/products/{{ $image }}" alt="Sub Image {{ $index }}" onclick="changeMainImage(this)">
                          
                        @endforeach
                    @else
                        <p>No additional images available</p>
                    @endif
                </div>
                </div>
            
                <div class="product-details">
                <h1 class="product-title">{{$product_data->title}}</h1>
                <p class="product-price">₱{{ $product_data->price }}.00</p>
                <p class="product-description">
                    {{$product_data->description}}
                </p>
                <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product_data->id }}">

                    <label for="size">Size:</label>
                    <select id="size" name="size" class="product-size">
                        @foreach(explode(',', $product_data->size) as $size)
                            <option value="{{ $size }}">{{ $size }}</option>
                        @endforeach

                    </select>
                
                      <label for="qity">Quantity:</label>
                    <input type="number" id="qity" class="product-quantity" name="quantity" value="1"  min="1" max="99"  required>
                    
                    <div class="single">
                        <a href="{{ url('view_seller_profile/' . $product_data->owner->id) }}" class="d_hide">
                            <i class="fa-solid fa-shop"></i>
                            <p class="footer_p" >Shop</p>
                        </a>
                        <button  type="submit" class="add-to-cart">Add to Cart</button>
                    </div>
                </form>

                <p class="product-availability">Product Sold: <span>{{ $product_data->quantity }}</span></p>
                <p class="product-availability">Estimate Delivery: <span>{{ $product_data->estimate }}</span></p>

                
                <div class="product-owner">
                    <img src="{{ asset('logo/' . $product_data->owner->logo) }}" alt="Product Owner Logo" class="owner-logo">
                    <a href="{{ url('view_seller_profile/' . $product_data->owner->id) }}" class="owner-name">Owner Name <br> <span> {{ $product_data->owner->shop_name }}</span></a>
                </div>
                </div>
 

            
            
            <script>
                function changeMainImage(smallImg) {
                document.getElementById("mainImage").src = smallImg.src;
                }
            </script>
        </section>

        <section class="rev-product-reviews">
            <h2>Leave a Review</h2>
            <form class="rev-review-form" action="{{ url('review_product') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product_data->id }}">
        
                <label class="rev-label" for="rating">Rating:</label>
                <select class="rev-select" id="rating" name="rating" required>
                    <option value="5">⭐⭐⭐⭐⭐ - 5 Stars</option>
                    <option value="4">⭐⭐⭐⭐ - 4 Stars</option>
                    <option value="3">⭐⭐⭐ - 3 Stars</option>
                    <option value="2">⭐⭐ - 2 Stars</option>
                    <option value="1">⭐ - 1 Star</option>
                </select>
        
                <label class="rev-label" for="comment">Comment:</label>
                <textarea class="rev-textarea" id="comment" name="comment" rows="4" placeholder="Write your review here..." required></textarea>
        
                <button type="submit" class="rev-submit-review">Submit Review</button>
            </form>
        </section>
        
        <section class="rev-review-container">
            <h1>Reviews for {{ $product_data->title }}</h1>
            <p class="rev-total-reviews">
                Total Reviews: {{ $totalReviews }}
            </p>

            <p class="rev-average-rating">
                Average Rating: {{ number_format($averageRating, 1) }} / 5.0
            </p>

            <a href="{{ url('dashboard')}}" class="rev-back-button">Go Back</a>
            
            @if ($product_review->reviews->count() > 0)
                <div class="rev-reviews-list">
                    @foreach ($product_review->reviews as $review)
                        <div class="rev-review">
                            <h3 class="rev-review-title">{{ $review->user->name }}</h3>
                            <p class="rev-review-text">Rating: {{ $review->rating }} / 5</p>
                            <p class="rev-review-text">{{ $review->comment }}</p>
                            <p class="rev-review-date">{{ $review->created_at->format('F d, Y') }}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <p>No reviews yet for this product.</p>
            @endif
        </section>
        
    <br><br><br>


    <script src="script.js"></script>
</div>
</body>
</html>
