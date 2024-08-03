<div>
    {{-- The best athlete wants his opponent at his best. --}}

    <!-- The ModalDetailsStudents -->
    <div class="modal fade" id="AddStudentsIntoGroupModal" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content addacademic" id="modal-content" style="background-color: #F6F7FA; height:90vh;">

                <!-- Modal Header -->
                <div class="modal-header addacademic" id="modheader">
                    اضافة الطلاب
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body " style="overflow-y: scroll;">
                    @if ($AddStudentsIntoGroup)
                        <div class="form-group">

                            <!-- <img src="../../images/profile.png"  width="100px" style="margin-left: 45%;  margin-top: 10px; border-radius: 50%;"> -->

                            <div class="table-responsive-xl">
                                <table class="table Table_AddStudentsIntoGroup_in_Modal" style=" width:100%;">
                                    <thead class="table-header" style="font-size: 12px;">
                                        <tr class="table-light" id="modldetials">
                                            <th> <input type="checkbox" class="" wire:model.lazy="selectAll"
                                                    @if (sizeof($studentsAdd) <= 0) disabled @endif id="selectAll">
                                            </th>
                                            <th>{{ __('general.gender') }}</th>
                                            <th> النظام </th>
                                            <th> اسم الطالب</th>
                                            <th style="width: 100px;"> الرقم الأكاديمي</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($studentsAdd as $student)
                                            <tr class="table-light" id="modldetials" style="margin-top:7px;">
                                                <td><input type="checkbox" class=""
                                                        wire:model.lazy="selectedStudents"
                                                        value="{{ $student->user_id }}" id="{{ $student->user_id }}">
                                                </td>
                                                <td>{{ $student->user->gender_ar() }}
                                                <td>{{ $student->system() }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->user_id }}</td>
                                            </tr>
                                        @empty
                                            <tr class="table-light" id="modldetials" style="margin-top:7px;">
                                                <td colspan="5">No students found</td>
                                            </tr>
                                        @endforelse
                                        {{--
                                    <tr class="table-light" id="modldetials" style="margin-top:7px;">
                                        <td><input type="checkbox" class="" name="raido"></td>
                                        <td>*******</td>
                                        <td>*******</td>
                                        <td>*******</td>
                                        <td>*******</td>
                                    </tr>
                                    <tr class="table-light" id="modldetials" style="margin-top:7px;">
                                        <td><input type="checkbox" class="" name="raido"></td>
                                        <td>*******</td>
                                        <td>*******</td>
                                        <td>*******</td>
                                        <td>*******</td>
                                    </tr>
                                    <tr class="table-light" id="modldetials" style="margin-top:7px;">
                                        <td><input type="checkbox" class="" name="raido"></td>
                                        <td>*******</td>
                                        <td>*******</td>
                                        <td>*******</td>
                                        <td>*******</td>
                                    </tr>
                                    <tr class="table-light" id="modldetials" style="margin-top:7px;">
                                        <td><input type="checkbox" class="" name="raido"></td>
                                        <td>*******</td>
                                        <td>*******</td>
                                        <td>*******</td>
                                        <td>*******</td>
                                    </tr>
                                    <tr class="table-light" id="modldetials" style="margin-top:7px;">
                                        <td><input type="checkbox" class="" name="raido"></td>
                                        <td>*******</td>
                                        <td>*******</td>
                                        <td>*******</td>
                                        <td>*******</td>
                                    </tr>
                                    <tr class="table-light" id="modldetials" style="margin-top:7px;">
                                        <td><input type="checkbox" class="" name="raido"></td>
                                        <td>*******</td>
                                        <td>*******</td>
                                        <td>*******</td>
                                        <td>*******</td>
                                    </tr>
                                    <tr class="table-light" id="modldetials" style="margin-top:7px;">
                                        <td><input type="checkbox" class="" name="raido"></td>
                                        <td>*******</td>
                                        <td>*******</td>
                                        <td>*******</td>
                                        <td>*******</td>
                                    </tr> --}}

                                    </tbody>
                                </table>
                            </div>
                            <nav>
                                {{ $studentsAdd->links(myapp::viewPagination) }}
                            </nav>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>

                <!-- Modal footer -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id=""
                        wire:click="addSTGS()">حفظ</button>
                    <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal"
                        id="">إلغاء</button>
                </div>
            </div>
        </div>
    </div>

</div>
