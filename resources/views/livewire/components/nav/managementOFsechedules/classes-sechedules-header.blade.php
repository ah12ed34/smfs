<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces"> <label  class="subjectname" >   مسؤول الجداول </label><img src="{{Vite::image("empoloyee_scheduls.png")}}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
        </button>


                <div class="dep-name">{{ auth()->user()->academic->department->name }}</div>
{{--
<div class="dropdown">
            <button type="button"  class="btn btn-light TypeTerm_dropdown Sechedule  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                    <div class="textdropdown">    ترم اول</div>
                </button>
                <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">

                    <!-- <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   الصلاحيات</a> -->
                    <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  ترم ثاني</a>
                </div>
            </div> --}}

        <!-- <td><button type="submit" class="btn btn-primary btn-sm  manageDepart-addAcademic" id="" data-toggle="modal" data-target="#addacademic"> اضافة اكاديمي<img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left;"></button> </td> -->
        {{-- <button type="submit" class="btn btn-primary btn-sm  btn_Add_Sechedule" id="" data-toggle="modal" data-target="#AddSecheduleModal"> اضافة <img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left;"></button> --}}


    </div>

    <div class="hr3">
        {{-- <button id="spacesbtn" class="spaces" > <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px"></button> --}}


{{-- <div id="" class="input-group input_search_sechedules">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
            </div>
        </div> --}}

    </div>

</div>
