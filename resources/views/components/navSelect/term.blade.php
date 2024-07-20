@if(isset($terms) &&array_key_exists('term',$active)&&isset($routeName)&&isset($parameters)&&isset($qurey))
<div class="dropdown">
    <button type="button"  class="btn btn-light MnageDepart_studentsFinalWorks_Statistics_TypeTerm_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
            <div class="textdropdown">
                {{ ($active['term'] != null)? $terms->where('id',$active['term'])->first()->name : 'كل الاترام'}}
            </div>
        </button>
        <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
            @foreach ($terms->where('id','!=',$active['term']) as $term)

            <a id="" class="dropdown-item" href="{{ route($routeName,array_merge($parameters,$qurey, ['term' => $term->id])) }}" style="padding-left:30px;">
            {{ $term->name }}</a>
            @endforeach
            {{-- <a id="" class="dropdown-item" href="#" style="padding-left:30px; ">  ******</a> --}}

        </div>
    </div>
    @else
    <div class="dropdown">
        <button type="button"  class="btn btn-light MnageDepart_studentsFinalWorks_Statistics_TypeTerm_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
                <div class="textdropdown">    <label class="hidpartname_dropdown">حسب </label>الترم</div>
            </button>
            <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
            </div>
        </div>

@endif
