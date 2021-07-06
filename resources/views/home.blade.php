@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 home-box">
                <div class="card home-card">
                    <div
                        class="card-header p-3 mb-2 bg-success text-white AccountName">{{ __((auth()->user())->name) .('`s account') }}
                    </div>
                    <div>
                        <div class="card-body">
                            <div class="wellCUM-text">
                                {{ __(('Welcome home! ') . (auth()->user())->name) . (    ' chan ^-^')}}
                            </div>
                            <div class="info-body">
                                {{ __(('Birthday: ') . (auth()->user())->br_day) }}<br>
                                <a class="link-city" href="{{url('https://www.google.ru/maps/@'.(auth()->user())->latitude. ','.(auth()->user())->longitude.',16z')}}">{{ __(('City: ') . (auth()->user())->city)}}</a><br>
                                {{ __(('Phone number: ') . (auth()->user())->phone_num) }}<br>
                                {{ __(('E-mail: ') . (auth()->user())->email) }}<br>
                                {{ __(('Status: ') . (auth()->user())->status) }}
                            </div>
                        </div>
                    </div>

                    <div class="bonus-info-pos">
                        <textarea class="bonus-info" id="bonus-info"
                                  placeholder="Write some text about you...">{{ __((auth()->user())->bonus_info)}}</textarea>

                    </div>
                    <button type="button" class="btn btn-outline-success accept-about"
                            onclick="saveBonusInfo({{((auth()->user())->id)}})">Apply chenges
                    </button>

                </div>
            </div>
        </div>
    </div>
@endsection
