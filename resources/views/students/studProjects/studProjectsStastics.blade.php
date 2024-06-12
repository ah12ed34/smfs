@extends('layouts.home')
@section('nav')
    @livewire('Components.Nav.Student.Project.StudentProjects',['Tab'=>'statistics'])
@endsection

@section("content")




    <div class="responsive"></div>

<div class="container" id="container-project" style="padding-top: 30px;" >


    <div class="cards-child-stastics">
        <label class="cards-child-title">المشاريع غير منجزة
        </label>

        <div class="cards-child-numbers">{{ $counts['unfinished'] }}</div>
        <img src="{{Vite::image("project-management.png")}}" class="image-stastic" width="50px">
    </div>

    <div class="cards-child-stastics">
        <label class="cards-child-title">المشاريع المتأخرة</label>
        <div class="cards-child-numbers">{{ $counts['expired'] }}</div>
        <img src="{{Vite::image("project-management.png")}}" class="image-stastic" width="50px">
    </div>

    <div class="cards-child-stastics">
        <label class="cards-child-title"> المشاريع المنجزة</label>
        <div class="cards-child-numbers">{{ $counts['finished'] }}</div>
        <img src="{{Vite::image("project-management.png")}}" class="image-stastic" width="50px">
    </div>

    <div class="cards-child-stastics">
        <label class="cards-child-title">جميع المشاريع</label>
        <div class="cards-child-numbers">{{ $counts['all'] }}</div>
        <img src="{{Vite::image("project-management.png")}}" class="image-stastic" width="50px">
    </div>


</div>


<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content" style="background-color: #F6F7FA;">

            <!-- Modal Header -->
            <div class="modal-header" id="modheader">
                انشاء مشروع جديد
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="/action_page.php" style="display: block;">
                    <div class="form-group">
                        <!-- <label for="usr">Name:</label> -->
                        <input type="text" class="form-control" id="inputtext" name="username" placeholder="اسم المشروع " style="height: 30px; margin-top:-6px">
                        <input type="text" class="form-control" id="inputtext" name="username" placeholder="الدرجة " style="height: 30px; margin-top:8px">
                        <textarea style="height: 100px;" class="form-control" rows="5" id="comment" placeholder=" وصف المشروع " style=" margin-top:8px"></textarea>
                        <input type="date" class="form-control" id="inputtext" name="username" placeholder=" تاريخ التسليم " style="height: 30px; margin-top:8px">
                        <input type="text" class="form-control" id="inputtext" name="username" placeholder=" الحد الأقصى للطلاب " style="height: 30px; margin-top:8px">
                        <input type="text" class="form-control" id="inputtext" name="username" placeholder="الحد الأدنى للطلاب " style="height: 30px; margin-top:8px">
                        <input type="file" class="form-control-file border" id="file" name="file" style="height: 30px; margin-top:8px">
                        <input type="text" class="form-control" id="inputtext" name="username" placeholder="ملاحظة " style="height: 30px; margin-top:8px">
                    </div>
                    <!-- <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div> -->
                </form>
            </div>

            <!-- Modal footer -->

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="btnsave" style="float: left; margin-left:30px;">حفظ</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel">إلغاء</button>
            </div>
        </div>
    </div>
</div>




    @endsection
