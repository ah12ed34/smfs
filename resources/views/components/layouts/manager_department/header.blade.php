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

<div class="dropdown">
<button type="button"  class="btn btn-light manageDepartNavbarMainforLevel_dropdown  dropdown-toggle" data-toggle="dropdown" dir="rtl">
    <div class="textdropdown">    الممجموعات</div>
</button>
<div id="dropdown-itemlist" class="dropdown-menu" style=" color: #0E70F2; ">
    {{-- <a id="" class="dropdown-item" href='{{route('depart_level_Group_mainPage')}}' style="padding-left:30px; ">المجموعات  </a> --}}
    <a id="" class="dropdown-item" href='{{route('depart_level_academic',$parameter)}}' style="padding-left:30px; ">  الأكادمين</a>
    <a id="" class="dropdown-item" href='{{route('depart_level_Books',$parameter)}}' style="padding-left:30px; ">   المقرر الدراسي</a>
    <a id="" class="dropdown-item" href='{{route('depart_level_allsechedules',$parameter)}}'style="padding-left:30px; ">   الجدول الدراسي</a>
    <a id="" class="dropdown-item" href='{{route('depart_level_studentsFinalTearmStatistics',$parameter)}}' style="padding-left:30px; ">  الإحصائيات</a>

</div>
</div>
