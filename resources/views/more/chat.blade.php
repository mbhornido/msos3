<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .chat-container {
    width: 100%;
    max-width: 600px;
    margin: auto;
}
.chat-messages {
    border: 1px solid #ccc; 
    padding: 10px;
    height: 400px;
    overflow-y: scroll;
    background-color: #f9f9f9;
}
.sent {
    text-align: right;
    color: blue;
}
.received {
    text-align: left;
    color: green;
}
textarea {
    width: 100%;
    height: 50px;
}

    </style>
</head>
<body>
    <div class="chat-container">
        <h2>Chat with {{ $admin->name }}</h2>
        <div class="chat-messages">
            @foreach($messages as $message)
                <div class="{{ $message->sender_id === Auth::id() ? 'sent' : 'received' }}">
                    <p>{{ $message->message }}</p>
                    <span>{{ $message->created_at->format('h:i A') }}</span>
                </div>
            @endforeach
        </div>
    
        <form method="POST" action="{{ url('messages_send', $admin->id) }}">
            @csrf
            <textarea name="message" placeholder="Type your message..." required></textarea>
            <button type="submit">Send</button>
        </form>
    </div>
</body>
</html>