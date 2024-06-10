<div>
    <div  class="hdr2" style=" box-shadow: 10px;">
        <button class="spaces"> <label  class="subjectname"> الطلاب </label><img src="{{Vite::image("students.png")}}" id="subject-icon-hdr2" width="40px">
        </button>
        <div class="dep-sub-name">{{ $group_subject->subject()->name_ar }}</div>

        <div id="btn-group-students" class="btn-group">
            <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->
            <button id="btn-studentsNavbar" class="btn btn-light" @if ($active == 'studentsworksStastics')
                style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"

            @endif  onclick="location.href='{{route('studentsworksStastics',[$group_subject->subject_id,$group_subject->group_id])}}'"><label class="proNavbartext">الإحصائيات</label></button>
            <button id="btn-studentsNavbar" class="btn btn-light" @if ($active == 'projectsgrades-stu')
                style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"

            @endif onclick="location.href='{{route('projectsgrades-stu',[$group_subject->subject_id,$group_subject->group_id])}}'"><label class="proNavbartext">   المشاريع</label></button>
                <button id="btn-studentsNavbar" class="btn btn-light" @if ($active == 'assignmentsgrdes-stu')
                    style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"

                @endif onclick="location.href='{{route('assignmentsgrdes-stu',[$group_subject->subject_id,$group_subject->group_id])}}'"><label class="proNavbartext">   التكاليف</label></button>
                  <button id="btn-studentsNavbar" class="btn btn-light" @if ($active == 'midexam')
                      style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"

                  @endif onclick="location.href='{{route('midexam',[$group_subject->subject_id,$group_subject->group_id])}}'"><label class="proNavbartext">   النصفي</label></button>
                      <button id="btn-studentsNavbar" class="btn btn-light" @if ($active == 'students-persents')
                          style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"
                      @endif onclick="location.href='{{route('students-persents',[$group_subject->subject_id,$group_subject->group_id])}}'"><label class="proNavbartext"> الحضور والغياب </label></button>
            <button id="btn-studentsNavbar" class="btn btn-light" @if ($active == 'students')
            style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"
            @endif   onclick="location.href='{{route('students',[$group_subject->subject_id,$group_subject->group_id])}}'"><label class="proNavbartext"> قائمة الطلاب</label></button>
        </div>
        <!-- <button class="btn-bottomNavbar"><i id="bottombaricon" class="bi bi-house-fill custom-width-icon" width="30px" height="30px"></i><br>
            <label class="bottomNavbartext">القائمة</label>
            </button> -->

        <button id="btn-studentsdropdown" type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown">

            <div class="textstudentsdrop">@switch($active)
                @case('students')
                    قائمة الطلاب
                    @break
                @case('students-persents')
                    الحضور والغياب
                    @break
                @case('midexam')
                    الاختبار النصفي
                    @break
                @case('assignmentsgrdes-stu')
                    التكاليف
                    @break
                @case('projectsgrades-stu')
                    المشاريع
                    @break
                @case('studentsworksStastics')
                    الإحصائيات
                    @break

                @default

            @endswitch</div>
        </button>
    <div id="dropdown-menulist" class="dropdown-menu" style="width:100px;  ">
        @if($active != 'students')
            <a  href="{{route("students",[$group_subject->subject_id,$group_subject->group_id])}}" id="dropdown-students-itemlist" class="dropdown-item" style="padding-left:40px; border-bottom: 1px solid #e0e0e0;">  قائمة الطلاب</a>
        @endif
        @if ($active != 'students-persents')
            <a  href="{{route("students-persents",[$group_subject->subject_id,$group_subject->group_id])}}" id="dropdown-students-itemlist" class="dropdown-item" style="padding-left:40px; ">  الحضور والغياب</a>
        @endif
        @if ($active != 'midexam')
            <a  href="{{route("midexam",[$group_subject->subject_id,$group_subject->group_id])}}" id="dropdown-students-itemlist" class="dropdown-item" style="padding-left:40px; ">  الاختبار النصفي</a>

        @endif
    {{-- <a  href="{{route("midexam",[$group_subject->subject_id,$group_subject->group_id])}}" id="dropdown-students-itemlist" class="dropdown-item"  style="padding-left:40px; ">  الاختبار النصفي</a> --}}
        @if($active != 'assignmentsgrdes-stu')
            <a   href="{{route("assignmentsgrdes-stu",[$group_subject->subject_id,$group_subject->group_id])}}" id="dropdown-students-itemlist" class="dropdown-item"  style="padding-left:47px; ">التكاليف</a>
        @endif
        @if($active != 'projectsgrades-stu')
            <a   href="{{route("projectsgrades-stu",[$group_subject->subject_id,$group_subject->group_id])}}" id="dropdown-students-itemlist" class="dropdown-item"  style="padding-left:47px; "> المشاريع</a>
        @endif
        @if($active != 'studentsworksStastics')
            <a  href="{{route("studentsworksStastics",[$group_subject->subject_id,$group_subject->group_id])}}"   id="dropdown-students-itemlist" class="dropdown-item"  style="padding-left:45px; "> الإحصائيات</a>
        @endif
        </div>


        <div class="dropdown">
        <button id="btn-groups-student2" type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown">
            <div class="textdrop2">  جميع المجموعات</div>
           </button>
        <div id="dropdown-menulist" class="dropdown-menu">
            @foreach ($otherGroups as $group)
                <a id="dropdown-students-itemlist" class="dropdown-item" href="{{ route(request()->route()->getName(),[$group_subject->subject_id,$group->id]) }}"
                 style="padding-left:40px;">{{ $group->name }}</a>
            @endforeach
            {{-- <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> المجموعة(2)</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> المجموعة(3)</a> --}}
        </div>
    </div>
    </div>





    <div  class="hr3-students">
        <a href="{{route("subject.index",[$group_subject->subject_id,$group_subject->group_id])}}">    <button id="spacesbtn" class="spaces"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px" ></button></a>
        <button id="btn-groups-students" type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown">
            <div class="textdrop2">  جميع المجموعات</div>
           </button>
        <div id="dropdown-menulist" class="dropdown-menu">
            @foreach ($otherGroups as $group)
                <a id="dropdown-students-itemlist" class="dropdown-item" href="{{ route(request()->route()->getName(),[$group_subject->subject_id,$group->id]) }}"

                 style="padding-left:40px;">{{ $group->name }}</a>

            @endforeach
            {{-- <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px; ">(1)المجموعة</a> --}}
            {{-- <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px; "> المجموعة(2)</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> المجموعة(3)</a> --}}
        </div>
        <div id="input-groupstudent" class="input-group mb-3">
            <input type="text" class="form-control" wire:model='search' wire:keydown.enter='srch()' placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit" wire:click='srch()' ><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
            </div>
        </div>
        <td><button type="submit" class="btn btn-primary btn-sm" id="btn-uploade-grades" data-toggle="modal" data-target="#myModal"> رفع الدرجات<img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left;"></button> </td>

    </div>
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content modal_content_css" id="modal-content2">

            <!-- Modal Header -->
            <div class="modal-header modal_header_css" id="modheader">
                رفع الدرجات
                <button type="button" class="close" data-dismiss="modal">&times;</button>
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
                <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="" style="float: left; margin-left:30px;">حفظ</button>
                <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button>
            </div>
        </div>
    </div>
</div>
</div>



