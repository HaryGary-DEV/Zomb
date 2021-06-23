@extends('layouts.app')
@section('content')
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    {{--                <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>--}}
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">{{__('Log in')}}</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">{{__('Register')}}</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="order-zone">
            <select class="order-by" name="order-by" id="order-by">
                <option value="id">Id</option>
                <option value="name">Name</option>
                <option value="br_day">Birthday</option>
                <option value="email">E-mail</option>
                <option value="Address">Address</option>
                <option value="status">Status</option>
            </select>
            <select class="order-type" name="order-type" id="order-type">
                <option value="asc">Increase</option>
                <option value="desc">Decreases</option>
            </select>
            <button type="button" class="btn btn-outline-success " onclick="orderUsers()">
                Apply changes
            </button>
        </div>

        <div class="table-show">
            <table id="table" class="tableBd">
                <tr class="column-name">
                    <th>name</th>
                    <th>email</th>
                    <th>address</th>
                    <th>phone number</th>
                    <th>birthday</th>
                    <th>status</th>
                    <th>actions</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td class="personalInfoFirstname tables-first" id="'a' +{{$user->id}}" contenteditable="false"
                            type="none">{{$user->name}}</td>
                        <td class="personalInfoLastname tables" id="'b' +{{$user->id}}" contenteditable="false"
                            type="none">{{$user->email}}</td>
                        <td class="personalInfoBirthday tables" id="'c' +{{$user->id}}" contenteditable="false"
                            type="none">{{$user->Address}}</td>
                        <td class="personalInfoAddress tables" id="'d' +{{$user->id}}" contenteditable="false"
                            type="none">{{$user->phone_num}}</td>
                        <td class="personalInfoOther tables" id="'e' +{{$user->id}}" contenteditable="false"
                            type="none">{{$user->br_day}}</td>
                        <td class="personalInfoOther table-finish" value="{{$user->status}}" id="user-status{{$user->id}}" contenteditable="false"
                            type="none">
                            @if($user->status === \App\Models\User::ALIVE_STATUS)
                                <i class="fas fa-heart"></i>
                            @else
                                <i class="fas fa-skull"></i>
                            @endif
                        </td>
                        <td class="personalInfoOther table-finish">
                            <button class="btn btn-color" onclick="changeUserStatus({{$user->id}})">Change status</button>
                            <button class="btn btn-color" onclick="sendMessage({{$user->id}})"><i class="fas fa-envelope"></i></button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>

@endsection
