@if ($active['group'])
    <div class="dropdown">
        <button type="button"  class="btn btn-light MnageDepart_studentsGroupsFinalWorks_Statistics_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                <div class="textdropdown">كل المجموعات</div>
            </button>
            <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                @foreach ($groups as $group)
                    <a id="" class="dropdown-item" href="{{route('depart_level_studentsFinalTearmStatistics',[$level->id]+array_merge($qurey,['group'=>$group->id]))}}"
                     style="padding-left:30px; ">{{ $group->name }}</a>
                @endforeach
                {{-- <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   مجموعة(1)</a>
                <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  مجموعة(2)</a>
                <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  مجموعة(3)</a> --}}

            </div>
        </div>

@endif
