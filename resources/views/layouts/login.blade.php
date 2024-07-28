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
        <script src="{{ asset('app/js/app.js') }}" ></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- icon --}}
        <link rel="icon" href="{{ Vite::image('Group 912.png') }}" type="image/x-icon">
        {{-- add commit --}}
        <meta name="keywords" content="تعليمي,موقع,تعليم,مدرسة,معلم,طالب,مشروع,درجات,مواد,معلومات,معلوماتية,معلوماتي,SMFS,Student management and follow-up system,نظام إدارة ومتابعة الطلاب">
        <meta name="author" content="Pro Prog Yemen">
        <meta name="description" content="نظام إدارة ومتابعة الطلاب">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">
        <meta name="googlebot" content="index, follow">
        <meta name="google" content="notranslate">
        {{-- <link rel="stylesheet" href="{{ asset('app/css/login.css') }}">
        <link rel="stylesheet" href="{{ asset('app/css/styles.css') }}"> --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script> --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> --}}

        <title>@yield('title',config('app.name'))</title>
        @livewireStyles
        @vite(['resources/css/app.css','resources/sass/app.scss'])

        @yield('style')
        <style>
            .sidebar >* i.bi {
                margin-top: -10px;
                font-size: 25px;
            }
            .dropdown-menu >* i.bi {
                float: right;
                margin-right: -3px;
                font-size: 17px;
                width: 25px;
            }
        </style>
    </head>


        @yield('content')


<!-- The Modal1 -->
    @livewireScripts
    @yield('script')
</html>
