@extends('layouts.home')
@section('nav')

<div class="hdr2" style=" box-shadow: 10px;">
    <button class="spaces"> <label  class="subjectname">  الدرجات </label><img src="{{Vite::image("degrees.png")}}" id="subject-icon-hdr2" width="40px" >
    </button>
    <div class="dep-name">تقنة معلومات</div>

    <div class="dropdwon">
        <button id="btn-studybookStudentsdropdown-levels" style="margin-top:-30px;" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
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
    </div>
</div>

<div class="hr3">
    <button id="spacesbtn" class="spaces" onclick="location.href='{{route('student-archieve')}}'"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px" ></button>
    <div id="input-group-students-search" class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-append">
            <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
        </div>
    </div>
</div>



@endsection
@section("content")

<div class="container" style=" padding-top: 30px;">


   
    <div class="table-responsive">


        <table class="table table-bordered" style="font-size:10px;">




            <thead class="table-header">

                <tr class="table-light" id="modldetials">                            
                    <th id="th1" rowspan="2"   style="background-color: #0E70F2; color:white;padding: 50px;">التقدير</th>
                    <th id="th1" rowspan="2"  style="background-color: #0E70F2; color:white; padding-bottom:50px;">المجموع النهائي</th>
                    <th id="th1" rowspan="2"   style="background-color: #0E70F2; color:white; padding-bottom:50px;">الإختبار النهائي</th>
                    <th id="th1" colspan="2"  style="background-color: #0E70F2; color:white; padding-bottom:25px;">المحصلة</th>
                    <th id="th1" colspan="2"  style="background-color: #0E70F2; color:white; padding-bottom:25px;">كويزات</th>
                    <th id="th1" colspan="2"  style="background-color: #0E70F2; color:white; padding-bottom:25px;">النصفي</th>
                    <th id="th1" colspan="2"  style="background-color: #0E70F2; color:white;padding-bottom:25px;">التكاليف</th>
                    <th id="th1" colspan="2"  style="background-color: #0E70F2; color:white;padding-bottom:25px;">المشاريع</th>
                    <th id="th1" colspan="2"  style="background-color: #0E70F2; color:white;padding-bottom:25px;">الحضور </th>
                    <th id="th1" rowspan="2" style="background-color: #0E70F2; color:white; padding: 50px;">
                        المادة
                    </th>
                    <th  rowspan="2" style="background-color: #0E70F2; color:white;padding-bottom:50px;">الرقم </th>

                </tr>
                <tr class="table-light ">
                      <!--   المحصلة -->
                    <th  style="background-color: #0E70F2; color:white;">عملي</th>
                    <th  style="background-color: #0E70F2; color:white;">نظري</th>
                      
                    <!--   كويزات -->
                    <th  style="background-color: #0E70F2; color:white;">عملي</th>
                    <th  style="background-color: #0E70F2; color:white;">نظري</th>
                    
                    <!--   النصفي -->
                    <th  style="background-color: #0E70F2; color:white;">عملي</th>
                    <th  style="background-color: #0E70F2; color:white;">نظري</th>
                   
                    <!--   التكاليف -->
                    <th  style="background-color: #0E70F2; color:white;">عملي</th>
                    <th  style="background-color: #0E70F2; color:white;">نظري</th>
                   
                    <!--   المشاريع -->
                    <th  style="background-color: #0E70F2; color:white;">عملي</th>
                    <th  style="background-color: #0E70F2; color:white;">نظري</th>
                   
                   <!--   الحضور -->
                    <th  style="background-color: #0E70F2; color:white;">عملي</th>
                    <th  style="background-color: #0E70F2; color:white;">نظري</th>
                </tr>

            </thead>


            <tbody>

                <tr class="table-light ">
                    <!--   التقدير -->
                    <td>***</td>
                    <!--   المجموع النهائي  -->
                    <td>***</td>
                    <!--   الإختبار النهائ -->
                    <td>***</td>
                    <!--   المحصلة -->
                    <td>***</td>    <!--   عملي -->
                    <td>***</td>   <!--   نظري -->
                    <!--   كويزات -->
                    <td>***</td>   <!--   عملي -->
                    <td>***</td>   <!--   نظري -->
                    <!--   النصفي -->
                    <td>***</td>   <!--   عملي -->
                    <td>***</td>  <!--   نظري -->
                    <!--   التكاليف -->
                    <td>***</td>   <!--   عملي -->
                    <td>***</td>   <!--   نظري -->
                    <!--   المشاريع -->
                    <td>***</td>   <!--   عملي -->
                    <td>***</td>   <!--   نظري -->
                    <!--   الحضور -->
                    <td>***</td>  <!--   عملي -->
                    <td>***</td>  <!--   نظري -->
                    <!--    المادة -->
                    <td>***</td>
                    <!--  رقم المادة -->
                    <td>***</td>
                </tr>
                
                <tr class="table-light ">
                    <!--   التقدير -->
                    <td>***</td>
                    <!--   المجموع النهائي  -->
                    <td>***</td>
                    <!--   الإختبار النهائ -->
                    <td>***</td>
                    <!--   المحصلة -->
                    <td>***</td>    <!--   عملي -->
                    <td>***</td>   <!--   نظري -->
                    <!--   كويزات -->
                    <td>***</td>   <!--   عملي -->
                    <td>***</td>   <!--   نظري -->
                    <!--   النصفي -->
                    <td>***</td>   <!--   عملي -->
                    <td>***</td>  <!--   نظري -->
                    <!--   التكاليف -->
                    <td>***</td>   <!--   عملي -->
                    <td>***</td>   <!--   نظري -->
                    <!--   المشاريع -->
                    <td>***</td>   <!--   عملي -->
                    <td>***</td>   <!--   نظري -->
                    <!--   الحضور -->
                    <td>***</td>  <!--   عملي -->
                    <td>***</td>  <!--   نظري -->
                    <!--    المادة -->
                    <td>***</td>
                    <!--  رقم المادة -->
                    <td>***</td>
                </tr>
                
                <tr class="table-light ">
                    <!--   التقدير -->
                    <td>***</td>
                    <!--   المجموع النهائي  -->
                    <td>***</td>
                    <!--   الإختبار النهائ -->
                    <td>***</td>
                    <!--   المحصلة -->
                    <td>***</td>    <!--   عملي -->
                    <td>***</td>   <!--   نظري -->
                    <!--   كويزات -->
                    <td>***</td>   <!--   عملي -->
                    <td>***</td>   <!--   نظري -->
                    <!--   النصفي -->
                    <td>***</td>   <!--   عملي -->
                    <td>***</td>  <!--   نظري -->
                    <!--   التكاليف -->
                    <td>***</td>   <!--   عملي -->
                    <td>***</td>   <!--   نظري -->
                    <!--   المشاريع -->
                    <td>***</td>   <!--   عملي -->
                    <td>***</td>   <!--   نظري -->
                    <!--   الحضور -->
                    <td>***</td>  <!--   عملي -->
                    <td>***</td>  <!--   نظري -->
                    <!--    المادة -->
                    <td>***</td>
                    <!--  رقم المادة -->
                    <td>***</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card" id="alltotal-degrees"><label>المجموع الكلي </label></div>
    <div class="card" id="avarage-rate-degrees"><label>المعدل التراكمي</label></div>
    <div class="card" id="prancipation-as-estimation-degrees"><label>التفدير</label></div>
</div>


@endsection