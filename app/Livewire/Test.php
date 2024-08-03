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
use Livewire\WithFileUploads;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;


class Test extends Component
{
    use WithFileUploads;
    public $file;
    // static $pathFile;
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
        // $this->test = new FileRepository();
        // dd($this->test->checkYear('2018',$error));
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
        // $this->test = new FileRepository();

        // $path = 'D:\mysite\proprogye.us.to\public_html\storage\app/public\temp/createing/BdyZ7Y8o9ueKkI4vNQt2qbjozAY8I45Z4XYqqiRd.xls';
        // if (file_exists($path)) {
        //     $excel = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
        //     $sheet = $excel->getSheet(0)->toArray();
        //     $headerRow = null;
        //     $headerRowKeys = null;
        //     while (sizeof($sheet) > 0) {
        //         $headerRow = array_shift($sheet);
        //         $headerRowKeys = $this->test->getArrayHeaderKey($headerRow);

        //         if ($headerRowKeys && isset($headerRowKeys['id'])) {
        //             break;
        //         }
        //     }
        //     //$rom[$keys['birthday'] ?? null]
        //     $student = $this->test->getStudent($sheet[0], $headerRowKeys);
        //     $i = 1;
        //     while (!$student) {
        //         $student = $this->test->getStudent($sheet[$i], $headerRowKeys);
        //         $i++;
        //     }
        //     // dd($sheet[0][$headerRowKeys['birthday']]);
        //     $date1 = "07-25-1996"; // Valid for 'm-d-Y' format
        //     $date2 = "7-25-1996";  // Valid for 'm-d-Y' format with single digit month
        //     $date3 = "1998/03/10"; // Valid for 'Y/m/d' format

        //     // $result1 = $this->test->checkDate($date1, $error);
        //     $result2 = $this->test->checkDate($date2, $error);
        //     $result3 = $this->test->checkDate($date3, $error);

        //     // var_dump($result1); // يجب أن تكون النتيجة '1996-07-25'
        //     var_dump($result2); // يجب أن تكون النتيجة '1996-07-25'
        //     var_dump($result3); // يجب أن تكون النتيجة '1998-03-10'
        //     dd(
        //         $student,
        //         $sheet,
        //         $headerRow,
        //         $headerRowKeys
        //     );
        // }

        // return $this->test->DownloadFileSAFTA(4);
    }

    public function uploadFile()
    {
        $this->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        // $path = $this->file->store('temp/createing');
        // $this->file = null;
        // $path = Storage::path($path);
        // dd($path);
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
