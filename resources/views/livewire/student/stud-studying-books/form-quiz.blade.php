@section('nav')
    @livewire('components.nav.student.stud-studying-books.stud-form-quiz',['group_subject'=>$group_subject,'active'=>$active])
@endsection
<div>

    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
{{-- form_exem --}}
<div class="card" id="contents-book">
    <div class="container" style="padding-top:30px; ">
        @forelse ($forms as $form)
            <div id="card-studyingbooksforms-quiz" class="card">
                <div id="card-studyingbooks-child">
                    <img src="{{ $form->icon() }}"
                      class="chapters" >
                    {{-- <img src="{{Vite::image("chapter.png")}}"  class="chapters" > --}}
                    <label class="texttitlechapter">{{$form->name}}
                        </label>
                </div>
                <div id="card-studyingbooks-child-forms-quiz">
                    <div class="form-group">
                        <a href="{{ asset('storage/'.$form->file) }}" download='{{$form->name.'-'.$subject_name}}'>
                            <button type="submit" class="btn btn-primary" id="btn-download" data-toggle="modal" data-target="#myModal3"><img src="{{Vite::image("download-file.png")}}" id="image-download"  width="15px" ></button>
                        </a>
                    </div>
                </div>
            </div>


        @empty

            <div class="alert alert-warning" role="alert">
                لا يوجد ملفات لعرضها
            </div>
        @endforelse




        {{-- <div id="card-studyingbooksforms-quiz" class="card">

            <div id="card-studyingbooks-child">
                <img src="{{Vite::image("M.L.H DS Mid exams_page-0001.jpg")}}" class="chapters" width="190px">

                <!-- <div id="card-studyingbooks-child-2"> -->
                <label class="texttitlechapter">نموذج 1</label>
            </div>

            <div id="card-studyingbooks-child-forms-quiz">

                <button type="submit" class="btn btn-primary" id="btn-download" data-toggle="modal" data-target="#myModal3"><img src="{{Vite::image("download-file.png")}}" id="image-download"  width="15px" ></button>

                <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModal3" style="margin-left: 30px;">  <img src="../images/delete (1).png")}}" id=""  width="15px" ></button> -->
                <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModal3" style="margin-left: 50px;">تعديل  <img src="../images/edit.png")}}" id=""  width="15px" ></button> -->

            </div>
            <!-- </div> -->

        </div>

        <div id="card-studyingbooksforms-quiz" class="card">
            <div id="card-studyingbooks-child">
                <img src="{{Vite::image("M.L.H DS Mid exams_page-0002.jpg")}}" class="chapters" width="190px">

                <!-- <div id="card-studyingbooks-child-2"> -->
                <label class="texttitlechapter">نموذج 2 </label>

            </div>

            <div id="card-studyingbooks-child-forms-quiz">
                <button type="submit" class="btn btn-primary" id="btn-download" data-toggle="modal" data-target="#myModal3"><img src="{{Vite::image("download-file.png")}}" id="image-download"  width="15px" ></button>

                <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModal3" style="margin-left: 30px;">  <img src="../images/delete (1).png")}}" id=""  width="15px" ></button>
                    <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModal3" style="margin-left: 50px;">تعديل  <img src="../images/edit.png")}}" id=""  width="15px" ></button> -->

            </div>
        </div>


        <div id="card-studyingbooksforms-quiz" class="card">
            <div id="card-studyingbooks-child">
                <img src="{{Vite::image("M.L.H DS Mid exams_page-0003.jpg")}}" class="chapters" width="190px">
                <!-- <div id="card-studyingbooks-child-2"> -->
                <label class="texttitlechapter">نموذج 3 </label>

            </div>

            <div id="card-studyingbooks-child-forms-quiz">

                <button type="submit" class="btn btn-primary" id="btn-download" data-toggle="modal" data-target="#myModal3"><img src="{{Vite::image("download-file.png")}}" id="image-download"  width="15px" ></button>

                <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModal3" style="margin-left: 30px;">  <img src="../images/delete (1).png")}}" id=""  width="15px" ></button> -->
                <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModal3" style="margin-left: 50px;">تعديل  <img src="../images/edit.png")}}" id=""  width="15px" ></button> -->

            </div>
        </div>

        <div id="card-studyingbooksforms-quiz" class="card">
            <div id="card-studyingbooks-child">
                <img src="{{Vite::image("M.L.H DS Mid exams_page-0004.jpg")}}" class="chapters" width="190px">

                <!-- <div id="card-studyingbooks-child-2"> -->
                <label class="texttitlechapter">نموذج 4 </label>

            </div>


            <div id="card-studyingbooks-child-forms-quiz">

                <button type="submit" class="btn btn-primary" id="btn-download" data-toggle="modal" data-target="#myModal3"><img src="{{Vite::image("download-file.png")}}" id="image-download"  width="15px" ></button>

                <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModal3" style="margin-left: 30px;">  <img src="../images/delete (1).png")}}" id=""  width="15px" ></button> -->
                <!-- <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModal3" style="margin-left: 50px;">تعديل  <img src="../images/edit.png")}}" id=""  width="15px" ></button> -->

            </div>
        </div>
        --}}
    </div>
    <nav>
        {{ $forms->links(myapp::viewPagination) }}
    </nav>
</div>



<!-- The Modal -->
<div class="modal fade" id="myModaluploade-form-quiz" wire:ignore.self>
<div class="modal-dialog">
    <div class="modal-content" id="modal-content2">

        <!-- Modal Header -->
        <div class="modal-header" id="modheader">
            رفع @switch($active)
                @case('forms')
                    نموذج
                    @break

                @default
                    ملخص
            @endswitch
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            {{-- <form action="" style="display: block;"> --}}
                <div class="form-group">
                    <!-- <label for="usr">Name:</label> -->
                    <input type="text" class="form-control" id="inputtextfile" wire:model='nameFile'
                    placeholder="اسم @switch($active)
                    @case('forms')النموذج@break
                @defaultالملخص@endswitch" style="height: 30px; margin-top:-6px">

                    <input type="file" class="form-control-file border" id="file" wire:model="file" style="height: 30px; margin-top:8px">
                </div>
        </div>

        <!-- Modal footer -->

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btnsave-file" style="float: left; margin-left:30px;"
            wire:click='addFOS'
            >حفظ</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel-file"
            >إلغاء</button>
        </div>
    </div>
</div>
</div>
@section('script')
    <script>
        window.addEventListener('closeModal', event => {
            $('#myModaluploade-form-quiz').modal('hide');
        });

        $('#myModaluploade-form-quiz').on('hidden.bs.modal', function () {
            // do something… resetFrom
            @this.resetForm();
        });
    </script>
@endsection

</div>
