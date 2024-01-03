@extends('layouts.home')

@section('title', 'إنشاء طالب')
@section('content')
<div class="container">
<h1>إنشاء طالب</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="id">الرقم الاكاديمي</label>
        <input type="text" name="id" id="id" class="form-control">
    </div>

    <div class="form-group">
        <label for="name">الاسم</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>

    <div class="form-group">
        <label for="last_name">اللقب</label>
        <input type="text" name="last_name" id="last_name" class="form-control">
    </div>

    <div class="form-group">
        <label for="username">اسم المستخدم</label>
        <input type="text" name="username" id="username" class="form-control">
    </div>

    <div class="form-group">
        <label for="email">البريد الإلكتروني</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>

    <div class="form-group">
        <label for="password">كلمة المرور</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <div class="form-group">
        <label for="gender">الجنس</label>
        <select name="gender" id="gender" class="form-control">
            <option value="male" selected>ذكر</option>
            <option value="female">أنثى</option>
        </select>
    </div>

    <div class="form-group">
        <label for="image">الصورة</label>
        <input type="file" name="image" id="image" class="form-control">
    </div>

    <div class="form-group">
        <label for="department_id">القسم</label>
        <select name="department_id" id="department_id" class="form-control">
            @foreach ($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="level_id">المستوى</label>
        <select name="level_id" id="level_id" class="form-control">
            @foreach ($levels as $level)
                <option value="{{ $level->id }}">{{ $level->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="is_active">نشط</label>
        <input type="checkbox" name="is_active" id="is_active" value="1">
    </div>

    <div class="form-group">
        <label for="is_graduated">تخرج</label>
        <input type="checkbox" name="is_graduated" id="is_graduated" value="1">
    </div>

    <div class="form-group">
        <label for="is_suspended">موقوف</label>
        <input type="checkbox" name="is_suspended" id="is_suspended" value="1">
    </div>

    <button type="submit" class="btn btn-primary">إنشاء</button>
</form>
</div>
{{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> --}}

@endsection 
@section('script')
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
   

    $(document).ready(function () {
        $('#department_id').on('change', function () {
            var departmentId = $(this).val();

            // إلغاء تحديد المستوى الحالي
            $('#level_id').empty();

            // استدعاء الخدمة أو النهج الذي يقوم بإحضار المستويات بناءً على القسم
            $.ajax({
                type: 'GET',
                url: '/api/levels/' + departmentId, // قد تحتاج إلى تعديل هذا الرابط حسب تنظيم مشروعك
                success: function (data) {
                    // ملء الخيارات في قائمة المستويات
                    $.each(data, function (key, value) {
                        $('#level_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });
</script>
@endsection