@extends('layouts.home')

@section('content')
    <div class="container" dir="rtl">
        <div class="row">
            <a href="{{route('group')}}" class="btn btn-primary">الرجوع</a>
            <div class="card">
                <div class="card-header">
                    <h1>المجموعة</h1>
                </div>
                <div class="card-body">
                    <h5 class="card-title">اسم المجموعة: {{$group->name}}</h5>
                    <p class="card-text">عدد الطلاب: {{$group->students->count()}}</p>
                    <p class="card-text">اقصى عدد للطلاب: {{$group->max_students}}</p>
                    <p class="card-text">التخصص: {{$group->level->department->name}}</p>
                    <p class="card-text">المستوى: {{$group->level->name}}</p>
                </div>
            </div>
        {{-- عرض المواد على حسي المجموعة --}}
            
        </div>
    </div>
@endsection
