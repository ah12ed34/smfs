@if (isset($groups) && isset($active) && array_key_exists('group',$active)
        &&isset($routeName)&&isset($parameters)&&isset($qurey))
    <div class="dropdown">
        <button type="button"  class="btn btn-light MnageDepart_studentsGroupsFinalWorks_Statistics_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                <div class="textdropdown">{{ $active['group'] !=  null? $groups->where('id',$active['group'])->first()->name : 'كل المجموعات'}}</div>
            </button>
            <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
                @if($active['group'] != null)
                <a id="" class="dropdown-item" href="{{route($routeName,array_merge($parameters,$qurey,['group'=>null]))}}"
                    style="padding-left:30px; ">كل المجموعات</a>
                @endif
                @foreach ($groups->where('id','!=',$active['group']) as $group)
                    <a id="" class="dropdown-item" href="{{route($routeName,array_merge($parameters,$qurey,['group'=>$group->id]))}}"
                     style="padding-left:30px; ">{{ $group->name }}</a>
                @endforeach
                {{-- <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">   مجموعة(1)</a>
                <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  مجموعة(2)</a>
                <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  مجموعة(3)</a> --}}
                
            </div>
        </div>
    @else
    <div class="dropdown">
        <button type="button"  class="btn btn-light MnageDepart_studentsGroupsFinalWorks_Statistics_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                <div class="textdropdown">  المجموعات</div>
            </button>
            <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
            </div>
        </div>
@endif
