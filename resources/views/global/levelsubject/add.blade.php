@extends('layouts.home')

@section('content')
@livewire('global.levelsubject.add-subject' ,['level'=>$level] )
@endsection
