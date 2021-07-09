@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card home-info">
                    <div
                        class="card-header p-3 mb-2 bg-success text-white AccountName">{{ __((auth()->user())->name) .(' settings') }}</div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control form-input-custom @error('name') is-invalid @enderror" name="name" value="{{ (auth()->user())->name }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone num') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="text" class="form-control form-input-custom @error('name') is-invalid @enderror" name="name" maxlength="13" value="{{ (auth()->user())->phone_num }}" required autocomplete="name" autofocus placeholder="+380123456789">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                        <div class="col-md-6">
                            <input readonly id="address" type="text" class="form-control form-input-custom @error('name') is-invalid @enderror" name="name" value="{{ (auth()->user())->city }}" required autocomplete="name" autofocus placeholder="where are you">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control form-input-custom @error('email') is-invalid @enderror" name="email" value="{{ (auth()->user())->email }}" required autocomplete="email" placeholder="example@mail.com">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>

                        <div class="col-md-6">
                            <input type="date" class="form-control date-br form-input-custom" id="date" name="trip-start" value="{{ (auth()->user())->br_day  }}" min="2000-00-00" max="2021-12-31">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link forgot-password" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    <button type="button" class="btn btn-outline-success accept-about" onclick="saveEdit({{((auth()->user())->id)}})">Apply chenges</button>
                </div>
            </div>
        </div>
    </div>
@endsection
