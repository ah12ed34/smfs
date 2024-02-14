<?php

namespace App\Livewire\Globle\Levelsubject;

use App\Models\Subject;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\subjectLevel;
use Livewire\Attributes\On;

class AddSubject extends Component
{
    use WithPagination;


    public $level;
    public $select = [];
    public $selectAll = false;
    public $semester = [];
    public $isActivated = [];
    public $has_practical = [];
    public $search;
    public $perPage = 10;
    public $refresh = false;
    public $page = 1;
    public $upd = [];


    public function mount($level)
    {
        $this->level = $level;
        subjectLevel::where('level_id',$level->id)->get()->each(function($subject){
            $this->upd[$subject->subject_id] = false;
            $this->select[$subject->subject_id] = true;
            $this->semester[$subject->subject_id] = $subject->semester;
            $this->isActivated[$subject->subject_id] = $subject->isActivated == 1;
            $this->has_practical[$subject->subject_id] = $subject->has_practical == 1;
        });
        $this->page = request()->page ?? 1;

        $this->chechSelectAll();
    }
    public function updatedPerPage()
    {
        if(($this->subjects == null || $this->subjects->isEmpty()) && $this->page > 1){
            $this->dispatch('gotoPage');
        }

    }

    public function updatedSelect(){
        $this->chechSelectAll();
    }



    public function updatedPage($page)
    {
        $this->page = $page;
        $this->chechSelectAll();
    }

    public function updating($porporty,$value){
        $pro = explode('.',$porporty);
        if(in_array($pro[0],[ 'semester','isActivated','has_practical'])
            &&in_array($pro[1],array_keys($this->upd))){
                $this->upd[$pro[1]] = true;
                // dd($porporty,$value,$this->upd);
            }

    }

    public function updatedSelectAll($value)
    {
        $this->selectAll = $value;
        $this->subjects->each(function($subject){
            $this->select[$subject->id] = $this->selectAll;
        });
    }

    #[on('gotoPage')]
    public function resetPageIfNoResults($v = null)
    {
        if($v == null)
        {
            $this->dispatch('gotoPage', $this->subjects->lastPage());
        }
        $this->gotoPage($v);
    }

    // #[on('refresh')]
    // public function refresh()
    // {

    //     subjectLevel::where('level_id',$this->level->id)->get()->each(function($subject){
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
        }else{
            $this->chechSelectAll();
        }
    }

    public function chechSelectAll()
    {

        foreach($this->subjects as $subject)
        {
            if(!isset($this->select[$subject->id]) ||!$this->select[$subject->id]===true)
            {
                $this->selectAll = false;
                return;
            }
        }
        $this->selectAll = true;
    }

    public function save(){
        $data = [];
        $existionSubjectsIds = $this->level->subjects->pluck('id')->toArray();
        $date = now();

        foreach($this->select as $key => $value){
            if($value){
                if(!in_array($key,$existionSubjectsIds)){
                    array_push($data, ['subject_id'=>$key
                    ,'semester'=>$this->semester[$key]??1
                    ,'has_practical'=>$this->has_practical[$key]??false
                    ,'isActivated'=> $this->isActivated[$key]??true
                    ,'created_at'=>$date
                    ,'updated_at'=>$date
                    ]);
                }elseif($this->upd[$key]){
                    $subject = subjectLevel::where('level_id',$this->level->id)->where('subject_id',$key)->first();
                    $subject->semester = $this->semester[$key]??1;
                    $subject->has_practical = $this->has_practical[$key]??false;
                    $subject->isActivated = $this->isActivated[$key]?:true;
                    $subject->updated_at = $date;
                    $subject->save();
                }

            }
        }
        if(!empty($data)){
            // syncWithoutDetaching
            $this->level->subjects()->syncWithoutDetaching($data);

        }

        $unselected = array_diff($existionSubjectsIds,array_keys($this->select,true));
        if(!empty($unselected)){
            $this->level->subjects()->detach($unselected);
        }
        // $this->dispatch('refresh');
        // dd($data,$unselected);
    }
    public function getSubjectsProperty()
    {
        $subjects = Subject::whereIn('id', function($query)  {
            $query->select('subject_id')
                    ->from('subjects_levels')
                    ->where('level_id', $this->level->id)->orderBy('subject_id');
        })
        ->union(
            Subject::whereNotIn('id', function($query)  {
                $query->select('subject_id')
                        ->from('subjects_levels')
                        ->where('level_id', $this->level->id);
            })->where(function($query)  {
                $query->where('name_ar', 'like', "%$this->search%")
                        ->orWhere('name_en', 'like', "%$this->search%")
                        ->orWhere('id', 'like', "%$this->search%");
            })
        )->where(function($query)  {
            $query->where('name_ar', 'like', "%$this->search%")
                    ->orWhere('name_en', 'like', "%$this->search%")
                    ->orWhere('id', 'like', "%$this->search%");
        })
        ->paginate($this->perPage);

        return $subjects;
    }
    public function render()
    {

        return view('livewire.globle.levelsubject.add-subject',[
            'subjects' => $this->subjects
        ]);
    }
}
