<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;
use app\Models\file;
use App\Models\Academic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use app\Models\Department;

class StudyingScheduleController extends Controller
{
    //
    public $academic;
    public $active = [
        'tab' => 'schedules',
    ];
    // public  $department;
    public function main_academic_sechedules()
    {

        // $academic = auth()->user()->academic;
        return view("academic.studyingschedule.main_academic_sechedules");
    }
    public function academic_schedule()
    {
        $this->academic = auth()->user()->academic;
        $schedule = AcademicYear::getTerm() == 1 ? $this->academic->schedule : $this->academic->schedule2;
        return view("academic.studyingschedule.studyingschedule", compact('schedule'));
    }
    public function students_Schedule_studying()
    {
        $this->academic = auth()->user()->academic;
        $groups = $this->academic->courses->map(function ($course) {
            if ($course->group->whereNull('group_id')->count() > 0) {
                return $course->group;
            }
        })->flatten()->unique('id');
        return view("academic.studyingschedule.students_Schedule_studying", compact('groups'));
    }
    public function classes_Schedules_studying()
    {
        $schedule = AcademicYear::currentAcademicYear()->schedule;
        return view("academic.studyingschedule.classes_Schedules_studying", compact('schedule'));
    }

    public function download_schedule()
    {
        $schedule = AcademicYear::currentAcademicYear()->schedule;
        if ($schedule == null) {
            $this->dispatch('alert', __('general.file_not_found'), 'error');
        } elseif (Storage::missing($schedule)) {
            $this->dispatch('alert', __('general.file_not_found'), 'error');
        } else {
            return Storage::download($schedule, 'schedule' . '.' . pathinfo($schedule, PATHINFO_EXTENSION));
        }
    }
}
