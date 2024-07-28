<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces"> <label  class="subjectname" style="margin-left: -10px;"> تقنية معلومات </label><img src="{{Vite::image("it.png")}}" id="subject-icon-hdr2" width="40px">
        </button>


        <div class="dep-name"> الجودة </div>


        {{-- <div class="dropdwon">
            <button id="" type="button" class="btn btn-light quality-subjects_terms_down dropdown-toggle" data-toggle="dropdown">
            <div class="textstudentsdrop"> ترم اول</div>
            </button>
            <div id="dropdown-menulist" class="dropdown-menu" style="width: 140px;">
                <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding:0%;text-align:center;">  ترم ثاني</a>
            </div>
        </div> --}}


        <!-- <div class="dropdwon">
            <button id="btn-studybookStudentsdropdown-levels" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
            <div class="textstudentsdrop">      مستوى رابع | ترم ثاني</div>
           </button>
            <div id="dropdown-menulist" class="dropdown-menu" style="width: 140px;">
                <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding:0%;text-align:center;"> مستوى رابع | ترم أول</a>
                <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding:0%;text-align:center;"> مستوى ثالث | ترم اول</a>
                <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding:0%;text-align:center;"> مستوى ثالث | ترم ثاني</a>
                <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding:0%;text-align:center;"> مستوى ثاني | ترم أول</a>
                <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding:0%;text-align:center;"> مستوى ثاني | ترم ثاني</a>
                <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding:0%;text-align:center;"> مستوى أول | ترم أول</a>
                <a id="dropdown-students-itemlist" class="dropdown-item" href="#" style="padding:0%;text-align:center;"> مستوى أول | ترم ثاني</a>

            </div>
        </div> -->

        <div class="dropdown">
            <button type="button"  class="btn btn-light TypeTerm_dropdown Sechedule  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                    <div class="textdropdown">    ترم اول</div>
                </button>
                <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">

                    <!-- <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   الصلاحيات</a> -->
                    <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  ترم ثاني</a>
                </div>
            </div>
        {{-- <button type="submit" class="btn btn-primary btn-sm  btn_Add_Sechedule" id="" data-toggle="modal" data-target="#create-subject"> اضافة مادة<img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left;"></button> --}}


    </div>

    <div class="hr3">
        <button id="spacesbtn" class="spaces" onclick="window.location='{{ route('quality_board_main')}}'"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px"></button>


        @include('components.navSelect.search')

    {{-- <div id="input-groupstudyingbooks" class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
            </div>
        </div>
        --}}
        {{-- <button type="submit" class="btn btn-primary  btn-dispaydatasubject"  > البيانات</button> --}}

        {{-- <button type="submit" class="btn btn-primary btn-sm  btn-addsubject" id="" data-toggle="modal" data-target="#create-subject"> اضافة مادة<img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left;"></button> --}}

    </div>


</div>

