<?php

namespace App\Livewire\Student\StudStudyingBooks;

use App\Models\Group;
use App\Models\GroupSubject;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Tools\MyApp as myapp;
use App\Models\File;

class StudBooksChapters extends Component
{
    use WithPagination;
    public $group_subject;
    public $search;
    public $perPage = myapp::perPageLists;
    public $practical = false;
    public function mount($id)
    {
        $this->group_subject = GroupSubject::where('id', $id)
            // ->where('practical', $this->practical)
            ->firstOrFail();
        if (request()->has('practical') && $this->group_subject->has_practical) {
            if (request()->practical == 'false') {
                $this->practical = false;
            } else {
                $this->practical = true;
            }
            // dd($this->practical);
        }
        $this->group_subject->students()->where('user_id', auth()->id())
            ->firstOrFail();

        if (request()->has('perPage')) {
            if (request()->perPage == 'all') {
                $this->perPage = $this->chapters->count();
            } elseif (is_numeric(request()->perPage)) {
                $perPage = request()->perPage;
                if ($perPage > 0) {
                    $this->perPage = $perPage;
                }
            }
        }
        // dd($this->group_subject->subjects);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    #[On('search')]
    public function search($v)
    {
        $this->search = $v;
    }

    public function download($id)
    {
        $file = $this->group_subject->files()->find($id);
        // dd($this->group_subject->subject());
        if (!$file || !Storage::exists($file->file)) {
            $this->dispatch('error', __('general.file_not_found'));
            return;
        }
        return Storage::download($file->file, $file->name . '-' . $this->group_subject->subject()->name_en);
    }

    public function getChaptersProperty()
    {
        // $groupSubjects = File::join('group_files', 'files.id', '=', 'group_files.file_id')
        //     ->join('group_subjects', 'group_files.group_subject_id', '=', 'group_subjects.id')
        //     ->where('group_subjects.practical', $this->practical)
        //     ->where('group_subjects.group_id', $this->group_subject->group_id)
        //     ->where('group_subjects.subject_id', $this->group_subject->subject_id)
        //     ->where('files.type', 'chapter')
        //     ->where('files.name', 'like', '%' . $this->search . '%')
        //     ->select('files.*')
        //     ->paginate($this->perPage);

        // return $groupSubjects;
        $group_id = null;
        if ($this->practical) {
            if ($this->group_subject->is_practical) {
                $group_id = $this->group_subject->group_id;
            } else {
                $group_id = Group::where('groups.group_id', $this->group_subject->group_id)
                    ->join('group_students', 'groups.id', '=', 'group_students.group_id')
                    ->where('group_students.student_id', auth()->id())
                    ->first()->group->id;
                // dd($group_id);
            }
        } else {
            if ($this->group_subject->is_practical) {
                $group_id = Group::where('groups.id', $this->group_subject->group_id)
                    ->join('group_students', 'groups.id', '=', 'group_students.group_id')
                    ->where('group_students.student_id', auth()->id())
                    ->first()->group_id;
            } else {
                $group_id = $this->group_subject->group_id;
            }
        }
        $file = GroupSubject::where('subject_id', $this->group_subject->subject_id)
            ->where('group_id', $group_id)
            ->where('is_practical', $this->practical)
            ->first();
        if (!$file) {
            if ($this->practical) {
                redirect()->route(
                    request()->route()->getName(),
                    ['id' => $this->group_subject->id]
                );
            } else {
                redirect()->route(
                    request()->route()->getName(),
                    ['id' => $this->group_subject->id, 'practical' => 'false']
                );
            }
            return [];
        }
        $file = $file
            ->files()->where('type', 'chapter')
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate($this->perPage);
        return $file;
    }
    public function render()
    {
        return view('livewire.student.stud-studying-books.stud-books-chapters', [
            'chapters' => $this->chapters,
        ]);
    }
}
