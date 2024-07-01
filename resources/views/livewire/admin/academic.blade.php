@section('nav')
@livewire('components.nav.admin.department',['active' => 'academic','depa' => $department])
@endsection

        <style>
            #modheader {
                border-radius: 30px 30px 0px 0px;
            }

            #modal-content {
                border-radius: 30px;
            }

            #btnsave {
                background-color: #0E70F2;
                border-radius: 30px;
                width: 100px;
            }

            #btncancel {
                background-color: #FF0000;
                border-radius: 30px;
                width: 100px;
            }

            #inputtext {
                border-radius: 30px;
            }

            .modal input {
                border: none;
                box-shadow: 0 0 2px #436fce;
                text-align: right;
                font-size: 12px;
                color: #436fce;
                border-radius: 30px;
            }

            #dropdown-itemlist {
                border-radius: 30px;
            }

            .modal-footer {
                height: 70px;
            }

            .btn.gendar , .btn.dregree-of-siencistic{
                align-items: center;
            }
            /* .textdropdown{
                margin: 0;

            } */

            .dropdown-menu{
                overflow: hidden;
            }

            .modal-body {
                /* height: auto; */
                overflow: auto;
                /* max-height: 70vh; */
                // hide the scrollbar
                scrollbar-width: none;
                scrollbar-height: none;
                -ms-overflow-style: none;


            }
            .modal-body::-webkit-scrollbar {
                display: none;
            }

            .ditels#btncancel {
                margin: 0 35%;
                background-color: #0e70f2;
                border : none;
            }

            </style>
<div>
    <div class="container" style="padding-top:20px; ">

        <div class="table-responsive-xl">

            <table class="table" style=" width:100%;">
                <thead class="table-header" style="font-size: 12px;">
                    <tr class="table-light" id="modldetials">
                        <th>تعديل</th>
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
                        <tr class="table-light" @if ($loop->first) id="modldetials" style="margin-top:7px;" @endif>
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-chat-edit" data-toggle="modal" data-target="#myModalEdite" wire:click='select({{ $academic->user_id }})'>تعديل  <img src="{{ Vite::image('edit.png')}}" id=""  width="15px" ></button> </td>
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModaldDetails" >التفاصيل</button> </td>
                            {{-- <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModal2" wire:click='select({{ $academic->user_id }})'>التفاصيل</button> </td> --}}
                            <!-- <td><button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal1" id="btn-chat-edit">الدردشة <img src="../../images/conversation (3).png" id=""  width="25px" ></button> </td> -->
                            <td>{{ $academic->user->role()->description ?? ' ' }}
                            <td>{{ $academic->user->phone }}</td>
                            <td>{{ $academic->user->gender_ar() }}</td>
                            <td>{{ $academic->user->email }}</td>
                            <td>{{ $academic->name }}</td>
                            <td>{{ $academic->user->full_name }}</td>
                        </tr>

                    @empty
                        <tr class="table-light">
                            <td colspan="8" style="text-align: center;">لا يوجد بيانات</td>
                        </tr>

                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

        {{-- اضهار تفاصل الاكادمي --}}
        <div class="modal fade" id="myModal2" wire:ignore.self>
            <div class="modal-dialog modal-lg">
                <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA;height: auto;">

                    <!-- Modal Header -->
                    <div class="modal-header modal_header_css" id="modheader">
                        تفاصيل الاكاديمي
                        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body" style="overflow: auto;  scrollbar-width: none;scrollbar-height: none;-ms-overflow-style: none;">
                        <div class="form-group">
                            <label for='file#ditels'>
                            <img src="{{ $avatarPreview ?? Vite::image('add_user_avatar.png') }}" id="img" width="100px" height="100px" style="margin-left: 10%; @if($avatarPreview) border-radius: 50%; @endif ">
                            </label>
                            <br>
                            <label for="nameAcademic">الاسم</label>
                            <input type="text" class="form-control " id="nameAcademic" value="{{ $name }}" style="height: 30px; margin-top:-6px" readonly>
                            <label for="phone">رقم الهاتف</label>
                            <input type="text" class="form-control" id="phone" value="{{ $phone }}" style="height: 30px; margin-top:8px" readonly>
                            <label for="barithday">تاريخ الميلاد</label>
                            <input type="text" class="form-control" id="barithday" value="{{ $date }}" style="height: 30px; margin-top:8px" readonly>
                            <label for="gendar">الجندر</label>
                            <input type="text" class="form-control" id="gendar" value="{{ isset($acad->user) ? $acad->user->gender_ar() : 'N/A' }}" style="height: 30px; margin-top:8px" readonly>
                            <label for="academic_name">المسمى الأكاديمي</label>
                            <input type="text" class="form-control" id="academic_name" value="{{ isset($acad->name) ? $acad->name : 'N/A' }}" style="height: 30px; margin-top:8px" readonly>
                            <label for="username">اسم المستخدم</label>
                            <input type="text" class="form-control" id="username" value="{{ $username }}" style="height: 30px; margin-top:8px" readonly>
                            <label for="email">الايمل</label>
                            <input type="text" class="form-control" id="email" value="{{ $email }}" style="height: 30px; margin-top:8px" readonly>
                            {{-- الجدول  schedule--}}
                            @if (isset($acad->schedule) && $acad->schedule != null)
                                <label for="schedule">الجدول</label><br>
                                <a href="{{ asset('storage/' . $acad->schedule) }}" target="_blank" class="btn btn-primary" style="height: 30px; margin-top:8px">عرض الجدول</a>
                            @endif

                        </div>


                </div>
                <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger ditels" data-dismiss="modal" id="btncancel" wire:click='unselect'>اغلاق</button>

                    </div>
            </div>
        </div>
        </div>
        {{-- اضهار تفاصل الاكادمي --}}


        {{-- <img src="{{ $ava }}" class="image-stastic" width="50px"> --}}
        <div class="modal fade" id="addacademic" wire:ignore.self>
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="modal-content" style="background-color: #F6F7FA;height: 95vh;">

                    <!-- Modal Header -->
                    <div class="modal-header" id="modheader">
                        إضافة اكاديمي
                        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body" style="overflow: auto;  scrollbar-width: none;scrollbar-height: none;-ms-overflow-style: none;">
                        <form  style="display: block;" wire:submit.prevent ='store' id="adduser" >
                            <div class="form-group" >
                                <label for='file'>
                                <img src="{{ $avatarPreview ?? Vite::image('add_user_avatar.png') }}" id="img" width="100px" height="100px" style="margin-left: 10%; @if($avatarPreview) border-radius: 50%; @endif ">
                                </label>
                                {{-- accept png and jepg only --}}
                                <input type="file" class="form-control-file border" id="file"  wire:model='avatar' style="height: 30px; margin-top:8px;display:none;" accept=".png, .jpg, .jpeg" >
                                @error('avatar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <!-- <label for="usr">Name:</label> -->
                                <input type="text" class="form-control" id="nameAcademic" wire:model='name' placeholder=" الاسم " style="height: 30px; margin-top:-6px">
                                <input type="text" class="form-control" id="phone" wire:model='phone' placeholder="رقم الهاتف" style="height: 30px; margin-top:8px">

                                <!-- <textarea style="height: 100px;" class="form-control" rows="5" id="comment" placeholder="  التلفون" style=" margin-top:8px"></textarea> -->
                                <input type="date" class="form-control" id="barithday" wire:model='date' onfocus="this.showPicker()" style="height: 30px; margin-top:8px; color:black;">

                                <div class="dropdown">
                                    <button type="button" class="btn btn-light gendar dropdown-toggle" data-toggle="dropdown" >
                                        <div class="textdropdown">@if($gender=="") الجندر @else @if ($gender=='male') ذكر @else انثى @endif @endif
                                        </div>

                                    </button>
                                    <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                                        <a id="" class="dropdown-item"  wire:click='set_gender("male")' style="padding-left:30px; ">   ذكر </a>
                                        <a id="" class="dropdown-item"  wire:click='set_gender("female")' style="padding-left:30px; ">   انثى</a>
                                    </div>
                                    </div>

                                            <div class="dropdown">
                                            <button type="button" class="btn btn-light dregree-of-siencistic dropdown-toggle" data-toggle="dropdown" >
                                                <div class="textdropdown">@if ($academic_name=="") المسمى الأكاديمي @else @if ($academic_name=='professor') استاذ @elseif ($academic_name=='associate_professor') استاذ مشارك @elseif ($academic_name=='doctor') دكتور @elseif ($academic_name=='assistant_professor') معيد @endif @endif
                                                </div>
                                            </button>
                                            <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2;">
                                                <a id="" class="dropdown-item"  wire:click='set_academic_name("associate_professor")' style="padding-left:30px; ">   استاذ مشارك </a>
                                                <a id="" class="dropdown-item"  wire:click='set_academic_name("doctor")' style="padding-left:30px; ">   دكتور </a>
                                                <a id="" class="dropdown-item"  wire:click='set_academic_name("professor")' style="padding-left:30px; ">   استاذ</a>
                                                <a id="" class="dropdown-item"  wire:click='set_academic_name("assistant_professor")' style="padding-left:30px; ">   معيد</a>

                                            </div>
                                        </div>
                                <input type="text" class="form-control" id="username" wire:model='username'  placeholder="اسم المستخدم" style="height: 30px; margin-top:8px">
                                <input type="text" class="form-control" id="email" wire:model='email' placeholder="الايمل" style="height: 30px; margin-top:8px">
                                <input type="password" class="form-control" id="password" wire:model='password'  placeholder="كلمة المرور" style="height: 30px; margin-top:8px">

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
                                            <td style="padding-right:60px;">
                                                <div class="dropdown">
                                    <button type="button" class="btn btn-light studyingbooks-acade dropdown-toggle"data-toggle="dropdown" >
                                        <div class="textdropdown">  ******</div>
                                    </button>
                                    <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                                         <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   *** </a>
                                        <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   ***</a>
                                    </div>
                                        </div></td>
                                        <td style="padding-right:60px;">
                                            <div class="dropdown">
                                <button type="button" class="btn btn-light studyingbooks-acade dropdown-toggle" data-toggle="dropdown" >
                                    <div class="textdropdown">  ******</div>
                                </button>
                                <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                                     <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   *** </a>
                                    <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   ***</a>
                                </div>
                                    </div></td>
                                    <td style="padding-right:60px;">
                                        <div class="dropdown">
                            <button type="button" class="btn btn-light studyingbooks-acade dropdown-toggle" data-toggle="dropdown" >
                                <div class="textdropdown">  ******</div>
                            </button>
                            <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                                 <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   *** </a>
                                <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   ***</a>
                            </div>
                                </div></td>
                                    <td style="padding-right:60px;">
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
                                <input type="text" class="form-control" id="inputtext" name="totallecturesweekly" placeholder=" اجمالي المحاضرات الأسبوعية " style="height: 30px; margin-top:10px">
                                <input type="text" class="form-control" id="inputtext" name="totallecturesoftearm" placeholder="   اجمالي محاضرات الفصل الدراسي  " style="height: 30px; margin-top:10px">

                                <!-- <input type="file" class="form-control-file border" id="file" name="uploadefile" style="height: 30px; margin-top:8px">
                                <input type="text" class="form-control" id="inputtext" name="note" placeholder="ملاحظة" style="height: 30px; margin-top:8px"> -->
                            </div>

                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit"  class="btn btn-primary btn-sm btn_save_informModal" id="btnsave" wire:click='store'>حفظ</button>
                        <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="btncancel">إلغاء</button>
                    </div>
                </div>
            </div>
        </div>


        {{-- <img src="{{ $ava }}" class="image-stastic" width="50px"> --}}
        <div class="modal fade" id="myModalEdite" wire:ignore.self>
            <div class="modal-dialog modal-lg">
                <div class="modal-content modal_content_css" id="modal-content" style="background-color: #F6F7FA;height: 95vh;">

                    <!-- Modal Header -->
                    <div class="modal-header modal_header_css" id="modheader">
                            تعديل اكاديمي
                        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body" style="overflow: auto;  scrollbar-width: none;scrollbar-height: none;-ms-overflow-style: none;">
                        <form  style="display: block;"  id="editUser" >
                            <div class="form-group" >
                                <label for='file'>
                                <img src="{{ $avatarPreview ?? Vite::image('add_user_avatar.png') }}" id="img" width="100px" height="100px" style="margin-left: 10%; @if($avatarPreview) border-radius: 50%; @endif ">
                                </label>
                                {{-- accept png and jepg only --}}
                                <input type="file" class="form-control-file border" id="file"  wire:model='avatar' style="height: 30px; margin-top:8px;display:none;" accept=".png, .jpg, .jpeg" >
                                @error('avatar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <!-- <label for="usr">Name:</label> -->
                                <input type="text" class="form-control" id="nameAcademic" wire:model='name' placeholder=" الاسم " style="height: 30px; margin-top:-6px">
                                <input type="text" class="form-control" id="phone" wire:model='phone' placeholder="رقم الهاتف" style="height: 30px; margin-top:8px">

                                <!-- <textarea style="height: 100px;" class="form-control" rows="5" id="comment" placeholder="  التلفون" style=" margin-top:8px"></textarea> -->
                                <input type="date" class="form-control" id="barithday" wire:model='date' onfocus="this.showPicker()" style="height: 30px; margin-top:8px; color:black;">

                                <div class="dropdown">
                                    <button type="button" class="btn btn-light gendar dropdown-toggle" data-toggle="dropdown" >
                                        <div class="textdropdown">@if($gender=="") الجندر @else @if ($gender=='male') ذكر @else انثى @endif @endif
                                        </div>

                                    </button>
                                    <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                                        <a id="" class="dropdown-item"  wire:click='set_gender("male")' style="padding-left:30px; ">   ذكر </a>
                                        <a id="" class="dropdown-item"  wire:click='set_gender("female")' style="padding-left:30px; ">   انثى</a>
                                    </div>
                                    </div>

                                            <div class="dropdown">
                                            <button type="button" class="btn btn-light dregree-of-siencistic dropdown-toggle" data-toggle="dropdown" >
                                                <div class="textdropdown">@if ($academic_name=="") المسمى الأكاديمي @else @if ($academic_name=='professor') استاذ @elseif ($academic_name=='associate_professor') استاذ مشارك @elseif ($academic_name=='doctor') دكتور @elseif ($academic_name=='assistant_professor') معيد @endif @endif
                                                </div>
                                            </button>
                                            <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2;">
                                                <a id="" class="dropdown-item"  wire:click='set_academic_name("associate_professor")' style="padding-left:30px; ">   استاذ مشارك </a>
                                                <a id="" class="dropdown-item"  wire:click='set_academic_name("doctor")' style="padding-left:30px; ">   دكتور </a>
                                                <a id="" class="dropdown-item"  wire:click='set_academic_name("professor")' style="padding-left:30px; ">   استاذ</a>
                                                <a id="" class="dropdown-item"  wire:click='set_academic_name("assistant_professor")' style="padding-left:30px; ">   معيد</a>

                                            </div>
                                        </div>
                                <input type="text" class="form-control" id="username" wire:model='username'  placeholder="اسم المستخدم" style="height: 30px; margin-top:8px">
                                <input type="text" class="form-control" id="email" wire:model='email' placeholder="الايمل" style="height: 30px; margin-top:8px">
                                <input type="password" class="form-control" id="password" wire:model='password'  placeholder="كلمة المرور" style="height: 30px; margin-top:8px">
                                <input type="file" class="form-control-file border" id="file#schedule"  wire:model='schedule' style="height: 30px; margin-top:8px;" accept=".pdf , .png , .jpg , .jpeg">
                                <!-- <input type="file" class="form-control-file border" id="file" name="uploadefile" style="height: 30px; margin-top:8px">
                                <input type="text" class="form-control" id="inputtext" name="note" placeholder="ملاحظة" style="height: 30px; margin-top:8px"> -->
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
                                            <td style="padding-right:60px;">
                                                <div class="dropdown">
                                    <button type="button" class="btn btn-light studyingbooks-acade dropdown-toggle"data-toggle="dropdown" >
                                        <div class="textdropdown">  ******</div>
                                    </button>
                                    <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                                         <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   *** </a>
                                        <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   ***</a>
                                    </div>
                                        </div></td>
                                        <td style="padding-right:60px;">
                                            <div class="dropdown">
                                <button type="button" class="btn btn-light studyingbooks-acade dropdown-toggle" data-toggle="dropdown" >
                                    <div class="textdropdown">  ******</div>
                                </button>
                                <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                                     <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   *** </a>
                                    <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   ***</a>
                                </div>
                                    </div></td>
                                    <td style="padding-right:60px;">
                                        <div class="dropdown">
                            <button type="button" class="btn btn-light studyingbooks-acade dropdown-toggle" data-toggle="dropdown" >
                                <div class="textdropdown">  ******</div>
                            </button>
                            <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                                 <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   *** </a>
                                <a id="" class="dropdown-item" href="#"style="padding-left:30px; ">   ***</a>
                            </div>
                                </div></td>
                                <td style="padding-right:60px;">
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
                                    <input type="text" class="form-control" id="inputtext" name="totallecturesoftearm" placeholder="   اجمالي محاضرات الفصل الدراسي  " style="height: 30px; margin-top:10px">

                            </div>

                        </form>
                    </div>

                    <!-- Modal footer -->

                    <div class="modal-footer">
                        <button type="submit"  class="btn btn-primary btn-sm btn_save_informModal" id="btnsave" wire:click='editUser'>حفظ</button>
                        <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="btncancel" wire:click='unselect'>إلغاء</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- show all errors dialog --}}
        @if ($errors->any())
            <div class="modal fade show" id="errorsany" style="display: block;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" id="modal-content" style="background-color: #F6F7FA;height: auto;">

                        <!-- Modal Header -->
                        <div class="modal-header" id="modheader">
                            <h4 class="modal-title">Error</h4>
                            {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel" onclick="document.getElementById('errorsany').style.display = 'none';">إلغاء</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- The ModalDetailsacademic -->
<div class="modal fade" id="myModaldDetails">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ModaldDetailsAcademic" id="modal-content" style="background-color: #F6F7FA; height: 95vh;">

            <!-- Modal Header -->
            <div class="modal-header ModaldDetailsAcademic" id="modheader">
                التفاصيل
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            </div>

            <!-- Modal body -->
            <div class="modal-body ModaldDetailsAcademic">
                <form action="/action_page.php" style="display: block;">
                    <div class="form-group">

                    <img src="{{Vite::image("profile.png")}}"  width="" class="user_profile_modal">

                        <div class="table-responsive ">
                            <table class="table details-academic " style="width:100%;  margin-top: 5px;" dir="rtl" >

                                        <tr class="table-primary " id="modldetials">
                                            <th class="name-group "  style="padding-right:40px;"> الاسم</th>
                                            <th class="name-group" > تاريخ الميلاد</th>
                                            <th class="name-group"  > نوع الجندر</th>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <td  style="padding-right:40px;">**********</td>
                                            <td>**********</td>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-primary" id="modldetials">
                                            <th class="name-group" style="padding-right:40px;"> الدرجةالعلمية </th>
                                            <th class="name-group" > الإيمل الجامعي </th>
                                            <th class="name-group">التلفون </th>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <td style="padding-right:40px;">**********</td>
                                            <td>**********</td>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-primary" id="modldetials">
                                            <th class="name-group" style="padding-right:40px;">المستوى  </th>
                                            <th class="name-group">المقرر الدراسي </th>
                                            <th class="name-group">المجموعات </th>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="padding-right:40px;">مستوى اول</th>
                                            <td>**********</td>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="padding-right:40px;">مستوى ثاني</th>
                                            <td>**********</td>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="padding-right:40px;">مستوى ثالث</th>
                                            <td>**********</td>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <th style="padding-right:40px;">مستوى رابع</th>
                                            <td>**********</td>
                                            <td>**********</td>
                                        </tr>
                                        <tr class="table-primary" id="modldetials">
                                            <th class="name-group" colspan="2" style="padding-right:60px;"> المحاضرات الإسيوعية</th>
                                            <th class="name-group">محاضرات الفصل الدراسي </th>
                                        </tr>
                                        <tr class="table-light" id="modldetials">
                                            <td colspan="2" style="padding-right:60px;">**********</td>
                                            <td>**********</td>
                                        </tr>
                            </table>
                        </div>
                    </div>
                </form>
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


        <script>

            // var file = document.getElementById('file');
            // var image = document.getElementById('img');
            // file.onchange = function (e) {
            //     var ext = this.value.match(/\.([^\.]+)$/)[1];
            //     switch (ext) {
            //         case 'jpg':
            //         case 'jpeg':
            //         case 'png':
            //             image.src = URL.createObjectURL(e.target.files[0]);
            //             image.style.borderRadius = '50%';
            //             break;
            //         default:
            //             alert('Invalid file type');
            //             this.value = '';
            //             image.src = '{{ Vite::image('add_user_avatar.png') }}';
            //             image.style.borderRadius = '0';

            //     }
            // };

            window.addEventListener('closeModal', event => {
                $('#addacademic').modal('hide');
                $('#myModalEdite').modal('hide');

            });

        </script>
{{-- </div> --}}
