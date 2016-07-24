@extends('layouts.app')

@section('content')
    @section('title','Registration')
    <div class="container">
        <div class="login-box">
            <div class="login-logo">
                <img src="/img/logo.png">
                <a href="#"><b>Optimus</b>PRIME</a>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">Registration</p>

                <form role="form" method="POST" action="{{ url('/register') }}">
                    {!! csrf_field() !!}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="form-group has-feedback">
                        <input type="name" placeholder="Your full name" class="form-control" name="name" value="{{ old('name') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>


                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Your email" name="email" value="{{ old('email') }}">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif

                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="form-group has-feedback">
                        <input placeholder="Your password" type="password" class="form-control" name="password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif

                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                        <div class="form-group has-feedback">
                        <input placeholder="Confirm password" type="password" class="form-control" name="password_confirmation">
                        <span class="glyphicon glyphicon-check form-control-feedback"></span>
                            </div>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif

                    </div>

                    <div class="row">

                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
