@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card  chat-card">
                    <div
                        class="card-header p-3 mb-2 bg-success text-white AccountName">{{ __('Public chat') }}
                    </div>
                    @foreach ($rooms as $room)
                        <tr>
                            {{$room->id,   $room->first_user_name}}<br>
                        </tr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
