@extends('layouts.home')
@section('nav')
<div class="hdr2" style=" box-shadow: 10px;">

    <ul>
        <li><a  href="{{route("stasticsallsubject")}}">{{__('layout.statistics')}}</a></li>
        <li><a class="active" href="{{route("permissions")}}">{{__('layout.permissions')}}</a></li>
        <li><a  href="{{route("home")}}" style="text-decoration: none; float:right;">{{__('layout.home')}}</a></li>

    </ul>
</div>
    @endsection
@section('content')



<div class="container" id="container-project" style="  padding-top: 10px;">

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



    @endsection