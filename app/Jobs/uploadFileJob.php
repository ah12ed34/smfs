<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Events\ProgressData;
use App\Models\GroupStudents;
use App\Models\GroupSubject;
use App\Models\Student;
use App\Models\Studying;
use App\Models\User;
use App\Repositories\FileRepository;

class uploadFileJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $fileRep;
    /**
     * Create a new job instance.
     */
    // attributes function
    public $file, $sizeAll = 0, $data, $headerRow, $count = 0, $possition = 0, $chunk = 0;
    public $rows, $id, $progress = 0, $status = 'processing';
    public function __construct($header = [], $rows = [], array $data = [])
    {
        // $this->eventPDHQ([
        //     'status' => 'processing',
        //     'log' => print_r($data, true),
        // ]);
        $this->headerRow = $header;
        $this->rows = $rows;
        $this->file = $data['file'];
        $this->count = $data['count'];
        $this->chunk = $data['chunk'];
        $this->possition = $data['possition'];
        $this->sizeAll = $data['sizeAll'];
        $this->id = $data['id'];
        $this->data = $data;
        $this->fileRep = new FileRepository();
    }

    public $logs = '';
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $this->eventPDHQ([
                'status' => 'processing',
            ]);
            $i = $this->possition * $this->chunk - $this->chunk;
            foreach ($this->rows as $row) {
                $i++;

                $this->progress = $i / $this->sizeAll * 100;
                if ($this->data['uploadName'] == 'students_upload_grades') {
                    $this->uploadGrades($this->fileRep->getStudentAndGradeToAcademic($row, $this->headerRow));
                } elseif ($this->data['uploadName'] == 'uploadeNewStudentFile') {
                    $this->uploadStudent($this->fileRep->getStudent($row, $this->headerRow));
                }

                if (sizeof($this->rows) >= 10 && $i % 10 == 0) {
                    $this->eventPDHQ([
                        'status' => 'processing',
                    ]);
                }
            }
            if ($i == 0) {
                $this->eventPDHQ([
                    'status' => 'failed',
                    'log' => 'No data found',
                ]);
            } elseif ($this->count == $this->possition) {
                $this->progress = 100;
                $this->eventPDHQ([
                    'status' => 'completed',
                ]);
            }
        } catch (\Exception $e) {
            $this->eventPDHQ([
                'status' => 'warning',
                'log' => $e->getMessage() . ' handle ' . $this->logs,
            ]);
        }
    }
    function uploadGrades($data)
    {
        try {
            $groupSubject = GroupSubject::find($this->data['subject_id'])->groupStudents->where('student_id', $data['id'])->first();
            if ($groupSubject) {
                if ($data['id'] == null || $data['error']) {
                    $this->eventPDHQ([
                        'status' => 'warning',
                        'log' => $data['error'] . ' ' . $data['id'],
                    ]);
                    return;
                }
                $studying = Studying::where('student_id', $groupSubject->id)->where('subject_id', $this->data['subject_id'])->first();
                if ($studying) {
                    $studying->midterm_exam = $data['midterm_exam'];
                    if (isset($data['addional_grades'])) {
                        $studying->addional_grades = $data['addional_grades'];
                    }
                    $studying->save();
                } else {
                    Studying::create([
                        'student_id' => $groupSubject->id,
                        'subject_id' => $this->data['subject_id'],
                        'midterm_exam' => $data['midterm_exam'] ?? null,
                        'addional_grades' => $data['addional_grades'] ?? null,
                    ]);
                }
            } else {
                $this->eventPDHQ([
                    'status' => 'warning',
                    'log' => 'Student not in this group ' . $data['id'],
                ]);
            }
        } catch (\Exception $e) {
            $this->eventPDHQ([
                'status' => 'warning',
                'log' => $e->getMessage() . ' uploadGrades',
            ]);
        }
    }

    function uploadStudent($data)
    {
        try {
            if ($data['id'] == null || $data['error']) {
                $this->eventPDHQ([
                    'status' => 'warning',
                    'log' => $data['error'] . ' ' . $data['id'] . ' uploadStudent',
                ]);
                return;
            }
            $data['level_id'] = $this->data['level_id'];
            $data['department_id'] = $this->data['department_id'];
            $this->logs = print_r($data, true);
            $id = User::where('id', $data['id'])?->first()?->id;
            if ($id) {
                $this->eventPDHQ([
                    'status' => 'warning',
                    'log' => 'Student already exist ' . $data['id'],
                ]);
            } else {
                Student::create_student($data);
            }
        } catch (\Exception $e) {
            $this->eventPDHQ([
                'status' => 'warning',
                'log' => $e->getMessage() . ' uploadStudent',
            ]);
        }
    }
    public function eventPDHQ($data)
    {
        $data['file'] = $this->file;
        $data['user_id'] = $this->id;
        $data['Progress'] = $this->progress;
        $data['log'] = $data['log'] ?? null;
        event(new ProgressData($data));
    }
}
