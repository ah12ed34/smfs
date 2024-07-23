<?php
    if(!isset($active['tab'])){
        $active['tab'] = null ;
    }
?>
<div  class="btn-group btn_group_nav_manageDepart-level" id="">
    <button
    @if($active['tab'] == 'statistics')
        style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"
    @endif
    class="btn-manageDepart-level-Navbar" onclick="location.href='{{route('depart_level_studentsFinalTearmStatistics',$parameter)}}'"><label class="proNavbartext">الإحصائيات </label></button>

    <button
    @if ($active['tab'] == 'schedules')
        style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"
    @endif
    class="btn-manageDepart-level-Navbar" onclick="location.href='{{route('depart_level_allsechedules',$parameter)}}'"><label class="proNavbartext">  الجدول الدراسي</label></button>
    <button
    @if ($active['tab'] == 'books')
        style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"
    @endif
    class="btn-manageDepart-level-Navbar" onclick="location.href='{{route('depart_level_Books',$parameter)}}'"><label class="proNavbartext">  المقرر الدراسي </label></button>
    <button
    @if ($active['tab'] == 'academic')
        style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"
    @endif
    class="btn-manageDepart-level-Navbar" onclick="location.href='{{route('depart_level_academic',$parameter)}}'"><label class="proNavbartext"> الأكادمين</label></button>
    <button
    @if($active['tab'] == 'groups')
        style="background-color: #a9cbf7;text-decoration: none;border-bottom: 4px solid #2f81ec;"
    @endif
    class="btn-manageDepart-level-Navbar" onclick="location.href='{{route('depart_level_Group_mainPage',$parameter)}}'"><label class="proNavbartext"> المجموعات</label></button>
</div>

{{-- @if($active['tab'] != 'statistics')
<div class="dropdown">
<button type="button"  class="btn btn-light manageDepartNavbarMainforLevel_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
    <div class="textdropdown">    المجموعات</div>
</button>
<div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
    <a id="" class="dropdown-item" href='{{route('depart_level_academic',$parameter)}}' style="padding-left:30px; ">  الأكادمين</a>
    <a id="" class="dropdown-item" href='{{route('depart_level_Books',$parameter)}}' style="padding-left:30px; ">   المقرر الدراسي</a>
    <a id="" class="dropdown-item" href='{{route('depart_level_allsechedules',$parameter)}}'style="padding-left:30px; ">   الجدول الدراسي</a>
    <a id="" class="dropdown-item" href='{{route('depart_level_studentsFinalTearmStatistics',$parameter)}}' style="padding-left:30px; ">  الإحصائيات</a>

</div>
</div>
@endif --}}

@if($active['tab'] != 'statistics')

<div class="dropdown">
    <button type="button"  class="btn btn-light departmentNavbar_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
            <div class="textdropdown">@switch($active ['tab'])
                @case('groups')
                المجموعات     
                @break        
                @case('academic')
                    الأكادميين
                    @break
                @case('books')
                المقرر الدراسي                  
                @break
                @case('schedules')
                الجدول الدراسي              
                    @break
                
                @case('statistics')
                    الإحصائيات
                    @break

                @default

            @endswitch</div>
        </button>
        <div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
            @if ($active['tab'] != 'groups')
            <a id="" class="dropdown-item" href='{{route('depart_level_Group_mainPage',$parameter)}}' style="padding-left:30px; ">  المجموعات</a>
            @endif
            @if ($active['tab'] != 'academic')
            <a id="" class="dropdown-item" href='{{route('depart_level_academic',$parameter)}}' style="padding-left:30px; ">  الأكادميين</a>
            @endif
            @if ($active['tab'] != 'books')
            <a id="" class="dropdown-item" href='{{route('depart_level_Books',$parameter)}}' style="padding-left:30px; ">   المقرر الدراسي</a>
            @endif

            @if ($active['tab'] != 'schedules')
            <a id="" class="dropdown-item" href='{{route('depart_level_allsechedules',$parameter)}}'style="padding-left:30px; "> الجدول الدراسي </a>
            @endif
            @if($active['tab'] !='statistics')
            <a id="" class="dropdown-item" href='{{route('depart_level_studentsFinalTearmStatistics',$parameter)}}' style="padding-left:30px; ">  الإحصائيات</a>
            @endif
        </div>
    </div>
    @endif