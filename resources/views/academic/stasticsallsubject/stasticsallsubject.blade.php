@extends('layouts.home')
@section('nav')
<div class="hdr2" style=" box-shadow: 10px;">

    <ul>
        <li><a class="active" href="{{route("stasticsallsubject")}}">{{__('layout.statistics')}}</a></li>
        <li><a href="#">{{__('layout.permissions')}}</a></li>
        <li><a  href="{{route("home")}}" style="text-decoration: none; float:right;">{{__('layout.home')}}</a></li>

    </ul>
</div>
    @endsection
@section('content')



<div class="container" id="container-project" style="  padding-top: 10px;">




        <div class="cards-child-stastics">
            <label class="cards-child-title">  تكاليف لم يتم تسليمها
        </label>
            <div class="cards-child-numbers">0</div>
            <img src="{{Vite::image("homework (3).png")}}" class="image-stastic" width="50px">
        </div>

        <div class="cards-child-stastics">
            <label class="cards-child-title"> تكاليف تم تسليمها</label>
            <div class="cards-child-numbers">0</div>
            <img src="{{Vite::image("homework (3).png")}}" class="image-stastic" width="50px">
        </div>

        <div class="cards-child-stastics">
            <label class="cards-child-title">  مشاربع لم يتم تسليمها</label>
            <div class="cards-child-numbers">0</div>
            <img src="{{Vite::image("project-management.png")}}" class="image-stastic" width="50px">
        </div>

        <div class="cards-child-stastics">
            <label class="cards-child-title"> مشاربع تم تسليمها</label>
            <div class="cards-child-numbers">0</div>
            <img src="{{Vite::image("project-management.png")}}" class="image-stastic" width="50px">
        </div>

        <div class="cards-child-stastics">
            <label class="cards-child-title">    الطلاب الراسبين
        </label>
            <div class="cards-child-numbers">0</div>
            <img src="{{Vite::image("students.png")}}" class="image-stastic" width="50px">
        </div>


        <div class="cards-child-stastics">
            <label class="cards-child-title">     الطلاب المتفوقين
        </label>
            <div class="cards-child-numbers">0</div>
            <img src="{{Vite::image("students.png")}}" class="image-stastic" width="50px">
        </div>


        <div class="cards-child-stastics">
    <label class="cards-child-title">    الطلاب الناجحين
</label>
    <div class="cards-child-numbers">0</div>
    <img src="{{Vite::image("students.png")}}" class="image-stastic" width="50px">
</div>

<div class="cards-child-stastics">
    <label class="cards-child-title">   اجمالي عدد الطلاب
</label>
    <div class="cards-child-numbers">0</div>
    <img src="{{Vite::image("students.png")}}" class="image-stastic" width="50px">
</div>




@endsection