<div>
    {{-- Success is as dangerous as failure. --}}
    <div  class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces"> <label  class="subjectname">   الأدمن </label><img src="{{ Vite::image('admin.png')}}" id="subject-icon-hdr2" width="40px" >
        </button>


        <!-- <div class="dep-name">تقنية معلومات</div> -->

    <div class="dropdown">

        <button id="" type="button" class="btn btn-light departments-sentnotifications dropdown-toggle" data-toggle="dropdown" dir="rtl">
            <!-- <div class="textdropdown"> -->
                تحديد رئيس القسم
            </button>
        <div id="dropdown-menulist" class="dropdown-menu">
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">تكنولوجيا المعلومات</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;">نظم المعلومات</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;"> علوم الحاسوب</a>
            <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:30px;">  الأمن السيبراني</a>
        </div>

        </div>
    </div>

    <div class="hr3">
        <button id="spacesbtn" onclick="window.location='{{ route('admin.notifications') }}'" class="spaces"> <img src="{{ Vite::image('left-arrow.png')}}" id="spaces1"  width="30px"></button>

        <!-- <td><button type="submit" class="btn btn-primary btn-sm" id="btn-uploade-grades" data-toggle="modal" data-target="#myModal"> رفع ملف<img src="../images/plus.png')}}"  width="20px" style="float: left;"></button> </td> -->

    </div>

</div>
