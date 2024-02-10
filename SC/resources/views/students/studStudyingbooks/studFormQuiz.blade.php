@extends('layouts.home')
@section('nav')

<div class="hdr2" style=" box-shadow: 10px;">
    <button class=" spaces"> <label  class="subjectname" style="margin-left: -10px;"> المقرر الدراسي </label><img src="{{Vite::image("open-book.png")}}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
    </button>



    <div class="dropdown">
        <button id="btn-subject-book-Navbar-dropdown" type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown">
            <div class="textdrop2">  نماذج  </div>
        </button>
        <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
         <a href="{{route("student-booksChapters")}}" id="dropdown-itemlist" class="dropdown-item"  style="padding-left:40px;"> نظري</a>
            <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> عملي</a>
            <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px; ">   ملخصات</a>

        </div>
    </div>



    <div id="btn-group-nav-subjectbooks" class="btn-group">
        <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->
        <a href="{{route("student-formQuiz")}}">  <button class="btn-subject-book-Navbar"><label class="proNavbartext">نماذج </label></button></a>
        <button class="btn-subject-book-Navbar"><label class="proNavbartext">  ملخصات</label></button>
        <button class="btn-subject-book-Navbar"><label class="proNavbartext">  عملي </label></button>
        <a href="{{route("student-booksChapters")}}">  <button class="btn-subject-book-Navbar"><label class="proNavbartext"> نظري</label></button></a>
    </div>

    <div class="dep-name">تقنية معلومات</div>
</div>

</div>
<div class="hr3">
    <a href="{{route("student-studyingbooks")}}">  <button id="spacesbtn" class="spaces"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px" ></button></a>
    <div id="input-group-search-sub-file" class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-append">
            <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
        </div>
    </div>
    <td><button type="submit" class="btn btn-primary btn-sm" id="btn-uploade-quiz" data-toggle="modal" data-target="#myModaluploade-form-quiz"> رفع نموذج<img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left;"></button> </td>

</div>

@endsection

@section("content")

<div class="card" id="contents-book">
    <div class="container" style="padding-top:30px; ">






        <div id="card-studyingbooksforms-quiz" class="card">

            <div id="card-studyingbooks-child">
                <img src="{{Vite::image("M.L.H DS Mid exams_page-0001.jpg")}}" class="chapters" width="190px">

                <!-- <div id="card-studyingbooks-child-2"> -->
                <label class="texttitlechapter">نموذج 1</label>
            </div>

            <div id="card-studyingbooks-child-forms-quiz">

                <button type="submit" class="btn btn-primary" id="btn-download" data-toggle="modal" data-target="#myModal3"><img src="{{Vite::image("download-file.png")}}" id="image-download"  width="15px" ></button>

                <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModal3" style="margin-left: 30px;">  <img src="../images/delete (1).png")}}" id=""  width="15px" ></button> -->
                <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModal3" style="margin-left: 50px;">تعديل  <img src="../images/edit.png")}}" id=""  width="15px" ></button> -->

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
                <button type="submit" class="btn btn-primary" id="btn-download" data-toggle="modal" data-target="#myModal3"><img src="{{Vite::image("download-file.png")}}" id="image-download"  width="15px" ></button>

                <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModal3" style="margin-left: 30px;">  <img src="../images/delete (1).png")}}" id=""  width="15px" ></button>
                    <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModal3" style="margin-left: 50px;">تعديل  <img src="../images/edit.png")}}" id=""  width="15px" ></button> -->

            </div>
        </div>


        <div id="card-studyingbooksforms-quiz" class="card">
            <div id="card-studyingbooks-child">
                <img src="{{Vite::image("M.L.H DS Mid exams_page-0003.jpg")}}" class="chapters" width="190px">
                <!-- <div id="card-studyingbooks-child-2"> -->
                <label class="texttitlechapter">نموذج 3 </label>

            </div>

            <div id="card-studyingbooks-child-forms-quiz">

                <button type="submit" class="btn btn-primary" id="btn-download" data-toggle="modal" data-target="#myModal3"><img src="{{Vite::image("download-file.png")}}" id="image-download"  width="15px" ></button>

                <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModal3" style="margin-left: 30px;">  <img src="../images/delete (1).png")}}" id=""  width="15px" ></button> -->
                <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModal3" style="margin-left: 50px;">تعديل  <img src="../images/edit.png")}}" id=""  width="15px" ></button> -->

            </div>
        </div>

        <div id="card-studyingbooksforms-quiz" class="card">
            <div id="card-studyingbooks-child">
                <img src="{{Vite::image("M.L.H DS Mid exams_page-0004.jpg")}}" class="chapters" width="190px">

                <!-- <div id="card-studyingbooks-child-2"> -->
                <label class="texttitlechapter">نموذج 4 </label>

            </div>


            <div id="card-studyingbooks-child-forms-quiz">

                <button type="submit" class="btn btn-primary" id="btn-download" data-toggle="modal" data-target="#myModal3"><img src="{{Vite::image("download-file.png")}}" id="image-download"  width="15px" ></button>

                <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModal3" style="margin-left: 30px;">  <img src="../images/delete (1).png")}}" id=""  width="15px" ></button> -->
                <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModal3" style="margin-left: 50px;">تعديل  <img src="../images/edit.png")}}" id=""  width="15px" ></button> -->

            </div>
        </div>
    </div>
</div>
</div>


<!-- The Modal -->
<div class="modal fade" id="myModaluploade-form-quiz">
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