@section('nav')
@livewire('components.nav.students-affairs.students-affairs-students-maingroups-header'
            ,['level'=>$level,'typeGroup'=>$typeGroup])
@endsection
<div>
    {{-- Success is as dangerous as failure. --}}

        <div class="container" style="padding-top: 20px;" >

            <div class="table-responsive-xl">
                <table class="table" style=" width:100%;">
                    <thead class="table-header" style="font-size: 12px;">
                        <tr class="table-light" id="modldetials">
                            <th>تعديل</th>
                            <th>عرض الطلاب</th>
                            <th>طلاب\طالبات</th>
                            <th> النظام </th>
                            <th> عدد الطلاب</th>
                            @if($typeGroup == 'sub')
                            <th>الرئيسية</th>
                            @endif
                            <th>  اسم المجموعة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($groups as $group)
                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#EditeaStudenGroupModal" wire:click='editGroup("{{ $group->id }}")'>تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button> </td>
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModal2" onclick="location.href='{{route('studentsInformation_InGroup',$group->id)}}'">عرض</button> </td>
                            <td>{{ myapp::getStudentGender($group->gender) }}</td>
                            <td>{{ $group->system == 'all'? "عام و موازي":myapp::getSystem($group->system) }}</td>
                            <td>{{ $group->students->count().'\\'. $group->max_students }}</td>
                            @if($typeGroup == 'sub')
                            <td>{{ $group?->group?->name }}</td>
                            @endif
                            <td>{{ $group->name }}</td>
                        </tr>
                        @empty
                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <td
                            @if($typeGroup == 'sub')
                            colspan="7"
                            @else
                            colspan="6"
                            @endif
                            >لا يوجد بيانات</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <nav>
                    {{ $groups->links(myapp::viewPagination) }}
                </nav>
            </div>
        </div>



    <!-- The ModalAddaStudenGroup -->
<div class="modal fade" id="AddaStudenGroupModal" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content addacademic" id="modal-content" style="background-color: #F6F7FA; height: 330px;">

            <!-- Modal Header -->
            <div class="modal-header addacademic" id="modheader">
                إضافة مجموعة
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                    <div class="form-group">

                        <!-- <img src="{{Vite::image("profile.png")}}"  width="" class="user_profile_modal" > -->

                        <!-- <label for="usr">Name:</label> -->
                        <input type="text" class="form-control" id="inputtext" wire:model='name' placeholder=" اسم المجموعة " style="height: 30px; margin-top:8px">
                        <input type="data" class="form-control" id="inputtext" wire:model='max_students' placeholder=" عددالطلاب" style="height: 30px; margin-top:8px">
                        <div class="dropdown">
                            <button type="button" class="btn btn-light gendar_studentsGroup dropdown-toggle"  data-toggle="dropdown">
                                <div class="textdropdown">{{ $gender ? myapp::getStudentGender($gender) : __("general.gender")  }}</div>
                            </button>
                            <div  class="dropdown-menu" style=" color: #0E70F2; ">
                                @foreach (myapp::getStudentGenders($gender) as $key=>$value)
                                    <a id="" class="dropdown-item" wire:click='setGender("{{ $key }}")'
                                        style="padding-left:30px; "> {{ $value }}</a>
                                @endforeach


                            </div>
                        </div>

                        <div class="dropdown">
                            <button type="button" class="btn btn-light TypeSystem_studying_StudentsGroups_dropdown dropdown-toggle"  data-toggle="dropdown">
                                <div class="textdropdown">{{ $system ? ($system == 'all'? "عام و موازي":myapp::getSystem($system)) : 'النظام' }} </div>
                            </button>
                            <div  class="dropdown-menu" style=" color: #0E70F2; ">
                                @foreach (myapp::getSystems($system) as $key=>$value)
                                    <a id="" class="dropdown-item" wire:click='setSystem("{{ $key }}")'
                                        style="padding-left:30px; "> {{ $value }}</a>
                                @endforeach
                                @if('all' != $system)
                                    <a id="" class="dropdown-item" wire:click='setSystem("all")'
                                        style="padding-left:30px; "> {{ 'عام و موازي' }}</a>
                                @endif

                            </div>
                        </div>

                        <div class="dropdown">
                            <button type="button" class="btn btn-light TypeGroups_in_modalAdd_dropdown dropdown-toggle"  data-toggle="dropdown">
                                <div class="textdropdown"> {{ $group_id ?$allGroups->find($group_id)->name : 'نظري' }} </div>
                            </button>
                            <div  class="dropdown-menu" style=" color: #0E70F2; ">
                                @if($group_id)
                                <a id="" class="dropdown-item" wire:click='setGroup()'
                                    style="padding-left:30px; ">    نظري</a>
                                @endif
                                @foreach ($allGroups->where('id','!=',$group_id) as $group)
                                    <a id="" class="dropdown-item" wire:click='setGroup("{{ $group->id }}")'
                                        style="padding-left:30px; "> {{ $group->name }}</a>

                                @endforeach


                            </div>
                        </div>

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" style="margin-top: 10px;">
                                    {{ $error }}
                                </div>
                            @endforeach

                        @endif

                        <!-- <input type="file" class="form-control-file border" id="file" name="uploadefile" style="height: 30px; margin-top:8px">
                        <input type="text" class="form-control" id="inputtext" name="note" placeholder="ملاحظة" style="height: 30px; margin-top:8px"> -->
                    </div>

            </div>

            <!-- Modal footer -->

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id=""
                wire:click='saveGroup("add")'
                >حفظ</button>
                <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button>
            </div>
        </div>
    </div>
</div>


<!-- The ModalEditeStudenGroup -->
<div class="modal fade" id="EditeaStudenGroupModal" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content addacademic" id="modal-content" style="background-color: #F6F7FA; height: 300px;">

            <!-- Modal Header -->
            <div class="modal-header addacademic" id="modheader">
                تعديل مجموعة
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                @if($groupDitails&&$openType == 'edit')
                <div class="form-group">
                        <input type="text" class="form-control" id="inputtext" wire:model='name' placeholder=" اسم المجموعة " style="height: 30px; margin-top:8px">
                        <input type="data" class="form-control" id="inputtext" wire:model='max_students' placeholder=" عددالطلاب" style="height: 30px; margin-top:8px">
                        <div class="dropdown">
                            <button type="button" class="btn btn-light gendar_studentsGroup dropdown-toggle"  data-toggle="dropdown">
                                <div class="textdropdown">{{ $gender ? myapp::getStudentGender($gender) : __("general.gender")  }}</div>
                            </button>

                            <div  class="dropdown-menu" style=" color: #0E70F2; ">
                                @if($groupDitails->students->count() == 0)
                                    @foreach (myapp::getStudentGenders($gender) as $key=>$value)
                                        <a id="" class="dropdown-item" wire:click='setGender("{{ $key }}")'
                                            style="padding-left:30px; "> {{ $value }}</a>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="dropdown">
                            <button type="button" class="btn btn-light TypeSystem_studying_StudentsGroups_dropdown dropdown-toggle"  data-toggle="dropdown">
                                <div class="textdropdown">{{ $system ? ($system == 'all'? "عام و موازي":myapp::getSystem($system)) : 'النظام' }} </div>
                            </button>
                            <div  class="dropdown-menu" style=" color: #0E70F2; ">
                                @if($groupDitails->students->count() == 0)
                                @foreach (myapp::getSystems($system) as $key=>$value)
                                    <a id="" class="dropdown-item" wire:click='setSystem("{{ $key }}")'
                                        style="padding-left:30px; "> {{ $value }}</a>
                                @endforeach
                                @if('all' != $system)
                                    <a id="" class="dropdown-item" wire:click='setSystem("all")'
                                        style="padding-left:30px; "> {{ 'عام و موازي' }}</a>
                                @endif
                                @endif
                            </div>
                        </div>

                        <div class="dropdown">
                            <button type="button" class="btn btn-light TypeGroups_in_modalAdd_dropdown dropdown-toggle"  data-toggle="dropdown">
                                <div class="textdropdown"> {{ $group_id ?$allGroups->find($group_id)->name : 'نظري' }} </div>
                            </button>

                            <div  class="dropdown-menu" style=" color: #0E70F2; ">
                                @if($groupDitails->students->count() == 0)
                                @if($group_id)
                                <a id="" class="dropdown-item" wire:click='setGroup()'
                                    style="padding-left:30px; ">    نظري</a>
                                @endif
                                @foreach ($allGroups->where('id','!=',$group_id) as $group)
                                <a id="" class="dropdown-item" wire:click='setGroup("{{ $group->id }}")'
                                    style="padding-left:30px; "> {{ $group->name }}</a>
                                @endforeach
                                @endif
                            </div>

                        </div>

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" style="margin-top: 10px;">
                                    {{ $error }}
                                </div>
                            @endforeach

                        @endif
                        <!-- <input type="file" class="form-control-file border" id="file" name="uploadefile" style="height: 30px; margin-top:8px">
                        <input type="text" class="form-control" id="inputtext" name="note" placeholder="ملاحظة" style="height: 30px; margin-top:8px"> -->
                    </div>

                @endif
            </div>

            <!-- Modal footer -->

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="" wire:click='saveGroup("edit")'
                >حفظ</button>
                <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button>
            </div>
        </div>
    </div>
</div>

</div>
@section('script')
<script>
    window.addEventListener('closeModal', event => {
        $('#AddaStudenGroupModal').modal('hide');
        $('#EditeaStudenGroupModal').modal('hide');
    });
    $('#AddaStudenGroupModal').on('shown.bs.modal', function () {
        @this.addGroup();
        $('#inputtext').trigger('focus');
    });
</script>
@endsection
