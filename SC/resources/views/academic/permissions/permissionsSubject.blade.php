@extends('layouts.home')
@section('nav')


<div class="hdr2" style=" box-shadow: 10px;">
    <button class="spaces"> <label  class="subjectname"> الصلاحيات </label><img src="{{Vite::image("permissions.png")}}" id="subject-icon-hdr2" width="40px">
    </button>
    <div class="dep-sub-name">نظم موزعة </div>
</div>


<div  class="hr3">
    <a href="{{route("subject.index")}}">  <button id="spacesbtn" class="spaces"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px" ></button></a>
    <div id="input-groupspermission" class="input-group mb-3" style="margin-top:0px;height: 32px; ">
        <input type="text" class="form-control" placeholder="Search" style="height: 32px; ">
        <div class="input-group-append">
            <button id="form-control" class="btn btn-light" type="submit"><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
        </div>
    </div>
    <td><button type="submit" class="btn btn-primary btn-sm" id="btn-uploade-permission" data-toggle="modal" data-target="#myModal">  إضافة مستخدم<img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left;"></button> </td>

</div>
    @endsection
@section('content')



<div class="container" id="container-project" style="  padding-top: 30px;">

    <div class="table-responsive">


        <table class="table table-bordered" style="font-size:10px;">




            <thead class="table-header">

                <tr class="table-light" id="modldetials">
                    <th id="th1" colspan="3" rowspan="2" style="background-color: #0E70F2; color:white; padding-bottom:25px;">الإشعارات</th>
                    <th id="th1" colspan="6 " style="background-color: #0E70F2; color:white;">المقرر الدراسي</th>
                    <th id="th1" colspan="3 " rowspan="2" style="background-color: #0E70F2; color:white;padding-bottom:25px;">التكاليف</th>
                    <th id="th1" colspan="3 " rowspan="2" style="background-color: #0E70F2; color:white;padding-bottom:25px;">المشاريع </th>
                    <th id="th1" colspan="3 " rowspan="3" style="background-color: #0E70F2; color:white; padding: 50px;">
                        اسم الطالب
                    </th>
                    <th colspan="3 " rowspan="3" style="background-color: #0E70F2; color:white; width: 200px; padding:40px;">الرقم الأكاديمي</th>

                </tr>
                <tr class="table-light ">

                    <th colspan="3" style="background-color: #0E70F2; color:white;">عملي</th>
                    <th colspan="3" style="background-color: #0E70F2; color:white;">نظري</th>
                </tr>


                <tr class="table-light">

                    <td style="background-color: #0E70F2; color:white;">حذف</td>
                    <td style="background-color: #0E70F2; color:white;">تعديل</td>
                    <td style="background-color: #0E70F2; color:white;">اضافة</td>
                    <td style="background-color: #0E70F2; color:white;">حذف</td>
                    <td style="background-color: #0E70F2; color:white;">تعديل</td>
                    <td style="background-color: #0E70F2; color:white;">اضافة</td>
                    <td style="background-color: #0E70F2; color:white;">حذف</td>
                    <td style="background-color: #0E70F2; color:white;">تعديل</td>
                    <td style="background-color: #0E70F2; color:white;">اضافة</td>
                    <td style="background-color: #0E70F2; color:white;">حذف</td>
                    <td style="background-color: #0E70F2; color:white;">تعديل</td>
                    <td style="background-color: #0E70F2; color:white;">اضافة</td>
                    <td style="background-color: #0E70F2; color:white;">حذف</td>
                    <td style="background-color: #0E70F2; color:white;">تعديل</td>
                    <td style="background-color: #0E70F2; color:white;">اضافة</td>
                </tr>

            </thead>


            <tbody>

                <!--  صلاجيات الإشعارات< -->
                <tr class="table-light ">

                    <td>
                        <form action="">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="switch1-notifi-del" name="example">
                                <label class="custom-control-label" for="switch1-notifi-del"></label>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form action="">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="switch1-notifi-edit" name="example">
                                <label class="custom-control-label" for="switch1-notifi-edit"></label>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form action="">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="switch1-notifi-add" name="example">
                                <label class="custom-control-label" for="switch1-notifi-add"></label>
                            </div>
                        </form>
                    </td>
                    <!--   صلاجيات المقرر الدراسي النظري< -->
                    <!--  النظري< -->
                    <td>
                        <form action="">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="switch1-stybooks-THY-del" name="example">
                                <label class="custom-control-label" for="switch1-stybooks-THY-del"></label>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form action="">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="switch1-stybooks-THY-edit" name="example">
                                <label class="custom-control-label" for="switch1-stybooks-THY-edit"></label>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form action="">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="switch1-stybooks-THY-add" name="example">
                                <label class="custom-control-label" for="switch1-stybooks-THY-add"></label>
                            </div>
                        </form>
                    </td>
                    <!--   صلاجيات المقرر الدراسي العملي< -->

                    <td>
                        <form action="">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="switch1-stybooks-PT-del" name="example">
                                <label class="custom-control-label" for="switch1-stybooks-PT-del"></label>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form action="">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="switch1-stybooks-PT-edit" name="example">
                                <label class="custom-control-label" for="switch1-stybooks-PT-edit"></label>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form action="">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="switch1-stybooks-PT-add" name="example">
                                <label class="custom-control-label" for="switch1-stybooks-PT-add"></label>
                            </div>
                        </form>
                    </td>
                    <!--  صلاجيات التكاليف< -->
                    <td>
                        <form action="">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="switch1-assigne-del" name="example">
                                <label class="custom-control-label" for="switch1-assigne-del"></label>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form action="">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="switch1-assigne-edit" name="example">
                                <label class="custom-control-label" for="switch1-assigne-edit"></label>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form action="">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="switch1-assigne-add" name="example">
                                <label class="custom-control-label" for="switch1-assigne-add"></label>
                            </div>
                        </form>
                    </td>
                    <!--  صلاجيات المشاريع< -->
                    <td>
                        <form action="">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="switch1-proj-del" name="example">
                                <label class="custom-control-label" for="switch1-proj-del"></label>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form action="">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="switch1-proj-edit" name="example">
                                <label class="custom-control-label" for="switch1-proj-edit"></label>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form action="">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="switch1-proj-add" name="example">
                                <label class="custom-control-label" for="switch1-proj-add"></label>
                            </div>
                        </form>
                    </td>
                    <td colspan="3 ">احمد الوجيه</td>
                    <td colspan="3">2164093</td>

                </tr>
            </tbody>
        </table>
    </div>
</div>
 <!-- The Modal -->
 <div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content2">

            <!-- Modal Header -->
            <div class="modal-header" id="modheader">
                إضافة مستخدم
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" style="display: block;">
                    <div class="form-group">
                        <!-- <label for="usr">Name:</label> -->
                        <input type="text" class="form-control" id="inputtext" name="username" placeholder="اسم المستخدم " style="height: 30px; margin-top:-6px">

                        {{-- <input type="file" class="form-control-file border" id="file" name="file" style="height: 30px; margin-top:8px"> --}}
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