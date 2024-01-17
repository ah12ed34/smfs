@extends('layouts.home')

@section('content')
<div class="container">
    <h1>تحميل ملف Excel</h1>
        <hr>
        <br>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <br>
     <div class="file-upload" style="display: none">
        <form action="{{ route('student.store-excel') }}" method="POST" enctype="multipart/form-data">
            @csrf
     

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
                <label for="file">تحميل ملف Excel</label>
                <input type="file" class="form-control-file" id="file" name="file">
            </div>
            <button type="submit" class="btn btn-primary">تقديم</button>
        </form>
</div>

<div class="file-progress">
    <br>
    <br>
    <br>
    <br>
<samp id="fill_name_progress" >اسم الملف</samp>
<div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
    aria-valuenow="75" 
    aria-valuemin="10" 
    aria-valuemax="100" 
    style="width: 5%;">0%</div>
</div>
<br>
<br>
<br>
<br>
<br>
</div>
</div>
@endsection
@section('style')

<style>
    .file-progress{
        text-align: center;
        align-items: center;
        justify-content: center;
    }
</style>
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
                    if (data.error) {
                        location.href = "{{  route('level.create') }}?error=" + encodeURIComponent(data.error)+"&dep_id="+departmentId;
                    }
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