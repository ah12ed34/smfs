@extends('layouts.home')
@section('nav')
<div class="hdr2" style=" box-shadow: 10px;">
    <button class=" spaces" onclick="window.location='{{ route('control_grades_departments') }}'" > <label  class="subjectname">   الكنترول </label><img src="{{ Vite::image('left-arrow.png')}}" id="subject-icon-hdr2" width="40px" >
    </button>


</div>

{{-- <div class="hr3">
<button id="spacesbtn" onclick="window.location='{{ route('admin.department') }}'" class="spaces"> <img src="{{ Vite::image('left-arrow.png')}}" id="spaces1"  width="30px"></button>

</div> --}}
@endsection

    {{-- Stop trying to control. --}}
@section('content')
        <div class="container" style="padding-top: 20px;">

<div class="card  cards-departments depart-level-quality" id="" onclick="window.location='{{ route('control_grades_main') }}'" >
    <img src="{{Vite::image("level1.png")}}" class="" width="150px">
    <div class="card-departments-child">  مستوى  اول
    </div>
</div>

<div class="card  cards-departments depart-level-quality" id="" onclick="window.location='{{ route('control_grades_main') }}'" >
    <img src="{{Vite::image("level2.png")}}" class="" width="150px">
    <div class="card-departments-child"> مستوى ثاني
    </div>
</div>

<div class="card  cards-departments depart-level-quality" id="" onclick="window.location='{{ route('control_grades_main') }}'" >
    <img src="{{Vite::image("level3.png")}}" class="" width="150px">
    <div class="card-departments-child">   مستوى ثالث
    </div>
</div>

<div class="card  cards-departments depart-level-quality" id="" onclick="window.location='{{ route('control_grades_main') }}'" >
    <img src="{{Vite::image("level4.png")}}" class="" width="150px">
    <div class="card-departments-child"> مستوى  رابع
    </div>
</div>

</div>
@endsection
