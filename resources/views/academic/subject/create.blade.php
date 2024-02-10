@extends('layouts.home')
@section('content')
<div class="container">
    <h4>إضافة مادة</h4>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ol class="list-unstyled">
                @foreach ($errors->all() as $error)
                    @if (!$loop->first)
                        <br />
                        @else
                        <li class="list-item">الرجاء تصحيح الأخطاء التالية:</li>
                    @endif
                    <li class="list-item">{{ $error }}</li>
                @endforeach
            </ol>
        </div>
    @endif
    <form action="{{ route('subject.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="subjectname">اسم المادة</label>
            <input type="text" class="form-control" id="subject_name" name="subjectname" placeholder="اسم المادة">
        </div>
        <div class="form-group">
            <label for="code">كود المادة</label>
            <input type="text" class="form-control" id="code" name="code" placeholder="كود المادة">
        </div>

        <div class="form-group">
            <label for="level_id">المستوى</label>
            <select class="form-control" id="level_id" name="level_id">
                @foreach ($departments as $department)
                    <optgroup label="{{ $department->name }}">
                        @foreach ($department->levels as $level)
                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="semester_id">الفصل الدراسي</label>
            <input type="text" class="form-control" id="semester_id" name="semester_id" placeholder="الفصل الدراسي">
        </div>

        <div class="form-group">
            <label for="hours">صورة المادة</label>
            <input type="file" accept=".jpeg, .jpg, .png" class="form-control" id="image" name="image" placeholder="صورة المادة" />
        </div>

        {{-- <div class="form-group">
            <label for="description">وصف المادة</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="وصف المادة"></textarea>
        </div> --}}

        <button type="submit" class="btn btn-primary">إضافة</button>
    </form>

</div>
@endsection
