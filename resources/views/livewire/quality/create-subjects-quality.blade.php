@section('nav')
@livewire('components.nav.quality.create-subjects-quality')
@endsection

<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    <div class="content">

        <!-- <div class="responsive"></div> -->
        <!-- <a href="board.html"> -->
        <!-- <div class="container"> -->

        <div class="card" id="cards-subject-students">
            <img src="{{Vite::image("allocation (1).png")}}" class="" width="150px">
            <div class="card-subject-child"> Distributed System نظم تشغيل <br>أ.منال العريقي
            </div>
        </div>

        <div class="card" id="cards-subject-students">
            <img src="{{Vite::image("ecommerce-website.png")}}" class="" width="150px">
            <div class="card-subject-child"> E-Commerce التجارة الإلكترونية <br>د.اكرم عثمان
            </div>
        </div>

        <div class="card" id="cards-subject-students">
            <img src="{{Vite::image("digital.png")}}" class="" width="150px">
            <div class="card-subject-child"> Digital investigation التحقيق الرقمي <br>د. عبدالله المختار
            </div>
        </div>

    </div>



 <!-- The Modal of create subject -->
 <div class="modal fade" id="create-subject">
    <div class="modal-dialog">
        <div class="modal-content modal_content_css" id="modal-content2" style="height: 300px;">

            <!-- Modal Header -->
            <div class="modal-header modal_header_css" id="modheader">
                اضافة مادة جديدة
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" style="display: block;">
                    <div class="form-group">
                        <!-- <label for="usr">Name:</label> -->
                        <input type="text" class="form-control" id="inputtext" name="username" placeholder="  اسم المادة بالعربي" style="height: 30px; margin-top:-6px">
                        <input type="text" class="form-control" id="inputtext" name="username" placeholder=" اسم المادة بالإنجليزي" style="height: 30px; margin-top:10px">
                        <input type="data" class="form-control" id="inputtext" name="username" placeholder="   كود المادة" style="height: 30px; margin-top:10px">

                        <input type="file" class="form-control-file border" id="file" name="image" placeholder=" رفع الصورة"  style="height: 30px; margin-top:8px">
                    </div>
                    <!-- <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div> -->
                </form>
            </div>

            <!-- Modal footer -->

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="" style="float: left; margin-left:30px;">حفظ</button>
                <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button>
            </div>
        </div>
    </div>
</div>

</div>
