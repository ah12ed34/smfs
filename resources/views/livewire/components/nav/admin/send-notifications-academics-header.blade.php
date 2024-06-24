<div>
    {{-- Success is as dangerous as failure. --}}
    <div  class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces"> <label  class="subjectname">   الأدمن </label><img src="{{ Vite::image('admin.png')}}" id="subject-icon-hdr2" width="40px" >
        </button>


        <!-- <div class="dep-name">تقنية معلومات</div> -->

    <div class="dropdown">

        <button id="" type="button" class="btn btn-light departments-sentnotifications dropdown-toggle" data-toggle="dropdown" dir="rtl">
            <!-- <div class="textdropdown"> -->
                تحديد  القسم
            </button>
        <div id="dropdown-menulist" class="dropdown-menu">
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">تكنولوجيا المعلومات</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;">نظم المعلومات</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;"> علوم الحاسوب</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;">  الأمن السيبراني</a>
        </div>

        </div>

        <button id="" type="button" class="btn btn-primary spacific_Academicdropdown" data-toggle="modal" data-target="#MoadalspacificAcademic" > تحديد الاكادمين </button>

        {{-- <div class="dropdown">
            <button id="" type="button" class="btn btn-light groups-sentnotifications dropdown-toggle" data-toggle="dropdown"  dir="rtl">
            تحديد الاكادمين
            </button>
            <div id="dropdown-menulist" class="dropdown-menu">
                <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">*****</a>
                <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;"> *****</a>
                <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;"> *****</a>
            </div>
            </div> --}}

    </div>

    <div class="hr3">
        <button id="spacesbtn" onclick="window.location='{{ route('admin.notifications') }}'" class="spaces"> <img src="{{ Vite::image('left-arrow.png')}}" id="spaces1"  width="30px"></button>

        <!-- <td><button type="submit" class="btn btn-primary btn-sm" id="btn-uploade-grades" data-toggle="modal" data-target="#myModal"> رفع ملف<img src="../images/plus.png')}}"  width="20px" style="float: left;"></button> </td> -->

    </div>

     <!-- The MoadalspacificAcademic -->
     <div class="modal fade" id="MoadalspacificAcademic" wire:ignore style="top:45px; left:60px;">
        <div class="modal-dialog ">
            <div class="modal-content modal_content_css" style="height:40%; width:350px; border-radius:20px;" >

                <!-- Modal Header -->
                <div class="modal-header" style=" height: 50px; padding-top:6px; background-color:#0E70F2;" >


                                    <div id="" class="input-group mb-3" style="top:15px; height:30px;">
                                        <input type="text" class="form-control"  placeholder="Search">
                                        <div class="input-group-append">
                                            <button id="form-control" class="btn btn-light" type="submit"  ><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
                                        </div>
                                    </div>

                            {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}

                </div>

                <!-- Modal body -->
                <div class="modal-body" style="overflow: auto;">
                    <form action="/action_page.php" style="display: block;">
                            <div class="table-responsive">
                                <table class="table" style="width:100%;" >
                                    {{-- <thead>
                                        <tr class="table-light" id="">
                                            <th colspan="2">

                                            </th>
                                        </tr>
                                    </thead> --}}
                                    <tbody style="overflow: auto;">
                                        <tr class="table-light">
                                            <td style="text-align: right;">********</td>
                                            <td style="width:7%"><input type="checkbox" class="" name="raido"></td>
                                        </tr>
                                        <tr class="table-light">
                                            <td style="text-align: right;">********</td>
                                            <td style="width: 7%"><input type="checkbox" class="" name="raido"></td>
                                        </tr>
                                        <tr class="table-light">
                                            <td style="text-align: right;">********</td>
                                            <td style="width:7%"><input type="checkbox" class="" name="raido"></td>
                                        </tr>
                                        <tr class="table-light">
                                            <td style="text-align: right;">********</td>
                                            <td style="width: 7%"><input type="checkbox" class="" name="raido"></td>
                                        </tr>
                                        <tr class="table-light">
                                            <td style="text-align: right;">********</td>
                                            <td style="width:7%"><input type="checkbox" class="" name="raido"></td>
                                        </tr>
                                        <tr class="table-light">
                                            <td style="text-align: right;">********</td>
                                            <td style="width: 7%"><input type="checkbox" class="" name="raido"></td>
                                        </tr>
                                        <tr class="table-light">
                                            <td style="text-align: right;">********</td>
                                            <td style="width:7%"><input type="checkbox" class="" name="raido"></td>
                                        </tr>
                                        <tr class="table-light">
                                            <td style="text-align: right;">********</td>
                                            <td style="width: 7%"><input type="checkbox" class="" name="raido"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </form>
                </div>

                <!-- Modal footer -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="" style="height:30px; width:60px; " >حفظ</button>
                    <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="" style="height:30px; width:60px; ">إلغاء</button>
                </div>
            </div>
        </div>
    </div>

</div>
