{{-- <button class="btn-bottomNavbar" onclick="location.href='{{ route('main_departManager_sechedules') }}'"><img
    src="{{ Vite::image('calendar (3).png') }}" class="bottombaricon" width="20px"><br><label
    class="bottomNavbartext">الجدول </label></button> --}}
    <button class="btn-bottomNavbar" onclick="location.href='{{ route('teachers_Schedules_studying') }}'">
        <img src="{{ Vite::image('calendar (3).png') }}" class="bottombaricon" width="20px"><label> الجدول </label></button>

<button class="btn-bottomNavbar"  onclick="location.href='{{ route('managerDepartment') }}'"><img
src="{{ Vite::image('home (1).png') }}" class="bottombaricon" width="20px"><br><label
class="bottomNavbartext">القائمة</label></button>
