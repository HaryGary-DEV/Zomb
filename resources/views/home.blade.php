@extends('layouts.app')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card home-info">
                    <div
                        class="card-header p-3 mb-2 bg-success text-white AccountName">{{ __((auth()->user())->name) .('`s account') }}</div>


                    <div >
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ __(('Welcome home! ') . (auth()->user())->name) . (    ' chan ^-^')}}
                        </div>
                    </div>
                    <div class="bonus-info-pos">
                        <textarea class="bonus-info" id="bonus-info"
                                  placeholder="Write some text about you...">{{ __((auth()->user())->bonus_info)}}</textarea>

                        <button type="button" class="btn btn-outline-success accept-about" onclick="saveBonusInfo({{((auth()->user())->id)}})">Apply chenges</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
