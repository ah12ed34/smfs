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
                        <h3 class="card-title   text-right">الرسالة</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-right">


                            تتمثل مهمتنا في تمكين الطلاب من خلال تقديم لوحة معلومات مركزية توفر رؤية واضحة ومنظمة لالتزاماتهم الأكاديمية.
                            ونهدف إلى تبسيط إدارة المهام والمشاريع والمواعيد النهائية في جميع المواد،
                            ومساعدة الطلاب على البقاء على رأس مسؤولياتهم والتفوق في مساعيهم الأكاديمية.
                            وتوفير بيئة تعليمية متكاملة تساعد الطلاب على التواصل مع أعضاء هيئة التدريس والطلاب الآخرين، وتشجيع التعاون وتبادل المعرفة.
                            نحن نسعى لتحقيق تجربة تعليمية ممتعة ومثمرة للطلاب، وتعزيز التعلم الذاتي وتطوير المهارات الأكاديمية والشخصية.
                            من خلال منصتنا، يمكن للطلاب الوصول إلى المواد الدراسية والمصادر التعليمية، وتتبع تقدمهم الأكاديمي، وتلقي التعليمات والتوجيهات من المدرسين.
                            نحن نسعى لتحقيق التميز الأكاديمي والتطور المستمر للطلاب، وتمكينهم من تحقيق أهدافهم الشخصية والمهنية.
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
