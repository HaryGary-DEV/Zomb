<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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

    public function welcome()
    {
        $users = User::get();
        return view('welcome', ['users' => $users]);
    }

    public function save()
    {
        $name = $_GET['name'];
        $email = $_GET['email'];
        $address = $_GET['address'];
        $br_day = $_GET['date'];
        $phone = $_GET['phone'];
        $id = $_GET['id'];

        $result = DB::update ('UPDATE users SET name = ?, email = ?, Address = ?,
    br_day = ?, phone_num = ? where id = ?', [$name, $email, $address, $br_day, $phone, $id]);
        return view('settings', ['users' => $result]);
    }

    public function about()
    {
        $about = $_GET['info'];
        $id = $_GET['id'];
        $result = DB::update ('UPDATE users SET bonus_info = ? WHERE id = ? ', [$about, $id]);
        return view('settings', ['users' => $result]);
    }
}
