<div>
@section('nav')
@livewire('components.nav.academic.subject.recive_assignments'
,['tabActive'=>$tabActive,'group_subject'=>$group_subject])
@endSection
<div class="responsive"></div>
<div class="container" id="container-project" style="  padding-top: 30px;" >


<div class="table-responsive-xl">
    <table class="table" id="table" style=" margin-right: -30px; " >
        <thead class="table-header" style="font-size: 12px;">
            <tr class="table-light" id="modldetials">
                <th>تصحيح التكليف </th>
                <th>ملاحظة المدرس</th>
                <th>الدرجة</th>
                <th>الملف</th>
                <th> حالة التسليم</th>
                <th>تاريخ التسليم</th>
                <th> اسم الطالب</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($deliverys as $delivery)
                <tr class="table-light" id="modldetials" style="margin-top:7px;">
                    <td>
                    @if ($tabActive=='not_delivered')
                        <button type="submit" class="btn btn-primary btn-sm disabled" id="btn-detials"
                         >تصحيح التكليف</button>
                    @else
                    <button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#ModaldCheckAssignmentsStudents" wire:click='selected({{ $delivery->id }})' >تصحيح التكليف</button>
                    @endif
                    </td>
                    <td>{{ $delivery->comment }}</td>
                    <td style="width: 15%;">
                    @if ((empty($delivery->grade)||$delivery->grade==null)&&$tabActive!='not_delivered')
                        <input type="number" min='0' max="{{ $assignment_grade }}" class="form-control input_gradeAssingnments" id="{{ $delivery->id }}" wire:model.lazy='grade.{{ $delivery->id }}' >
                    @else
                        {{ $delivery->grade }}
                    @endif

                    </td>
                    <td>
                        @if($delivery->file)
                        <a wire:click='download({{ $delivery->id }})' style="
                            color: #007bff;
                            text-decoration: none;
                            cursor: pointer;
                        ">
                            <i class="bi bi-download"></i>
                        </a>
                        @if ($delivery->status_code==2)
                        {{-- add Hint --}}
                        @if ($delivery->file2??false)
                        <a wire:click='download({{ $delivery->id }},"file2")' style="
                            color: orange;
                            text-decoration: none;
                            cursor: pointer;
                        "
                        >
                            <i class="bi bi-download"></i>
                        </a>
                        @else
                            <i class="bi bi-file-x"></i>

                        @endif


                    @endif
                        @else
                            <i class="bi bi-file-x"></i>
                        @endif
                    </td>
                    <td>{{ $delivery->status }}</td>
                    <td>{{ $delivery->delivery_date }}</td>
                    <td>{{ $delivery->student }}</td>
                </tr>
            @empty
                <tr class="table-light">
                    <td colspan="7" style="text-align: center;">لا يوجد بيانات</td>
                </tr>
            @endforelse

            {{-- <tr class="table-light">
                <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#ModaldCheckAssignmentsStudents">تصحيح التكليف</button> </td>
                <td>*******</td>
                <td><input type="text" class="form-control input_gradeAssingnments" name="gradeAssingnments"></td>
                <td> ***</td>
                <td>*******</td>
                <td>***** </td>
                <td>SFMS</td>
            </tr>
            <tr class="table-light">
                <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#ModaldCheckAssignmentsStudents">تصحيح التكليف</button> </td>
                <td>*******</td>
                <td><input type="text" class="form-control input_gradeAssingnments" name="gradeAssingnments"></td>
                <td> ***</td>
                <td>*******</td>
                <td>***** </td>
                <td>SFMS</td>
            </tr>
            <tr class="table-light">
                <td><button type="submit" class="btn btn-primary btn-sm" id="btn-detials" data-toggle="modal" data-target="#ModaldCheckAssignmentsStudents">تصحيح التكليف</button> </td>
                <td>*******</td>
                <td><input type="text" class="form-control input_gradeAssingnments" name="gradeAssingnments"></td>
                <td> ***</td>
                <td>*******</td>
                <td>***** </td>
                <td>SFMS</td>
            </tr> --}}

        </tbody>
    </table>
</div>
<nav aria-label="Page navigation example">
    {{ $deliverys->links(myapp::viewPagination) }}
</div>

<!-- The ModalDetailsStudents -->
<div class="modal fade" id="ModaldCheckAssignmentsStudents" wire:ignore.self>
<div class="modal-dialog ">
<div class="modal-content ModaldDetailsAcademic" id="modal-content" style="background-color: #F6F7FA; height:600px;">

    <!-- Modal Header -->
    <div class="modal-header ModaldDetailsAcademic" id="modheader">
         التفاصيل
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <!-- Modal body -->
    <div class="modal-body ModaldDetailsAcademic">
        @if ($errors->any())
                        {{-- {{ $this->selected($detail->id) }} --}}
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li style="text-align: right;">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
        <form  style="display: block;" wire:submit.prevent='correction'>
            <div class="form-group">
                <div class="table-responsive ">

                    <table class="table details-academic " style="width:100%;;" dir="rtl">
                                <tr class="table-light" id="modldetials">
                                    <th style=" width:25%; "> الرقم الأكاديمي</th>
                                    <td>{{ $detail['user_id']??'****' }}</td>
                                </tr>
                                <tr class="table-light " id="modldetials">
                                    <th style=" width:25%; "> اسم الطالب</th>
                                    <td>{{ $detail['student'] ?? '****' }}</td>
                                </tr>
                                <tr class="table-light" id="modldetials">
                                    <th style="width: 25%;"> المجموعة</th>
                                    <td>**********</td>
                                </tr>
                                <tr class="table-light" id="modldetials">
                                    <th style="width: 25%;">  تاريخ التسليم </th>
                                    <td>{{ $detail['delivery_date'] ?? '****' }}</td>
                                </tr>
                                <tr class="table-light" id="modldetials">
                                    <th style="width: 25%;" >  حالة التسليم </th>
                                    <td>{{ $detail["status"] ?? '****' }}</td>
                                </tr>
                                <tr class="table-light" id="modldetials">
                                    <th style="width: 25%;">  الملف</th>
                                    <td>
                                        @if($detail['file']??false)
                                        <a wire:click='download({{ $detail['id'] }})' style="
                                            color: #007bff;
                                            text-decoration: none;
                                            cursor: pointer;
                                        ">
                                            <i class="bi bi-download"></i>
                                        </a>
                                        @if ($detail['status_code']==2)
                                            {{-- add Hint --}}
                                            @if ($detail["file2"]??false)
                                            <a wire:click='download({{ $detail["id"] }},"file2")' style="
                                                color: orange;
                                                text-decoration: none;
                                                cursor: pointer;
                                            "
                                            >
                                                <i class="bi bi-download"></i>
                                            </a>
                                            @else
                                                <i class="bi bi-file-x"></i>

                                            @endif


                                        @endif
                                        @else
                                            <i class="bi bi-file-x"></i>
                                        @endif
                                    </td>
                                </tr>
                                <tr class="table-light" id="modldetials">
                                    <th style="width: 25%;"> ملاحظة الطالب</th>
                                    <td>**********</td>
                                </tr>

                    </table>
                </div>

                <div class="table-responsive ">
                    <table class="table details-academic " style="width:100%; margin-top:10px;" dir="rtl">
                                {{-- <tr  id="modldetials">
                                    <th colspan="2" > التصحيح </th>
                                </tr> --}}
                                <tr  id="modldetials">
                                    <th style=" width:25%; "> الدرجة </th>
                                    <td> <input class="form-control" type="data" wire:model='gradeD' value="{{ $detail->grade??null }}" ></td>
                                </tr>
                                <tr  id="modldetials">
                                    <th style="width: 25%;">  ملاحظة المدرس</th>
                                    <td><textarea class="form-control"  id="" cols="20" rows="4" style="height: 100%"
                                        wire:model='commentD' value="{{ $detail->comment??null }}"
                                        ></textarea></td>
                                </tr>
                    </table>
                </div>
            </div>
        </form>
    </div>

    <!-- Modal footer -->

    <div class="modal-footer" style="">
       <button type="submit" class="btn btn-primary" id="btnsave" wire:click='correction'
       >حفظ</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btncancel">إلغاء</button>
    </div>
</div>
</div>
</div>
@section('script')
<script>
    window.addEventListener('closeModal', event => {
        $('#ModaldCheckAssignmentsStudents').modal('hide');
    });
</script>
@endsection
</div>

