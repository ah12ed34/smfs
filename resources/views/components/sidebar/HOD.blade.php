<button class="button-sidebar " onclick="location.href='{{ route('managerDepartment') }}'"><img
    src="{{ Vite::image('home (1).png') }}" class="sidebaricon" width="26px"><label>{{ __('layout.meun_home') }} </label></button>
    
{{-- <button class="button-sidebar" onclick="location.href='{{ route('main_departManager_sechedules') }}'">
<img src="{{ Vite::image('calendar (3).png') }}" class="sidebaricon" width="26px"><label>{{ __('layout.schaudule_std') }} </label></button> --}}

<button class="button-sidebar" onclick="location.href='{{ route('teachers_Schedules_studying') }}'">
<img src="{{ Vite::image('calendar (3).png') }}" class="sidebaricon" width="26px"><label>جدو المدرسين </label></button>