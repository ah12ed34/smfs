@extends('layouts.home')

@section('title', 'Home|SFMS')
@section('content')
<div class="responsive"></div>
{{-- <a href="{{route('subject.index')}}"> --}}

    @forelse($academic->courses as $course)
        <div class="card" onclick="location.href='{{route('subject.index',[$course->subject_id,$course->group_id])}}'" style="cursor: pointer;">
         <img src="{{ $course->subject()->image ? asset('storage/'.$course->subject()->image) :
            Vite::image('allocation (1).png') }}"  width="150px">
            <div class="card-child-1"> {{ $course->subject()->name_ar .' '.$course->subject()->name_en }} <br>{{ $course->group->level->name .' - '.$course->group->level->department->name }}<br>
            {{ $course->teacher->user->name }}
        </div>
    </div>

    @empty
        <br>
        <h1>{{ __('general.no_subjects') }}</h1>
        <br>
    @endforelse


@endsection
