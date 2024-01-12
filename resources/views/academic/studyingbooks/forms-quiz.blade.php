@extends('layouts.home')
@section('nav')
<div id="hdr2-mobile" class="hdr2" style=" box-shadow: 10px;">
    <button class=" spaces"> <label  class="subjectname" style="margin-left: -10px;"> المقرر الدراسي </label><img src="{{Vite::image("open-book.png")}}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
    </button>
    <div class="dep-sub-name"> نظم موزعة </div>

    <div id="btn-group-studyingbooks" class="btn-group">
        <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->

        <button id="btn-studyingbooksNavbar" class="btn btn-light" style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"onclick="location.href='{{route('forms-quiz')}}'"><label class="proNavbartext">   نماذج</label></button>
        <button id="btn-studyingbooksNavbar" class="btn btn-light"><label class="proNavbartext">  عملي </label></button>
        <button id="btn-studyingbooksNavbar" class="btn btn-light"onclick="location.href='{{route('studyingbooks')}}'" ><label class="proNavbartext">  نظري </label></button>
    </div>
    <!-- <button class="btn-bottomNavbar"><i id="bottombaricon" class="bi bi-house-fill custom-width-icon" width="30px" height="30px"></i><br>
        <label class="bottomNavbartext">القائمة</label>
        </button> -->

    <button id="btn-studyingbooksdropdown" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
             <div class="textstudentsdrop"> نماذج  </div>
            </button>
    <div id="dropdown-menulist" class="dropdown-menu" style="width:100px;">
        <a href="{{route("studyingbooks")}}" id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> نظري</a>
        <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> عملي</a>
    </div>

</div>
<div id="hdr3-mobile" class="hr3-students">
    <a href="{{route("subject.index")}}"> <button id="spacesbtn" class="spaces"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px"></button></a>

    <div id="input-groupstudyingbooks" class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-append">
            <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
        </div>
    </div>
    <td><button type="submit" class="btn btn-primary btn-sm" id="btn-uploade-grades" data-toggle="modal" data-target="#myModal"> رفع ملف<img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left;"></button> </td>

</div>



@endsection

@section("content")


<div class="container" style="padding-top:60px;">



    <div id="card-studyingbooksforms-quiz" class="card">

        <div id="card-studyingbooks-child">
            <img src="{{Vite::image("M.L.H DS Mid exams_page-0001.jpg")}}" class="chapters" width="190px">

            <!-- <div id="card-studyingbooks-child-2"> -->
            <label class="texttitlechapter">نموذج 1</label>
        </div>







        <div id="card-studyingbooks-child-forms-quiz">
            <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModal3" style="margin-left: 30px;">  <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button>
            <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModal3" style="margin-left: 50px;">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button>

        </div>
        <!-- </div> -->

    </div>

    <div id="card-studyingbooksforms-quiz" class="card">
        <div id="card-studyingbooks-child">
            <img src="{{Vite::image("M.L.H DS Mid exams_page-0002.jpg")}}" class="chapters" width="190px">

            <!-- <div id="card-studyingbooks-child-2"> -->
            <label class="texttitlechapter">نموذج 2 </label>

        </div>




        <div id="card-studyingbooks-child-forms-quiz">
            <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModal3" style="margin-left: 30px;">  <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button>
            <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModal3" style="margin-left: 50px;">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button>

        </div>
    </div>


    <div id="card-studyingbooksforms-quiz" class="card">
        <div id="card-studyingbooks-child">
            <img src="{{Vite::image("M.L.H DS Mid exams_page-0003.jpg")}}" class="chapters" width="190px">
            <!-- <div id="card-studyingbooks-child-2"> -->
            <label class="texttitlechapter">نموذج 3 </label>

        </div>






        <div id="card-studyingbooks-child-forms-quiz">
            <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModal3" style="margin-left: 30px;">  <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button>
            <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModal3" style="margin-left: 50px;">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button>

        </div>
    </div>




    <div id="card-studyingbooksforms-quiz" class="card">
        <div id="card-studyingbooks-child">
            <img src="{{Vite::image("M.L.H DS Mid exams_page-0004.jpg")}}" class="chapters" width="190px">

            <!-- <div id="card-studyingbooks-child-2"> -->
            <label class="texttitlechapter">نموذج 4 </label>

        </div>






        <div id="card-studyingbooks-child-forms-quiz">
            <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModal3" style="margin-left: 30px;">  <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button>
            <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModal3" style="margin-left: 50px;">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button>

        </div>
    </div>
</div>
</div>


<!-- The Modal -->
<div class="modal fade" id="myModal">
<div class="modal-dialog">
    <div class="modal-content" id="modal-content2">

        <!-- Modal Header -->
        <div class="modal-header" id="modheader">
            رفع نموذج
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="" style="display: block;">
                <div class="form-group">
                    <!-- <label for="usr">Name:</label> -->
                    <input type="text" class="form-control" id="inputtextfile" name="username" placeholder="اسم نموذج" style="height: 30px; margin-top:-6px">

                    <input type="file" class="form-control-file border" id="file" name="file" style="height: 30px; margin-top:8px">
                </div>
                <!-- <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div> -->
            </form>
        </div>

        <!-- Modal footer -->

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btnsave-file" style="float: left; margin-left:30px;">حفظ</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel-file">إلغاء</button>
        </div>
    </div>
</div>
</div>

@endsection