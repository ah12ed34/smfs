@section('nav')
@livewire('components.nav.admin.employees-information-header', ['leftName' => $role->description])
@endsection
<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="container" style="padding-top: 30px;">

        <div class="table-responsive-xl">
            <table class="table" style=" width:100%;">
                <thead class="table-header" style="font-size: 12px;">
                    <tr class="table-light" id="modldetials">
                        <th> حذف </th>
                        <th> تعديل </th>
                        <th> التفاصيل </th>
                        <th> الصلاحية </th>
                        <th>  الدرجة العلمية </th>
                        <th> التلفون </th>
                        <th> الأيمل</th>
                        <th> الجندر </th>
                        <th>  تاريخ الميلاد </th>
                        <th>  الاسم </th>
                        <th>   الرقم الوظيفي</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                    <tr class="table-light" id="modldetials" style="margin-top:7px;">
                        <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#MessageApprovementDeleteModal" wire:click='selected({{ $employee->id }})'
                            >حذف  <img src="{{ Vite::image('delete (1).png')}}" id=""  width="15px" ></button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#EditeEmployeesModal" wire:click='editEmployee({{ $employee->id }})'
                            >تعديل  <img src="{{ Vite::image('edit.png')}}" id=""  width="15px" ></button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm btn_detials" id=""  wire:click='showEmployee({{ $employee->id }})'
                            >التفاصيل</button> </td>
                        <td>{{ $employee->role()->description }}</td>
                        @if($employee->isAcademic())
                        <td>{{ $employee->academic->name}}</td>
                        @else
                        <td></td>
                        @endif
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->gender_ar() }}</td>
                        <td>{{ $employee->birthday }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->id }}</td>
                    </tr>
                    @empty
                    <tr class="table-light" id="modldetials" style="margin-top:7px;">
                        <td colspan="11">لا يوجد موظفين</td>
                    </tr>

                    @endforelse

                    {{-- <tr class="table-light" id="modldetials" style="margin-top:7px;">
                        <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#MessageApprovementDeleteModal">حذف  <img src="{{ Vite::image('delete (1).png')}}" id=""  width="15px" ></button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#EditeEmployeesModal">تعديل  <img src="{{ Vite::image('edit.png')}}" id=""  width="15px" ></button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm btn_detials" id="" data-toggle="modal" data-target="#DetailsEmloyeesModal">التفاصيل</button> </td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                        <td>*******</td>
                    </tr>
                    <tr class="table-light" id="modldetials" style="margin-top:7px;">
                        <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#MessageApprovementDeleteModal">حذف  <img src="{{ Vite::image('delete (1).png')}}" id=""  width="15px" ></button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#EditeEmployeesModal">تعديل  <img src="{{ Vite::image('edit.png')}}" id=""  width="15px" ></button> </td>
                        <td><button type="submit" class="btn btn-primary btn-sm btn_detials" id="" data-toggle="modal" data-target="#DetailsEmloyeesModal">التفاصيل</button> </td>
                        <td>*******</td>
                        <td>*******</td>
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
        <nav>
            {{ $employees->links(myapp::viewPagination) }}
        </nav>
    </div>


<!-- The ModalUploadeFile -->
<div class="modal fade" id="UploadeFileModal">
<div class="modal-dialog">
    <div class="modal-content UploadeFileModal" id="modal-content2" style="height: 250px;">

        <!-- Modal Header -->
        <div class="modal-header UploadeFileModal" id="modheader">
            رفع الدرجات
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
    <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA; height: 600px;">

        <!-- Modal Header -->
        <div class="modal-header modal_header_css" id="modheader">
            إضافة موظف
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        </div>

        <!-- Modal body -->
        <div class="modal-body modal_body_css">
            {{-- <form action="/action_page.php" style="display: block;"> --}}
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                <div class="form-group">

                    <img src="{{ Vite::image('profile.png')}}"  width="" class="user_profile_modal" >

                    <input type="number" class="form-control" id="inputtext" wire:model='Eid' placeholder=" الرقم الوظيفي " style="height: 30px; margin-top:8px">
                    <input type="text" class="form-control" id="inputtext" wire:model='name' placeholder=" الاسم" style="height: 30px; margin-top:8px">
                    <input type="date" class="form-control" id="inputtext" wire:model='birthday'
                     placeholder=" تاريح الميلاد" style="height: 30px; margin-top:8px">
                    <div class="dropdown">
                        <button type="button" class="btn btn-light gendar_employee  dropdown-toggle"  data-toggle="dropdown">
                            <div class="textdropdown">{{ $gender ? MyApp::getGender($gender) : __('general.gender') }}</div>
                        </button>
                        <div  class="dropdown-menu" style=" color: #0E70F2; ">
                            @forelse (MyApp::getGenderAllOut($gender) as $key => $value)
                                <a id="" class="dropdown-item" style="padding-left:30px;" wire:click='gen("{{ $key }}")'>{{ $value }}</a>
                            @empty
                                <a id="" class="dropdown-item" style="padding-left:30px;">لا يوجد أنواع جندر</a>

                            @endforelse
                            {{-- <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   طلاب </a>
                            <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   طالبات</a> --}}
                        </div>
                    </div>

                    <!-- <div class="dropdown">
                        <button type="button" class="btn btn-light TypePermission_employee_dropdown dropdown-toggle"  data-toggle="dropdown">
                            <div class="textdropdown">  الصلاحية</div>
                        </button>
                        <div  class="dropdown-menu" style=" color: #0E70F2; ">
                            <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  ****** </a>
                            <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   ******</a>
                            <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   ****** </a>
                        </div>
                    </div> -->

                    <div class="dropdown">
                        <button type="button" class="btn btn-light employeeDegree_dropdown dropdown-toggle"  data-toggle="dropdown">
                            <div class="textdropdown">{{ $academic_name ? MyApp::getAcademicName($academic_name) : __("general.scientific_degree") }}</div>
                        </button>
                        <div  class="dropdown-menu" style=" color: #0E70F2; ">
                            @forelse (MyApp::getAcademicNameAllOut($academic_name) as $key => $value)
                                <a id="" class="dropdown-item" style="padding-left:30px;" wire:click='academic("{{ $key }}")'>{{ $value }}</a>
                            @empty
                                <a id="" class="dropdown-item" style="padding-left:30px;">لا يوجد درجات علمية</a>
                            @endforelse
                            {{-- <a id="" class="dropdown-item" href="#" style="padding-left:30px;">   دكتور</a>
                            <a id="" class="dropdown-item" href="#" style="padding-left:30px;">   استاذ</a>
                            <a id="" class="dropdown-item" href="#"style="padding-left:30px;">    معيد </a>
                            <a id="" class="dropdown-item" href="#"style="padding-left:30px;">    موظف </a> --}}
                            </div>
                    </div>

                    <select class="form-control selectOption" id="sel1" wire:model='role_id' style="height: 30px; margin-top:8px">
                        <option>الصلاحية</option>
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->description }}</option>
                        @endforeach
                    </select>

                                <input type="text" class="form-control" id="inputtext" wire:model="username" placeholder="{{ __('general.username') }}"
                                 style="height: 30px; margin-top:8px">
                                <input type="text" class="form-control" id="inputtext" wire:model="email" placeholder="الايمل الجامعي" style="height: 30px; margin-top:8px">
                                <input type="data" class="form-control" id="inputtext" wire:model="phone" placeholder="التلفون  " style="height: 30px; margin-top:8px; color:black;">
                                <input type="password" class="form-control" id="inputtext" wire:model="password" placeholder=" كلمة المرور " style="height: 30px; margin-top:8px">
                                <input type="password" class="form-control" id="inputtext" wire:model="password_confirmation" placeholder="تأكيد كلمة المرر  " style="height: 30px; margin-top:8px; color:black;">
                    <!-- <input type="file" class="form-control-file border" id="file" name="uploadefile" style="height: 30px; margin-top:8px">
                    <input type="text" class="form-control" id="inputtext" name="note" placeholder="ملاحظة" style="height: 30px; margin-top:8px"> -->
                </div>

            {{-- </form> --}}
        </div>

        <!-- Modal footer -->

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="" wire:click='addEmployee()'
            >حفظ</button>
            <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button>
        </div>
    </div>
</div>
</div>


<!-- The ModalEditeEmployees -->
<div class="modal fade" id="EditeEmployeesModal" wire:ignore.self>
<div class="modal-dialog">
    <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA; height: 600px;">

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
            {{-- <form action="/action_page.php" style="display: block;"> --}}
                <div class="form-group">

                    <img src="{{ $photo ? asset('storage/' . $photo) :  Vite::image('profile.png')}}"  width="" class="user_profile_modal" >

                    <input type="number" class="form-control" id="inputtext" wire:model='Eid' placeholder=" الرقم الوظيفي " style="height: 30px; margin-top:8px">
                    <input type="text" class="form-control" id="inputtext" wire:model='name' placeholder=" الاسم" style="height: 30px; margin-top:8px">
                    <input type="date" class="form-control" id="inputtext" wire:model='birthday' placeholder=" تاريح الميلاد" style="height: 30px; margin-top:8px">
                    <div class="dropdown">
                        <button type="button" class="btn btn-light gendar_employee  dropdown-toggle"  data-toggle="dropdown">
                            <div class="textdropdown">
                                {{ $gender == 'male' ? 'ذكر' : 'أنثى' }}
                            </div>
                        </button>
                        <div  class="dropdown-menu" style=" color: #0E70F2; ">
                            @if ($gender == 'female')
                                <a id="" class="dropdown-item" wire:click='gen("male")' style="padding-left:30px; ">   ذكر </a>
                            @elseif ($gender =='male')
                                <a id="" class="dropdown-item" wire:click='gen("female")'style="padding-left:30px; ">   أنثى</a>
                            @else
                                <a id="" class="dropdown-item" wire:click='gen("male")' style="padding-left:30px; ">   ذكر </a>
                                <a id="" class="dropdown-item" wire:click='gen("female")'style="padding-left:30px; ">   أنثى</a>
                            @endif
                        </div>
                    </div>

                    <!-- <div class="dropdown">
                        <button type="button" class="btn btn-light TypePermission_employee_dropdown dropdown-toggle"  data-toggle="dropdown">
                            <div class="textdropdown">  الصلاحية</div>
                        </button>
                        <div  class="dropdown-menu" style=" color: #0E70F2; ">
                            <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  ****** </a>
                            <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   ******</a>
                            <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   ****** </a>
                        </div>
                    </div> -->

                    <div class="dropdown">
                        <button type="button" class="btn btn-light employeeDegree_dropdown dropdown-toggle"  data-toggle="dropdown">
                            <div class="textdropdown">{{ MyApp::getAcademicName($academic_name) }}</div>
                        </button>
                        <div  class="dropdown-menu" style=" color: #0E70F2; ">
                            @forelse (MyApp::getAcademicNameAllOut($academic_name) as $key => $value)
                                <a id="" class="dropdown-item" style="padding-left:30px;" wire:click='academic("{{ $key }}")'>{{ $value }}</a>
                            @empty
                                <a id="" class="dropdown-item" style="padding-left:30px;">لا يوجد درجات علمية</a>
                            @endforelse
                            {{-- <a id="" class="dropdown-item" href="#" style="padding-left:30px;">   دكتور</a>
                            <a id="" class="dropdown-item" href="#" style="padding-left:30px;">   استاذ</a>
                            <a id="" class="dropdown-item" href="#"style="padding-left:30px;">    معيد </a>
                            <a id="" class="dropdown-item" href="#"style="padding-left:30px;">    موظف </a> --}}
                            </div>
                    </div>

                    <select class="form-control selectOption" id="sel1" wire:model='role_id' style="height: 30px; margin-top:8px">
                        <option>الصلاحية</option>
                        @foreach ($rolesAll as $role)
                        <option value="{{ $role->id }}">{{ $role->description }}</option>
                        @endforeach
                    </select>

                                <input type="text" class="form-control" id="inputtext" wire:model="email" placeholder="الايمل الجامعي" style="height: 30px; margin-top:8px">
                                <input type="data" class="form-control" id="inputtext" wire:model="phone" placeholder="التلفون  " style="height: 30px; margin-top:8px; color:black;">
                                <input type="password" class="form-control" id="inputtext" wire:model='password' placeholder="  كلمة المرور الجديدة" style="height: 30px; margin-top:8px">
                                <input type="password" class="form-control" id="inputtext" wire:model='password_confirmation' placeholder="تأكيد كلمة المرر  " style="height: 30px; margin-top:8px; color:black;">
                    <!-- <input type="file" class="form-control-file border" id="file" name="uploadefile" style="height: 30px; margin-top:8px">
                    <input type="text" class="form-control" id="inputtext" name="note" placeholder="ملاحظة" style="height: 30px; margin-top:8px"> -->
                </div>

            {{-- </form> --}}
        </div>

        <!-- Modal footer -->

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="" wire:click='saveEmployee()'
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
            @if($employeeData&&$employeeData->show)

                <div class="form-group">

                    <img src="{{ $employeeData->photo ? asset('storage/' . $employeeData->photo) :  Vite::image('profile.png')}}"
                      width="" class="user_profile_modal" >

                    <div class="table-responsive ">
                        <table class="table details-academic " style="width:100%;" dir="rtl">

                                    <tr class="table-primary" id="modldetials">
                                        <th style=" width:25%; "> الرقم الوظيفي</th>
                                        <th style=" width:25%; ">  الاسم</th>
                                    </tr>
                                    <tr class="table-light " id="modldetials">
                                        <td>{{ $employeeData->id }}</td>
                                        <td>{{ $employeeData->FullName }}</td>
                                    </tr>
                                    <tr class="table-primary" id="modldetials">
                                        <th style="width: 25%;"> تاريخ الميلاد</th>
                                        <th style="width: 25%;" > نوع الجندر</th>
                                    </tr>
                                    <tr class="table-light" id="modldetials">
                                        <td>{{ $employeeData->birthday }}</td>
                                        <td>{{ $employeeData->gender_ar() }}</td>
                                    </tr>
                                    <tr class="table-primary" id="modldetials">
                                        <th style="width: 25%;"> الدرجةالعلمية</th>
                                        <th style="width: 25%;"> الصلاحية</th>
                                    </tr>
                                    <tr class="table-light" id="modldetials">
                                        @if($employeeData->isAcademic())
                                        <td>{{ $employeeData->academic->name }}</td>
                                        @else
                                        <td></td>
                                        @endif
                                        <td>{{ $employeeData->role()->description }}</td>
                                    </tr>
                                    <tr class="table-primary" id="modldetials">
                                        <th style="width: 25%;"> الإيمل الجامعي </th>
                                        <th style="width: 25%;">التلفون </th>
                                    </tr>
                                    <tr class="table-light" id="modldetials">
                                        <td>{{ $employeeData->email }}</td>
                                        <td>{{ $employeeData->phone }}</td>
                                    </tr>
                                    <tr class="table-primary" id="modldetials">
                                        <th colspan="2" style="width: 25%;"> اسم المستخدم </th>
                                    </tr>
                                    <tr class="table-light" id="modldetials">
                                        <td colspan="2">{{ $employeeData->username }}</td>
                                    </tr>
                                    <!-- <tr class="table-light" id="modldetials">
                                        <th style="width: 25%;">كلمة المرور  </th>
                                        <td>**********</td>
                                    </tr> -->
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
                <label  for="">هل تريد حذف الموظف بالفعل!</label>
                </div>
                <!-- <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
            </form>
        </div>

        <!-- Modal footer -->

        <div class="modal-footer" >
            <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="" style="height: 30p; width: 80px; font: size 12px;"
                wire:click='deleteEmployee()'
            >نعم</button>
                <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="" style="height: 30p; width: 80px; font: size 12px;">لا</button>
    </div>
</div>
</div>

</div>

</div>
@section('script')
<script>
    window.addEventListener('closeEditModal', event => {
        $('#EditeEmployeesModal').modal('hide');
    });
    window.addEventListener('openEditModal', event => {
        $('#EditeEmployeesModal').modal('show');
    });
    window.addEventListener('closeDetailsModal', event => {
        $('#DetailsEmloyeesModal').modal('hide');
    });
    window.addEventListener('openDetailsModal', event => {
        // consloe.log('openDetailsModal');
        $('#DetailsEmloyeesModal').modal('show');
    });
    window.addEventListener('closeDeleteModal', event => {
        $('#MessageApprovementDeleteModal').modal('hide');
    });
    window.addEventListener('openDeleteModal', event => {
        $('#MessageApprovementDeleteModal').modal('show');
    });
    window.addEventListener('closeAddModal', event => {
        $('#AddEmployeerModal').modal('hide');
    });
    window.addEventListener('openAddModal', event => {
        $('#AddEmployeerModal').modal('show');
    });
    window.addEventListener('closeUploadeModal', event => {
        $('#UploadeFileModal').modal('hide');
    });
    window.addEventListener('openUploadeModal', event => {
        $('#UploadeFileModal').modal('show');
    });
</script>
@endsection
