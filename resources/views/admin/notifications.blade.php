@extends('layouts.home')
@section('nav')
@livewire('components.nav.admin.department', ['active' => 'notification'])
@endsection
@section('content')
<div class="container" style="padding-top: 30px;">

    <div class="card  cards-departments" id="" onclick="window.location='{{ route('sendNotifications_students') }}'">
        <img src="{{ Vite::image('studentnotif.png')}}" class="" width="150px">
        <div class="card-departments-child" style="background-color:white; color:#34959C">   إشعارات الطلاب
        </div>
    </div>

    <div class="card  cards-departments" id="" onclick="window.location='{{ route('sendNotifications_academics') }}'">
        <img src="{{ Vite::image('instructorsnotif.png')}}" class="" width="150px">
        <div class="card-departments-child"  style="background-color:white; color:#34959C"> إشعارات المعلمين
        </div>
    </div>

    <div class="card  cards-departments" id="" onclick="window.location='{{ route('sendNotifications_managers') }}'">
        <img src="{{ Vite::image('bossesofdepartmentsnotif.png')}}" class="" width="150px">
        <div class="card-departments-child"  style="background-color:white; color:#34959C">  إشعارات رؤساء الأقسام
        </div>
    </div>

    </div>


@endsection
