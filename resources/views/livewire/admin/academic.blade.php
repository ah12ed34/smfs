<div>
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
            .textdropdown{
                margin: 0;

            }

            .dropdown-menu{
                overflow: hidden;
            }

            .modal-body {
                height: auto;
                overflow: auto;
                max-height: 70vh;
                // hide the scrollbar
                scrollbar-width: none;
                scrollbar-height: none;
                -ms-overflow-style: none;


            }
            .modal-body::-webkit-scrollbar {
                display: none;
            }


            </style>
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
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-chat-edit" data-toggle="modal" data-target="#myModalEdite">تعديل  <img src="{{ Vite::image('edit.png') }}" id=""  width="15px" ></button> </td>
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModal2">التفاصيل</button> </td>
                            <!-- <td><button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal1" id="btn-chat-edit">الدردشة <img src="../../images/conversation (3).png" id=""  width="25px" ></button> </td> -->
                            <td>*******</td>
                            <td>{{ $academic->user->phone }}</td>
                            <td>{{ $academic->user->gender_ar() }}</td>
                            <td>{{ $academic->user->email }}</td>
                            <td>{{ $academic->name }}</td>
                            <td>{{ $academic->user->full_name }}</td>
                        </tr>

                    @empty

                    @endforelse




                </tbody>
            </table>
        </div>


        {{-- <img src="{{ $ava }}" class="image-stastic" width="50px"> --}}
        <div class="modal fade" id="addacademic" wire:ignore.self>
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="modal-content" style="background-color: #F6F7FA;height: auto;">

                    <!-- Modal Header -->
                    <div class="modal-header" id="modheader">
                          إضافة اكاديمي
                        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
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
                                <table class="table" style="width: 100%; height: 30px;">
                                    <tr>
                                    <td>
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
                                    </td>
                                        <td>
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
                                        </td>

                                    </tr>
                                </table>
                                <input type="text" class="form-control" id="username" wire:model='username'  placeholder="اسم المستخدم" style="height: 30px; margin-top:8px">
                                <input type="text" class="form-control" id="email" wire:model='email' placeholder="الايمل" style="height: 30px; margin-top:8px">
                                <input type="password" class="form-control" id="password" wire:model='password'  placeholder="كلمة المرور" style="height: 30px; margin-top:8px">

                                <!-- <input type="file" class="form-control-file border" id="file" name="uploadefile" style="height: 30px; margin-top:8px">
                                <input type="text" class="form-control" id="inputtext" name="note" placeholder="ملاحظة" style="height: 30px; margin-top:8px"> -->
                            </div>

                        </form>
                    </div>

                    <!-- Modal footer -->

                    <div class="modal-footer">
                        <button type="submit"  class="btn btn-primary" id="btnsave" wire:click='store'>حفظ</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel">إلغاء</button>
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
            });

        </script>
</div>
