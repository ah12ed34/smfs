<?php

namespace App\Livewire;

use App\Models\File;
use App\Models\Level;
use App\Traits\Tools;
use Livewire\Component;
use App\Models\Studying;
use App\Models\Department;
use App\Models\GroupSubject;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use App\Repositories\FileRepsitory;
use App\Repositories\FileRepository;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;


class Test extends Component
{
    protected $test;

    public $notiActive = 'student_a';

    public function mount()
    {
        // $this->initializeToolsNav(selectActive: ['department', 'level', 'role', 'subject', 'group']);
        // $level_id = 1;
        // $department_id = 2;
        // $type = 'all';
        // $group_id = null;


        // $groups = $levels = Level::when($department_id, function ($query) use ($department_id) {
        //     return $query->where('department_id', $department_id);
        // })->get();

        // dd($groups);
        $this->test = new FileRepository();
        // $keys = $this->test->getArrayHeaderKey(["id",    "midterm_exam"]);

        // $s = $this->test->getStudentAndGradeToAcademic(['20163132'], $keys);
        // $ss = GroupSubject::find(7)->groupStudents->where('student_id', $s['id'])->first();
        // dd($ss, $s['id']);

        // Storage::download('/temp/createing/Hello World.xlsx', 'Hello World.xlsx', [
        //     'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        // ]);

    }
    public function setA()
    {
        // $g = GroupSubject::find(4);
        // dd(
        //     $g->subject()->name_ar
        // );
        $this->test = new FileRepository();
        return $this->test->DownloadFileSAFTA(4);
    }

    // public function setA($a)
    // {
    //     $this->dispatch('na', $a);
    // }

    public function render()
    {


        // // download file and delete file
        // if (file_exists($filePath)) {

        //     Storage::download('/temp/createing/Hello World.xlsx', 'Hello World.xlsx', [
        //         'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        //     ]);
        // }
        return view('livewire.test');
    }
}
