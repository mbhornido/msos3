<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department; // Correct import for Department 
use App\Models\Cart;
use App\Models\Scategory;

class ChatController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('chat.dashboard', compact('users'));
    }


    public function show(User $user)
    {
        $scategory = Scategory::all(); 

        if (Auth::check()) {
            $users = Auth::user();
            $userid = $users->id;
            $department = Department::all();

    
            // Fetch cart items for the logged-in user and load product and owner
            $cart = Cart::where('user_id', $userid)->with(['product', 'product.owner'])->get();
    
            // Count the number of items in the cart
            $count = $cart->count();
        } else {
            $cart = collect();
            $count = 0;
        }


        $chats = Chat::where(function ($query) use ($user) {
            $query->where('sender_id', auth()->id())->where('receiver_id', $user->id);
        })->orWhere(function ($query) use ($user) {
            $query->where('sender_id', $user->id)->where('receiver_id', auth()->id());
        })->with('sender', 'receiver')->latest()->get();

        return view('chat.chat', compact('chats', 'user','scategory','count'));
    }

    public function store(Request $request, User $user)
    {
        $request->validate(['message' => 'required|string']);
        Chat::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $user->id, 
            'message' => $request->message,
        ]);

        return response()->json(['success' => true]);
    }

    public function getMessages(User $user)
    {
        $chats = Chat::where(function ($query) use ($user) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $user->id);
        })->orWhere(function ($query) use ($user) {
            $query->where('sender_id', $user->id)
                ->where('receiver_id', auth()->id());
        })->with('sender', 'receiver')->latest()->get();

        return response()->json($chats);
    }



}
