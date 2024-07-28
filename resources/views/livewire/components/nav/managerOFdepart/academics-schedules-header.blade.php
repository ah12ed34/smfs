<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="hdr2" style=" box-shadow: 10px;">
        <button class=" spaces"> <label  class="subjectname" >   جدول المدرسين  </label><img src="{{Vite::image("academics.png")}}" id="subject-icon-hdr2" width="40px" style="margin-left: -165px;">
        </button>


        <div class="dep-name">{{ auth()->user()->academic->department->name }}</div>

{{-- <div class="dropdown">
            <button type="button"  class="btn btn-light TypeTerm_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                    <div class="textdropdown">    ترم اول</div>
                </button>
                <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">

                    <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  ترم ثاني</a>
                </div>
            </div> --}}

            {{-- @include('components.navSelect.term') --}}
            

            {{-- <div class="dropdown">
                <button type="button"  class="btn btn-light TypeAcademicsSechedules_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                        <div class="textdropdown">     نظري</div>
                    </button>
                    <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">

                        <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   عملي</a>
                    </div>
                </div> --}}

                {{-- @include('components.navSelect.type') --}}

                {{-- @if(isset($types) &&array_key_exists('type',$active)&&isset($routeName)&&isset($parameters)&&isset($qurey))
                <div class="dropdown">
                    <button type="button"  class="btn btn-light TypeAcademicsSechedules_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                            <div class="textdropdown">
                                {{ $types->where('id',$active['type'])->first()->name }}
                            </div>
                        </button>
                        <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                
                            @foreach ($types->where('id','!=',$active['type']??null) as $type)
                            <a id="" class="dropdown-item" href="{{ route($routeName,$parameters+array_merge($qurey, ['type' => $type->id])) }}" style="padding-left:30px;">
                            {{ $type->name }}</a>
                            @endforeach
                
                        </div>
                    </div>
                
                    @else
                    <div class="dropdown">
                        <button type="button"  class="btn btn-light TypeAcademicsSechedules_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                                <div class="textdropdown">    <label class="hidpartname_dropdown">حسب </label>النوع</div>
                            </button>
                            <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                            </div>
                        </div>
                @endif --}}
        <!-- <td><button type="submit" class="btn btn-primary btn-sm  manageDepart-addAcademic" id="" data-toggle="modal" data-target="#addacademic"> اضافة اكاديمي<img src="{{Vite::image("plus.png")}}"  width="20px" style="float: left;"></button> </td> -->


    </div>

    <div class="hr3">
        <button id="spacesbtn" class="spaces"  onclick="window.location='{{ route('main_academic_sechedules') }}'"> <img src="{{Vite::image("left-arrow.png")}}" id="spaces1"  width="30px"></button>

        @include('components.navSelect.search')

    </div>
</div>
