<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\PublicChat;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Events\PrivateChat;

class ChatController extends Controller
{
    public function messages(Request $request)
    {
        if((auth()->user())->id === $request['room_id']) {
            PrivateChat::dispatch($request->all());
        }
    }

    public function chat(Request $request)
    {
        return view('chat');
    }
}
