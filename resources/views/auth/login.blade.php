@extends('layouts.login')

@section('style')
    <style>

    </style>
@endsection

@section('content')

    <body class="login_body">
        <div class="container-fluid p-0">

            <div class="overlay">
                <div class="card-primary">
                </div>
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="container">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">حول الموقع</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">الرؤية</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">الرسالة</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">الأهداف</a>
                                </li>
                            </ul>
                        </div>
                        <div class="navbar-nav">
                            <a class="nav-link" href="#"><i class="fas fa-globe"></i></a>
                        </div>
                        <div class="img-fluid logo_system"><img src="{{ Vite::image('Group 912.png') }}" width="40%">
                        </div>
                    </div>
                </nav>
                <div class="content login" style="background: no-repeat;">
                    <form class="login-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control input_userInfo" placeholder="الإيميل...."
                                @if ($errors->has('email') || $errors->has('username')) is-invalid @endif" name="username"
                                value="{{ old('email') ?: old('username') }}" required autocomplete="username" autofocus>
                            @if ($errors->has('email') || $errors->has('username'))
                                <strong>
                                    {{ $errors->first('email') ?: $errors->first('username') }}
                                </strong>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control input_userInfo" placeholder="كلمة المرور...."
                                name="password" required autocomplete="current-password">
                        </div>
                        <div>تذكرني <input type="checkbox" class="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}></div>
                        <button type="submit" class="btn btn-primary btn-block btn_login">تسجيل دخول</button>
                    </form>
                </div>
            </div>
        </div>

    </body>
@endsection
