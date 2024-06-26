@extends('layouts.home')
@section('nav')
@livewire('components.nav.admin.department', ['active' => 'usrs_employers'])
@endsection
@section('content')

<div class="container" style="padding-top:30px;">

    <div class="card  cards-departments" id="" onclick="window.location='{{ route('managers_information') }}'">
        <img src="{{ Vite::image('managers.png')}}" class="" width="150px" >
        <div class="card-departments-child">     الأداريين
        </div>
    </div>

<div class="card  cards-departments" id="" onclick="window.location='{{ route('employees_information',['StudentAffairs']) }}'">
    <img src="{{ Vite::image('studentsAffairs.png')}}" class="" width="150px">
    <div class="card-departments-child">  موظفين شؤون الطلاب
    </div>
</div>

<div class="card  cards-departments" id="" onclick="window.location='{{ route('employee_information') }}'">
    <img src="{{ Vite::image('controll.png')}}" class="" width="150px">
    <div class="card-departments-child"> موظفين الكنترول
    </div>
</div>

<div class="card  cards-departments" id="" onclick="window.location='{{ route('employee_information') }}'">
    <img src="{{ Vite::image('empoloyee_scheduls.png')}}" class="" width="150px">
    <div class="card-departments-child">   موظفين الجداول
    </div>
</div>

<div class="card  cards-departments" id="" onclick="window.location='{{ route('employee_information') }}'">
    <img src="{{ Vite::image('quality.png')}}" class="" width="150px">
    <div class="card-departments-child"> موظفين الجودة
    </div>
</div>

</div>


@endsection
