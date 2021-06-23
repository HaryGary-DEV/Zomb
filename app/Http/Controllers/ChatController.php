<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\PublicChat;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Events\Message;

class ChatController extends Controller
{
    public function messages(Request $request)
    {
        Message::dispatch($request->input('body'));
    }

    public function chat(Request $request)
    {
        return view('chat');
    }
}
