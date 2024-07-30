@extends('layouts.home')
@section('nav')
    <div class="hdr2" style=" box-shadow: 10px;">
        <button class="spaces"> <label class="subjectname" style="margin-left: -10px;"> الجدول الدراسي </label><img
                src="{{ Vite::image('calendar (4).png') }}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
        </button>
       
        <div class="dep-sub-name">{{ auth()?->user()?->academic?->department?->name }}</div>
    </div>
 
@endsection
@section('content')
    <div class="container" style="padding-top: 30px;">

        <div class="card  cards-departments" id="" onclick="location.href='{{ route('mySchedule_studying') }}'">
            <img src="{{ Vite::image('timetable_academic.png') }}" class="" width="150px">
            <div class="card-departments-child"> جدولي الدراسي
            </div>
        </div>

        <div class="card  cards-departments" id=""
            onclick="location.href='{{ route('students_Schedule_studying') }}'">
            {{-- <img src="{{Vite::image("students.png")}}" class="" width="150px"   onclick="location.href='{{route('students_grades')}}'"> --}}
            <img src="{{ Vite::image('calendar_students.png') }}" class="" width="150px">

            <div class="card-departments-child"> جدول الطلاب
            </div>
        </div>

        <div class="card  cards-departments" id=""
            onclick="location.href='{{ route('classes_Schedules_studying') }}'">
            <img src="{{ Vite::image('timetable_classes.png') }}" class="" width="150px">
            <div class="card-departments-child"> جدول القاعات
            </div>
        </div>

      
        {{-- @if ($active['tab'] != 'HeadOfDepartment') --}}
            {{-- @role('HeadOfDepartment') --}}

            {{-- <div class="card  cards-departments " id=""
                onclick="location.href='{{ route('teachers_Schedules_studying') }}'">
                <img src="{{ Vite::image('academics.png') }}" class="" width="150px">
                <div class="card-departments-child"> جدول المدرسين
                </div>
            </div> --}}

         
        </div>
@endsection
