@extends('layouts.home')

@section('title', 'Home|SFMS')
@section('content')
<div class="responsive"></div>
{{-- <a href="{{route('subject.index')}}"> --}}
<div class="card" onclick="location.href='{{route('subject.index')}}'"> <img src="{{ Vite::image('allocation (1).png') }}"  width="150px">
    <div class="card-child-1"> Distributed System نظم تشغيل <br> تقنية معلومات - مستوى رابع<br>أ.منال العريقي
    </div></div>

<div class="card" style="margin-left: 22px;"> <img src="{{ Vite::image('allocation (1).png') }}"  width="150px">
    <div class="card-child-1"> Networks Management إدارة شبكات <br> تقنية معلومات - مستوى رابع<br>أ.منال العريقي
    </div></div>    
@endsection