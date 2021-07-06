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

    public  function setIp (Request $request)
    {
        $result = file_get_contents('http://api.ipapi.com/' .$request->input('ip') .'?access_key=608be249c170a6cdbcb7a69cbf44bd1b&output=json');
        $json_object = json_decode($result);
        $user = User::find((auth()->user())->id);
        $user->longitude = $json_object->longitude;
        $user->longitude = $json_object->longitude;
        $user->city = $json_object->city;
        $user->save();

        return response()->json($user);
    }

    public function save(Request $request)
    {
        $result = file_get_contents('http://api.ipapi.com/' .$request->input('ip') .'?access_key=608be249c170a6cdbcb7a69cbf44bd1b&output=json');
        $locationInfo = json_decode($result);
        $longitude = $locationInfo->longitude;
        $latitude = $locationInfo->latitude;
        $user = User::find($request->input('id'));
        $user->name = $request->input('name');
        $user->phone_num = $request->input('phone');
        $user->city = $locationInfo->city;
        $user->email = $request->input('email');
        $user->br_day = $request->input('date');
        $user->longitude = $longitude;
        $user->latitude = $latitude;
        $user->save();

        return response()->json($user);
    }

    public function about(Request $request)
    {
        $about = $request->input('info');
        $user = User::find($request->input('id'));
        $user->bonus_info = $about;
        $user->save();
        return view('settings');
    }

    public function changeUserStatus(Request $request)
    {
        $userId = $request->input('id');//тут писал остальное переделать
        $userStatus = $request->input('status');
        $user = User::find($userId);
        $user->status = $userStatus;
        $user->save();
        return json_encode(['message' => $userStatus]);
    }
}
