<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://tailwindui.com/components/application-ui/overlays/dialogs">
        <link rel="stylesheet" href="https://daisyui.com/components/modal/">
        <link rel="stylesheet" href="https://tw-elements.com/docs/standard/components/modal/">
        <link rel="stylesheet" href=" https://flowbite.com/docs/components/modal/"> --}}
    <script src="{{ asset('app/js/app.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- icon --}}
    <link rel="icon" href="{{ Vite::image('Group 912.png') }}" type="image/x-icon">
    {{-- add commit --}}
    <meta name="keywords"
        content="تعليمي,موقع,تعليم,مدرسة,معلم,طالب,مشروع,درجات,مواد,معلومات,معلوماتية,معلوماتي,SMFS,Student management and follow-up system,نظام إدارة ومتابعة الطلاب">
    <meta name="author" content="Pro Prog Yemen">
    <meta name="description" content="نظام إدارة ومتابعة الطلاب">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="google" content="notranslate">

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> --}}

    <title>@yield('title', config('app.name'))</title>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])

    @yield('style')
    <style>
        .sidebar>* i.bi {
            margin-top: -10px;
            font-size: 25px;
        }

        .dropdown-menu>* i.bi {
            float: right;
            margin-right: -3px;
            font-size: 17px;
            width: 25px;
        }
    </style>
</head>

<body style=" background-color: #E9EEEF;">

    <div class="header">
        <div class="dropdown">
            @guest

                <button id="button-header" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    style=" background-color:rgb(0, 0, 255);  border: 0px;">
                    <div class="user-icon"><img src="{{ Vite::asset('resources/images/user (4).png') }}" width="29px">
                        <div class="user">اسم المستخدم</div>
                    </div>
                </button>
            @else
                <button id="button-header" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    style=" background-color:rgb(0, 0, 255);  border: 0px;">
                    <?php
                    $user = Auth::user();
                    $photo = $user->photo;
                    ?>
                    <div class="user-icon">
                        <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : Vite::image('user (4).png') }}"
                            style="border-radius: 50%" width="29px">
                        <div class="user">
                            {{ Auth::user()->name . ' ' . Auth::user()->last_name }}
                        </div>
                    </div>
                </button>
            @endguest
            <div class="dropdown-menu">
                <a class="dropdown-item" onclick="location.href='{{ route('profile') }}'">الحساب<img
                        src="{{ Vite::asset('resources/images/user (10).png') }}" class="img10" width="26px"></a>
                @Role('HeadOfDepartment')
                    <a class="dropdown-item"
                        onclick="location.href='{{ route('managerDepartment') }}'">{{ __('layout.manage_department') }}<i
                            class="bi bi-ui-radios-grid"></i></a>
                @endRole
                @Role('StudentAffairs')
                    <a class="dropdown-item"
                        onclick="location.href='{{ route('StudentSaffairs') }}'">{{ __('layout.students_affairs') }}<i
                            class="bi bi-person-lines-fill"></i></a>
                @endRole
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">{{ __('layout.logout') }}<img
                        src="{{ Vite::image('exit.png') }}" class="img10" width="24px"></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </div>
        <div class="notification" data-toggle="modal" data-target="#myModalnotification"><img
                src="{{ Vite::image('bell.png') }}" width="22px"></div>

        {{-- <button class="btn btn-light" id="notification" type="button" data-toggle="modal" data-target="#myModalnotification" style="z-index: 100%;"><img src="{{ Vite::image('bell.png')}}" width="22px"></button> --}}
        <img src="{{ Vite::image('Group 912.png') }}" width="40px"
            style="float: right; margin-top:-100px; margin-right:0px;">
    </div>
    <div id="sidebar" class="sidebar">

        {{-- @Teacher()
            <button class="button-sidebar" onclick="location.href='{{route('home')}}'"><img src="{{ Vite::image('home (1).png') }}" class="sidebaricon" width="26px"><label class="" >{{__('layout.meun_home')}} </label></button>
            @endTeacher --}}
        {{-- @Role('HeadOfDepartment')
            <button class="button-sidebar" onclick="location.href='{{route('managerDepartment')}}'">
                <i class="bi bi-ui-radios-grid sidebaricon" ></i>
                <label class="" >{{__('layout.manage_department')}} </label></button>
            @endRole --}}


        @Student()
            <button class="button-sidebar" onclick="location.href='{{ route('student') }}'"><img
                    src="{{ Vite::image('home (1).png') }}" class="sidebaricon" width="26px"><label
                    class="">{{ __('layout.meun_home') }} </label></button>
            <button class="button-sidebar" onclick="location.href='{{ route('student-studyingSchedule') }}'"><img
                    src="{{ Vite::image('calendar (3).png') }}" class="sidebaricon" width="26px"><label
                    class="">{{ __('layout.schaudule_std') }} </button>
            <button class="button-sidebar" onclick="location.href='{{ route('student-archieve') }}'"><img
                    src="{{ Vite::image('portfolio (2).png') }}" class="sidebaricon" width="26px"><label
                    class="">{{ __('layout.archives') }} </label></button>
            <button class="button-sidebar"><img src="{{ Vite::image('setting (2).png') }}" class="sidebaricon"
                    width="26px"><label class="">{{ __('layout.settings') }} </label></button>
        @endStudent

        @Admin()
            <button class="button-sidebar" onclick="location.href='{{ route('home') }}'"><img
                    src="{{ Vite::image('home (1).png') }}" class="sidebaricon" width="26px"><label
                    class="">{{ __('layout.meun_home') }} </label></button>
            {{-- <button class="button-sidebar" onclick="location.href='{{route('student.create')}}'" ><img src="{{ Vite::image('user (4).png') }}" class="sidebaricon" width="26px"><label class="" >{{__('layout.create_student')}}</label></button>
                <button class="button-sidebar" onclick="location.href='{{route('academic.create')}}'"><img src="{{ Vite::image('user (4).png') }}" class="sidebaricon" width="26px"><label class="" >{{__('layout.create_academic')}} </label></button> --}}
            <button class="button-sidebar"><img src="{{ Vite::image('setting (2).png') }}" class="sidebaricon"
                    width="26px"><label class="">{{ __('layout.settings') }} </label></button>
        @endAdmin

        @Role('SechadulesManagement')
            {{-- @SechadulesManagement() --}}
            <button class="button-sidebar" onclick="location.href='{{ route('departments_sechedules') }}'"><img
                    src="{{ Vite::image('home (1).png') }}" class="sidebaricon" width="26px"><label
                    class="">{{ __('layout.meun_home') }} </label></button>
            <button class="button-sidebar" onclick="window.location='{{ route('classes_sechedules') }}'"><img
                    src="{{ Vite::image('calendar (3).png') }}" class="sidebaricon" width="26px"><label
                    class="">{{ __('layout.classes_sechedules') }} </label></button>
            <button class="button-sidebar"><img src="{{ Vite::image('setting (2).png') }}" class="sidebaricon"
                    width="26px"><label class="">{{ __('layout.settings') }} </label></button>
            {{-- @endSechadulesManagement --}}
        @else
            @Teacher()
                <button class="button-sidebar" onclick="location.href='{{ route('home') }}'"><img
                        src="{{ Vite::image('home (1).png') }}" class="sidebaricon" width="26px"><label
                        class="">{{ __('layout.meun_home') }} </label></button>
                <button class="button-sidebar" onclick="location.href='{{ route('main_academic_sechedules') }}'"><img
                        src="{{ Vite::image('calendar (3).png') }}" class="sidebaricon" width="26px"><label
                        class="">{{ __('layout.schaudule_std') }} </button>
                <button class="button-sidebar" onclick="location.href='{{ route('archieve') }}'"><img
                        src="{{ Vite::image('portfolio (2).png') }}" class="sidebaricon" width="26px"><label
                        class="">{{ __('layout.archives') }} </label></button>
                <button class="button-sidebar"><img src="{{ Vite::image('setting (2).png') }}" class="sidebaricon"
                        width="26px"><label class="">{{ __('layout.settings') }} </label></button>
            @endTeacher
        @endRole
    </div>
    </div>
    @section('nav')
        <div class="hdr2" style=" box-shadow: 10px;">
            <button class="spaces"> <label class="subjectname">الصفحة الرئيسية </label><img
                    src="{{ Vite::image('dashboard (1).png') }}" id="subject-icon-hdr2" width="40px"></button>
            {{-- <ul>
            <li><a href="{{route("stasticsallsubject")}}">{{__('layout.statistics')}}</a></li>
            <li><a href="{{route("permissions")}}">{{__('layout.permissions')}}</a></li>
            <li><a class="active" href="{{route("home")}}" style="text-decoration: none; float:right;">{{__('layout.home')}}</a></li>

        </ul> --}}
            {{-- <button id="btn-studyingbooksNavbar" class="btn btn-light" onclick="location.href='{{route('forms-quiz')}}'"><label class="proNavbartext">   نماذج</label></button> --}}
            <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->

            <div id="btn-group-mainpage" class="btn-group">
                {{-- <button id="btn-mainpageNavbar" class="btn btn-light"
                    onclick="location.href='{{ route('permissions') }}'"><label class="proNavbartext">
                        {{ __('layout.permissions') }} </label></button> --}}
                <button id="btn-mainpageNavbar" class="btn btn-light" onclick="location.href='{{ route('home') }}'"
                    style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"><label
                        class="proNavbartext"> {{ __('layout.home') }} </label></button>
            </div>

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

        @yield('content')

    </div>

    {{-- @livewire('components.notifications.receive-notifications') --}}
    <livewire:components.notifications.receive-notifications />









    <div class="bottomNavbar">

        {{-- <button class="button-sidebar" onclick="location.href='{{route('student')}}'"><img src="{{ Vite::image('home (1).png') }}" class="sidebaricon" width="26px"><label class="" >{{__('layout.meun_home')}} </label></button>
            <button class="button-sidebar" onclick="location.href='{{route('student-studyingScheule')}}'"><img src="{{ Vite::image('calendar (3).png')}}" class="sidebaricon" width="26px"><label class="" >{{__('layout.schaudule_std')}} </button>
            <button class="button-sidebar" onclick="location.href='{{route('student-archieve')}}'"><img src="{{ Vite::image('portfolio (2).png')}}" class="sidebaricon" width="26px"><label class="" >{{__('layout.archives')}} </label></button>
            <button class="button-sidebar"><img src="{{ Vite::image('setting (2).png')}}" class="sidebaricon" width="26px"><label class="" >{{__('layout.settings')}} </label></button>
        --}}



        @Student()
            <button class="btn-bottomNavbar"><img src="{{ Vite::image('setting (2).png') }}" class="bottombaricon"
                    width="20px"><br><label class="bottomNavbartext">الإعدادات</label></button>
            <button class="btn-bottomNavbar"onclick="location.href='{{ route('student-archieve') }}'"><img
                    src="{{ Vite::image('portfolio (2).png') }}" class="bottombaricon" width="20px"><br><label
                    class="bottomNavbartext">الأرشيف</label></button>
            <button class="btn-bottomNavbar" onclick="location.href='{{ route('student-studyingSchedule') }}'"><img
                    src="{{ Vite::image('calendar (3).png') }}" class="bottombaricon" width="20px"><br><label
                    class="bottomNavbartext">الجدول </label></button>
            <button class="btn-bottomNavbar" onclick="location.href='{{ route('student') }}'"><img
                    src="{{ Vite::image('home (1).png') }}" class="bottombaricon" width="20px"><br><label
                    class="bottomNavbartext">القائمة</label></button>
        @endStudent

        @Admin()
            <button class="btn-bottomNavbar"><img src="{{ Vite::image('setting (2).png') }}" class="bottombaricon"
                    width="20px"><br><label class="bottomNavbartext">الإعدادات</label></button>
            {{-- <button class="btn-bottomNavbar"onclick="location.href='{{route('academic.create')}}'"><img src="{{ Vite::image('user (4).png') }}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">إنشاءأكاديمي</label></button> --}}
            {{-- <button class="btn-bottomNavbar" onclick="location.href='{{route('student.create')}}'"><img src="{{ Vite::image('user (4).png') }}" class="bottombaricon" width="20px"><br><label class="bottomNavbartext">إنشاء طالب </label></button> --}}
            <button class="btn-bottomNavbar" onclick="location.href='{{ route('home') }}'"><img
                    src="{{ Vite::image('home (1).png') }}" class="bottombaricon" width="20px"><br><label
                    class="bottomNavbartext">القائمة</label></button>
        @endAdmin
        @Role('SechadulesManagement')
            {{-- @ManagementOFSechedules() --}}
            <button class="btn-bottomNavbar"><img src="{{ Vite::image('setting (2).png') }}" class="bottombaricon"
                    width="20px"><br><label class="bottomNavbartext">الإعدادات</label></button>
            <button class="btn-bottomNavbar" onclick="location.href='{{ route('classes_sechedules') }}'"><img
                    src="{{ Vite::image('calendar (3).png') }}" class="bottombaricon" width="20px"><br><label
                    class="bottomNavbartext">جدول القاعات </label></button>
            <button class="btn-bottomNavbar" onclick="location.href='{{ route('departments_sechedules') }}'"><img
                    src="{{ Vite::image('home (1).png') }}" class="bottombaricon" width="20px"><br><label
                    class="bottomNavbartext">القائمة</label></button>
            {{-- @endManagementOFSechedules --}}
        @else
            @Teacher()
                <button class="btn-bottomNavbar"><img src="{{ Vite::image('setting (2).png') }}" class="bottombaricon"
                        width="20px"><br><label class="bottomNavbartext">الإعدادات</label></button>
                <button class="btn-bottomNavbar"onclick="location.href='{{ route('archieve') }}'"><img
                        src="{{ Vite::image('portfolio (2).png') }}" class="bottombaricon" width="20px"><br><label
                        class="bottomNavbartext">الأرشيف</label></button>
                <button class="btn-bottomNavbar" onclick="location.href='{{ route('main_academic_sechedules') }}'"><img
                        src="{{ Vite::image('calendar (3).png') }}" class="bottombaricon" width="20px"><br><label
                        class="bottomNavbartext">الجدول </label></button>
                <button class="btn-bottomNavbar" onclick="location.href='{{ route('home') }}'"><img
                        src="{{ Vite::image('home (1).png') }}" class="bottombaricon" width="20px"><br><label
                        class="bottomNavbartext">القائمة</label></button>
            @endTeacher
        @endRole

    </div>
    {{-- @vite('resources/js/app.js') --}}
    {{-- <script src="{{ mix('js/sidebar.js') }}" defer></script>
     <script src="sidebar.js"></script> --}}
    @livewireScripts
    {{-- <script>
        (function() {
            let ipadress = '127.0.0.1';
            // 3000
            let port = '3000';
            let url = 'https://server-v02x.onrender.com/';
            let socket = io(url);
            // console.log(socket);
            let channel = 'receiveNotificationToUser_';
            let userData = {!! json_encode(auth()->user()->id) !!};
            // console.log(userData);
            // receiveNotificationToUser_2
            socket.on("notifi_" + userData, (message) => {
                console.log('notifi_' + userData);
                // var data = JSON.parse(message);
                // var dateObject = Date.parse(data.created_at);
                // var date = Date(dateObject);
                // console.log(date);
                // $('#notification').remove();
                // $('#notification').append(`
            //     <li class="list-group">
            //         <strong>${data.title}</strong>
            //         <p>${data.body}</p>
            //         <p>${date.getTime()}</p>
            //     </li>
            // `);

                // check number
                var number = isNumber(message) ? message : 0;
                if (number > 0) {
                    $('.notification').append(`
                         <span class="badge badge-danger">${number}</span>
                     `);
                }

            });
        })();
    </script> --}}
    @yield('script')
</body>



</html>
