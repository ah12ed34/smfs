<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <title>@yield('title',"CS")</title>

        @vite(['resources/sass/app.scss','resources/css/app.css'])
    </head>
    <body >
        
    <div class="header">
        <div class="dropdown">
            <button id="button-header" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style=" background-color:rgb(0, 0, 255);  border: 0px;">
              <div class="user-icon"><img src="{{ Vite::asset('resources/images/user (4).png') }}" width="29px"> <div class="user">Ahmed AL-Wajeeh </div></div> 
            </button>

            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">الحساب<img src="{{ Vite::asset("resources/images/user (10).png")}}" class="img10" width="26px"></a> 
                <a class="dropdown-item" href="#">تسجيل خروج<img src="{{ Vite::image('exit.png') }}" class="img10" width="24px"></a>

            </div>
        </div>
        <div class="notification"><img src="{{ Vite::image('bell.png')}}" width="22px"></div>
        <img src="{{ Vite::image('Group 912.png')}}" width="40px" style="float: right; margin-top:-100px; margin-right:0px;"></div>
        <div id="sidebar" class="sidebar">

            <button class="button-sidebar"><img src="{{ Vite::image('home (1).png') }}" class="sidebaricon" width="26px"><label class="" >القائمة الرئيسية </label></button>
            <button class="button-sidebar"><img src="{{ Vite::image('calendar (3).png')}}" class="sidebaricon" width="26px"><label class="" >الجدول الدراسي</label></button>
            <button class="button-sidebar"><img src="{{ Vite::image('portfolio (2).png')}}" class="sidebaricon" width="26px"><label class="" >الأرشيف</label></button>
            <button class="button-sidebar"><img src="{{ Vite::image('setting (2).png')}}" class="sidebaricon" width="26px"><label class="" >الإعدادات</label></button>
        </div>
    </div>
    <div class="hdr2" style=" box-shadow: 10px;">
        <!--div class="btn-group" style="margin-top: 17px; margin-left:40%; background-color:rgb(255, 255, 255);  color: rgb(13, 24, 176);  ">
          <button class="button" href="./Untitled-1.html"><a class="link" href="./Untitled-1.html" style="text-decoration: none; :hover{  background-color: #B4DAF6;   color:white;}" >الإحصائيات</a> </button>
          <button class="button"id="active">الصلاحيات</button>
          <button class="button" >الرئيسية </button>
</div-->
        <ul>
            <li><a href="#">الإحصائيات</a></li>
            <li><a href="#">الصلاحيات</a></li>
            <li><a class="active" href="#" style="text-decoration: none; float:right;">الرئيسية</a></li>

        </ul>
    </div>
   
    <div class="content">
       @yield('content')
    </div>
    <div class="bottomNavbar">
        <button class="btn-bottomNavbar"><img src="{{ Vite::image('setting (2).png') }}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">الإعدادات</label></button>
        <button class="btn-bottomNavbar"><img src="{{ Vite::image('portfolio (2).png') }}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">الأرشيف</label></button>
        <button class="btn-bottomNavbar"><img src="{{ Vite::image('calendar (3).png') }}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">الجدول </label></button>
        <button class="btn-bottomNavbar"><img src="{{ Vite::image('home (1).png') }}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">القائمة</label></button>
    </div>
    {{-- @vite('resources/js/app.js') --}}
    {{-- <script src="{{ mix('js/sidebar.js') }}" defer></script> 
     <script src="sidebar.js"></script> --}}
    </body>
    @yield('script')
</html>