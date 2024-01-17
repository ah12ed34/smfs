@extends('layouts.home')

@section('content')
    <h1>إنشاء مستوى</h1>
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error')}}{{ session()->forget('error')  }}

    </div>
@endif
{{-- @if(isset('error'))
    <div class="alert alert-danger">
        {{ $error }}
    </div>
@endif --}}


<form method="POST" action="{{ route('level.store') }}">
    @csrf

    <div class="form-group">
        <label for="level_id">الرقم</label>
        <input type="text" class="form-control @error('level_id') is-invalid @enderror" id="level_id" name="level_id" value="{{ old('level_id') }}" required>
        @error('level_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="level_name">الاسم</label>
        <input type="text" class="form-control @error('level_name') is-invalid @enderror" id="level_name" name="level_name" value="{{ old('level_name') }}" required>
        @error('level_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for='dep_id'>التخصص</label>
        <select name='department_id' id="dep_id" class="form-control">
            @foreach ($dep as $department)
            <option value="{{ $department->id }}" 
                @if(old('department_id') == $department->id || (session('dep_id') == $department->id))
                    selected
                    {{ session()->forget('dep_id') }}
                @endif
            >
                {{ $department->name }}
            </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">إنشاء</button>

@endsection