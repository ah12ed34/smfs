<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces" onclick="location.href='{{route('StudentSaffairs')}}'"> <label  class="subjectname" style="margin-left: -10px;">  شؤون الطلاب  </label><img src="{{Vite::image("studentsAffairs.png")}}" id="subject-icon-hdr2" width="40px" style="">
        </button>

        {{-- <div class="dropdown">
            <button type="button"  class="btn btn-light studentsAffairsTypeTerm_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                    <div class="textdropdown">    ترم اول</div>
                </button>
                <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">

                    <!-- <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   الصلاحيات</a> -->
                    <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  ترم ثاني</a>
                    <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  الكل</a>

                </div>
            </div> --}}

    <div class="dep-name">{{ $level->department->name }}</div>
    </div>
     <div class="hr3">
        <button id="spacesbtn" class="spaces" onclick="location.href='{{route('depart_levels_studentsAffairs', $level->department_id
        )}}'"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px"></button>

       {{-- " <div id="input-groupstudyingbooks" class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
            </div>
        </div>
        <td><button type="submit" class="btn btn-primary btn-sm" id="btn-uploade-grades" data-toggle="modal" data-target="#myModal"> رفع ملف<img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left;"></button> </td>" --}}

    </div>

</div>
