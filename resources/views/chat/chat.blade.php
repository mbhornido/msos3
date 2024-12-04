<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat with {{ $user->shop_name }}</title>
  <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
  <link rel="stylesheet" href="{{asset('css/css_file.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>

.chat-container {
    display: flex;
    justify-content: space-between;
    width: 100%;
    max-width: 1400px;
    height: 80vh;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
    gap: 2rem;
    
}

.shop-info {
    width: 25%;
    background: #fff;
    padding: 20px;
    text-align: center;
    border-right: 1px solid #ddd;
}

.shop-info h2 {
    margin: 0;
    font-size: 1.5em;
    color: #333;
}

.chat-messages-container {
    background: white;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

#chat-messages {
    padding: 20px;
    overflow-y: auto;
    display: flex;
    flex-direction: column-reverse; /* Ensures descending order */
}

button[type="submit"] {
    background: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 20px;
    cursor: pointer;
    outline: none;
    width: fit-content; /* Button adjusts to text width */
    white-space: nowrap; /* Prevent wrapping of button text */
}

button[type="submit"]:hover {
    background: #0056b3;
}


.message {
    margin: 10px 0;
    padding: 10px 15px;
    border-radius: 20px;
    word-wrap: break-word;
}

.message.sender {
    background: #d1f7c4;
    align-self: flex-end;
    text-align: right;
}

.message.receiver {
    background: #f1f1f1;
    align-self: flex-start;
}

.message-content strong {
    display: block;
    margin-bottom: 5px;
}

#chat-form {
    display: flex;
    border-top: 1px solid #ddd;
    padding: 10px 20px;
}

#chat-message {
    flex-grow: 1;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 20px;
    margin-right: 10px;
    outline: none;
}

#chat-message:focus {
    border-color: #007bff;
}

.chat_data{
    display: flex;
    gap: .5rem;
}

.chat_data img{
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
    object-position: center;
    box-shadow: 0px 0px 5px black;
}

.chat_data h2{
    font-size: 1.2rem;
}


@media (max-width: 480px) {
    body{
        background: white;
    }

    .shop-info{
        display: none;
    }
    .chat-container{
        height: 93vh;
        border-radius: 0;
    }

    #chat-form {
        display: flex;
        border: none;
        padding: 10px 20px;
    }
}
  </style>
  
</head>
<body>

    <div class="container">

        @if(auth()->user()->usertype !== 'admin')
            <header class="back_header">
                <a href="{{ url('view_seller_profile', $user->id) }}"><i class="fa-solid fa-arrow-left"></i></a>
                <a href="{{ url('mycart') }}" class="icon1">
                    <i class="fa-solid fa-cart-shopping"></i><span>{{ $count }}</span>
                </a>
            </header>
            
            @include('includers.user_header')
        @endif

            <div class="d_hide">
                <br><br>
            </div>


            
            <div class="chat-container">
                <div class="shop-info">

                    <div class="chat_data">
                        <img src="{{ asset('logo/' . $user->logo) }}"  alt="">

                        <div class="chat_data_more">
                            <h2>{{ $user->shop_name }}</h2>
                            <p>{{ $user->college }}</p>
                        </div>
                    </div>
                    <br>
                    <hr>
                    
                </div>

                <div class="chat-messages-container">
                    <div id="chat-messages">
                        @foreach($chats as $chat)
                            <div class="message {{ $chat->sender_id === auth()->id() ? 'sender' : 'receiver' }}">
                                <div class="message-content">
                                    <strong>{{ $chat->sender->name }}:</strong> {{ $chat->message }}
                                    <br>
                                    <p>{{ $chat->created_at->format('M d, Y h:i A') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <form id="chat-form">
                        @csrf
                        <input type="text" name="message" id="chat-message" placeholder="Type a message..." required>
                        <button type="submit">Send</button>
                    </form>
                </div>
            </div>
            
            
    </div>

<script>
$(document).ready(function () {
    const userId = {{ auth()->id() }};

    // Submit message via AJAX
    $('#chat-form').on('submit', function (e) {
        e.preventDefault();
        const message = $('#chat-message').val();

        $.ajax({
            url: '{{ route('chat.store', $user->id) }}',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: { message },
            success: function () {
                $('#chat-message').val('');
                fetchMessages();
            }
        });
    });

    // Function to fetch new messages
   // Function to fetch new messages
function fetchMessages() {
    $.ajax({
        url: '{{ route('chat.show', $user->id) }}',
        method: 'GET',
        success: function (data) {
            $('#chat-messages').html('');
            data.forEach(chat => {
                const messageClass = chat.sender_id === userId ? 'sender' : 'receiver';
                $('#chat-messages').append(`
                    <div class="message ${messageClass}">
                        <strong>${chat.sender.name}:</strong> ${chat.message}
                        <br>
                        <p>${formatDate(chat.created_at)}</p>
                    </div>
                `);
            });
        }
    });
}

// Function to format the date
function formatDate(dateString) {
    const options = {
        year: 'numeric',
        month: 'short',
        day: '2-digit',
        hour: '2-digit',
        minute: '2-digit',
        hour12: true
    };
    return new Date(dateString).toLocaleDateString('en-US', options);
}


    // Poll new messages every 3 seconds
    setInterval(fetchMessages, 3000);
});
</script>
</body>
</html>

