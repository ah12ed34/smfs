<div>
    {{-- Success is as dangerous as failure. --}}
    <div  class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces"> <label  class="subjectname" style="margin-left: -10px;"> المقرر الدراسي </label><img src="{{Vite::image("open-book.png")}}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
        </button>
        <div class="dep-sub-name">{{ $group_subject->subject()->name_ar }}</div>

        <div id="btn-group-studyingbooks" class="btn-group">
            <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->

            <button id="btn-studyingbooksNavbar" class="btn btn-light" onclick="location.href='{{route('forms-quiz',[$group_subject->subject_id,$group_subject->group_id])}}'"><label class="proNavbartext">   نماذج</label></button>
            <button id="btn-studyingbooksNavbar" class="btn btn-light"><label class="proNavbartext">  عملي </label></button>
            <button id="btn-studyingbooksNavbar" class="btn btn-light" style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;" onclick="location.href='{{route('studyingbooks',[$group_subject->subject_id,$group_subject->group_id])}}'"><label class="proNavbartext">  نظري </label></button>
        </div>
        <!-- <button class="btn-bottomNavbar"><i id="bottombaricon" class="bi bi-house-fill custom-width-icon" width="30px" height="30px"></i><br>
            <label class="bottomNavbartext">القائمة</label>
            </button> -->

        <button id="btn-studyingbooksdropdown" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                 <div class="textstudentsdrop">     نظري</div>
                </button>
        <div id="dropdown-menulist" class="dropdown-menu" style="width:100px;">
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> عملي</a>
            <a href="{{route("forms-quiz",[$group_subject->subject_id,$group_subject->group_id])}}" id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> نماذج</a>
        </div>

    </div>
    <div  class="hr3-students">
        <a href="{{route("subject.index",[$group_subject->subject_id,$group_subject->group_id])}}">    <button id="spacesbtn" class="spaces"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px"></button></a>

        <div id="input-groupstudyingbooks" class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
            </div>
        </div>
        <td><button type="submit" class="btn btn-primary btn-sm" id="btn-uploade-grades" data-toggle="modal" data-target="#myModal"> رفع ملف<img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left;"></button> </td>

    </div>

</div>
