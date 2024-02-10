@extends('layouts.home')
@section('nav')

<div class="hdr2" style=" box-shadow: 10px;">
    <button class=" spaces"> <label  class="subjectname" style="margin-left: -10px;"> المقرر الدراسي </label><img src="{{Vite::image("open-book.png")}}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
    </button>

    <div class="dropdown">
        <button id="btn-subject-book-Navbar-dropdown" type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown">
            <div class="textdrop2">   نظري </div>
        </button>
        <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
            <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px;"> عملي</a>
            <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px; ">   ملخصات</a>
         <a href="{{route("student-formQuiz")}}" id="dropdown-itemlist" class="dropdown-item"  style="padding-left:40px;">نماذج </a>

        </div>
    </div>



    <div id="btn-group-nav-subjectbooks" class="btn-group">
        <!-- <button class="Addbtn-projctsNavbar"><label class="proNavbartext">إنشاء مشروع</label></button> -->
        <a href="{{route("student-formQuiz")}}">   <button class="btn-subject-book-Navbar"><label class="proNavbartext">نماذج </label></button></a>
        <button class="btn-subject-book-Navbar"><label class="proNavbartext">  ملخصات</label></button>
        <button class="btn-subject-book-Navbar"><label class="proNavbartext">  عملي </label></button>
        <a href="{{route("student-booksChapters")}}">   <button class="btn-subject-book-Navbar"><label class="proNavbartext"> نظري</label></button></a>
    </div>

    <div class="dep-name">تقنة معلومات</div>
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
</div>

@endsection

@section("content")

<div class="card" id="contents-book">
    <div class="container" style="padding-top:30px; ">
        <div id="card-studyingbooks-student" class="card">
            <div id="card-studyingbooks-child">
                <img src="{{Vite::image("chapter.png")}}" class="chapters-image" width="180px">

                <!-- <div id="card-studyingbooks-child-2"> -->
                <label class="texttitlechapter">Lecture 1</label>
            </div>

         
            <div id="card-studyingbooks-child-three">

                <button type="submit" class="btn btn-primary" id="btn-download"  ><img src="{{Vite::image("download-file.png")}}" id="image-download"  width="15px" ></button>

                <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModal3" style="margin-left: 30px;">  <img src="../images/delete (1).png")}}" id=""  width="15px" ></button> -->
                <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModal3" style="margin-left: 50px;">تعديل  <img src="../images/edit.png")}}" id=""  width="15px" ></button> -->

            </div>
            <!-- </div> -->

        </div>

        <div id="card-studyingbooks-student" class="card">
            <div id="card-studyingbooks-child">
                <img src="{{Vite::image("chapter (2).png")}}" class="chapters-image" width="180px">

                <!-- <div id="card-studyingbooks-child-2"> -->
                <label class="texttitlechapter">Lecture 2
                System Models
                </label>

            </div>
        
            <div id="card-studyingbooks-child-three">

                <button type="submit" class="btn btn-primary" id="btn-download" data-toggle="modal" data-target="#myModal3"><img src="{{Vite::image("download-file.png")}}" id="image-download"  width="15px" ></button>
                <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModal3" style="margin-left: 30px;">  <img src="../images/delete (1).png")}}" id=""  width="15px" ></button>
            <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModal3" style="margin-left: 50px;">تعديل  <img src="../images/edit.png")}}" id=""  width="15px" ></button> -->

            </div>
        </div>


        <div id="card-studyingbooks-student" class="card">
            <div id="card-studyingbooks-child">
                <img src="{{Vite::image("chapter 3.png")}}" class="chapters-image" width="180px">
                <!-- <div id="card-studyingbooks-child-2"> -->
                <label class="texttitlechapter">Lecture 3
                System Models 2
                </label>

            </div>

            <div id="card-studyingbooks-child-2">
                <div class="form-group">
                    <!-- <label for="usr">Name:</label> -->
                    <!-- <input type="file" class="form-control-file border" id="uploadefile" name="file"> -->
                </div>

            </div>
            <div id="card-studyingbooks-child-three">
                <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModal3" style="margin-left: 30px;">  <img src="../images/delete (1).png")}}" id=""  width="15px" ></button> -->
                <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModal3" style="margin-left: 50px;">تعديل  <img src="../images/edit.png")}}" id=""  width="15px" ></button> -->

                <button type="submit" class="btn btn-primary" id="btn-download" data-toggle="modal" data-target="#myModal3"><img src="{{Vite::image("download-file.png")}}" id="image-download"  width="15px" ></button>

            </div>
        </div>




        <div id="card-studyingbooks-student" class="card">
            <div id="card-studyingbooks-child">
                <img src="{{Vite::image("chapter 4.png")}}" class="chapters-image" width="180px">

                <!-- <div id="card-studyingbooks-child-2"> -->
                <label class="texttitlechapter">Lecture 4
                Interprocess communication (IPC)
                </label>

            </div>

            <div id="card-studyingbooks-child-2">
                <div class="form-group">
                    <!-- <label for="usr">Name:</label> -->
                    <!-- <input type="file" class="form-control-file border" id="uploadefile" name="file"> -->
                </div>

            </div>

            <div id="card-studyingbooks-child-three">
                <button type="submit" class="btn btn-primary" id="btn-download" data-toggle="modal" data-target="#myModal3"><img src="{{Vite::image("download-file.png")}}" id="image-download"  width="15px" ></button>

                <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModal3" style="margin-left: 30px;">  <img src="../images/delete (1).png")}}" id=""  width="15px" ></button> -->
                <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModal3" style="margin-left: 50px;">تعديل  <img src="../images/edit.png")}}" id=""  width="15px" ></button> -->

            </div>
        </div>
    </div>
</div>

@endsection