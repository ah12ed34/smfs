@section('nav')
@livewire('components.nav.manager_of_depart.managedepartlevel.students-groups-information-header', ['level' => $level])
@endsection
<div>
    {{-- The whole world belongs to you. --}}

        <div class="container"  style="padding-top: 20px;">

            <div class="table-responsive-xl">
                <table class="table" style=" width:100%;">
                    <thead class="table-header" style="font-size: 12px;">
                        <tr class="table-light" id="modldetials">
                            <th> التفاصيل </th>
                            <th> التلفون </th>
                            <th>   الأيمل</th>
                            <th> النظام </th>
                            <th>  اسم الطالب</th>
                            <th>   الرقم الأكاديمي</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                            <tr class="table-light" id="modldetials" style="margin-top:7px;">
                                <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#ModaldDetailsStudents" wire:click='showStudent("{{ $student->id }}")'
                                    >التفاصيل</button> </td>
                                <td>{{ $student->user->phone }}</td>
                                <td>{{ $student->user->email }}</td>
                                <td>{{ myapp::getSystem($student->system) }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->user_id }}</td>
                            </tr>

                        @empty
                            <tr class="table-light" id="modldetials" style="margin-top:7px;">
                                <td colspan="7">{{ __('No data') }}</td>
                            </tr>

                        @endforelse
                        {{-- <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <!-- <td><button type="submit" class="btn btn-primary btn-sm" id="btn-chat-edit" data-toggle="modal" data-target="#myModalEdite">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button> </td> -->
                             <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#ModaldDetailsStudents">التفاصيل</button> </td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                        </tr>

                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <!-- <td><button type="submit" class="btn btn-primary btn-sm" id="btn-chat-edit" data-toggle="modal" data-target="#myModalEdite">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button> </td> -->
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#ModaldDetailsStudents">التفاصيل</button> </td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                        </tr>
                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <!-- <td><button type="submit" class="btn btn-primary btn-sm" id="btn-chat-edit" data-toggle="modal" data-target="#myModalEdite">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button> </td> -->
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#ModaldDetailsStudents">التفاصيل</button> </td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>


<!-- The ModalDetailsStudents -->
<div class="modal fade" id="ModaldDetailsStudents" wire:ignore.self
style="90vh"
>
    <div class="modal-dialog modal-lg">
        <div class="modal-content ModaldDetailsAcademic" id="modal-content" style="background-color: #F6F7FA;height: 90vh;">

            <!-- Modal Header -->
            <div class="modal-header ModaldDetailsAcademic" id="modheader">
                التفاصيل
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body ModaldDetailsAcademic">
                @if ($openType == 'show')
                    <div class="form-group">

                    <img src="{{ $studentData?->user?->photo ? asset('storage/' . $studentData->user->photo) : Vite::image("profile.png")
                     }}"  width="100px" style="margin-left: 45%;  margin-top: 10px; border-radius: 50%;">




                        <div class="table-responsive ">
                            <table class="table details-academic " style="width:100%;" dir="rtl">
                                        <tr class="table-light" id="modldetials">
                                            <th style=" width:25%; "> الرقم الأكاديمي</th>
                                            <td>{{ $studentData->user_id }}</td>
                                        </tr>
                                        <tr class="table-light " id="modldetials">
                                            <th style=" width:25%; "> اسم الطالب</th>
                                            <td>{{ $studentData->name }}</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;"> تاريخ الميلاد</th>
                                            <td>{{ $studentData->user->birth_date }}</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;" > نوع الجندر</th>
                                            <td>{{ myapp::getStudentGender($studentData->user->gender) }}</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;"> القسم</th>
                                            <td>{{ $studentData?->department?->name }}</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;"> النظام</th>
                                            <td>{{ myapp::getSystem($studentData->system) }}</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;"> تاريخ الإلتحاق</th>
                                            <td>{{ $studentData->join_date }}</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;"> الإيمل الجامعي </th>
                                            <td>{{ $studentData->user->email }}</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="width: 25%;">التلفون </th>
                                            <td>{{ $studentData->user->phone }}</td>
                                        </tr>
                            </table>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Modal footer -->

            <div class="modal-footer ModaldDetailsAcademic">
                <!-- <button type="submit" class="btn btn-primary" id="btnsave">حفظ</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel">إلغاء</button> -->
            </div>
        </div>
    </div>
</div>

</div>
