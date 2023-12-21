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
                    @include('auth.login')

            </div>
        </div>
    </div>
</div>
@endsection
