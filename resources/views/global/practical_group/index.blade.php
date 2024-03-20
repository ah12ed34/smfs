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
        <div class="col-md-12">
            <h1>المجموعات العملية</h1>
            <a href="{{route('practical_group.create',$group->id)}}" class="btn btn-primary">اضافة مجموعة عملية</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>اسم المجموعة</th>
                        <th>عدد الطلاب</th>
                        <td>{{ __('general.maxstudent') }}
                        <th>التحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sup_group as $practical_group)
                    <tr>
                        <td>{{$practical_group->name}}</td>

                        <td>{{$practical_group->students->count()}}</td>
                        <td>{{$practical_group->max_students}}</td>
                        <td>
                            {{-- <a href="{{route('practical_group.edit', $practical_group->id)}}" class="btn btn-warning">تعديل</a>
                            <a href="{{route('practical_group.show', $practical_group->id)}}" class="btn btn-info">عرض</a>
                            <form style="display: inline;" method="post" action="{{route('practical_group.destroy', $practical_group->id)}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">حذف</button>
                            </form> --}}
                            <a  class="btn btn-primary" href="{{route('practical_group.add-student', [$group->id,$practical_group->id])}}">اضافة طالب</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



@endsection
