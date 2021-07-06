<?php

namespace App\Http\Controllers;

use App\Models\RoomUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Messages;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Events\PrivateChat;

class ChatController extends Controller
{
    public function messages(Request $request)
    {
        $room = Room::find($request->input('room_id'));
        $messages = new Messages();
        $messages->room_id = $room->id;
        $messages->user_id = (auth()->user())->id;
        $messages->messages = $request->input('body');
        $messages->save();
        PrivateChat::dispatch($request->all());
    }

    public function allMessages(Request $request)
    {
        $room = Room::find($request->input('room_id'));
        $messages = $room->messages;
        foreach ($messages as $mes) {
            $mes['user_name'] = User::find($mes['user_id'])->name;
        }
        return $messages;
    }

    public function chatList($roomId)
    {
        return view('chatList', $this->generateUserList($roomId));
    }

    public function allChatsList()
    {
        return view('allChatList', $this->generateUserList());
    }

    public function startChat(Request $request)
    {
        $userFirst = User::find($request['currentUserId']);
        $userSecond = User::find($request['userId']);
        $first = $userFirst->rooms->pluck('room_id');
        $second = $userSecond->rooms->pluck('room_id');
        $count = false;
        if ($first == null || $second == null) {
            $newRoom = Room::create();
            $newRoom->save();
            $this->createNewUser($newRoom, $userFirst);
            $this->createNewUser($newRoom, $userSecond);
        } else {
            for ($i = 0; $i < count($second); $i++) {
                if ($first->contains($second[$i])) {
                    $count = true;
                    break;
                }
            }
            if (!$count) {
                $newRoom = Room::create();
                $newRoom->save();
                $this->createNewUser($newRoom, $userFirst);
                $this->createNewUser($newRoom, $userSecond);
            }
        }
        return json_encode(['user1' => $userFirst, 'user2' => $userSecond]);
    }

    function createNewUser($newRoom, $user)
    {
        $roomUser = new RoomUser();
        $roomUser->room_id = $newRoom->id;
        $roomUser->user_id = $user->id;
        $roomUser->save();
    }

    function generateUserList ($roomId = null)
    {
        $room = Room::find($roomId);
        $roomList[] = auth()
            ->user()
            ->rooms;
        for ($i = 0; $i < count($roomList[0]); $i++) {
            $allRooms[] = RoomUser::where('room_id', $roomList[0][$i]['room_id'])->get();
        }

        if (count($roomList[0]) !== 0) {
            for ($i = 0; $i < count($allRooms); $i++) {
                if ($allRooms[$i][1]['user_id'] == (auth()->user())->id) {
                    $secondUsers[] = User::where('id', $allRooms[$i][0]['user_id'])->get();
                } elseif (isset($allRooms[$i][0]['user_id']) == (auth()->user())->id) {
                    $secondUsers[] = User::where('id', $allRooms[$i][1]['user_id'])->get();
                }
            }
            return (['room' => $room, 'roomList' => $secondUsers]);
        }
        return (['room' => $room, 'roomList' => $roomList]);
    }
}
