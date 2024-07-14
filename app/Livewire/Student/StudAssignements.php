<?php

namespace App\Livewire\Student;

use App\Models\Delivery;
use App\Models\File;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
// use Livewire\Attributes\WithFileUploads;
use Livewire\WithFileUploads;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Tools\MyApp;
use Illuminate\Support\Facades\Storage;

class StudAssignements extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search;
    public $perPage = MyApp::perPageLists;
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


    #[On('search')]
    public function search($v)
    {
        $this->search = $v;
    }

    public function send($id)
    {
        // dd(!(isset($this->comment[$id]) &&!( $this->comment[$id] == null|| empty($this->comment[$id]) )));
        $this->validate([
            'file.' . $id => !(isset($this->comment[$id]) &&!( $this->comment[$id] == null|| empty($this->comment[$id]) )) ? 'required|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,txt,zip,rar,7z|max:10240' : 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,txt,zip,rar,7z|max:10240',
            'comment.' . $id => !(isset($this->file[$id]) && !($this->file[$id] == null|| empty($this->file[$id]))) ? 'required|string|max:255' : 'nullable|string|max:255',
        ]);
        // dd('skip');
        $file = null;
        $comment = null;
        if (isset($this->file[$id])&& !($this->file[$id] == null|| empty($this->file[$id]))) {
            $file = $this->file[$id]->store('files');
        }
        if (isset($this->comment[$id]) && !($this->comment[$id] == null|| empty($this->comment[$id]))) {
            $comment = $this->comment[$id];
        }
    //    $groupStudent = $this->user->student->groups->filter(function ($group) use ($id){
    //         return $group->groupSubjects->filter(function ($groupSubject) use ($id){
    //             return $groupSubject->getFilesInGroupBySubject('assignment', $this->search)
    //             ->where('is_active', 1)
    //             ->where('id', $id)
    //             ;
    //         });
    //     })->filter(function ($group){
    //         return $group->groupStudents->filter(function ($groupStudent) {
    //             return $groupStudent->student_id == $this->user->student->id;
    //         });
    //     })->first()->id;
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
        $this->file = [];
        $this->comment = [];
        $this->dispatch('closeModal');

    }

    public function getAssignementsProperty()
    {

        $assignments = $this->user->student->groups->flatMap(function ($group) {
            return $group->groupSubjects->flatMap(function ($groupSubject) {
                return $groupSubject->getFilesInGroupBySubject('assignment', $this->search)
                ->where('is_active', 1)
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
        // dd($assignments);
        // $assignments = $this->user->student->groups->flatMap(function ($group) {
        //     return $group->groupSubjects->flatMap(function ($groupSubject) {
        //         $files = $groupSubject->getFilesInGroupBySubject('assignment', $this->search)
        //             ->where('is_active', 1)
        //             ->get();
        //         return $files;
        //     });
        // })->map(function ($file) {
        //     $file->delivery = Delivery::where('file_id', $file->group_file->id)
        //         ->whereHas('groupStudent', function ($query){
        //             $query->where('student_id', $this->user->student->user_id);
        //         })
        //         ->first();

        //         // dd($file->delivery);
        //     if ($this->activeTab === 'all') {
        //         return $file;
        //     }

        //     if ($this->activeTab === 'not_delivered' && !$file->delivery) {
        //         return $file;
        //     }

        //     if ($this->activeTab === 'delivered' && $file->delivery) {
        //         return $file;
        //     }

        //     return null;

        // })
        // ->filter(function ($file) { // Remove null values
        //     return $file !== null;

        // });
// dd($assignments);
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = $this->perPage;
        $currentPageItems = $assignments->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $assignments = new LengthAwarePaginator($currentPageItems, $assignments->count(), $perPage, $currentPage);
        // dd($assignments);
        return $assignments;
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
