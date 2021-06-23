<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public  function settings()
    {
        return view('settings');
    }

    public function welcome($order = 'id', $sortType = 'asc')
    {
        $users = User::orderBy($order, $sortType)->get();
        return view('welcome', ['users' => $users]);
    }

    public function save(Request $request)
    {
        $id = $request->input('id');
        $result = User::updateById($id, array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'Address' => $request->input('address'),
            'br_day' => $request->input('date'),
            'phone_num' => $request->input('phone'),
        ));
        return view('settings', ['users' => $result]);
    }

    public function about(Request $request)
    {
        $about = $request->input('info');
        $id = $request->input('id');
        $result = User::updateById($id, array(
            'bonus_info' => $about,
            'id' => $id,
        ));
        return view('settings', ['users' => $result]);
    }

    public function changeUserStatus(Request $request)
    {
        $userId = $request->input('id');
        $userStatus = $request->input('status');
        $user = User::find($userId);
        $user->status = $userStatus;
        $user->save();
        return json_encode(['message' => $userStatus]);
    }
}
