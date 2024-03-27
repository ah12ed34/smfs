@extends('layouts.home')

@section('content')

@forelse ($departments as $department)
<a href="{{ route('department.levels',$department->id) }}" style="text-decoration: none; color: black;" >
    <div class="card  cards-departments" id="{{ $loop->index }}">
        <img src="{{ Vite::image('it.png') }}" class="" width="150px">
        <div class="card-departments-child"> {{ $department->name }}</div>
    </div>
</a>

@empty

@endforelse


@endsection
