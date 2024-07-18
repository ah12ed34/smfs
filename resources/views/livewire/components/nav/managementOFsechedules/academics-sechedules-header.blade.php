<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces"> <label  class="subjectname" >   مسؤول الجداول </label><img src="{{Vite::image("empoloyee_scheduls.png")}}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
        </button>


                <div class="dep-name">تقنية معلومات</div>

<div class="dropdown">
            <button type="button"  class="btn btn-light TypeTerm_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                    <div class="textdropdown">    ترم اول</div>
                </button>
                <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">

                    <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  ترم ثاني</a>
                </div>
            </div>


            <div class="dropdown">
                <button type="button"  class="btn btn-light TypeAcademicsSechedules_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                        <div class="textdropdown">     نظري</div>
                    </button>
                    <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">

                        <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   عملي</a>
                    </div>
                </div>



        <!-- <td><button type="submit" class="btn btn-primary btn-sm  manageDepart-addAcademic" id="" data-toggle="modal" data-target="#addacademic"> اضافة اكاديمي<img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left;"></button> </td> -->


    </div>

    <div class="hr3">
        <button id="spacesbtn" class="spaces"  onclick="window.location='{{ route('main_sechedules') }}'"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px"></button>


<div id="" class="input-group input_search_sechedules">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
            </div>
        </div>

    </div>
</div>
