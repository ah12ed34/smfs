@section('nav')
<div class="hdr2" style=" box-shadow: 10px;">
    <button class=" spaces"> <label  class="subjectname">   الكنترول </label><img src="{{ Vite::image('controll.png')}}" id="subject-icon-hdr2" width="40px" >
    </button>

    <div class="dep-name"> اسم القسم</div>



    <div id="" class="input-group input_search_manageDepart_students">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-append">
            <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}"id="spaces2"  width="20px" ></button>
        </div>
    </div>



{{-- <td><button type="submit" class="btn btn-primary btn-sm  btn-addAcademic" id="" data-toggle="modal" data-target="#addPermissions"> اضافة صلاحية<img src="{{ Vite::image('plus.png')}}"  width="20px" style="float: left;"></button> </td> --}}

</div>
<div class="hr3">
    <button id="spacesbtn" onclick="window.location='{{ route('control_grades_statistics') }}'" class="spaces"> <img src="{{ Vite::image('left-arrow.png')}}" id="spaces1"  width="30px"></button>

    </div>

@endsection

<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

        <div class="container" style="padding-top: 20px;">

            <div class="table-responsive-xl">
                <table class="table" style=" width:100%;">
                    <thead class="table-header" style="font-size: 12px;">
                        <tr class="table-light" id="modldetials">
                            <th> عرض </th>
                            <th> التقدير </th>
                            <th> المعدل </th>
                            <th> المجموع </th>
                            <th> الرسوب </th>
                            <th>   مشروع التخرج(2)  </th>
                            <th>   مشروع التخرج(1)  </th>
                            <th> التجارة الالكترونية </th>
                            <th>  التحقيق الرقمي  </th>
                            <th>   نظم موزعة </th>
                            <th> النظام </th>
                            <th>  اسم الطالب</th>
                            <th>   الرقم الأكاديمي</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-light" id="modldetials" style="margin-top:7px;">
                            <!-- <td><button type="submit" class="btn btn-primary btn-sm" id="btn-chat-edit" data-toggle="modal" data-target="#myModalEdite">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button> </td> -->
                            <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#ModaldDisplayGradesStudent">عرض</button> </td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*******</td>
                            <td>*****</td>
                            <td> ****</td>
                            <td> ****</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>


 <!-- The ModaldDisplayGradesStudent -->
 <div class="modal fade" id="ModaldDisplayGradesStudent">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal_content_css" id="modal-content" >

            <!-- Modal Header -->
            <div class="modal-header modal_header_css" id="modheader" style="text-align: center;">
                <!-- &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  -->
                بيان الدرجات<button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body modal_body_css">
                <form action="/action_page.php" style="display: block;">
                    <div class="form-group">
                        <label for="usr" style="font-size: 14px;">الرقم الأكاديمي: 21164093</label>
                        <br> <label for="usr" style="font-size: 14px;">الاسم: احمدالوجيه</label>
                        <br> <label for="usr" style="font-size: 14px;">النظام: الموازي</label>


                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-header" style="font-size: 11px;">
                                    <tr class="table-primary" id="modldetials">
                                        <th>ملاحظة</th>
                                        <th>التقدير</th>
                                        <th>المعدل</th>
                                        <th>المجموع</th>
                                        <th>الرسوب </th>
                                        <th>   مشروع التخرج(2)  </th>
                                        <th>   مشروع التخرج(1)  </th>
                                        <th> التجارة الالكترونية </th>
                                        <th>  التحقيق الرقمي  </th>
                                        <th>   نظم موزعة </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-light" id="modldetials" style="margin-top:7px;">
                                        <td>*******</td>
                                        <td>*****</td>
                                        <td> ****</td>
                                        <td>*******</td>
                                        <td>*******</td>
                                        <td>******</td>
                                        <td> ******</td>
                                        <td>*******</td>
                                        <td>*****</td>
                                        <td> ****</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div> -->
                </form>
            </div>

            <!-- Modal footer -->

            <div class="modal-footer">
                <button type="submit" class="btn btn-light" id="print">طباعة  <img src="{{Vite::image("printing.png")}}" id=""  width="15px" ></button>
            </div>
        </div>
    </div>
</div>


</div>
