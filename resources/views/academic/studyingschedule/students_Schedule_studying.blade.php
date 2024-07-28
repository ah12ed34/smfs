@extends('layouts.home')
@section('nav')


<div class="hdr2" style=" box-shadow: 10px;">
    <button class="spaces"> <label  class="subjectname" style="margin-left: -10px;"> الجدول الدراسي </label><img src="{{Vite::image("calendar (4).png")}}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
    </button>
    <div class="dep-sub-name">{{ auth()->user()->academic->department->name }} </div>
</div>
<div class="hr3">
    <button id="spacesbtn" onclick="window.location='{{ route('main_academic_sechedules') }}'" class="spaces"> <img src="{{ Vite::image('left-arrow.png')}}" id="spaces1"  width="30px"></button>

    </div>
@endsection
@section("content")


{{-- <div class="container" style=" padding-top: 10px;"> --}}

    <div class="container" style="padding-top: 30px;">

        <div class="table-responsive-xl">
            <table class="table" style=" width:100%;">
                <thead class="table-header" style="font-size: 12px;">
                    <tr class="table-light" id="modldetials">
                        <th>عرض الجدول</th>
                        <th>المستوى</th>
                        <th>طلاب\طالبات</th>
                        <th> النظام </th>
                        <th>  اسم المجموعة</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($groups as $group)
                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <td><button type="submit" class="btn btn-primary btn-sm btn_detials" id="" data-toggle="modal" data-target="#DisplaySeheduleModal">عرض الجدول</button> </td>
                            <td>{{ $group->level->name }}</td>
                            <td>{{ $group->g_gender }}</td>
                            <td>{{ $group->g_system }}</td>
                            <td>{{ $group->name }}</td>
                        </tr>
                    @empty

                    @endforelse


                </tbody>
            </table>
        </div>

<!-- The ModalDetailsStudents -->
<div class="modal fade" id="DisplaySeheduleModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content ModaldDetailsAcademic" id="modal-content" style="background-color: #F6F7FA; height:95vh;">

            <!-- Modal Header -->
            <div class="modal-header ModaldDetailsAcademic" id="modheader">
                عرض الجدول
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body ModaldDetailsAcademic">


                <img class="img-fluid" src="{{Vite::image("studyingScheule.png")}}" id="studying-schedule" height="100%">

            </div>

            <!-- Modal footer -->

            <div class="modal-footer ModaldDetailsAcademic">
                <!--<button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="">حفظ</button>
                <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button> -->
            </div>
        </div>
    </div>
    </div>

{{-- <div   class="card w-100 h-100 right-6 left-0 top-2  " id="card-img-schedule" >
    <div class="card  maxh-10 w-100 right-0 left-0 top-0  badge-primary text-bg-light text-center font-medium" id="card-title-schedule" >  جدول الأكادميين</div>
    <img class="img-fluid" src="{{$academic->schedule? asset('storage/'.$academic->schedule):null}}" alt='جدوال'  width="600px" height="350px">
</div> --}}

{{-- <div   class="card w-100 h-100 right-6 left-0 top-2 " id="card-img-schedule">
    <div class="card h-10 w-100 right-0 left-0 top-0  badge-primary text-bg-light text-center font-medium" id="card-title-schedule" >   جدول مجموعة 1</div>
    <img class="img-fluid" src="{{Vite::image("studstudyingScheule.png")}}"  width="600px" height="350px" style="padding-top: 20px">
</div>

<div   class="card w-100 h-100 right-6 left-0 top-2 " id="card-img-schedule">
    <div class="card h-10 w-100 right-0 left-0 top-0  badge-primary text-bg-light text-center font-medium" id="card-title-schedule" >  جدول مجموعة 2</div>
    <img class="img-fluid" src="{{Vite::image("studstudyingScheule.png")}}"  width="600px" height="350px" style="padding-top: 20px">
</div>

<div   class="card w-100 h-100 right-6 left-0 top-2 " id="card-img-schedule">
    <div class="card h-10 w-100 right-0 left-0 top-0  badge-primary text-bg-light text-center font-medium"  id="card-title-schedule" >  جدول مجموعة 3</div>
    <img class="img-fluid" src="{{Vite::image("studstudyingScheule.png")}}"  width="600px" height="350px" style="padding-top: 20px">
</div> --}}




</div>


@endsection

