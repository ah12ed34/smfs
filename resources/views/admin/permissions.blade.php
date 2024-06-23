@extends('layouts.home')
@section('nav')
@livewire('components.nav.admin.department',['active' => 'permission'])
@endsection
@section('content')

<div class="container" style="padding-top:30px ;">
    <div class="card  cards-departments" id="" onclick="window.location='{{ route('permissions_pages') }}'">
        <img src="{{ Vite::image('shield.png')}}" class="" width="150px">
        <div class="card-departments-child" style="background-color:white; color:#0E70F2">  صلاحيات المستخدمين
        </div>
    </div>

    <div class="card  cards-departments" id="" onclick="window.location='{{ route('addUsers_permissions') }}'">
        <img src="{{ Vite::image('permissions-Subject.png')}}" class="" width="150px">
        <div class="card-departments-child"  style="background-color:white; color:#0E70F2"> إضافة مستخدم
        </div>
    </div>

</div>

@endsection
