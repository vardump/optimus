@extends('layouts.app')
@section('title', 'Login')
@section('content')

@endsection
<div class="login-box">
    <div class="login-logo">
        <img src="/img/logo.png">
        <a href="#"><b>Optimus</b>PRIME</a>
    </div>

    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form role="form" method="POST" action="{{ url('/login') }}">
            {!! csrf_field() !!}

            <div class="form-group has-feedback">
                <input type="email" placeholder="Your email" class="form-control" name="email" value="{{ old('email') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

            <div class="form-group has-feedback">
                <input type="password" placeholder="Password" class="form-control" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

            <div class="row">

                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <div class="col-xs-4">
                    <a href="/register" class="btn btn-primary btn-block btn-flat">Register</a>
                </div>
            </div>
        </form>
    </div>
</div>