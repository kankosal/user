@extends('admin_user::layouts.auth')

@section('page_title', __('Login'))

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Login</b></a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                @if (count($errors) > 0)
                    <div class="system-message-container">
                        <div id="system-message" class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{!! $error !!}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="system-message-container">
                        <div class="alert bg-danger" role="alert">
                            {!! session('error') !!}
                        </div>
                    </div>
                @else
                    <p class="login-box-msg">Sign in to start your session</p>
                @endif
                {{ Form::open(['url' => route('admin.login'), 'method' => 'POST']) }}

                <div class="input-group mb-3">
                    {{ Form::email('email', '', ['class' => 'form-control', 'id' => 'email', 'placeholder' => __('Email'), 'required' => true]) }}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    {{ Form::input('password', 'password', '', ['class' => 'form-control', 'id' => 'password', 'placeholder' => __('Password'), 'required' => true]) }}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>

                </div>
                {{ Form::close() }}
                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div>

                <p class="mb-1">
                    <a href="#">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="#" class="text-center">Register a new membership</a>
                </p>
            </div>

        </div>
    </div>
@endsection
