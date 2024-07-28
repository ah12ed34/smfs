@section('nav')
@livewire('components.nav.manager_of_depart.managedepartlevel.all-sechedules-studyinhg-header',
['level'=>$level,'schedules'=>$active,'groups'=>$groups,'teachers'=>$teachers
])
@endsection
<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

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
                            <td><button type="submit" class="btn btn-primary btn-sm btn_detials" id="" data-toggle="modal" data-target="#DisplaySeheduleModal" wire:click='showSchedule({{ $group->id }})'>عرض الجدول</button> </td>
                            <td>{{ $group->level->name }}</td>
                            <td>{{ $group->g_gender }}</td>
                            <td>{{ $group->g_system }}</td>
                            <td>{{ $group->name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">لا يوجد بيانات</td>
                        </tr>
                    @endforelse


                </tbody>
            </table>
        </div>

<!-- The ModalDetailsStudents -->
<div class="modal fade" id="DisplaySeheduleModal" wire:ignore.self>
    <div class="modal-dialog  modal-lg">
        <div class="modal-content ModaldDetailsAcademic" id="modal-content" style="background-color: #F6F7FA; height:90vh;">

            <!-- Modal Header -->
            <div class="modal-header ModaldDetailsAcademic" id="modheader">
                عرض الجدول
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body ModaldDetailsAcademic">

                @if($schedule)
                    <img class="img-fluid" src="{{$schedule}}" alt='جدوال'  width="600px" height="350px">
                @else
                    <div class="text-center">لا يوجد جدول</div>
                @endif
            </div>

            <!-- Modal footer -->

            <div class="modal-footer ModaldDetailsAcademic">

            </div>
        </div>
    </div>
    </div>



</div>
</div>
