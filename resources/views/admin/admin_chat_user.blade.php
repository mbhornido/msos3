<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>MSOS ADMIN Chat</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css_admin/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css_admin/style.css') }}">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        /* Basic chat styles */
        .admin_chat_main {
            display: flex;
            height: 90vh;
            background-color: #f0f0f0;
        }

        .chat_container {
            width: 25%;
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            overflow-y: auto;
        }

        .chat_message {
            flex-grow: 1;
            background-color: white;
            padding: 20px;
            overflow-y: auto;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .chat_message form {
            display: flex;
            margin-top: 10px;
        }

        .chat_message input[type="text"] {
            flex-grow: 1;
            margin-right: 10px;
        }

        .message {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
        }

        .sender {
            background-color: #d1ecf1;
            text-align: right;
        }

        .receiver {
            background-color: #f8d7da;
        }
    </style>
</head>
<body>

@include('includes.admin_header')

<div class="page-wrapper">
    <main class="admin_chat_main">
        <!-- User List Sidebar -->
        <div class="chat_container">
            <h1>Dashboard</h1>
            <h2>Users</h2>
            <!-- User list can be dynamically generated here -->
        </div>

        <!-- Chat Message Area -->
        <div class="chat_message">
            <div id="chat-messages">
                @foreach($chats as $chat)
                    <div class="message {{ $chat->sender_id === auth()->id() ? 'sender' : 'receiver' }}">
                        <strong>{{ $chat->sender->name }}:</strong> {{ $chat->message }}
                        <br>
                        <small>{{ $chat->created_at->format('M d, Y h:i A') }}</small>
                    </div>
                @endforeach
            </div>

            <!-- Message form -->
            <form id="chat-form">
                @csrf
                <input type="text" id="chat-message" name="message" placeholder="Type a message..." required>
                <button type="submit">Send</button>
            </form>
        </div>
    </main>
</div>

<!-- JavaScript -->
<script>
    $(document).ready(function () {
        const userId = {{ auth()->id() }};
        const userEndpoint = '{{ $user->id }}'; // Ensure this is available in the Blade context

        // Function to fetch messages
        function fetchMessages() {
            $.ajax({
                url: `/admin_get/${userEndpoint}/messages`, // Updated endpoint
                method: 'GET',
                success: function (data) {
                    $('#chat-messages').empty();
                    data.forEach(chat => {
                        const messageClass = chat.sender_id == userId ? 'sender' : 'receiver';
                        $('#chat-messages').append(`
                            <div class="message ${messageClass}">
                                <strong>${chat.sender.name}:</strong> ${chat.message}
                                <br>
                                <small>${formatDate(chat.created_at)}</small>
                            </div>
                        `);
                    });
                },
                error: function (error) {
                    console.error('Error fetching messages:', error);
                }
            });
        }

        // Handle message form submission
        $('#chat-form').on('submit', function (e) {
            e.preventDefault();
            const message = $('#chat-message').val();

            $.ajax({
                url: `/admin_store/${userEndpoint}`, // Updated endpoint
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                data: { message },
                success: function () {
                    $('#chat-message').val(''); // Clear input
                    fetchMessages(); // Refresh chat messages
                },
                error: function (error) {
                    console.error('Error sending message:', error);
                }
            });
        });

        // Function to format the date
        function formatDate(dateString) {
            return new Date(dateString).toLocaleString('en-US', {
                year: 'numeric', month: 'short', day: '2-digit',
                hour: '2-digit', minute: '2-digit', hour12: true
            });
        }

        // Initial fetch and periodic refresh
        fetchMessages();
        setInterval(fetchMessages, 3000); // Fetch new messages every 3 seconds
    });
</script>

</body>
</html>
