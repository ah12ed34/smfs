@section('nav')
    @livewire('components.nav.academic.subject.nav-studying-books',['group_subject'=>$group_subject])

@endsection
<div>
<div class="container" style="padding-top:40px; padding-bottom:20px;">
        <div class="card" id="contents-book">
            <div class="responsive">
            </div>

            @forelse ($studyingbooks as $studyingbook)
                <div id="card-studyingbooks" class="card">
                    <div id="card-studyingbooks-child">
                        <img src="{{ $studyingbook->icon() }}"
                          class="chapters" >
                        {{-- <img src="{{Vite::image("chapter.png")}}"  class="chapters" > --}}
                        <label class="texttitlechapter">{{$studyingbook->name}}</label>
                    </div>
                    <div id="card-studyingbooks-child-2">
                        <div class="form-group">
                            <input type="file" class="form-control-file border" id="uploadefile" wire:click='selected({{ $studyingbook->id }})' wire:model.lazy="file2">
                        </div>
                    </div>
                    <div id="card-studyingbooks-child-three">
                        <button type="submit" class="btn btn-primary btn-sm" id="btn-delete" data-toggle="modal" data-target="#myModdelete" wire:click='selected({{ $studyingbook->id }})' style="margin-left: 30px;">  <img src="{{Vite::image("delete (1).png")}}" id=""  width="15px" ></button>
                        <button type="submit" class="btn btn-primary btn-sm" id="btn-edit" data-toggle="modal" data-target="#myModaledite" wire:click='selected({{ $studyingbook->id }})' style="margin-left: 50px;">تعديل  <img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button>
                    </div>
                </div>

            @empty
                <div class="alert alert-warning" role="alert">
                    لا يوجد ملفات لعرضها
                </div>

            @endforelse


            </div>
            <nav>
                {{ $studyingbooks->links(myapp::viewPagination) }}
            </nav>
        </div>

        <!-- The ModalEdite -->
        <div class="modal fade" id="myModaledite" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content modal_content_css" id="modal-content2" style="height: 250px;">

                    <!-- Modal Header -->
                    <div class="modal-header modal_header_css" id="modheader">
                        تعديل
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" style="display: block;" enctype="multipart/form-data">
                            <div class="form-group">
                                <!-- <label for="usr">Name:</label> -->
                                <input type="text" class="form-control" id="inputtextfile" wire:model='nameFile' placeholder="اسم الملف " style="height: 30px; margin-top:-6px">

                                <input type="file" class="form-control-file border" id="file" wire:model="file" style="height: 30px; margin-top:8px">
                            </div>
                            <!-- <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div> -->
                        </form>
                    </div>

                    <!-- Modal footer -->

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="" wire:click='editBook' style="float: left; margin-left:30px;">حفظ</button>
                        <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button>
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
                        {{ __('general.warring') }}
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body" style="text-align:center ;">
                        <form action="" style="display: block;">

                            {{-- هل تريد حذف الملف بالفعل؟ --}}
                            {{ __('general.you_want_to_delete') }}

                            <!-- <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div> -->
                        </form>
                    </div>

                    <!-- Modal footer -->

                    <div class="modal-footer" style="height: 40px;">
                        <button type="submit" class="btn btn-primary" id="btnOkYes" wire:click='deleteBook'>نعم</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnNO">لا</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            window.addEventListener('closeModal', event => {
                $('#myModaledite').modal('hide');
                $('#myModdelete').modal('hide');
            });

            window.addEventListener('refresh', event => {
                location.reload();
            });
        </script>
</div>
