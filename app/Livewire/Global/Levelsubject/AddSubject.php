<?php

namespace App\Livewire\global\Levelsubject;

use App\Models\Level;
use App\Models\Subject;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SubjectsLevels;
use Livewire\Attributes\On;

class AddSubject extends Component
{
    use WithPagination;


    public $level;
    public $select = [];
    public $term = null;
    public $selectAll = false;
    public $semester = [];
    public $isActivated = [];
    public $has_practical = [];
    public $search;
    public $perPage = 10;
    public $refresh = false;
    public $page = 1;
    public $upd = [];
    public $practical_grade = [];
    protected $listeners = ['refresh' => '$refresh', 'search'];

    public function mount(Level $level)
    {
        $this->level = $level;
        SubjectsLevels::where('level_id', $level->id)->get()->each(function ($subject) {
            $this->upd[$subject->subject_id] = false;
            $this->select[$subject->subject_id] = true;
            $this->semester[$subject->subject_id] = $subject->semester;
            $this->isActivated[$subject->subject_id] = $subject->isActivated == 1;
            $this->has_practical[$subject->subject_id] = $subject->has_practical == 1;
            $this->practical_grade[$subject->subject_id] = $subject->practical_grade;
        });
        $this->page = request()->page ?? 1;

        $this->chechSelectAll();
    }
    public function updatedPerPage()
    {
        if (($this->subjects == null || $this->subjects->isEmpty()) && $this->page > 1) {
            $this->dispatch('gotoPage');
        }
    }

    public function updatedSelect()
    {
        $this->chechSelectAll();
    }



    public function updatedPage($page)
    {
        $this->page = $page;
        $this->chechSelectAll();
    }

    public function search($v)
    {
        $this->search = $v;
        $this->page = 1;
    }
    public function updating($porporty, $value)
    {
        $pro = explode('.', $porporty);
        if (
            in_array($pro[0], ['semester', 'isActivated', 'has_practical', 'practical_grade'])
            && in_array($pro[1], array_keys($this->upd))
        ) {
            $this->upd[$pro[1]] = true;
            // dd($porporty,$value,$this->upd);
        }
    }

    // public function updatingHasPractical($value,$key){
    //     // dd($value,$key);
    //     if($value){
    //         unset($this->practical_grade[$key]);
    //     }else{
    //         $this->practical_grade[$key] = '40';
    //     }
    // }
    public function updatedSelectAll($value)
    {
        $this->selectAll = $value;
        $this->subjects->each(function ($subject) {
            $this->select[$subject->id] = $this->selectAll;
        });
    }

    #[on('gotoPage')]
    public function resetPageIfNoResults($v = null)
    {
        if ($v == null) {
            $this->dispatch('gotoPage', $this->subjects->lastPage());
        }
        $this->gotoPage($v);
    }

    // #[on('refresh')]
    // public function refresh()
    // {

    //     SubjectsLevels::where('level_id',$this->level->id)->get()->each(function($subject){
    //         $this->upd[$subject->subject_id] = false;
    //         $this->select[$subject->subject_id] = true;
    //         $this->semester[$subject->subject_id] = $subject->semester;
    //         $this->isActivated[$subject->subject_id] = $subject->isActivated == 1;
    //         $this->has_practical[$subject->subject_id] = $subject->has_practical == 1;
    //     });

    // }
    public function updatedSearch()
    {
        if (($this->subjects == null || $this->subjects->isEmpty()) && $this->page > 1) {
            $this->dispatch('gotoPage', $this->subjects->lastPage());
        } else {
            $this->chechSelectAll();
        }
    }

    public function chechSelectAll()
    {

        foreach ($this->subjects as $subject) {
            if (!isset($this->select[$subject->id]) || !$this->select[$subject->id] === true) {
                $this->selectAll = false;
                return;
            }
        }
        $this->selectAll = true;
    }

    public function save()
    {
        $data = [];
        $existionSubjectsIds = $this->level->subjects->pluck('id')->toArray();
        $date = now();

        foreach ($this->select as $key => $value) {
            if ($value) {
                if (!in_array($key, $existionSubjectsIds)) {
                    array_push($data, [
                        'subject_id' => $key, 'semester' => $this->semester[$key] ?? 1, 'has_practical' => $this->has_practical[$key] ?? false, 'isActivated' => $this->isActivated[$key] ?? true, 'created_at' => $date, 'updated_at' => $date
                    ]);
                } elseif ($this->upd[$key]) {
                    $subject = SubjectsLevels::where('level_id', $this->level->id)->where('subject_id', $key)->first();
                    $subject->semester = $this->semester[$key] ?? 1;
                    $subject->has_practical = $this->has_practical[$key] ?? false;
                    $subject->isActivated = $this->isActivated[$key] ?: true;
                    if ($subject->has_practical) {
                        $subject->practical_grade = $this->practical_grade[$key] ?? 40;
                    } else {
                        $subject->practical_grade = null;
                    }
                    $subject->updated_at = $date;
                    $subject->save();
                }
            }
        }
        if (!empty($data)) {
            // syncWithoutDetaching
            $this->level->subjects()->syncWithoutDetaching($data);
        }

        $unselected = array_diff($existionSubjectsIds, array_keys($this->select, true));
        if (!empty($unselected)) {
            $this->level->subjects()->detach($unselected);
        }
        // $this->dispatch('refresh');
        // dd($data,$unselected);
    }
    public function getSubjectsProperty()
    {
        // $subjects =
        // // Subject::whereIn('id', function($query)  {
        // //     $query->select('subject_id')
        // //             ->from('subjects_levels')
        // //             ->where('level_id', $this->level->id)->orderBy('subject_id');
        // // })
        // // ->union(
        // //     Subject::whereNotIn('id', function($query)  {
        // //         $query->select('subject_id')
        // //                 ->from('subjects_levels')
        // //                 ->where('level_id', $this->level->id);
        // //     })->where(function($query)  {
        // //         $query->where('name_ar', 'like', "%$this->search%")
        // //                 ->orWhere('name_en', 'like', "%$this->search%")
        // //                 ->orWhere('id', 'like', "%$this->search%");
        // //     })
        // // )->where(function($query)  {
        // //     $query->where('name_ar', 'like', "%$this->search%")
        // //             ->orWhere('name_en', 'like', "%$this->search%")
        // //             ->orWhere('id', 'like', "%$this->search%");
        // // })
        // Subject::join('subjects_levels', 'subjects_levels.subject_id', '=', 'subjects.id')
        // ->where('subjects_levels.level_id', $this->level->id)
        // ->where(function ($query) {
        //     $query->where('subjects.name_ar', 'like', '%' . $this->search . '%')
        //         ->orWhere('subjects.name_en', 'like', '%' . $this->search . '%')
        //         ->orWhere('subjects.id', 'like', '%' . $this->search . '%');
        // })->select('subjects.*','subjects_levels.*','subjects.id as id')
        // ->union(
        //     Subject::join('subjects_levels', 'subjects_levels.subject_id', '=', 'subjects.id')
        //     ->where('subjects_levels.level_id', $this->level->id)

        // )->select('subjects.*','subjects_levels.*','subjects.id as id')
        // ->paginate($this->perPage);
        // dd($subjects);
        $subjects = Subject::leftJoin('subjects_levels', function ($join) {
            $join->on('subjects_levels.subject_id', '=', 'subjects.id')
                ->where('subjects_levels.level_id', $this->level->id);
        })->when($this->term, function ($query) {
            $query->where('subjects_levels.semester', $this->term)
                ->orWhereNull('subjects_levels.semester');
        })
            ->where(function ($query) {
                $query->where('subjects.name_ar', 'like', "%$this->search%")
                    ->orWhere('subjects.name_en', 'like', "%$this->search%")
                    ->orWhere('subjects.id', 'like', "%$this->search%");
            })->addSelect('subjects.*', 'subjects_levels.*', 'subjects.id as id')
            ->orderByRaw("CASE WHEN subjects_levels.level_id IS NOT NULL THEN 0 ELSE 1 END")
            ->orderBy('subjects_levels.semester')
            ->paginate($this->perPage);

        // dd($subjects);

        return $subjects;

        return $subjects;
    }
    public function render()
    {

        return view('livewire.global.levelsubject.add-subject', [
            'subjects' => $this->subjects
        ]);
    }
}
