@extends('layouts.home')
@section('nav')
@livewire('components.nav.admin.department', ['active' => 'academic_departments'])
@endsection
@section('content')



<div class="container"  >

    @forelse ($departments as $department)
<a href="{{ route('admin.academic',$department->id) }}" style="text-decoration: none; color: black;" >
    <div class="card  cards-departments" id="{{ $loop->index }}">
        <img src="{{Vite::image("academics.png")}}" class="" width="150px">
        <div class="card-departments-child"> {{ $department->name }}</div>
    </div>
</a>

@empty
<div class="alert alert-danger" role="alert">
    {{-- لا يوجد أقسام --}}
</div>
@endforelse

{{--
<div class="card  cards-departments" id="" onclick="window.location='{{ route('admin.academic') }}'" >
    <img src="{{Vite::image("academics.png")}}" class="" width="150px">
    <div class="card-departments-child"> تقنية المعلومات
    </div>
</div>

<div class="card  cards-departments" id="" onclick="window.location='{{ route('admin.academic') }}'" >
    <img src="{{Vite::image("academics.png")}}" class="" width="150px">
    <div class="card-departments-child">نظم المعلومات
    </div>
</div>

<div class="card  cards-departments" id="" onclick="window.location='{{ route('admin.academic') }}'" >
    <img src="{{Vite::image("academics.png")}}" class="" width="150px">
    <div class="card-departments-child">  علوم الحاسوب
    </div>
</div>

<div class="card  cards-departments" id="" onclick="window.location='{{ route('admin.academic') }}'" >
    <img src="{{Vite::image("academics.png")}}" class="" width="150px">
    <div class="card-departments-child"> الأمن السيبراني
    </div>
</div> --}}

</div>

@endsection
