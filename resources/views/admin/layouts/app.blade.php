<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> --}}
        <title>@yield('title',"CS")</title>
        <style>
            .sidebar .bi {
                font-size: 1.3rem;
                color: #fff;
                float: right;
                margin-left: -8px;
                margin-top: -5px;
            }
        </style>
        @vite(['resources/sass/app.scss','resources/css/app.css'])
    </head>
    <body >

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
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">{{__('layout.logout')}}<img src="{{ Vite::image('exit.png') }}" class="img10" width="24px"></a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

            </div>
        </div>
        <div class="notification"><img src="{{ Vite::image('bell.png')}}" width="22px"></div>
        <img src="{{ Vite::image('Group 912.png')}}" width="40px" style="float: right; margin-top:-100px; margin-right:0px;"></div>
        <div id="sidebar" class="sidebar">

                <button class="button-sidebar" onclick="location.href='{{route('home')}}'"><img src="{{ Vite::image('home (1).png') }}" class="sidebaricon" width="26px"><label class="" >{{__('layout.meun_home')}} </label></button>
                <button class="button-sidebar" onclick="location.href='{{route('student.create')}}'" ><label class="" >{{__('layout.create_student')}}</label><i class="bi bi-person-add"></i> </button>
                <button class="button-sidebar" onclick="location.href='{{route('academic.create')}}'"><label class="" >{{__('layout.create_academic')}} </label><i class="bi bi-person-add"></i></button>
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
            <li><a href="#">{{__('layout.statistics')}}</a></li>
            <li><a href="#">{{__('layout.permissions')}}</a></li>
            <li><a class="active" href="#" style="text-decoration: none; float:right;">{{__('layout.home')}}</a></li>

        </ul>
    </div>
    @show

    <div class="content">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session()->get('success') }}</strong>
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger" role="alert">
            <strong>{{ session()->get('error') }}</strong>
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <strong>{{ $errors->first() }}</strong>
        </div>
        @endif
        @if(session('message'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('message') }}</strong>
        </div>
        @endif
       @yield('content')
    </div>
    <div class="bottomNavbar">
        <button class="btn-bottomNavbar"><img src="{{ Vite::image('setting (2).png') }}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">الإعدادات</label></button>
        <button class="btn-bottomNavbar"><img src="{{ Vite::image('portfolio (2).png') }}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">الأرشيف</label></button>
        <button class="btn-bottomNavbar"><img src="{{ Vite::image('calendar (3).png') }}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">الجدول </label></button>
        <button class="btn-bottomNavbar" onclick="location.href='{{route('home')}}'"  ><img src="{{ Vite::image('home (1).png') }}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">القائمة</label></button>
    </div>
    {{-- @vite('resources/js/app.js') --}}
    {{-- <script src="{{ mix('js/sidebar.js') }}" defer></script>
     <script src="sidebar.js"></script> --}}
    </body>
    @yield('script')
</html>
