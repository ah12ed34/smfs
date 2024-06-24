@extends('layouts.home')
@section('nav')
@livewire('components\nav\admin.admin-nv-header')
{{-- @livewire('components.nav.admin.department', ['active' => 'department']) --}}
@endsection
@section('content')

<div class="card  cards-departments depart-level-quality" id="">
    <img src="{{Vite::image("level1.png")}}" class="" width="150px">
    <div class="card-departments-child">  مستوى  اول
    </div>
</div>

<div class="card  cards-departments depart-level-quality" id="">
    <img src="{{Vite::image("level2.png")}}" class="" width="150px">
    <div class="card-departments-child"> مستوى ثاني
    </div>
</div>

<div class="card  cards-departments depart-level-quality" id="">
    <img src="{{Vite::image("level3.png")}}" class="" width="150px">
    <div class="card-departments-child">   مستوى ثالث
    </div>
</div>

<div class="card  cards-departments depart-level-quality" id="">
    <img src="{{Vite::image("level4.png")}}" class="" width="150px">
    <div class="card-departments-child"> مستوى  رابع
    </div>
</div>


@endsection
