@extends('layouts.home')
@section('content')

<form method="POST" action="{{ route('department.store') }}">
    @csrf

    <div class="form-group">
        <label for="dep_id">الرقم</label>
        <input type="text" class="form-control @error('dep_id') is-invalid @enderror" id="dep_id" name="dep_id" value="{{ old('dep_id') }}" required>
        @error('dep_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="name">الاسم</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">إنشاء</button>
</form>
@endsection