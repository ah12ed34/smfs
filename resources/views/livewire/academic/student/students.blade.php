@section('nav')
    @livewire('components.nav.academic.students', ['group_subject' => $group_subject, 'active' => 'students'])
@endsection
<div>
    <div class="responsive"></div>


    <div class="container" id="container-project" style="  padding-top: 30px;">

        <div class="table-responsive-xl">
            <table class="table" style=" width:100%;">
                <thead class="table-header" style="font-size: 12px;">
                    <tr class="table-light" id="modldetials">
                        <th>تعديل</th>
                        <th>عرض</th>
                        {{-- <th>ملاحظة</th> --}}
                        <th>التقدير</th>
                        <th>المجموع</th>
                        @if ($group_subject->HasPractical())
                            <th>العملي</th>
                        @endif
                        <th>المشاريع </th>
                        <th>التكاليف</th>
                        <th>النصفي</th>
                        <th>المشاركة </th>
                        <th>الحضور </th>
                        <th>اسم الطالب</th>
                        <th>الرقم الأكاديمي </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                        {{-- @dd($student) --}}
                        {{-- @dd($this->total) --}}
                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal"
                                    data-target="#myModalEdite" wire:click='select({{ $student->user_id }})'>تعديل <img
                                        src="{{ Vite::image('edit.png') }}" id="" width="15px"></button>
                            </td>
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials"
                                    data-toggle="modal" data-target="#myModalDisplay"
                                    wire:click='select({{ $student->user_id }})'>عرض</button> </td>
                            {{-- <td>*******</td> --}}
                            <td>{{ $student->Appreciation }}</td>
                            <td>{{ $student->total_grade }}</td>
                            @if ($group_subject->HasPractical())
                                <td>{{ $student->practical_total_grade }}</td>
                            @endif
                            <td>{{ $student->work_grade + $student->group_grade }}</td>
                            <td>{{ $student->delivery_grade }}</td>
                            <td>{{ $student->helf_grade }}</td>
                            <td>{{ $student->addional_grades }}</td>
                            <td>{{ $student->persents }}</td>
                            {{-- <td>{{ $addional_grades[$student->user_id] }}</td>
                            <td>{{  }}
                            <td>{{ $persents[$student->user_id] }}</td> --}}
                            <td>{{ $student->full_name }}</td>
                            <td>{{ $student->user_id }}</td>
                        </tr>
                    @empty
                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <td colspan="12" style="text-align: center;">لا يوجد طلاب</td>
                        </tr>
                    @endforelse



                </tbody>
            </table>
        </div>
    </div>

    <nav>
        {{ $students->links(myapp::viewPagination) }}
    </nav>




    <!-- The ModalDisplaydata -->
    <div class="modal fade" id="myModalDisplay" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content modal_content_css" id="modal-content"
                style="background-color: #F6F7FA;height:30%;">

                <!-- Modal Header -->
                <div class="modal-header modal_header_css" id="modheader" style="text-align: center;">
                    <!-- &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  -->
                    بيان الدرجات<button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    @if ($student_selected)
                        <div class="form-group">
                            <label style="font-size: 14px;">الرقم الأكاديمي:
                                {{ $student_selected->user_id ?? '' }}</label>
                            <br> <label style="font-size: 14px;">اسم الطالب:
                                {{ $student_selected->user->full_name ?? '' }}</label>
                            <br> <label style="font-size: 14px;">المادة:
                                {{ $group_subject->subject()->name_ar ?? '' }}</label>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="table-header" style="font-size: 11px;">
                                        <tr class="table-primary" id="modldetials">
                                            {{-- <th>ملاحظة</th> --}}
                                            <th>التقدير</th>
                                            @if ($group_subject->HasPractical())
                                                <th>المجموع الكلي</th>
                                            @endif
                                            <th>المجموع</th>
                                            <th>المشاريع </th>
                                            <th>التكاليف</th>
                                            <th>النصفي</th>
                                            <th>المشاركة </th>
                                            <th>الحضور </th>
                                            <th>نوع المادة</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                                            @if ($group_subject->HasPractical())
                                                <td style="align-content: center;" rowspan="2">
                                                    {{ $student_selected->Appreciation }}</td>
                                                <td style="align-content: center;" rowspan="2">
                                                    {{ $student_selected->total_grade }}</td>
                                                <td>{{ $student_selected->theory_total_grade }}</td>
                                            @else
                                                <td>{{ $student_selected->Appreciation }}</td>
                                                <td>{{ $student_selected->total_grade }}</td>
                                            @endif
                                            <td>{{ $student_selected->work_grade + $student_selected->group_grade }}
                                            </td>
                                            <td>{{ $student_selected->delivery_grade }}</td>
                                            <td>{{ $student_selected->helf_grade }}</td>
                                            <td>{{ $student_selected->addional_grades }}</td>
                                            <td>{{ $student_selected->persents }}</td>
                                            @if ($group_subject->IsPractical())
                                                <td>عملي</td>
                                            @else
                                                <td>نظري</td>
                                            @endif
                                        </tr>
                                        @if ($group_subject->HasPractical())
                                            <tr class="table-light" id="modldetials" style="margin-top:7px;">
                                                {{-- <td rowspan=""></td> --}}
                                                <td>{{ $student_selected->practical_total_grade }}</td>
                                                <td>{{ $student_selected->practical_work_grade + $student_selected->practical_group_grade }}
                                                </td>
                                                <td>{{ $student_selected->practical_delivery_grade }}</td>
                                                <td>{{ $student_selected->practical_helf_grade }}</td>
                                                <td>{{ $student_selected->practical_addional_grades }}</td>
                                                <td>{{ $student_selected->practical_persents }}</td>
                                                <td>عملي</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div> -->
                    @endif
                </div>

                <!-- Modal footer -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-light" id="print" disabled>طباعة <img
                            src="{{ Vite::image('printing.png') }}" id="" width="15px"></button>
                </div>
            </div>
        </div>
    </div>

    <!-- The ModalEdite -->
    <div class="modal fade" id="myModalEdite" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content modal_content_css" id="modal-content"
                style="background-color: #F6F7FA;height:40%;">

                <!-- Modal Header -->
                <div class=" modal-header modal_header_css" id="modheader" style="padding-left: 47%;">
                    تعديل
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form style="display: block;">
                        <div class="form-group">
                            <label style="font-size: 14px;">الرقم الأكاديمي:
                                {{ $student_selected->user_id ?? '' }}</label>
                            <br> <label style="font-size: 14px;">اسم الطالب:
                                {{ $student_selected->user->full_name ?? '' }}</label>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="table-header" style="font-size: 12px;">
                                        <tr class="table-light" id="modldetials">
                                            <th>النصفي</th>
                                            <th>المشاركة </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-light" id="modldetials" style="margin-top:7px;">

                                            <td> <input type="number" class="form-control" id="inputtext"
                                                    wire:model='midterm_exam' placeholder=""
                                                    style="height: 30px; margin-top:-6px;box-shadow:none;border:none;text-align:center;">
                                            </td>
                                            <td> <input type="number" class="form-control" id="inputtext"
                                                    wire:model="working" placeholder=""
                                                    style="height: 30px; margin-top:-6px;box-shadow:none;border:none;text-align:center;">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div> -->
                    </form>
                </div>

                <!-- Modal footer -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id=""
                        wire:click='save' wire:loading.attr="disabled" wire:target="save">حفظ</button>
                    {{-- >حفظ</button> --}}
                    <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal"
                        id="">إلغاء</button>
                </div>
            </div>
        </div>
    </div>

    <!-- <img src="{{ Vite::image('allocation (1).png') }}" class="" width="150px">
        <div class="card-child-1"> Distributed System نظم تشغيل <br> تقنية معلومات - مستوى رابع<br>أ.منال العريقي
        </div>
    </div>
    <div class="card" style="margin-left: 22px;">
        <img src="{{ Vite::image('allocation (1).png') }}" class="" width="150px">
        <div class="card-child-1"> Networks Management إدارة شبكات <br> تقنية معلومات - مستوى رابع<br>أ.منال العريقي
        </div> -->
    @section('script')
        <script>
            window.addEventListener('closeModal', event => {
                $('#myModal').modal('hide');
                $('#myModalDisplay').modal('hide');
                $('#myModalEdite').modal('hide');
            });
        </script>
    @endsection

</div>
