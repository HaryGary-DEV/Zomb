@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card  chat-card">
                    <div
                        class="card-header p-3 mb-2 bg-success text-white AccountName">{{ __('All chat`s') }}
                    </div>
                    @if (!empty($roomList))
                        @auth
                            <div class="row chat-card-inner">
                                <div class="user-list-chat">
                                    <table>
                                        @foreach ($roomList as $key=>$rl)
                                            <tr>
                                                <td class="chat-button-{{auth()->user()->rooms[$key]->room_id}}">
                                                    <button class="btn btn-color btn-chat" id="btn-chat"
                                                            value="{{$rl[0]->name}}"
                                                            onclick="goToChat({{auth()->user()->rooms[$key]->room_id}})"
                                                    >{{$rl[0]->name}}</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        @endauth
                    @else
                        <div class="chat-dont-created">
                            You haven't created any chat yet
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
