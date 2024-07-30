@section('nav')
@livewire('components.nav.manager_of_depart.manage-academic-depart')
@endsection
<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

        <div class="container"  style="padding-top: 20px;" >

            <div class="table-responsive-xl">
                <table class="table" style="width:100%; right:0%;">
                    <thead class="table-header" style="font-size: 12px;">
                        <tr class="table-light" id="modldetials">
                            {{-- <th>تعديل</th> --}}
                            <th>التفاصيل</th>
                            <th>الصلاحية</th>
                            <th>التلفون</th>
                            <th> نوع الجندر</th>
                            <th>الإيمل الجامعي </th>
                            <th>المسمى الأكاديمي</th>
                            <th> الاسم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($academics as $academic)
                        <tr class="table-light" id="modldetials">
                            {{-- <td><button type="submit" class="btn btn-primary btn-sm" id="btn-chat-edit" data-toggle="modal" data-target="#myModalEdite"

                                >تعديل  <img src="{{Vite::image("edit.png")}}"id=""  width="15px" ></button> </td> --}}
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModaldDetails" wire:click="showEmployee({{$academic->user->id}})">التفاصيل</button> </td>
                            <td>{{$academic->user?->role()?->name}}</td>
                            <td>{{$academic->user->phone}}</td>
                            <td>{{$academic->user->gender_ar()}}</td>
                            <td>{{$academic->user->email}}</td>
                            <td>{{$academic->name }}</td>
                            <td>{{$academic->user->full_name}}</td>
                        </tr>
                        @empty
                        <tr  class="table-light" id="modldetials" >
                            <td colspan="8">لا يوجد بيانات</td>
                        </tr>

                        @endforelse

                        {{-- <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-chat-edit" data-toggle="modal" data-target="#myModalEdite">تعديل  <img src="{{Vite::image("edit.png")}}"id=""  width="15px" ></button> </td>
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModaldDetails">التفاصيل</button> </td>
                            <!-- <td><button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal1" id="btn-chat-edit">الدردشة <img src="{{Vite::image("conversation (3).png")}}"id=""  width="25px" ></button> </td> -->
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                        </tr>
                        <tr class="table-light">
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-chat-edit" data-toggle="modal" data-target="#myModalEdite">تعديل  <img src="{{Vite::image("edit.png")}}"id=""  width="15px" ></button> </td>
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModaldDetails">التفاصيل</button> </td>
                            <!-- <td><button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal1" id="btn-chat-edit">الدردشة <img src="{{Vite::image("conversation (3).png")}}"id=""  width="25px" ></button> </td> -->
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                        </tr>
                        <tr class="table-light">
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-chat-edit" data-toggle="modal" data-target="#myModalEdite">تعديل  <img src="{{Vite::image("edit.png")}}"id=""  width="15px" ></button> </td>
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModaldDetails">التفاصيل</button> </td>
                            <!-- <td><button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal1" id="btn-chat-edit">الدردشة <img src="{{Vite::image("conversation (3).png")}}"id=""  width="25px" ></button> </td> -->
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                        </tr>
                        <tr class="table-light">
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-chat-edit" data-toggle="modal" data-target="#myModalEdite">تعديل  <img src="{{Vite::image("edit.png")}}"id=""  width="15px" ></button> </td>
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModaldDetails">التفاصيل</button> </td>
                            <!-- <td><button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal1" id="btn-chat-edit">الدردشة <img src="{{Vite::image("conversation (3).png")}}"id=""  width="25px" ></button> </td> -->
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

   <!-- The Modaladdacademic -->
   <div class="modal fade" id="addacademic">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA; height:95vh;">

            <!-- Modal Header -->
            <div class="modal-header modal_header_css" id="modheader">
                  إضافة اكاديمي
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body modal_body_css">
                <form action="/action_page.php" style="display: block;">
                    <div class="form-group">
                        <!-- <label for="usr">Name:</label> -->
                        <input type="text" class="form-control" id="inputtext" name="projectname" placeholder=" الاسم " style="height: 30px; margin-top:-6px">
                        <input type="text" class="form-control" id="inputtext" name="date" placeholder="تاريخ الميلاد" style="height: 30px; margin-top:8px">
                        <!-- <textarea style="height: 100px;" class="form-control" rows="5" id="comment" placeholder="  التلفون" style=" margin-top:8px"></textarea> -->
                        <input type="date" class="form-control" id="inputtext" name="phone" placeholder="التلفون  " style="height: 30px; margin-top:8px; color:black;">


                        <div class="dropdown">
                            <button type="button" class="btn btn-light gendar dropdown-toggle"  data-toggle="dropdown">
                                <div class="textdropdown">  الجندر</div>
                            </button>
                            <div  class="dropdown-menu" style=" color: #0E70F2; ">
                                 <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   ذكر </a>
                                <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   انثى</a>
                            </div>
                        </div>


                                    <div class="dropdown">
                                    <button type="button" class="btn btn-light dregree-of-siencistic dropdown-toggle"  data-toggle="dropdown" >
                                        <div class="textdropdown">  الدرجة العلمية</div>
                                    </button>
                                    <div  class="dropdown-menu" style=" color: #0E70F2; ">
                                        <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   استاذ مشارك </a>
                                         <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   دكتور </a>
                                        <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   استاذ</a>
                                        <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   معيد</a>

                                    </div>
                                    </div>

                        <input type="text" class="form-control" id="inputtext" name="email" placeholder="   الايمل الجامعي" style="height: 30px; margin-top:15px">



{{--
                        <div class="table-responsive">
                           <table class="table" style="width:100%;">
                            <tr>
                                <th>المستوى الرابع</th>
                                <th>المستوى الثالث</th>
                                <th>المستوى الثاني</th>
                                <th>المستوى الأول</th>
                                <th rowspan="2" style="padding: 40px;">المقرر الدراسي</th>
                            </tr>
                            <tr>
                                <td>
                                    <div class="dropdown">
                           <button type="button" class="btn btn-light studyingbooks-acade dropdown-toggle"data-toggle="dropdown" >
                               <div class="textdropdown">  ******</div>
                           </button>
                           <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                                <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   *** </a>
                               <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   ***</a>
                           </div>
                            </div></td>
                            <td>
                                <div class="dropdown">
                       <button type="button" class="btn btn-light studyingbooks-acade dropdown-toggle" data-toggle="dropdown" >
                           <div class="textdropdown">  ******</div>
                       </button>
                       <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                            <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   *** </a>
                           <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   ***</a>
                       </div>
                        </div></td>
                        <td>
                            <div class="dropdown">
                   <button type="button" class="btn btn-light studyingbooks-acade dropdown-toggle" data-toggle="dropdown" >
                       <div class="textdropdown">  ******</div>
                   </button>
                   <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                        <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   *** </a>
                       <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   ***</a>
                   </div>
                    </div></td>
                        <td>
                            <div class="dropdown">
                   <button type="button" class="btn btn-light studyingbooks-acade dropdown-toggle" data-toggle="dropdown" >
                       <div class="textdropdown">  ******</div>
                   </button>
                   <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                        <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   *** </a>
                       <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   ***</a>
                   </div>
                    </div></td>
                    <!-- <td>
                        <div class="dropdown">
               <button type="button" class="btn btn-light studyingbooks-acade dropdown-toggle" >
                   <div class="textdropdown">  ******</div>
               </button>
               <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                    <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   *** </a>
                   <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   ***</a>
               </div>
                </div></td>                     -->
                     </tr>
                            <tr>
                                <td><input type="checkbox"  class="checkbox" name="raido"></td>
                                <td><input type="checkbox" class="checkbox" name="raido"></td>
                                <td><input type="checkbox" class="checkbox" name="raido"></td>
                                <td><input type="checkbox" class="checkbox" name="raido"></td>
                               <th class="name-group">المجموعة (1)</th>

                            </tr>
                            <tr>
                                <td><input type="checkbox" class="checkbox" name="raido"></td>
                                <td><input type="checkbox" class="checkbox" name="raido"></td>
                                <td><input type="checkbox" class="checkbox" name="raido"></td>
                                <td><input type="checkbox" class="checkbox" name="raido"></td>
                               <th class="name-group">المجموعة (2)</th>

                            </tr>
                            <tr>
                                <td><input type="checkbox" class="checkbox" name="raido"></td>
                                <td><input type="checkbox" class="checkbox" name="raido"></td>
                                <td><input type="checkbox" class="checkbox" name="raido"></td>
                                <td><input type="checkbox" class="checkbox" name="raido"></td>
                                <th class="name-group">المجموعة (3)</th>

                            </tr>

                           </table>

                        </div>
                        <input type="text" class="form-control" id="inputtext" name="totallecturesweekly" placeholder=" اجمالي المحاضرات الأسبوعية " style="height: 30px; margin-top:6px">
                        <input type="text" class="form-control" id="inputtext" name="totallecturesoftearm" placeholder="   اجمالي محاضرات الفصل الدراسي  " style="height: 30px; margin-top:10px"> --}}

                        <!-- <input type="file" class="form-control-file border" id="file" name="uploadefile" style="height: 30px; margin-top:8px">
                        <input type="text" class="form-control" id="inputtext" name="note" placeholder="ملاحظة" style="height: 30px; margin-top:8px"> -->
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
</div>

<!-- The ModalDetailsacademic -->
<div class="modal fade" id="myModaldDetails" wire:ignore.self>
    <div class="modal-dialog ">
        <div class="modal-content ModaldDetailsAcademic" id="modal-content" style="background-color: #F6F7FA; height: 95vh;">

            <!-- Modal Header -->
            <div class="modal-header ModaldDetailsAcademic" id="modheader">
                 التفاصيل
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            </div>

            <!-- Modal body -->
            <div class="modal-body ModaldDetailsAcademic">
                @if($employeeData&&$openType == 'show')
                {{-- <form action="/action_page.php" style="display: block;"> --}}
                    <div class="form-group">

                       <img src="{{ $employeeData->photo ? asset('storage/'.$employeeData->photo):Vite::image("user.png")
                       }}"  width="" class="user_profile_modal">

                        <div class="table-responsive ">
                            <table class="table details-academic " style="width:100%;  margin-top: 5px;" >

                                        <tr class="table-light " id="modldetials">
                                            <td>{{ $employeeData->full_name }}</td>
                                            <th class="name-group" > الاسم</th>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <td>{{ $employeeData->birthday }}</td>
                                            <th class="name-group"> تاريخ الميلاد</th>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <td>{{ $employeeData->gender_ar() }}</td>
                                            <th class="name-group" > نوع الجندر</th>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <td>{{ $employeeData->academic->name }}</td>
                                            <th class="name-group"> الدرجةالعلمية </th>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <td>{{ $employeeData->email }}</td>
                                            <th class="name-group"> الإيمل الجامعي </th>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <td>{{ $employeeData->phone }}</td>
                                            <th class="name-group">التلفون </th>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <td>
                                                {{
                                                    $employeeData->levels->map(function($level){
                                                        return $level->name;
                                                    })->implode(' - ')
                                                }}
                                            </td>
                                            <th class="name-group">المستوى  </th>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <td>{{ $employeeData->subjects->map(function($subject){
                                                return $subject->name_ar;
                                            })->implode(' - ') }}</td>
                                            <th class="name-group">المقرر الدراسي </th>
                                        </tr>
                                            <tr class="table-light" id="modldetials">
                                            <td>{{ $employeeData->academic->groups->map(function($group){
                                                return $group->name;
                                            })->unique()->implode(' - ') }}</td>
                                            <th class="name-group">المجموعات </th>
                                            </tr>
                                        <tr class="table-light" id="modldetials">
                                            <td>{{ $employeeData->academic->Weekly_lectures }}</td>
                                            <th class="name-group"> المحاضرات الإسيوعية</th>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <td>{{ $employeeData->academic->Quarterly_lectures }}</td>
                                            <th class="name-group">محاضرات الفصل الدراسي </th>
                                        </tr>
                            </table>
                        </div>

                    </div>
                    @endif
                {{-- </form> --}}
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
