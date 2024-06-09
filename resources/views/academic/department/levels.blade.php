@extends('layouts.home')
@section('nav')
@include('academic.department.nav')
@endsection

@section('content')
<div dir="rtl">
@forelse ($department->levels as $level)
    <a href="{{ route('group', $level->id) }}" style="text-decoration: none; color: black;" >
        <div class="card  cards-departments" id="{{ $loop->index }}">
            {{-- <img src="{{ Vite::image('it.png') }}" class="" width="150px"> --}}
            <div with="150px">{{ $loop->index +1 }}</div>
            <div class="card-departments-child"> {{ $level->name }}</div>
        </div>
    </a>
@empty

@endforelse
</div>

@endsection
