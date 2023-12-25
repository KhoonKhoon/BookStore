@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="sms" />
    <meta name="author" content="tms" />
    <title>Login - BookStore</title>
    <link href="{{ asset('login.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" crossorigin="anonymous"></script>
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="wrapper">
                <div class="h4 text-center m-4 name">
                    Book Store
                </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2"></div>
                            <div class="col-md-8 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-2"></div>
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn px-3">
                                    {{ __('Login') }}
                                </button>

                                {{-- @if (Route::has('password.request'))
                                    <a class="" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row mb-0 mt-2">
                            <div class="col-md-2"></div>
                            <div class="col-md-8 offset-md-4">
                                <a href="{{ route('register')}}" class="reglink text-secondary text-decoration-underline">
                                    {{ __('Register') }}
                                </a>

                                {{-- @if (Route::has('password.request'))
                                    <a class="" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    @if(isset($error))
        <div class="alert alert-danger float-end">
            {{ $error }}
        </div>
    @endif
</div>
@endsection
