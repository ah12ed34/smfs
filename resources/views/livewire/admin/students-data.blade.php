    {{-- The whole world belongs to you. --}}
@section('nav')
@livewire('components.nav.admin.students-data-header', ['level' => $level])
@endsection
<div>

    {{-- Stop trying to control. --}}
        <div class="container" style="padding-top: 30px;">

        <div class="card  cards-departments" id="">
            <img src="{{Vite::image("students.png")}}" class="" width="150px" onclick="location.href='{{route('students_information', $level->id)}}'">
            <div class="card-departments-child">    بيانات الطلاب
            </div>
        </div>

        <div class="card  cards-departments" id="">
            <img src="{{Vite::image("students.png")}}" class="" width="150px"   onclick="location.href='{{route('students_grades')}}'">
            <div class="card-departments-child"> درجات الطلاب
            </div>
        </div>

        <div class="card  cards-departments" id="">
            <img src="{{Vite::image("Groups.png")}}" class="" width="150px" style="margin-top:18px;" onclick="location.href='{{route('students_Main_groups', $level->id)}}'">
            <div class="card-departments-child"> المجموعات
            </div>
        </div>

        </div>


</div>
