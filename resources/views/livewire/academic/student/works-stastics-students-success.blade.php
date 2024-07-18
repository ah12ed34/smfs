<div>
    {{-- The Master doesn't talk, he acts. --}}
@section('nav')
    @livewire('components.nav.academic.students',['group_subject'=>$group_subject,'active'=>'null'])
@endsection
    {{-- In work, do what you enjoy. --}}
<div class="container" id="container-project" style="  padding-top: 30px;">



    <div class="table-responsive">
        <table class="table" style=" width:100%;">
            <thead class="table-header" style="font-size: 12px;">
                <tr class="table-light" id="modldetials">
                    {{-- <th>ملاحظة</th> --}}
                    <th>التقدير </th>
                    <th>المجموع النهائي</th>
                    @if($group_subject->HasPractical())
                    <th>العملي المجموع</th>
                    <th>مشاريع العملي</th>
                    <th>التكليف العملي</th>
                    <th>الإختبار النصفي العملي</th>
                    <th>الحضور والغياب العملي</th>
                    @endif
                    <th>المجموع</th>
                    <th>الإختبار النهائي</th>

                    <th> المشروع</th>
                    <th>التكليف</th>
                    <th> الإختبار النصفي </th>
                    <th> درجة الحضور والغياب</th>
                    <th> اسم الطالب</th>
                    <th> الرقم الأكتديمي</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                <tr class="table-light" id="modldetials" style="margin-top:7px;">
                    {{-- <td>*******</td> --}}
                    <td>{{ $student->Appreciation }}</td>
                    <td>{{ $student->total_grade }}</td>
                    @if($group_subject->HasPractical())
                    <td>{{ $student->practical_total_grade }}</td>
                    {{-- <td>{{ $student->practical_project_grade }}</td> --}}
                    <td>{{ $student->practical_work_grade + $student->practical_group_grade }}</td>
                    <td>{{ $student->practical_delivery_grade   }}</td>
                    <td>{{ $student->practical_helf_grade }}</td>
                    <td>{{ $student->practical_persents }}</td>

                    @endif
                    <td>{{ $student->theory_total_grade }}</td>
                    <td>{{ $student->final_grade }}</td>
                    <td>{{ $student->work_grade + $student->group_grade }}</td>
                    <td>{{ $student->delivery_grade }}</td>
                    <td>{{ $student->helf_grade }}</td>
                    <td>{{ $student->persents }}</td>
                    <td>{{ $student->user->full_name }}</td>
                    <td>{{ $student->user_id }}</td>
                </tr>
                @empty
                <tr class="table-light" id="modldetials" style="margin-top:7px;">
                    <td @if($group_subject->HasPractical()) colspan="15" @else colspan="10" @endif
                     style="text-align: center;">لا يوجد طلاب</td>
                </tr>
                @endforelse
                {{-- <tr class="table-light">
                    <td>*******</td>
                    <td>*******</td>
                    <td>***** </td>
                    <td>***** </td>
                    <td>***** </td>
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                    <td>***** </td>
                    <td>***** </td>
                    <td>***** </td>
                </tr>
                <tr class="table-light">
                    <td>*******</td>
                    <td>*******</td>
                    <td>***** </td>
                    <td>***** </td>
                    <td>***** </td>
                    <td>*******</td>
                    <td>*******</td>
                    <td>*******</td>
                    <td>***** </td>
                    <td>***** </td>
                    <td>***** </td>
                </tr> --}}
            </tbody>
        </table>
        <nav>
            {{ $students->links(myapp::viewPagination) }}
        </nav>
    </div>









<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content2">

            <!-- Modal Header -->
            <div class="modal-header" id="modheader">
                ارسال اشعار
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" style="display: block;">
                    <div class="form-group">
                        <!-- <label for="usr">Name:</label> -->

                        <textarea type="text" class="form-control-file border" id="comment" name="comment" style="height: 70px; margin-top:8px"></textarea>
                    </div>

                </form>
            </div>

            <!-- Modal footer -->

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="btnsave-file" style="float: left; margin-left:30px;">ارسال</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel-file">إلغاء</button>
            </div>
        </div>
    </div>
</div>

</div>
</div>
