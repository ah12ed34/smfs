@section('nav')
@livewire('components.nav.students-affairs.students-information-in-groups-header'
,['level'=>$level,'isP' => $group->IsPractical()])
@endsection
<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

        <div class="container" style="padding-top: 20px;" >

            <div class="table-responsive-xl">
                <table class="table" style=" width:100%;">
                    <thead class="table-header" style="font-size: 12px;">
                        <tr class="table-light" id="modldetials">
                            <th> تعديل </th>
                            <th>{{ __('general.gender') }}</th>
                            <th> النظام </th>
                            <th>  اسم الطالب</th>
                            <th style="width: 140px;">   الرقم الأكاديمي</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <td style="width: 10%;">
                                <div class="dropdown">
                                    <button type="button"  class="btn btn-light moveStudent_to_anotherGroup_dropdown  dropdown-toggle" data-toggle="dropdown" >
                                            <div class="textdropdown">{{ $group->name }}</div>
                                        </button>
                                        <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                                            @forelse ($groups->where('id','!=',$student->group?->id??$group->id) as $groupD)
                                                <a id="" class="dropdown-item" style="padding-left:30px; "
                                                wire:click="moveStudent('{{ $student->user_id }}','{{ $groupD->id }}')"
                                                >{{ $groupD->name }}</a>
                                            @empty

                                            @endforelse
                                        </div>
                                </div>
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

                    </tbody>
                </table>

            </div>
            <nav>
                    {{ $students->links(myapp::viewPagination) }}
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



<!-- The ModalDetailsStudents -->
{{-- <div class="modal fade" id="AddStudentsIntoGroupModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content addacademic" id="modal-content" style="background-color: #F6F7FA; height:95vh;">

            <!-- Modal Header -->
            <div class="modal-header addacademic" id="modheader">
                 التفاصيل
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body  modal_body_css">
                <form action="/action_page.php" style="display: block;">
                    <div class="form-group">

                    <!-- <img src="../../images/profile.png"  width="100px" style="margin-left: 45%;  margin-top: 10px; border-radius: 50%;"> -->

                    <div class="table-responsive-xl">
                        <table class="table Table_AddStudentsIntoGroup_in_Modal" style=" width:100%;" >
                            <thead class="table-header" style="font-size: 12px;">
                                <tr class="table-light" id="modldetials">
                                    <th> اضافة </th>
                                    <th>   الحالة </th>
                                    <th> النظام </th>
                                    <th>  اسم الطالب</th>
                                    <th style="width: 100px;">   الرقم الأكاديمي</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                </tr>
                                <tr class="table-light" id="modldetials" style="margin-top:7px;">
                                    <td><input type="checkbox" class="" name="raido"></td>
                                    <td>*******</td>
                                    <td>*******</td>
                                    <td>*******</td>
                                    <td>*******</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="">حفظ</button>
                <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button>
            </div>
        </div>
    </div>
</div> --}}



        <livewire:components.academic.students-affairs.add-students-in-group :group="$group" :groups="$groups" />
        {{-- @livewire('components.academic.students-affairs.add-students-in-group',['group'=>$group,'groups'=>$groups]) --}}
@section('script')
<script>
    window.addEventListener('refreshStudentsInGroup', event => {
        $('#AddStudentsIntoGroupModal').modal('hide');
        // check if errors exist
        // if(@this.errors.any()){
        //     return ;
        // }
        // window.livewire.dispatchEvent('refreshStudentsInGroup');
        // window.location.reload();
    });
</script>
@endsection
</div>
