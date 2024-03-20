@extends('layouts.home')

@section('content')
    <div class="container" dir="rtl">
        <div class="row">
            <h1>اضافة مجموعة عملية</h1>
            <form method="post" action="{{route('practical_group.store',$group->id)}}">
                @csrf
                <div class="form-group">
                    <label for="practical_group_name">اسم المجموعة</label>
                    <input type="text" class="form-control" id="practical_group_name" name="practical_group_name" required>
                </div>
                <div class="form-group">
                    <label for="max_students">اقصى عدد للطلاب</label>
                    <input type="number" class="form-control" id="max_students" name="max_students" max="{{ $group->max }}" required>
                </div>
                <div class="form-group">
                    <label>المجموعة الرئيسية</label>
                    <input type="text" class="form-control" value="{{$group->name}}" disabled>
                    <input type="hidden" name="group_id" value="{{$group->id}}">
                </div>
                <div class="form-group">
                    <label>المستوى</label>
                    <input type="text" class="form-control" value="{{$group->level->name}}" disabled>
                </div>
                <div class="form-group">
                    <label>التخصص</label>
                    <input type="text" class="form-control" value="{{$group->level->department->name}}" disabled>
                </div>

                <button type="submit" class="btn btn-primary">اضافة</button>
            </form>
        </div>
    </div>
@endsection
