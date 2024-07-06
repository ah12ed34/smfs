@section('nav')
@livewire('components.nav.admin.employees-information-header', ['leftName' =>'الأداريين'])
@endsection
<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="container" style="padding-top: 30px;">

        <div class="table-responsive-xl">
            <table class="table" style=" width:100%;">
                <thead class="table-header" style="font-size: 12px;">
                    <tr class="table-light" id="modldetials">
                        <th> حذف </th>
                        <th> تعديل </th>
                        <th> التفاصيل </th>
                        <th> الصلاحية </th>
                        <th> القسم </th>
                        <th>  الدرجة العلمية </th>
                        <th> التلفون </th>
                        <th> الأيمل</th>
                        <th> الجندر </th>
                        <th>  تاريخ الميلاد </th>
                        <th style="width: 15%;">  الاسم </th>
                        <!-- <th>   الرقم الوظيفي</th> -->
                    </tr>
                </thead>
                <tbody>
                    @forelse ($managers as $manager)
                    <tr class="table-light" id="modldetials" style="margin-top:7px;">
                        <td>
                        @if (auth()->user()->id != $manager->id)
                            <button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#MessageApprovementDeleteModal" wire:click='selected({{ $manager->id }})'
                            >حذف  <img src="{{ Vite::image('delete (1).png')}}" id=""  width="15px" ></button>
                            @else
                            <button type="submit" class="btn btn-primary btn-sm btn_edit disabled" >حذف  <img src="{{ Vite::image('delete (1).png')}}" id=""  width="15px" ></button>
                        @endif
                            </td>
                        <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#EditeEmployeesModal"wire:click='editManager({{ $manager->id }})'
                            >تعديل  <img src="{{ Vite::image('edit.png')}}" id=""  width="15px" ></button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm btn_detials" id="" data-toggle="modal" data-target="#DetailsEmloyeesModal" wire:click='showManager({{ $manager->id }})'
                            >التفاصيل</button> </td>
                        <td>{{ $manager->role()->description }}</td>
                        @if ($manager->isAcademic())
                            @if ($manager->academic->department)
                                @if ($manager->academic->department->name)
                                    <td>{{ $manager->academic->department->name }}</td>
                                @else
                                    <td></td>
                                @endif
                            @else
                                <td></td>
                            @endif
                        <td>{{ $manager->academic->name }}</td>
                        @else
                            <td></td>
                            <td></td>
                        @endif
                        <td>{{ $manager->phone }}</td>
                        <td>{{ $manager->email }}</td>
                        <td>{{ $manager->gender_ar() }}</td>

                        <td>{{ $manager->birthday }}</td>
                        <td style="width: 15%;">{{ $manager->name }}</td>
                    </tr>
                    @empty
                    <tr class="table-light" id="modldetials">
                        <td colspan="11" style="text-align: center;">لا يوجد بيانات</td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        <nav>
            {{ $managers->links(myapp::viewPagination) }}
        </nav>
    </div>


<!-- The ModalUploadeFile -->
<div class="modal fade" id="UploadeFileModal">
<div class="modal-dialog">
    <div class="modal-content UploadeFileModal" id="modal-content2" style="height: 250px;">

        <!-- Modal Header -->
        <div class="modal-header UploadeFileModal" id="modheader">
            رفع ملف
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="" style="display: block;">
                <div class="form-group">
                    <!-- <label for="usr">Name:</label> -->

                    <input type="file" class="form-control-file border" id="file" name="file" style="height: 30px; margin-top:8px">
                </div>
                <!-- <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
            </form>
        </div>

        <!-- Modal footer -->

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="">حفظ</button>
            <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button>
        </div>
    </div>
</div>
</div>



<!-- The ModaladdEmployeer -->
<div class="modal fade" id="AddEmployeerModal" wire:ignore.self>
<div class="modal-dialog">
    <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA; height: 650px;">

        <!-- Modal Header -->
        <div class="modal-header modal_header_css" id="modheader">
            إضافة موظف
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        </div>

        <!-- Modal body -->
        <div class="modal-body modal_body_css">
                <div class="form-group">

                    <img src="{{ Vite::image('profile.png')}}"  width="" class="user_profile_modal" >

                    <!-- <input type="number" class="form-control" id="inputtext" name="projectname" placeholder=" الرقم الوظيفي " style="height: 30px; margin-top:8px"> -->
                    <input type="text" class="form-control" id="inputtext" wire:model='name' placeholder=" الاسم" style="height: 30px; margin-top:8px">
                    <input type="date" class="form-control" id="inputtext" wire:model='brithday' placeholder=" تاريح الميلاد" style="height: 30px; margin-top:8px">

                    <div class="dropdown">
                        <button type="button" class="btn btn-light gendar dropdown-toggle"  data-toggle="dropdown">
                            <di class="textdropdown"> {{ $gender ? myapp::getGender($gender) : __('general.gender') }}</di>
                        </button>
                        <div  class="dropdown-menu" style=" color: #0E70F2; ">
                            @foreach (myapp::getGenders($gender) as $key => $value)
                            <a id="" class="dropdown-item"  style="padding-left:30px; " wire:click='setGender("{{ $key }}")'>{{ $value }}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="dropdown">
                                <button type="button" class="btn btn-light deparment_names_dropdown dropdown-toggle"  data-toggle="dropdown" >
                                    <div class="textdropdown">{{ $academic_name ? myapp::getAcademicName($academic_name) : __('general.scientific_degree') }}</div>
                            </button>
                        <div  class="dropdown-menu" style=" color: #0E70F2; ">
                            @foreach (myapp::getAcademicNames($academic_name) as $key => $value)
                            <a id="" class="dropdown-item"  style="padding-left:30px; " wire:click='setAcademicName("{{ $key }}")'>{{ $value }}</a>
                            @endforeach
                            </div>
                    </div>
                                <select class="form-control selectOption" id="sel1" wire:model='department_id'
                                 placeholder="القسم" style="height: 30px; margin-top:8px">
                                    <option value>القسم</option>
                                    @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>

                            <select class="form-control selectOption" id="sel1" wire:model='role_id'
                             style="height: 30px; margin-top:8px">
                                    <option>الصلاحية</option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->description }}</option>
                                    @endforeach
                            </select>

                                <input type="text" class="form-control" id="inputtext" wire:model="email" placeholder="الايمل الجامعي" style="height: 30px; margin-top:8px">
                                <input type="text" class="form-control" id="inputtext" wire:model="username" placeholder="اسم المستخدم" style="height: 30px; margin-top:8px">
                                <input type="data" class="form-control" id="inputtext" wire:model="phone" placeholder="التلفون  " style="height: 30px; margin-top:8px; color:black;">
                                <input type="password" class="form-control" id="inputtext" wire:model='password' placeholder="  كلمة المرور الجديدة" style="height: 30px; margin-top:8px">
                                <input type="password" class="form-control" id="inputtext" wire:model='password_confirmation' placeholder="تأكيد كلمة المرر  " style="height: 30px; margin-top:8px; color:black;">
                </div>

        </div>

        <!-- Modal footer -->

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id=""
            wire:click='createManager()'
            >حفظ</button>
            <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button>
        </div>
    </div>
</div>
</div>


<!-- The ModalEditeEmployees -->
<div class="modal fade" id="EditeEmployeesModal" wire:ignore.self>
<div class="modal-dialog">
    <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA; height: 650px;">

        <!-- Modal Header -->
        <div class="modal-header modal_header_css" id="modheader">
            تعديل موظف
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        </div>

        <!-- Modal body -->
        <div class="modal-body modal_body_css">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if($ManagerData)
                <div class="form-group">

                    <img src="{{ $ManagerData->photo ? asset('storage/' . $ManagerData->photo) : Vite::image('profile.png')
                    }}"  width="" class="user_profile_modal" >

                    <!-- <input type="number" class="form-control" id="inputtext" name="projectname" placeholder=" الرقم الوظيفي " style="height: 30px; margin-top:8px"> -->
                    <input type="text" class="form-control" id="inputtext" wire:model='name' placeholder=" الاسم" style="height: 30px; margin-top:8px">
                    <input type="date" class="form-control" id="inputtext" wire:model='birthday' placeholder=" تاريح الميلاد" style="height: 30px; margin-top:8px">

                    <div class="dropdown">
                        <button type="button" class="btn btn-light gendar dropdown-toggle"  data-toggle="dropdown">
                            <div class="textdropdown">{{ $gender ? myapp::getGender($gender) : __('general.gender') }}</div>
                        </button>
                        <div  class="dropdown-menu" style=" color: #0E70F2; ">
                            @foreach (myapp::getGenders($gender) as $key => $value)
                            <a id="" class="dropdown-item"  style="padding-left:30px; " wire:click='setGender("{{ $key }}")'>{{ $value }}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="dropdown">
                                <button type="button" class="btn btn-light deparment_names_dropdown dropdown-toggle"  data-toggle="dropdown" >
                                    <div class="textdropdown">{{ $academic_name ? myapp::getAcademicName($academic_name) : __('general.scientific_degree') }}</div>
                            </button>
                        <div  class="dropdown-menu" style=" color: #0E70F2; ">
                            @foreach (myapp::getAcademicNames($academic_name) as $key => $value)
                            <a id="" class="dropdown-item"  style="padding-left:30px; " wire:click='setAcademicName("{{ $key }}")'>{{ $value }}</a>
                            @endforeach
                            {{--<a id="" class="dropdown-item" href="#" style="padding-left:30px;">   دكتور</a>
                            <a id="" class="dropdown-item" href="#" style="padding-left:30px;">    استاذ </a>
                            <a id="" class="dropdown-item" href="#" style="padding-left:30px;">    استاذ مشارك</a>
                            <a id="" class="dropdown-item" href="#"style="padding-left:30px;">    استاذ مساعد </a>
                            <a id="" class="dropdown-item" href="#"style="padding-left:30px;">    معيد </a> --}}
                        </div>
                    </div>
                                <select class="form-control selectOption" id="sel1" wire:model='department_id' placeholder="القسم" style="height: 30px; margin-top:8px">
                                    <option value>القسم</option>
                                    @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>

                            <select class="form-control selectOption" id="sel1" wire:model='role_id'  style="height: 30px; margin-top:8px">
                                    <option value>الصلاحية</option>
                                    @foreach ($rolesAll as $role)
                                    <option value="{{ $role->id }}">{{ $role->description }}</option>
                                    @endforeach
                        <!-- <option>مدير قسم الذكاء الصناعي</option>
                        <option>مدير قسم تحليل البيانات</option> -->

                    </select>



                                <input type="text" class="form-control" id="inputtext" wire:model="email" placeholder="الايمل الجامعي" style="height: 30px; margin-top:8px">
                                <input type="data" class="form-control" id="inputtext" wire:model="phone" placeholder="التلفون  " style="height: 30px; margin-top:8px; color:black;">
                                <input type="password" class="form-control" id="inputtext" wire:model='password' placeholder="  كلمة المرور الجديدة" style="height: 30px; margin-top:8px">
                                <input type="password" class="form-control" id="inputtext" wire:model='password_confirmation' placeholder="تأكيد كلمة المرر  " style="height: 30px; margin-top:8px; color:black;">
                </div>

            @endif
        </div>

        <!-- Modal footer -->

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="" wire:click='storManager()'
            >حفظ</button>
            <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button>
        </div>
    </div>
</div>
</div>

<!-- The DetailsEmloyeesModal -->
<div class="modal fade" id="DetailsEmloyeesModal" wire:ignore.self>
<div class="modal-dialog">
    <div class="modal-content ModaldDetailsAcademic" id="modal-content" style="background-color: #F6F7FA; height:660px;">

        <!-- Modal Header -->
        <div class="modal-header ModaldDetailsAcademic" id="modheader">
            التفاصيل
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body ModaldDetailsAcademic">
            @if($ManagerData&&$ManagerData->show)
                <div class="form-group">

                    <img src="{{ $ManagerData->photo ? asset('storage/' . $ManagerData->photo) : Vite::image('profile.png')
                     }}"  width="" class="user_profile_modal" >

                    <div class="table-responsive ">
                        <table class="table details-academic " style="width:100%;" dir="rtl">

                                    <tr class="table-primary" id="modldetials">
                                        <th style=" width:25%; ">  الاسم</th>
                                        <th style="width: 25%;"> تاريخ الميلاد</th>
                                    </tr>
                                    <tr class="table-light " id="modldetials">
                                        <td>{{ $ManagerData->name }}</td>
                                        <td>{{ $ManagerData->birthday }}</td>
                                    </tr>
                                    <tr class="table-primary" id="modldetials">
                                        <th style="width: 25%;" > نوع الجندر</th>
                                        <th style="width: 25%;"> الدرجةالعلمية</th>
                                    </tr>
                                    <tr class="table-light" id="modldetials">
                                        <td>{{ $ManagerData->gender_ar() }}</td>
                                        @if($ManagerData->isAcademic())
                                        <td>{{ $ManagerData->academic->name }}</td>
                                        @else
                                        <td></td>
                                        @endif
                                    </tr>
                                    <tr class="table-primary" id="modldetials">
                                        <th style="width: 25%;"> القسم</th>
                                        <th style="width: 25%;"> الصلاحية</th>
                                    </tr>
                                    <tr class="table-light" id="modldetials">
                                        @if($ManagerData->isAcademic())
                                        <td>{{ $ManagerData->academic->department->name }}</td>
                                        @else
                                        <td></td>
                                        @endif
                                        <td>{{ $ManagerData->role()->description }}</td>
                                    </tr>
                                    <tr class="table-primary" id="modldetials">
                                        <th style="width: 25%;"> الإيمل الجامعي </th>
                                        <th style="width: 25%;">التلفون </th>
                                    </tr>
                                    <tr class="table-light" id="modldetials">
                                        <td>{{ $ManagerData->email }}</td>
                                        <td>{{ $ManagerData->phone }}</td>
                                    </tr>
                                    <tr class="table-primary" id="modldetials">
                                        <th colspan="2" style="width: 25%;">اسم المستخدم</th>
                                    </tr>
                                    <tr class="table-light" id="modldetials">
                                        <td colspan="2">{{ $ManagerData->username }}</td>
                                    </tr>
                        </table>
                    </div>
                </div>
            @endif
        </div>

        <!-- Modal footer -->

        <div class="modal-footer ModaldDetailsAcademic">
            <!--<button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="">حفظ</button>
            <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button> -->
        </div>
    </div>
</div>
</div>


<!-- The ModalMessageApprovementDelete -->
<div class="modal fade" id="MessageApprovementDeleteModal" wire:ignore.self>
<div class="modal-dialog">
    <div class="modal-content UploadeFileModal" id="modal-content2" style="height: 170px;">

        <!-- Modal Header -->
        <div class="modal-header " id="modheader" style="height:40px; background-color:#F6F7FA ;color: rgb(67, 111, 206);">
            تأكيد الحذف
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        </div>

        <!-- Modal body -->
        <div class="modal-body" style="text-align: center;">
            <form action="" style="display: block;">
                <div class="form-group">
                    <!-- <label for="usr">Name:</label> -->
                <label  for="">هل تريد حذف المستخدم بالفعل!</label>
                </div>
                <!-- <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
            </form>
        </div>

        <!-- Modal footer -->

        <div class="modal-footer" >
            <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="" style="height: 30p; width: 80px; font: size 12px;"
            wire:click='deleteManager()'
            >نعم</button>
            <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="" style="height: 30p; width: 80px; font: size 12px;">لا</button>
        </div>
    </div>
</div>
</div>

@section('script')
<script>
    window.addEventListener('closeModal', event => {
        $('#EditeEmployeesModal').modal('hide');
        $('#DetailsEmloyeesModal').modal('hide');
        $('#MessageApprovementDeleteModal').modal('hide');
        $('#AddEmployeerModal').modal('hide');
    });

    window.addEventListener('closeEditModal', event => {
        // window.location.reload();
        $('#EditeEmployeesModal').modal('hide');

    });
</script>
@endsection

</div>
