@if(isset($types) &&array_key_exists('type',$active)&&isset($routeName)&&isset($parameters)&&isset($qurey))
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
            {{-- <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  ******</a> --}}

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
@endif
