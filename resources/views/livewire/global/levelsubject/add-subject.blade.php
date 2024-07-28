<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    {{-- @dump($selected,$selectedRealey,$count,$page,$perPage) --}}
    {{-- @dump($page,$subjects->currentPage()) --}}
    {{-- <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for='perPage'>{{ __("general.per_page") }}</label>
                <select id="perPage" wire:model.lazy='perPage' class="form-control">
                    <option value="5" >5</option>
                    <option value="10" >10</option>
                    <option value="15" >15</option>
                    <option value="20" >20</option>
                    <option value="{{ $group->max_students }}" >{{ __("general.all") }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for='search'>{{ __("general.search") }}</label>
                <input id="search" type="text" wire:model.lazy='search' class="form-control" />
            </div>
        </div>
    </div> --}}
    {{-- @dump($select) --}}
    {{-- <div class="container " style="  overflow:auto ; -ms-overflow-style: none; left:-50px;right:0%;"> --}}
    <div class="table-responsive-xl" >
    <table class="table add_subject "  >
        <thead>
            <tr>
                <th>{{ __('general.edite_subjct') }}</th>
                <th>{{ __('general.active') }}</th>
                <th>{{ __('general.practical') }}</th>
                <th>{{ __('general.semester') }}</th>
                <th>درجة العملي</th>
                <th>{{ __("general.subjectnameEnglish") }}</th>
                <th>{{ __("general.subjectnameArabic") }}</th>
                <th>{{ __("general.code_subject") }}</th>

                <th ><input type="checkbox"  wire:model.lazy='selectAll' ></th>
            </tr>
        </thead>
        <tbody>
            <form wire:submit='save'  >
            {{-- @php
                $i = $perPage * ($page -1);
            @endphp --}}
            @forelse($subjects as $subject)
            {{-- @dd($subject) --}}
            <tr>
                <td><button type="submit" class="btn btn-primary btn-sm btn_edit" id="" data-toggle="modal" data-target="#EditeSubjectModal">تعديل<img src="{{Vite::image("edit.png")}}" id=""  width="15px" ></button> </td>
                <td><input type="checkbox" wire:model.lazy='isActivated.{{ $subject->id }}' id='isActivated.{{ $subject->id }}' ></td>
                <td><input type="checkbox" wire:model.lazy='has_practical.{{ $subject->id }}' id='has_practical.{{ $subject->id }}' ></td>
                <td><input type="number" value="1" wire:model='semester.{{ $subject->id }}' id='semester.{{ $subject->id }}' placeholder="semester" ></td>
                <td>
                    @if($subject->has_practical||(isset($has_practical[$subject->id])&&$has_practical[$subject->id]))
                    <input type="number"  wire:model='practical_grade.{{ $subject->id }}' id='practical_grade{{ $subject->id }}' placeholder="درجة العملي" >

                    @endif
                </td>
                <td>{{ $subject->name_en }}</td>
                <td>{{ $subject->name_ar }}</td>
                <td>{{ $subject->id }}</td>
                <td>
                    <input type="checkbox" id='{{ $subject->id }}' wire:model.lazy='select.{{ $subject->id }}' />
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="7">{{ __("general.no_data") }}</td>
            </tr>
            @endforelse
            <tr>
                <td colspan="8"><button type="submit" class="btn btn-primary">{{ __("general.add") }}</button></td>
            </tr>
            </form>

            <!-- Add more rows for other students -->
        </tbody>
    </table>
    {{ $subjects->links(myapp::viewPagination) }}
    </div>
{{-- </div> --}}

<!-- EditeSubjectModal -->
<div class="modal fade" wire:ignore.self id="EditeSubjectModal">
    <div class="modal-dialog">
        <div class="modal-content modal_content_css" id="modal-content2" style="height: 60vh;">

            <!-- Modal Header -->
            <div class="modal-header modal_header_css" id="modheader">
                تعديل
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body modal_body_css">
                {{-- <form action="" style="display: block;"> --}}
                    <div class="form-group">
                        <!-- <label for="usr">Name:</label> -->
                        <input type="text" class="form-control" id="inputtext" name="username" placeholder="  اسم المادة بالعربي" style="height: 30px; margin-top:-6px">
                        <input type="text" class="form-control" id="inputtext" name="username" placeholder=" اسم المادة بالإنجليزي" style="height: 30px; margin-top:10px">
                        <input type="data" class="form-control" id="inputtext" name="username" placeholder="   كود المادة" style="height: 30px; margin-top:10px">

                        {{-- <select class="form-control selectOption" id="sel1" name="sellist1" placeholder="نوع المادة" style="height: 30px; margin-top:8px">
                            <option>نظري</option>
                            <option>  نظري وعملي </option>
                            <option>   وعملي </option>
                        </select> --}}
                        <input type="file" class="form-control-file border" id="file" name="image" placeholder=" رفع الصورة"  style="height: 30px; margin-top:8px" accept=".jpg,.png,.jpeg">
                    </div>
                    <!-- <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div> -->
                {{-- </form> --}}
            </div>

            <!-- Modal footer -->

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm btn_save_informModal" id="" >حفظ</button>
                <button type="button" class="btn btn-danger btn-sm btn_cancel_informModal" data-dismiss="modal" id="">إلغاء</button>
            </div>
        </div>
    </div>
</div>
</div>
