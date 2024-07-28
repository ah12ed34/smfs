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
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="#">حول الموقع</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="#">الرؤية</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">الرسالة</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">الأهداف</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">دخول</a>
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


            <div class="container">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title   text-right">الاهداف</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-right">
                            تحقيق التميز في تقديم الخدمات التعليمية والتدريبية للطلاب والمعلمين  بأفضل الطرق والأساليب الحديثة
                            والمتطورة لتحقيق الريادة في الأداء الإداري والأكاديمي.
                            .التعاون مع الجهات الرسمية والخاصة لتطوير النظام التعليمي والتدريبي
                            .توفير بيئة تعليمية محفزة للطلاب والمعلمين لتحقيق التميز الأكاديمي
                            .تطوير الأداء الإداري والأكاديمي للجامعة والمعلمين والطلاب
                            .تحقيق الريادة في تقديم الخدمات التعليمية والتدريبية
                            .معرفة احصائيات الطلاب والمعلمين والمواد والدرجات والمعدلات النهائية
                            .زيادة معدلات النجاح والتفوق للطلاب والمعلمين

                        </p>

                    </div>
                    <div class="card-footer">
                        {{-- <a href="{{ route('login') }}" class="btn btn-primary">الرجوع للصفحة الرئيسية</a> --}}
                    </div>
                </div>
            </div>



                </div>
            </div>
        </div>

    </body>
@endsection
