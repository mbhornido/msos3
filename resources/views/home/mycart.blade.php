<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSOS | SHOP</title>
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
    <link rel="stylesheet" href="{{asset ('css/css_file.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="container">



        <header class="back_header">
            <a href="{{ url('dashboard') }}"><i class="fa-solid fa-arrow-left"></i></a>
           
                <a href="{{url('mycart')}}" class="icon1"><i class="fa-solid fa-cart-shopping"></i><span>{{$count}}</span></a>
        </header>
    
     
    @include('includers.user_header')

    <div class="cart-header">
        <span>Product</span>
        <span>Unit Price</span>
        <span>Quantity</span>
        <span>Total Price</span>
        <span>Actions</span>
    </div>

    <div class="cart-container">
   
    @if($cart->count() > 0)
        <form id="cart-form" action="{{ url('checkout') }}" method="GET">

            @foreach($cart as $item)
            <div class="cart_check">
                <div class="cart_owner">
                    <i class="fa-solid fa-shop"></i>
                    <a href="">Owner: {{ $item->product->owner->shop_name ?? 'N/A' }}</a>
                    <hr>
                </div>
                <div class="cart-item">
                    @php
                        // Decode the JSON string in the 'image' column
                        $productImages = json_decode($item->product->image, true); // Decode as an associative array
                        $firstImage = !empty($productImages) ? $productImages[0] : 'default.png'; // Fallback to default image
                    @endphp

                    <input type="checkbox" class="cart-item-checkbox" name="cart_items[]" value="{{ $item->id }}" data-price="{{ $item->price }}">
                    <img src="{{ asset('products/' . $firstImage) }}" alt="Product Image" class="product-img">
                    <div class="product-details">
                        <h4>{{ $item->product->title }}</h4>
                        <p>Variation: {{ $item->size }}</p>
                    </div>
                    <div class="cart_details">
                        <div class="unit-price">
                            <span class="d_hide">Price: </span>₱{{ number_format($item->price / $item->quantity, 2) }}
                        </div>
                        <div class="quantity">
                            <span class="d_hide">QTY: </span>{{ $item->quantity }} pc's.
                        </div>
                        <div class="total-price">
                            <span class="d_hide">Total: </span>₱{{ number_format($item->price, 2) }}
                        </div>
                        <div class="actions">
                            <a href="{{ url('product_details/' . $item->product->id) }}"><i class="fa-regular fa-eye"></i></a>
                            <button type="button" class="remove-btn" data-id="{{ $item->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

            <div class="cart-footer">
            <div class="check">
            <label><input type="checkbox"> Select All</label>
            </div>
                <div class="total">
                    <p><span id="total-item">Total (0 item):</span> <span id="cart-total">₱0</span></p>
                    <button type="submit" disabled id="checkout-btn" class="checkout">Checkout</button>

                </div>
            </div>
        </form>

        @else
        <div class="empty_cart">
            <img src="{{asset('images/cry.png')}}" alt="">
            <p>Your cart is empty.</p>
        </div>
        @endif

        <br><br>
        
    </div>


    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    $(document).ready(function() {
        let total = 0;
        let selectedCount = 0;

        // Function to update total amount and selected items count
        function updateTotalAndCount() {
            total = 0;
            selectedCount = 0;

            // Calculate total price and count of selected items
            $('.cart-item-checkbox:checked').each(function() {
                total += parseFloat($(this).data('price'));
                selectedCount++;
            });

            // Update total price and item count display
            $('#cart-total').text(`₱${total.toFixed(2)}`);
            $('#total-item').text(`Total (${selectedCount} item${selectedCount !== 1 ? 's' : ''}):`);

            // Enable/disable checkout button based on selection
            $('#checkout-btn').prop('disabled', selectedCount === 0);
        }

        // Handle individual checkbox change
        $('.cart-item-checkbox').change(function() {
            updateTotalAndCount();

            // Check/uncheck "Select All" based on whether all items are selected
            const allChecked = $('.cart-item-checkbox').length === $('.cart-item-checkbox:checked').length;
            $('.check input[type="checkbox"]').prop('checked', allChecked);
        });

        // Handle "Select All" checkbox functionality
        $('.check input[type="checkbox"]').change(function() {
            const isChecked = $(this).is(':checked');
            $('.cart-item-checkbox').prop('checked', isChecked); // Select/deselect all items
            updateTotalAndCount();
        });

        // Handle remove button click
        $('.remove-btn').click(function() {
            const itemId = $(this).data('id');

            if (confirm('Are you sure you want to remove this item?')) {
                $.ajax({
                    url: '/cart/remove/' + itemId,
                    type: 'DELETE',
                    data: { _token: '{{ csrf_token() }}' },
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>


</div>
</body>
</html>
