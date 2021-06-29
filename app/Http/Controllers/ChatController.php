<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Events\PrivateChat;

class ChatController extends Controller
{
    public function messages(Request $request)
    {
        $room = Room::find($request->input('room_id'));
        $room->messages .= $request->input('body') ."\n";
        $room->save();
        PrivateChat::dispatch($request->all());
    }

    public function chatList()
    {
        $room = Room::get();

        return view('chatList', ['rooms' => $room]);
    }


    public function chat($room_id)
    {
        $room = Room::find($room_id);
        return view('chat', ['room' => $room]);
    }

    public function startChat(Request $request)
    {
        $userFirst = User::find($request['userId']);
        $userSecond = User::find($request['currentUserId']);
            $newRoom = Room::create();
            $newRoom->rooms->first_user_name = $userFirst['name'];
            $newRoom->rooms->second_user_name = $userSecond['name'];
            $newRoom->save();
            $userFirst->rooms()->attach($newRoom['id']);
            $userSecond->rooms()->attach($newRoom['id']);
        return json_encode(['user1' => $userFirst, 'user2' => $userSecond]);
    }
}
