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
        @livewire('create-exc')
@endsection
{{-- @section('style')

<style>
    .file-progress{
        text-align: center;
        align-items: center;
        justify-content: center;
    }
</style>
@endsection --}}
@section('script')
 {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
</script> --}}
@endsection
