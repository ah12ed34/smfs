@extends('layouts.home')

{{-- @section('nav')
    @livewire('components.nav.admin.department',['active' => 'academic','depa' => $depa])
@endsection --}}

@section('content')
<div class="container" style="position: absolute;
margin: 5vh 0;max-width: 84vw;">
    @livewire('admin.academic',['d' => $depa])
</div>
@endsection
