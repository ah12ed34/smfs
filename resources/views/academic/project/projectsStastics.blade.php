@extends('layouts.home')
@section('nav')
<div class="hdr2" style=" box-shadow: 10px;">
    <button class="spaces"> <label  class="subjectname"> المشاريع </label><img src="{{Vite::image("project-management.png")}}" id="subject-icon-hdr2" width="40px">
    </button>
    <div class="dep-sub-name"> نظم موزعة </div>

    <div id="btn-group-proj" class="btn-group">
        <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->
        <a href="{{route("projectsStastics")}}">  <button class="btn-projctsNavbarproj" style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"><label class="proNavbartext">الإحصائيات</label></button></a>
        <button class="btn-projctsNavbarproj"><label class="proNavbartext"> غير منجزة</label></button>
        <button class="btn-projctsNavbarproj"><label class="proNavbartext"> منجزة </label></button>
        <a href="{{route("projects")}}">  <button class="btn-projctsNavbarproj"><label class="proNavbartext">الكل</label></button></a>
    </div>
    <!-- <button class="btn-bottomNavbar"><i id="bottombaricon" class="bi bi-house-fill custom-width-icon" width="30px" height="30px"></i><br>
        <label class="bottomNavbartext">القائمة</label>
        </button> -->

    <button id="button-hdr2" type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown" >
             <div class="textdrop">الإحصائيات   </div>
            </button>
    <div id="dropdown-menulist" class="dropdown-menu" style="width:130px; color: #0E70F2; ">   
             <a id="dropdown-itemlist" class="dropdown-item" href="{{route("projects")}}">جميع المشاريع</a>
        <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px; ">منجزة</a>
        <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:30px; ">غير منجزة</a>
    </div>

</div>
@endsection
@section("content")
<div class="content" >

    <div class="hr3">
        <a href="{{route("subject.index")}}">  <button id="spacesbtn" class="spaces"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px" ></button></a>
        <div id="input-group-proj" class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
            </div>
        </div>
        <button class="Addbtn-projctsNavbar" data-toggle="modal" data-target="#myModal"><label class="proNavbartext">إنشاء مشروع</label><img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left;"></button>

    </div>
    
    <div class="responsive"></div>

<div class="container" id="container-project" style="padding-top: 30px;" >
   

    <div class="cards-child-stastics">
        <label class="cards-child-title">المشاريع غير منجزة
        </label>
        <div class="cards-child-numbers">0</div>
        <img src="{{Vite::image("project-management.png")}}" class="image-stastic" width="50px">
    </div>

    <div class="cards-child-stastics">
        <label class="cards-child-title">المشاريع المتأخرة</label>
        <div class="cards-child-numbers">0</div>
        <img src="{{Vite::image("project-management.png")}}" class="image-stastic" width="50px">
    </div>

    <div class="cards-child-stastics">
        <label class="cards-child-title"> المشاريع المنجزة</label>
        <div class="cards-child-numbers">0</div>
        <img src="{{Vite::image("project-management.png")}}" class="image-stastic" width="50px">
    </div>

    <div class="cards-child-stastics">
        <label class="cards-child-title">جميع المشاريع</label>
        <div class="cards-child-numbers">0</div>
        <img src="{{Vite::image("project-management.png")}}" class="image-stastic" width="50px">
    </div>


</div>


<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content" style="background-color: #F6F7FA;">

            <!-- Modal Header -->
            <div class="modal-header" id="modheader">
                انشاء مشروع جديد
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="/action_page.php" style="display: block;">
                    <div class="form-group">
                        <!-- <label for="usr">Name:</label> -->
                        <input type="text" class="form-control" id="inputtext" name="username" placeholder="اسم المشروع " style="height: 30px; margin-top:-6px">
                        <input type="text" class="form-control" id="inputtext" name="username" placeholder="الدرجة " style="height: 30px; margin-top:8px">
                        <textarea style="height: 100px;" class="form-control" rows="5" id="comment" placeholder=" وصف المشروع " style=" margin-top:8px"></textarea>
                        <input type="text" class="form-control" id="inputtext" name="username" placeholder=" تاريخ التسليم " style="height: 30px; margin-top:8px">
                        <input type="text" class="form-control" id="inputtext" name="username" placeholder=" الحد الأقصى للطلاب " style="height: 30px; margin-top:8px">
                        <input type="text" class="form-control" id="inputtext" name="username" placeholder="الحد الأدنى للطلاب " style="height: 30px; margin-top:8px">
                        <input type="file" class="form-control-file border" id="file" name="file" style="height: 30px; margin-top:8px">
                        <input type="text" class="form-control" id="inputtext" name="username" placeholder="ملاحظة " style="height: 30px; margin-top:8px">
                    </div>
                    <!-- <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div> -->
                </form>
            </div>

            <!-- Modal footer -->

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="btnsave" style="float: left; margin-left:30px;">حفظ</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel">إلغاء</button>
            </div>
        </div>
    </div>
</div>


</div>
</div>

    @endsection