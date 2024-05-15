@extends('layouts.home')
@section('nav')
@livewire('components.nav.admin.department', ['active' => 'statistics'])
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
    <label class="cards-child-title">  مساعدين أعضاء هيئة التدريس
</label>
    <div class="cards-child-numbers">0</div>
    <img src="{{ Vite::image('presentation (2).png') }}" class="image-stastic" width="50px">
</div>


@endsection
