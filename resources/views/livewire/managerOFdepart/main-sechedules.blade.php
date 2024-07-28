<div>
    {{-- The Master doesn't talk, he acts. --}}
    {{-- <div class="container" style="padding-top: 30px;">

        <div class="card  cards-departments" id="" onclick="location.href='{{route('mySchedule_studying')}}'">
            <img src="{{Vite::image("timetable_academic.png")}}" class="" width="150px" >
            <div class="card-departments-child">     جدولي الدراسي
            </div>
        </div>

        <div class="card  cards-departments" id="" onclick="location.href='{{route('students_Schedule_studying')}}'">
            <img src="{{Vite::image("calendar_students.png")}}" class="" width="150px"  >

            <div class="card-departments-child"> جدول المستويات
            </div>
        </div>

        <div class="card  cards-departments" id="" onclick="location.href='{{route('classes_Schedules_studying')}}'">
            <img src="{{Vite::image("timetable_classes.png")}}" class="" width="150px"  >
            <div class="card-departments-child"> جدول القاعات
            </div>
        </div>


        <div class="card  cards-departments " id="" onclick="location.href='{{route('teachers_Schedules_studying')}}'" >
            <img src="{{Vite::image("academics.png")}}" class="" width="150px"  >
            <div class="card-departments-child"> جدول المدرسين
            </div>
    </div>


</div> --}}
<?php
if(!isset($active['tab'])){
    $active['tab'] = null ;
}
?>
    @if ($active ['tab'] != 'HeadOfDepartment')
        {{-- @role('HeadOfDepartment') --}}

             @include('academic.studyingschedule.main_academic_sechedules')

   @endif
</div>
