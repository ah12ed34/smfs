@if(isset($teachers) &&array_key_exists('teacher',$active))
<div class="dropdown">
    <button type="button"  class="btn btn-light MnageDepart_sechedule_Teacher_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
            <div class="textdropdown">
                {{ ($active['teacher'] != null)? $teachers->where('user_id',$active['teacher'])->first()->user->name :
                'كل المدرسين'}}
            </div>
        </button>
        <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
            @if($active['teacher'] != null)
                <a id="" class="dropdown-item" href="{{route($routeName ,array_merge($parameters,$qurey,['teacher'=>null]))}}"
                 style="padding-left:30px; ">كل المدرسين</a>
            @endif
            @foreach ($teachers->where('user_id','!=',$active['teacher']) as $teacher)
            <a id="" class="dropdown-item" href="{{ route($routeName,$parameters+array_merge($qurey, ['teacher' => $teacher->user_id])) }}" style="padding-left:30px;">
            {{ $teacher->user->name }}</a>
            @endforeach
            {{-- <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  ******</a> --}}

        </div>
    </div>
    @else
    <div class="dropdown">
        <button type="button"  class="btn btn-light MnageDepart_sechedule_Teacher_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                <div class="textdropdown">    <label class="hidpartname_dropdown">حسب </label>المدرس</div>
            </button>
            <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
            </div>
        </div>
@endif
