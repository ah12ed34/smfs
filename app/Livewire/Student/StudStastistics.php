<?php

namespace App\Livewire\Student;

use Livewire\Component;
use App\Models\Delivery;

class StudStastistics extends Component
{
    public $user;
    public $assignementsnotsent;
    public $assignementssent;
    public function mount()
    {
        $this->user = auth()->user();
        $this->getCountAssignements();
    }

    public function getCountAssignements(){
        $this->assignementsnotsent = 0;
        $this->assignementssent = 0;
        $assignements = $this->user->student->groups->flatMap(function ($group) {
            return $group->groupSubjects->flatMap(function ($groupSubject) {
                return $groupSubject->getFilesInGroupBySubject('assignment',null)
                    ->where('is_active', 1)
                    ->get()
                    ->map(function ($file) {
                        $file->delivery = Delivery::where('file_id', $file->group_file->id)
                        ->whereHas('groupStudent', function ($query) {
                            $query->where('student_id', $this->user->student->user_id);
                        })
                        ->first();
                        return $file;
                    });
            });
        });
        foreach ($assignements as $assignement) {
            if ($assignement->delivery) {
                $this->assignementssent++;
            } else {
                $this->assignementsnotsent++;
            }
        }
    }
    public function render()
    {
        return view('livewire.student.stud-stastistics');
    }
}
