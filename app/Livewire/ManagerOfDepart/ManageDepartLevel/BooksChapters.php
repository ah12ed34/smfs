<?php

namespace App\Livewire\ManagerOFdepart\Managedepartlevel;

use App\Models\AcademicYear;
use App\Models\Level;
use App\Traits\Searching;
use App\Models\SubjectsLevels;
use App\Traits\Searchable;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class BooksChapters extends Component
{
    use Searchable;
    public $level;
    public $group_subject;
    public $level_subjects;
    public function mount(Level $level,SubjectsLevels $level_subject)
    {
        $this->level = $level;
        $this->level_subjects = $level_subject;
    }

    public function getChaptersProperty()
    {
        $books =
            $this->level_subjects->groupSubjects->where('ay_id',AcademicYear::currentAcademicYear()->id)
            ->map(function($group_subject){
                return $group_subject
                ->files->where('type','chapter')
                ->map(function($file){
                    return $file;
                })->filter(function($file){
                    return $this->search == '' || str_contains($file->name,$this->search);
                })
                ;

            })->flatten()

            // ->paginate($this->perPage)
            ;


        return $books;
    }

    public function download($id,$any = null)
    {
        $file = $this->chapters->where('id',$id)->firstOrFail();
        if($any == null)
        {
            $filePath = $file->file;
        }else{
            $filePath = $file->file2;
        }
        if(Storage::exists($filePath))
        {
            return Storage::download($filePath,$file->name.  (($any == null) ? '' : ' Attachment'));
        }else{
            return back();
        }
    }
    public function render()
    {
        return view('livewire.managerOFdepart.managedepartlevel.books-chapters'
        ,[
            'chapters' => $this->chapters
        ]);
    }
}
