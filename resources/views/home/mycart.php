<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSOS | SHOP</title>
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    @include('components.header')

    <div class="center_container">
        <h1>Your Cart</h1>

        @if($cart->count() > 0)
        <form id="cart-form" action="{{ url('checkout') }}" method="GET">
            <table class="cart-table">
                <thead>
                    <tr> 
                        <th>Select</th>
                        <th>Owner</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr> 
                </thead>
                <tbody>
                    @foreach($cart as $item)
                    <tr>
                        <td>
                            <input type="checkbox" class="cart-item-checkbox" name="cart_items[]" value="{{ $item->id }}" data-price="{{ $item->price }}">
                        </td>
                        <td>
                            <p>Owner: {{ $item->product->owner->shop_name ?? 'N/A' }}</p>
                            <img src="{{ asset('logo/' . $item->product->owner->logo) }}" alt=" {{ $item->product->owner->shop_name }}" width="100px">
                        </td>
                        <td>
                            <img src="/products/{{ $item->product->image }}" alt="{{ $item->product->title }}" style="width:100px;">
                            <p>{{ $item->product->title }}</p>
                        </td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->size }}</td>
                        <td class="price">₱{{ number_format($item->price / $item->quantity, 2) }}</td>
                        <td class="price">₱{{ number_format($item->price, 2) }}</td>
                        <td>
                            <button type="button" class="remove-btn" data-id="{{ $item->id }}">Remove</button>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>

            <div class="cart-total">
                <h3>Total: ₱<span id="cart-total">0.00</span></h3>
                <button type="submit" disabled id="checkout-btn">Proceed to Checkout</button>
            </div>
        </form>
        @else
        <p>Your cart is empty.</p>
        @endif
    </div>

    <script>
        $(document).ready(function() {
            let total = 0;

            // Update total when checkboxes are clicked
            $('.cart-item-checkbox').change(function() {
                total = 0;

                // Sum the selected items' prices
                $('.cart-item-checkbox:checked').each(function() {
                    total += parseFloat($(this).data('price'));
                });

                // Update the total display
                $('#cart-total').text(total.toFixed(2));

                // Enable/disable checkout button
                $('#checkout-btn').prop('disabled', total === 0);
            });

            // Handle remove button click
            $('.remove-btn').click(function() {
                const itemId = $(this).data('id');

                // Confirm removal
                if (confirm('Are you sure you want to remove this item?')) {
                    // Perform AJAX request to remove the item from the cart
                    $.ajax({
                        url: '/cart/remove/' + itemId,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // Optionally, refresh the page or update the cart
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
</body>
</html>
