<div>
    <div class="hdr2" style=" box-shadow: 10px;">
        <button class="spaces"> <label  class="subjectname"> المشاريع </label><img src="{{Vite::image("project-management.png")}}" id="subject-icon-hdr2" width="40px">
        </button>
        <div class="dep-sub-name">{{$group_subject->subject()->name_ar}} </div>

        <div id="btn-group-proj" class="btn-group">
        <a href="{{route("projectsStastics",[$group_subject->id]
        )}}">  <button class="btn-projctsNavbarproj" ><label class="proNavbartext">الإحصائيات</label></button></a>
            <button class="btn-projctsNavbarproj"><label class="proNavbartext"> غير منجزة</label></button>
            <button class="btn-projctsNavbarproj"><label class="proNavbartext"> منجزة </label></button>
            <a href="{{route("projects",[$group_subject->id])}}">  <button class="btn-projctsNavbarproj"style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"><label class="proNavbartext">الكل</label></button></a>
        </div>
        <!-- <button class="btn-bottomNavbar"><i id="bottombaricon" class="bi bi-house-fill custom-width-icon" width="30px" height="30px"></i><br>
            <label class="bottomNavbartext">القائمة</label>
            </button> -->

        <button id="button-hdr2" type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown" >
                 <div class="textdrop">  جميع المشاريع</div>
                </button>
        <div id="dropdown-menulist" class="dropdown-menu" style="width:130px; color: #0E70F2; ">
            <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px; ">منجزة</a>
            <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:30px; ">غير منجزة</a>
            <a id="dropdown-itemlist" class="dropdown-item" href="{{route("projectsStastics",[$group_subject->id])}}"> الإحصائيات</a>
        </div>

    </div>

    <div class="hr3">
        <a href="{{route("subject.index",[$group_subject->id])}}">  <button id="spacesbtn" class="spaces"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px" ></button></a>
        <div id="input-group-proj" class="input-group mb-3">
            <input type="text" class="form-control" wire:model='search' wire:keydown.enter="srch"
                    placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit" wire:click='srch'><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
            </div>
        </div>
        <button class="Addbtn-projctsNavbar" data-toggle="modal" data-target="#myModal"><label class="proNavbartext">إنشاء مشروع</label><img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left;"></button>

    </div>
</div>
