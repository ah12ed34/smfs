<div>
@section('nav')
    @livewire('components.nav.academic.students',['group_subject'=>$group_subject,'active'=>'midexam'])
@endsection
    {{-- In work, do what you enjoy. --}}

    <div class="responsive"></div>


    <div class="container" id="container-project" style="  padding-top: 30px;">

        <div class="table-responsive-xl">
            <table class="table" style=" width:100%;">
                <thead class="table-header" style="font-size: 12px;">
                    <tr class="table-light" id="modldetials">
                        <th>الدرجة </th>
                        <th>اسم الطالب</th>
                        <th>الرقم الأكاديمي </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                    <tr class="table-light" id="modldetials" style="margin-top:7px;">


                        <td>{{ $student->helf_exem ?? '' }}</td>
                        <td>{{ $student->user->full_name }}</td>
                        <td>{{ $student->user_id }}</td>
                    </tr>
                    @empty

                    <tr class="table-light" id="modldetials" style="margin-top:7px;">
                        <td colspan="4" style="text-align: center;">لا يوجد طلاب</td>
                    </tr>
                    @endforelse



                </tbody>
            </table>
        </div>
    </div>

    <nav>
        {{ $students->links(myapp::viewPagination) }}
    </nav>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content modal_content_css" id="modal-content2">

                <!-- Modal Header -->
                <div class="modal-header modal_header_css" id="modheader">
                    رفع الدرجات
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" style="display: block;">
                        <div class="form-group">
                            <!-- <label for="usr">Name:</label> -->

                            <input type="file" class="form-control-file border" id="file" name="file" style="height: 30px; margin-top:8px">
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

</div>
