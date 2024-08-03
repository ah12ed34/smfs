@section('nav')
    @livewire('components.nav.quality.create-subjects-quality', ['level' => $level])
@endsection

<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    {{-- <div class="container" style="padding-top: 30px; padding-right:50px; margin-right:50px"> --}}


    @livewire('global.levelsubject.add-subject', ['level' => $level])


    {{-- <div class="card" id="cards-subject-students">
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
        </div> --}}

    {{-- </div> --}}



    <!-- The Modal of create subject -->
    <div class="modal fade" id="create-subject">
        <div class="modal-dialog">
            <div class="modal-content modal_content_css" id="modal-content2" style="height: 60vh;">

                <!-- Modal Header -->
                <div class="modal-header modal_header_css" id="modheader">
                    اضافة مادة جديدة
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body modal_body_css">
                    <form action="" style="display: block;">
                        <div class="form-group">
                            <!-- <label for="usr">Name:</label> -->
                            <input type="text" class="form-control" id="inputtext" name="username"
                                placeholder="  اسم المادة بالعربي" style="height: 30px; margin-top:-6px">
                            <input type="text" class="form-control" id="inputtext" name="username"
                                placeholder=" اسم المادة بالإنجليزي" style="height: 30px; margin-top:10px">
                            <input type="data" class="form-control" id="inputtext" name="username"
                                placeholder="   كود المادة" style="height: 30px; margin-top:10px">

                            <select class="form-control selectOption" id="sel1" name="sellist1"
                                placeholder="نوع المادة" style="height: 30px; margin-top:8px">
                                <option>نظري</option>
                                <option> نظري وعملي </option>
                                <option> وعملي </option>
                            </select>
                            <input type="file" class="form-control-file border" id="file" name="image"
                                placeholder=" رفع الصورة" style="height: 30px; margin-top:8px" accept=".jpg,.png,.jpeg">
                        </div>
                        <!-- <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div> -->
                    </form>
                </div>

                <!-- Modal footer -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn_save_informModal"
                        id="">حفظ</button>
                    <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal"
                        id="">إلغاء</button>
                </div>
            </div>
        </div>
    </div>

</div>
