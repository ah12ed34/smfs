@section('nav')
@livewire('components\nav\managerOFdepart.manage-academic-depart')
@endsection
<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="content">

        <div class="container"  style="padding-top: 20px;" >

            <div class="table-responsive-xl">
                <table class="table" style="width:100%; right:0%;">
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
                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-chat-edit" data-toggle="modal" data-target="#myModalEdite">تعديل  <img src="{{Vite::image("edit.png")}}"id=""  width="15px" ></button> </td>
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModal2">التفاصيل</button> </td>
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
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModal2">التفاصيل</button> </td>
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
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModal2">التفاصيل</button> </td>
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
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#myModal2">التفاصيل</button> </td>
                            <!-- <td><button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal1" id="btn-chat-edit">الدردشة <img src="{{Vite::image("conversation (3).png")}}"id=""  width="25px" ></button> </td> -->
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
   <!-- The Modaladdacademic -->
   <div class="modal fade" id="addacademic">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="modal-content" style="background-color: #F6F7FA; height:700px;">

            <!-- Modal Header -->
            <div class="modal-header" id="modheader">
                  إضافة اكاديمي
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
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
                        <input type="text" class="form-control" id="inputtext" name="totallecturesoftearm" placeholder="   اجمالي محاضرات الفصل الدراسي  " style="height: 30px; margin-top:10px">

                        <!-- <input type="file" class="form-control-file border" id="file" name="uploadefile" style="height: 30px; margin-top:8px">
                        <input type="text" class="form-control" id="inputtext" name="note" placeholder="ملاحظة" style="height: 30px; margin-top:8px"> -->
                    </div>

                </form>
            </div>

            <!-- Modal footer -->

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="btnsave">حفظ</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel">إلغاء</button>
            </div>
        </div>
    </div>
</div>
</div>
