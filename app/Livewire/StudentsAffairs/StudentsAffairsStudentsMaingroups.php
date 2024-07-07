<?php

namespace App\Livewire\StudentsAffairs;


use App\Models\Level;
use Livewire\Component;
use App\Traits\Searchable;
use App\Traits\Groupsable;
class StudentsAffairsStudentsMaingroups extends Component
{
    use
    Searchable,
    Groupsable;
    public $level;
    // public $typeGroup;
    public $allGroups;
    public $currentAcademicYear;
    public function __construct()
    {
        $this->initializeGroupsable();
        $this->PracticalOrTheoretical();
    }

    public function mount(Level $LId)
    {
        $this->level = $LId;
        $this->allGroups = $this->level->groups->whereNull('group_id');
        $this->sortField = 'name';
        if(request()->has('type')){
            $type = request()->type;
            if(in_array($type,['main','sub'])){
                $this->typeGroup = $type;
            }
        }
        if($this->typeGroup == 'sub'){
            $this->sortField = 'group_id';
        }
        // dd($this->typeGroup);
        $this->currentAcademicYear = $this->StudentR->getAYear();

    }

    public function addGroup()
    {
        $this->level_id = $this->level->id;
        if($this?->groupDitails&&$this?->openType != 'add'){
            $this->resetGroup('add');
            $this->openType = 'add';
        }
    }

    public function setSystem($id)
    {
        if(in_array($id,['general','parallel',"all"])){
            $this->system = $id;
        }
    }

    public function setGroup($id = null)
    {
        if($this->allGroups->contains($id)){
            $this->group_id = $id;
        }else{
            $this->group_id = null;
        }
        $this->level_id = $this->level->id;
    }

    public function getGroupsProperty()
    {
        $groups =  $this->level->groups()
        ->where(function ($q) {

            $q->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('id', 'like', '%' . $this->search . '%');
        })
        ->when($this->typeGroup != 'sub', function ($q) {
            $q->whereNull('group_id');
        }, function ($q) {
            $q->whereNotNull('group_id');
        })
        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
        ->paginate($this->perPage);

        return $groups;
    }
    public function render()
    {
        return view('livewire.students-affairs.students-affairs-students-maingroups'
        ,[
            'groups' => $this->groups
        ]);
    }
}
