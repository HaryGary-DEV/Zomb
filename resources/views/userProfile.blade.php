@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 home-box">
                <div class="card home-card">
                    @if(!empty($user))
                    <div
                        class="card-header p-3 mb-2 bg-success text-white AccountName">{{ __($user->name) .('`s account') }}
                    </div>
                    <div>
                        <div class="card-body">
                            <div class="wellCUM-text">
                                {{ __(('Welcome at profile page of ') . $user->name . (' chan ^-^'))}}
                            </div>
                            <div class="info-body">
                                {{ __(('Birthday: ') . $user->br_day)}}<br>
                                <a class="link-city" href="{{url('https://www.google.ru/maps/@'.$user->latitude. ','.$user->longitude.',16z')}}">{{ __(('City: ') . $user->city)}}</a><br>
                                {{ __(('Phone number: ') . ($user->phone_num) )}}<br>
                                {{ __(('E-mail: ') . ($user->email)) }}<br>
                                {{ __(('Status: ') . ($user->status)) }}
                            </div>
                        </div>
                    </div>

                    <div class="bonus-info-pos">
                        <textarea class="bonus-info" id="bonus-info" readonly
                                  placeholder="Some bonus info about {{$user->name}}">{{ __($user->bonus_info)}}</textarea>

                    </div>
                    <div class="linked-accounts">
                            <a class="linked-account-link" href="{{$user->steam}}">
                            <i class="fab fa-steam-square linked-accounts-icons"></i>
                            </a>
                            <a class="linked-account-link" href="{{$user->telegram}}">
                                <i class="fab fa-telegram linked-accounts-icons"></i>
                            </a>
                        <br>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
