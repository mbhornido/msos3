@extends('layouts.app')

@section('content')
<div id="chat-container">
    <div id="chat-messages">
        @foreach($chats as $chat)
            <p><strong>{{ $chat->user->name }}:</strong> {{ $chat->message }}</p>
        @endforeach
    </div>
    <form id="chat-form">
        @csrf
        <input type="text" name="message" id="chat-message" placeholder="Type a message..." required>
        <button type="submit">Send</button>
    </form>
</div>
<script>
document.getElementById('chat-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const message = document.getElementById('chat-message').value;
    fetch('{{ route('chat.store') }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ message }),
    }).then(() => {
        location.reload();
    });
});
</script>
@endsection
