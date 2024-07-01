@extends('layouts.home')
@section('nav')
@livewire('components.nav.admin.department',['active' => 'statistics'])
@endsection

@section('content')

<div class="cards-child-stastics">
    <label class="cards-child-title">   الطلاب
</label>
    <div class="cards-child-numbers">{{ $totleStudents }}</div>
    <img src="{{ Vite::image('students.png') }}" class="image-stastic" width="50px">
</div>

<div class="cards-child-stastics">
    <label class="cards-child-title">    أعضاء هيئة التدريس
</label>
    <div class="cards-child-numbers">{{ $totleTeachers}}</div>
    <img src="{{ Vite::image('presentation (2).png') }}" class="image-stastic" width="50px">
</div>

<div class="cards-child-stastics">
    <label class="cards-child-title"> مساعدين اعضاء هيئة التدريس
</label>
    <div class="cards-child-numbers">0</div>
    <img src="{{ Vite::image('presentation (2).png') }}" class="image-stastic" width="50px">
</div>

<div class="cards-child-stastics">
    <label class="cards-child-title"> الأداريين
</label>
    <div class="cards-child-numbers">0</div>
    <img src="{{ Vite::image('managers.png') }}" class="image-stastic" width="50px">
</div>

<div class="cards-child-stastics">
    <label class="cards-child-title">  موظفين شؤون الطلاب
</label>
    <div class="cards-child-numbers">0</div>
    <img src="{{ Vite::image('studentsAffairs.png') }}" class="image-stastic" width="50px">
</div>

<div class="cards-child-stastics">
    <label class="cards-child-title">  موظفين الكنترول
</label>
    <div class="cards-child-numbers">0</div>
    <img src="{{ Vite::image('controll.png') }}" class="image-stastic" width="50px">
</div>

<div class="cards-child-stastics">
    <label class="cards-child-title">  موظفين الجداول
</label>
    <div class="cards-child-numbers">0</div>
    <img src="{{ Vite::image('empoloyee_scheduls.png') }}" class="image-stastic" width="50px">
</div>

<div class="cards-child-stastics">
    <label class="cards-child-title">  موظفين الجودة
</label>
    <div class="cards-child-numbers">0</div>
    <img src="{{ Vite::image('quality.png') }}" class="image-stastic" width="50px">
</div>

<div class="cards-child-stastics">
    <label class="cards-child-title">   جميع الموظفين
</label>
    <div class="cards-child-numbers">0</div>
    <img src="{{ Vite::image('all_employees.png') }}" class="image-stastic" width="50px">
</div>


@endsection
