@section('title', 'النماذج الامتحانية')
@section('nav')
    @livewire('components.nav.academic.subject.nav-studying-books'
    ,[
    'active'=> 'forms-quiz',
    'group_subject'=>$group_subject])
@endsection
<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <div class="container" style="padding-top:40px; padding-bottom:20px;">


        @forelse ($quizzes as $quiz)
        <div id="card-studyingbooksforms-quiz" class="card">

            <div id="card-studyingbooks-child">
                <img src="{{ $quiz->icon() }}" class="chapters" width="190px">

                <!-- <div id="card-studyingbooks-child-2"> -->
                <label class="texttitlechapter">{{ $quiz->name }}</label>
            </div>

            <div id="card-studyingbooks-child-forms-quiz">
                <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModdelete" style="margin-left: 30px;" wire:click='selected({{ $quiz->id }})'>  <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button>
                <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModaledite" style="margin-left: 50px;" wire:click='selected({{ $quiz->id }})' >تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button>

            </div>
            <!-- </div> -->

        </div>
        @empty
        <div class="alert alert-warning" role="alert">
            لا يوجد ملفات لعرضها
        </div>

        @endforelse


        {{-- <div id="card-studyingbooksforms-quiz" class="card">
            <div id="card-studyingbooks-child">
                <img src="{{Vite::image("M.L.H DS Mid exams_page-0002.jpg")}}" class="chapters" width="190px">

                <!-- <div id="card-studyingbooks-child-2"> -->
                <label class="texttitlechapter">نموذج 2 </label>

            </div>




            <div id="card-studyingbooks-child-forms-quiz">
                <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModdelete" style="margin-left: 30px;">  <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button>
                <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModaledite" style="margin-left: 50px;">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button>

            </div>
        </div>


        <div id="card-studyingbooksforms-quiz" class="card">
            <div id="card-studyingbooks-child">
                <img src="{{Vite::image("M.L.H DS Mid exams_page-0003.jpg")}}" class="chapters" width="190px">
                <!-- <div id="card-studyingbooks-child-2"> -->
                <label class="texttitlechapter">نموذج 3 </label>

            </div>






            <div id="card-studyingbooks-child-forms-quiz">
                <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModdelete" style="margin-left: 30px;">  <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button>
                <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModaledite" style="margin-left: 50px;">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button>

            </div>
        </div>




        <div id="card-studyingbooksforms-quiz" class="card">
            <div id="card-studyingbooks-child">
                <img src="{{Vite::image("M.L.H DS Mid exams_page-0004.jpg")}}" class="chapters" width="190px">

                <!-- <div id="card-studyingbooks-child-2"> -->
                <label class="texttitlechapter">نموذج 4 </label>

            </div>






            <div id="card-studyingbooks-child-forms-quiz">
                <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModdelete" style="margin-left: 30px;">  <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button>
                <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModaledite" style="margin-left: 50px;">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button>

            </div>
        </div> --}}
    </div>


    {{-- <!-- The Modal -->
    <div class="modal fade" id="myModal" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content2">

            <!-- Modal Header -->
            <div class="modal-header" id="modheader">
                رفع نموذج
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" style="display: block;">
                    <div class="form-group">
                        <!-- <label for="usr">Name:</label> -->
                        <input type="text" class="form-control" id="inputtextfile" name="username" placeholder="اسم النموذج" style="height: 30px; margin-top:-6px">

                        <input type="file" class="form-control-file border" id="file" name="file" style="height: 30px; margin-top:8px">
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
    </div> --}}



      <!-- The ModalEdite -->
      <div class="modal fade" id="myModaledite" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content2">

                <!-- Modal Header -->
                <div class="modal-header" id="modheader">
                     تعديل
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" style="display: block;" enctype="multipart/form-data">
                        <div class="form-group">
                            <!-- <label for="usr">Name:</label> -->
                            <input type="text" class="form-control" id="inputtextfile" wire:model='nameFile' placeholder="اسم النموذج" style="height: 30px; margin-top:-6px">
                            @error('nameFile')
                            <span class="error" style="color: red;">{{ $message }}</span>
                            @enderror

                            <input type="file" class="form-control-file border" id="file" wire:model="file" style="height: 30px; margin-top:8px">
                            @error('file')
                            <span class="error" style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div> -->
                    </form>
                </div>

                <!-- Modal footer -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btnsave-file" style="float: left; margin-left:30px;" wire:click='editQuiz()'>حفظ</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel-file">إلغاء</button>
                </div>
            </div>
        </div>
    </div>


    <!-- The ModalDelete -->
    <div class="modal fade" id="myModdelete" wire:ignore.self>
        <div class="modal-dialog ">
            <div class="modal-content" style="height: 150px;">

                <!-- Modal Header -->
                <div class="modal-header" style="padding-left:50%; height: 40px; padding-top:6px;">
                    تنبيه!
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="text-align:center ;">
                    <form action="" style="display: block;">
                        {{ __('general.you_want_to_delete') }}
                        <!-- <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div> -->
                    </form>
                </div>

                <!-- Modal footer -->

                <div class="modal-footer" style="height: 40px;">
                    <button type="submit" class="btn btn-primary" id="btnOkYes" wire:click='deleteQuiz'>نعم</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnNO">لا</button>
                </div>
            </div>
        </div>
    </div>

</div>
