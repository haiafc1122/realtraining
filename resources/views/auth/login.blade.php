@extends('layouts.app')

@section('add_css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<div id="login-block" class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                @if (session('activeWarning'))
                    <div class="alert alert-warning">
                        {{ session('activeWarning') }}
                    </div>
                @endif

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input placeholder="メールを入力" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input placeholder="パスワードを入力" id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      {{--  <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="g-recaptcha" data-sitekey="6LcLzDgUAAAAAAmjSNrabR63TsJlSXUDivy9i2mU"></div>
                            </div>
                        </div>--}}
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <p>
                                        <input id="remember" type="checkbox" class="filled-in" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember" >次回から自動的にログイン</label>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{--@section('bottom_js')
    <script src='https://www.google.com/recaptcha/api.js?hl=ja'></script>
@endsection--}}

