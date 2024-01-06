@extends('layouts.home')

@section('content')
<div class="container">
    <h1>إنشاء اكادمي</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('academic.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="status">الحالة</label>
            <input type="text" name="status" id="status" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="academic_name">الاسم الوضيفي</label>
            <input type="text" name="academic_name" id="academic_name" class="form-control">
        </div>
<br>

        <button type="submit" class="btn btn-primary">إنشاء</button>
    </form>
    </div>
@endsection