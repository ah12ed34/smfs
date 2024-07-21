<?php

namespace App\Livewire\Student;

use App\Models\AcademicYear;
use App\Models\Delivery;
use App\Models\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Tools\MyApp;
use App\Traits\Searchable;
use Illuminate\Support\Facades\Storage;

class StudAssignements extends Component
{
    use WithFileUploads,Searchable;
    public $active;
    public $user;
    public $file = [];
    public $comment = [];
    // all, not_delivered, delivered
    public $activeTab = 'all';
    public $filter = [
        'subject' => null,
        'practical' => null,
    ];
    public $subjects = [];

    private $ay_id;
    private $semester;


    public function mount()
    {

        $this->user = auth()->user();
        if (request()->has('perPage')) {
            if (request()->perPage == 'all') {
                $this->perPage = $this->assignements->count();
            } elseif (is_numeric(request()->perPage)) {
                $perPage = request()->perPage;
                if ($perPage > 0) {
                    $this->perPage = $perPage;
                }
            }
        }

        if (request()->has('active')) {

                switch (request()->active) {
                    case 'notSent':
                        $this->activeTab = 'not_delivered';
                        break;
                    case 'send':
                        $this->activeTab = 'delivered';
                        break;
                    default:
                        $this->activeTab = 'all';
                        break;
                }
        }else{
            $this->activeTab = 'all';
        }
        if (request()->has('subject')) {
            $this->filter['subject'] = request()->subject;
        }else{
            $this->filter['subject'] = null;
        }
        if (request()->has('practical')) {
            // yes, no
            if(request()->practical == 'yes'||request()->practical == 'no')
                $this->filter['practical'] = request()->practical == 'yes'||!request()->practical == 'no';
            elseif(is_numeric(request()->practical))
                    $this->filter['practical'] = (bool)request()->practical;

        }

    }

    public function updatedAfterUpload()
    {
        $this->file = [];
        $this->comment = [];
        $this->resetPage($this->assignements->toArray()['current_page']);

    }
    public function send($id)
    {
        $this->validate([
            'file.' . $id => !(isset($this->comment[$id]) &&!( $this->comment[$id] == null|| empty($this->comment[$id]) )) ? 'required|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,txt,zip,rar,7z|max:10240' : 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,txt,zip,rar,7z|max:10240',
            'comment.' . $id => !(isset($this->file[$id]) && !($this->file[$id] == null|| empty($this->file[$id]))) ? 'required|string|max:255' : 'nullable|string|max:255',
        ]);
        $file = null;
        $comment = null;
        if (isset($this->file[$id])&& !($this->file[$id] == null|| empty($this->file[$id]))) {
            $file = $this->file[$id]->store('files');
            unlink($this->file[$id]->getPathname());
        }
        if (isset($this->comment[$id]) && !($this->comment[$id] == null|| empty($this->comment[$id]))) {
            $comment = $this->comment[$id];
        }

    $groupFile = $this->assignements->where('id', $id)->first()->group_file;
    $groupStudent = $groupFile->group_subject->group->groupStudents->where('student_id', $this->user->student->user_id)->first()->id;


        $send = Delivery::create([
            'student_group_id' => $groupStudent,
            'file' => $file,
            'file_id' => $groupFile->id,
            'delivery_date' => now(),
            'comment' => $comment,
        ]);

        // dd($send);
        if ($send) {
        $this->updatedAfterUpload();
        }
    }

    public function getAssignementsProperty()
    {
        $this->ay_id = AcademicYear::currentAcademicYear()->id;
        $this->semester = AcademicYear::getTerm();

        $assignments = $this->user->student->groups->flatMap(function ($group) {
            return $group->groupSubjects->flatMap(function ($groupSubject) {
                if($groupSubject->ay_id != $this->ay_id
                || $groupSubject->subjectLevel->semester != $this->semester)
                    return null;

                return $groupSubject->getFilesInGroupBySubject('assignment', $this->search)
                ->where('is_active', 1)
                // ->where('ay_id', AcademicYear::getAcademicYear()->id)
                ->get()->map(function ($file) {
                    $file = $file;
                    $file->subject_name = $file->group_file->group_subject->subject()->name_ar;
                    $file->subject_code = $file->group_file->group_subject->subject()->id;
                    $file->is_practical = $file->group_file->group_subject->is_practical==1;
                    $file->delivery = Delivery::where('file_id', $file->group_file->id)
                        ->whereHas('groupStudent', function ($query) {
                            $query->where('student_id', $this->user->student->user_id);
                        })
                        ->first();
                        // add subject [code,name] for $this->subjects
                        if(!$this->subjects||!in_array($file->subject_code, array_column($this->subjects, 'code'))){
                            $this->subjects[] = [
                                'code' => $file->subject_code,
                                'name' => $file->subject_name,
                            ];
                        }


                        if($this->filter['subject'] && $file->subject_code != $this->filter['subject'])
                            return null;
                        if(is_bool($this->filter['practical']) && $file->is_practical != $this->filter['practical']){
                            return null;
                        }


                        if($this->activeTab == 'all')
                            return $file;
                        if($this->activeTab == 'not_delivered' && !$file->delivery)
                            return $file;
                        if($this->activeTab == 'delivered' && $file->delivery)
                            return $file;
                    return null;

                })->filter(function ($file) { // Remove null values
                    return $file !== null;
                });
            });
        });
        return $assignments->paginate($this->perPage);
    }

    public function download($id)
    {
        if(!File::find($id))
            return abort(404);
        elseif(!Storage::exists(File::find($id)->file))
            return abort(404);
        return Storage::download(File::find($id)->file, File::find($id)->name . '.' . File::find($id)->extension);
    }



    public function render()
    {
                return view('livewire.student.stud-assignements'

            , [
                'assignements' => $this->assignements
            ]);
    }
}
