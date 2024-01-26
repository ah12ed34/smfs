<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <title>@yield('title',"CS")</title>
        @livewireStyles
        @vite(['resources/sass/app.scss','resources/css/app.css'])
        @yield('style')
    </head>
    <body style=" background-color: #E9EEEF;">

    <div class="header">
        <div class="dropdown">
            @guest

                <button id="button-header" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style=" background-color:rgb(0, 0, 255);  border: 0px;">
                    <div class="user-icon"><img src="{{ Vite::asset('resources/images/user (4).png') }}" width="29px"> <div class="user">اسم المستخدم</div></div>
                </button>
            @else
                <button id="button-header" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style=" background-color:rgb(0, 0, 255);  border: 0px;">
                    <div class="user-icon"><img src="{{ Vite::asset('resources/images/user (4).png') }}" width="29px"> <div class="user">{{ Auth::user()->name." ".Auth::user()->last_name}}</div></div>
                </button>
            @endguest
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('login') }}">الحساب<img src="{{ Vite::asset("resources/images/user (10).png")}}" class="img10" width="26px"></a>
            <div class="dropdown-menu" >
                <a class="dropdown-item" onclick="location.href='{{route('profile')}}'">الحساب<img src="{{ Vite::asset("resources/images/user (10).png")}}" class="img10" width="26px"></a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">{{__('layout.logout')}}<img src="{{ Vite::image('exit.png') }}" class="img10" width="24px"></a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

            </div>
        </div>
        <div class="notification" data-toggle="modal" data-target="#myModalnotification"><img src="{{ Vite::image('bell.png')}}" width="22px"></div>

        {{-- <button class="btn btn-light" id="notification" type="button" data-toggle="modal" data-target="#myModalnotification" style="z-index: 100%;"><img src="{{ Vite::image('bell.png')}}" width="22px"></button> --}}
        <img src="{{ Vite::image('Group 912.png')}}" width="40px" style="float: right; margin-top:-100px; margin-right:0px;"></div>
        <div id="sidebar" class="sidebar">

            <button class="button-sidebar" onclick="location.href='{{route('home')}}'"><img src="{{ Vite::image('home (1).png') }}" class="sidebaricon" width="26px"><label class="" >{{__('layout.meun_home')}} </label></button>
            <button class="button-sidebar" onclick="location.href='{{route('studyingschedule')}}'"><img src="{{ Vite::image('calendar (3).png')}}" class="sidebaricon" width="26px"><label class="" >{{__('layout.schaudule_std')}} </button>
            <button class="button-sidebar" onclick="location.href='{{route('archieve')}}'"><img src="{{ Vite::image('portfolio (2).png')}}" class="sidebaricon" width="26px"><label class="" >{{__('layout.archives')}} </label></button>
            <button class="button-sidebar"><img src="{{ Vite::image('setting (2).png')}}" class="sidebaricon" width="26px"><label class="" >{{__('layout.settings')}} </label></button>
        </div>
    </div>
    @section('nav')
    <div class="hdr2" style=" box-shadow: 10px;">
        <!--div class="btn-group" style="margin-top: 17px; margin-left:40%; background-color:rgb(255, 255, 255);  color: rgb(13, 24, 176);  ">
          <button class="button" href="./Untitled-1.html"><a class="link" href="./Untitled-1.html" style="text-decoration: none; :hover{  background-color: #B4DAF6;   color:white;}" >الإحصائيات</a> </button>
          <button class="button"id="active">الصلاحيات</button>
          <button class="button" >الرئيسية </button>
</div-->
        <ul>
            <li><a href="{{route("stasticsallsubject")}}">{{__('layout.statistics')}}</a></li>
            <li><a href="{{route("permissions")}}">{{__('layout.permissions')}}</a></li>
            <li><a class="active" href="{{route("home")}}" style="text-decoration: none; float:right;">{{__('layout.home')}}</a></li>

        </ul>
    </div>
    @show

    <div class="content">
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session()->get('success') }}</strong>
        </div>
        @endif
        @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            <strong>{{ session()->get('error') }}</strong>
        </div>
        @endif
        @if (session()->has('warning'))
        <div class="alert alert-warning" role="alert">
            <strong>{{ session()->get('warning') }}</strong>
        </div>
        @endif
        @if (session()->has('info'))
        <div class="alert alert-info" role="alert">
            <strong>{{ session()->get('info') }}</strong>
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger" role="alert" style="direction: rtl">
            <strong>{{ __('general.error') }}</strong>
            <ol>
                @foreach ($errors->all() as $error)
                @if (!$loop->first)
                <br>
                @endif
                <li>{{ __($error) }}</li>
                @endforeach
            </ol>
        </div>
        @endif

        @yield('content')

    </div>

<!-- The Modal1 -->
<div class="modal fade" id="myModalnotification">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content" style="background-color: #F6F7FA;height:500px;">

            <!-- Modal Header -->
            <div class="modal-header" id="modheader" style="padding-left: 45%">
                الاشعارات
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" id="notification-bord-messages">

                {{-- <div class="senders">

                    <div class="card" id="sendersMessages"> السلام عليكم ورحمة الله وبركاته
                        <div class="sendingdate">
                            pm.10:24
                        </div>
                    </div>

                </div> --}}

                <div class="recivers-notif">

                    <div class="card" id="recivers-notifi-Messages" > <div class="sender-notifi" > الادمن</div>وعليكم السلام ورحمة الله وبركاته
                        <div class="recivin-notifi-date">
                            pm.10:24
                        </div>
                    </div>

                </div>



            </div>

            <!-- Modal footer -->
            <div class="modal-footer" style="height: 30px; background-color: #0E70F2; ">

            </div>

        </div>
    </div>
</div>










    <div class="bottomNavbar">
        <button class="btn-bottomNavbar"><img src="{{ Vite::image('setting (2).png') }}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">الإعدادات</label></button>
        <button class="btn-bottomNavbar"onclick="location.href='{{route('archieve')}}'"><img src="{{ Vite::image('portfolio (2).png') }}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">الأرشيف</label></button>
        <button class="btn-bottomNavbar" onclick="location.href='{{route('studyingschedule')}}'"><img src="{{ Vite::image('calendar (3).png') }}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">الجدول </label></button>
        <button class="btn-bottomNavbar" onclick="location.href='{{route('home')}}'"><img src="{{ Vite::image('home (1).png') }}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">القائمة</label></button>
    </div>
    {{-- @vite('resources/js/app.js') --}}
    {{-- <script src="{{ mix('js/sidebar.js') }}" defer></script>
     <script src="sidebar.js"></script> --}}
    @livewireScripts
    </body>
    @yield('script')
</html>
