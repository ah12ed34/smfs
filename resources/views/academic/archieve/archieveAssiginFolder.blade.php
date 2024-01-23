@extends('layouts.home')
@section('nav')
<div class="hdr2" style=" box-shadow: 10px;">
    <button class="spaces"> <label  class="subjectname">  الارشيف </label><img src="{{Vite::image("folder (1).png")}}" id="subject-icon-hdr2" width="40px" >
    </button>
    <div class="dep-sub-name"> نظم موزعة </div>

    <div class="dropdown">
        <button id="archieve-dropdwon" type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown">
        <div class="textdrop"> جميع المواد</div>
        </button>
        <div id="dropdown-menulist" class="dropdown-menu">
            <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">*****</a>
            <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">*****</a>
            <a id="dropdown-itemlist" class="dropdown-item" href="#" style="padding-left:40px;">*****</a>
        </div>
    </div>
</div>

<div class="hr3">
    <button id="spacesbtn" class="spaces" onclick="location.href='{{route('archieve')}}'"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px" ></button>
    <div id="input-group" class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-append">
            <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
        </div>
    </div>
</div>




@endsection
@section("content")

<div class="container" style=" padding-top: 40px;">



    <div class="card" id="cards-child">
        <label>تكليف ********   </label>
        <br><br>
        <label>2021\2022</label>
        <div  id="cards-child-child-btns"><button type="submit" class="btn btn-primary" id="btndisplay" onclick="location.href='{{route('archieveDisplayfilescoming')}}'"> الواردة</button>
            <button type="button" class="btn btn-danger" id="btnactive" data-toggle="modal" data-target="#myModalactive">تفعيل</button></div>
    </div>
    <div class="card" id="cards-child">
        <label>تكليف ********   </label>
        <br><br>
        <label>2021\2022</label>
        <div id="cards-child-child-btns"><button type="submit" class="btn btn-primary" id="btndisplay" onclick="location.href='{{route('archieveDisplayfilescoming')}}'"> الواردة</button>
            <button  type="button" class="btn btn-danger" id="btnactive" data-toggle="modal" data-target="#myModalactive">تفعيل</button></div>
    </div>
</div>
</div>

<!-- The Modal -->
<div class="modal fade" id="myModalactive">
<div class="modal-dialog ">
    <div class="modal-content" style="height:150px;">

        <!-- Modal Header -->
        <div class="modal-header" style="padding-left:50%; height: 40px; padding-top:6px;">
            تنبيه!
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body" style="text-align:center ;">
            <form action="" style="display: block;">

                هل تريد بالفعل تفعيل التكليف؟


                <!-- <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div> -->
            </form>
        </div>

        <!-- Modal footer -->

        <div class="modal-footer" style="height: 40px;">
            <button type="submit" class="btn btn-primary" id="btnOkYes">نعم</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnNO">لا</button>
        </div>
    </div>
</div>
</div>


@endsection