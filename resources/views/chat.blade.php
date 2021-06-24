@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card  chat-card">
                    <div
                        class="card-header p-3 mb-2 bg-success text-white AccountName">{{ __('Public chat') }}
                    </div>
                    <private-chat></private-chat>
                </div>
            </div>
        </div>
    </div>
@endsection
