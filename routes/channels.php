<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// Define a private channel for chat between users
Broadcast::channel('chat.{receiverId}', function ($user, $receiverId) {
    // Allow access if the authenticated user is either the sender or receiver
    return (int) $user->id === (int) $receiverId;
});
