@extends('layouts.home')
@section('nav')
<div class="hdr2" style=" box-shadow: 10px;">
    <button class=" spaces" onclick="window.location='{{ route('admin.department') }}'" > <label  class="subjectname">   الأدمن </label><img src="{{ Vite::image('left-arrow.png')}}" id="subject-icon-hdr2" width="40px" >
    </button>


</div>

{{-- <div class="hr3">
<button id="spacesbtn" onclick="window.location='{{ route('admin.department') }}'" class="spaces"> <img src="{{ Vite::image('left-arrow.png')}}" id="spaces1"  width="30px"></button>

</div> --}}
@endsection

    {{-- Stop trying to control. --}}
@section('content')
        <div class="container" >


            {{-- @forelse ($department->levels as $level)
    <a href="{{ route('admin.students_data', $level->id) }}" style="text-decoration: none; color: black;" >
        <div class="card  cards-departments" id="{{ $loop->index }}">
            <img src="{{ Vite::image('it.png') }}" class="" width="150px">
            <div with="150px">{{ $loop->index +1 }}</div>
            <div class="card-departments-child"> {{ $level->name }}</div>
        </div>
    </a>
@empty

@endforelse --}}

            @forelse ($levels as $level)

<div class="card  cards-departments depart-level-quality" id="" onclick="window.location='{{ route('admin.students_data',$level->id )}}' " >
    <img src="{{Vite::image("level1.png")}}" class="" width="150px">
    <div class="card-departments-child">  {{$level->name}}
    </div>
</div>
@empty
<div class="alert alert-danger" role="alert">
    لا يوجد مستويات
</div>
@endforelse
{{-- <div class="card  cards-departments depart-level-quality" id="" onclick="window.location='{{ route('admin.students_data') }}'" >
    <img src="{{Vite::image("level2.png")}}" class="" width="150px">
    <div class="card-departments-child"> مستوى ثاني
    </div>
</div>

<div class="card  cards-departments depart-level-quality" id="" onclick="window.location='{{ route('admin.students_data') }}'" >
    <img src="{{Vite::image("level3.png")}}" class="" width="150px">
    <div class="card-departments-child">   مستوى ثالث
    </div>
</div>

<div class="card  cards-departments depart-level-quality" id="" onclick="window.location='{{ route('admin.students_data') }}'" >
    <img src="{{Vite::image("level4.png")}}" class="" width="150px">
    <div class="card-departments-child"> مستوى  رابع
    </div>
</div> --}}

</div>
@endsection
