@extends('admin.layouts.app')

@section('title', 'لوحة التحكم')
@section('nav')
<div class="hdr2" style=" box-shadow: 10px;">

    <ul>
        <li><a class="active" href="#" style="text-decoration: none; float:right;">{{__('layout.home')}}</a></li>

    </ul>
</div>
@endsection
@section('content')

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
@endif
@if(session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
@endif

@endsection