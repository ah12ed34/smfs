<?php

namespace App\Traits;

use App\Tools\MyApp;
use App\Models\Group;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

trait Groupsable
{
    use WithFileUploads;

    public $groupDitails;

    public $GId;
    public $name;
    public $level_id;
    public $gender;
    public $max_students;
    public $system;
    public $schedule;
    public $group_id;

    public $openType ;

    public function selected($id){
        $this->groupDitails = Group::where('id',$id)->firstOrFail();
        $this->openType = 'selected';
    }

    public function showGroup($id)
    {   $this->groupDitails->show = true;
        $this->selected($id);
        $this->openType = 'show';
    }

    // public function addGroup()
    // {
    //     if($this->groupDitails){
    //         $this->resetGroup();
    //     }
    // }

    public function deleteGroup()
    {
        $this->groupDitails->delete();
        $this->dispatch('closeModal');
    }

    public function editGroup($id)
    {
        $this->resetGroup('edit',$id);
        $this->selected($id);


        $this->GId = $this->groupDitails->id;
        $this->name = $this->groupDitails->name;
        $this->level_id = $this->groupDitails->level_id;
        $this->gender = $this->groupDitails->gender;
        $this->max_students = $this->groupDitails->max_students;
        $this->system = $this->groupDitails->system;
        $this->schedule = $this->groupDitails->schedule;
        $this->group_id = $this->groupDitails->group_id;



        $this->groupDitails->edit = true;
        $this->openType = 'edit';

    }

    public function resetGroup($type = 'add', $id = null)
    {
        if($this?->groupDitails?->id != $id||!$id){
        $this->reset([
            'GId',
            'name',
            'level_id',
            'gender',
            'max_students',
            'system',
            'schedule',
            'group_id',
        ]);
        }
        if($this?->openType != $type||$this?->groupDitails?->id != $id||!$id){
            $this->resetErrorBag();
        }
    }

    private function valdation()
    {
        return $this->validate([
            'GId' => 'nullable|integer|unique:groups,id,' . $this->groupDitails?->id,
            'name' => 'required|string',
            'level_id' => 'required|integer|exists:levels,id',
            'gender' => 'required|string|in:male,female,all',
            'max_students' => 'required|integer|min:1',
            'system' => 'required|string|in:general,parallel,all',
            'schedule' => 'nullable|file|mimes:' . MyApp::getFileMime('schedule'),
            'group_id' => 'nullable|integer|exists:groups,id',
        ]);
    }

    public function uploadeSchedule()
    {
        if ($this->schedule) {
            $photo = null;
            try {

                    $photo = $this->schedule->store('groups/schedule');
                    $this->groupDitails->schedule = $photo;

            } catch (\Exception $e) {
                $this->addError('schedule', $e->getMessage());
            }finally{
                Storage::delete($this->schedule->getRealPath());
            }
        }
    }

    public function saveGroup($type = 'add')
    {
        $this->valdation();
        $this->uploadeSchedule();
        $data = [
            'id' => $this->GId??null,
            'name' => $this->name,
            'level_id' => $this->level_id,
            'gender' => $this->gender,
            'max_students' => $this->max_students,
            'system' => $this->system,
            'schedule' => $this?->groupDitails?->schedule??null,
            'group_id' => $this->group_id,
        ];
        if($type == 'add'){
            Group::create($data);
        }elseif($type == 'edit'){
            Group::updated($data);
        }
        $this->dispatch('closeModal');
    }

    public function setGender($gender)
    {
        if(in_array($gender,MyApp::getStudentGenders(only:'key'))){
            $this->gender = $gender;
        }
    }
    public function setSystem($id)
    {
        if(in_array($id,array_merge(MyApp::getSystems(only:'key'),['all']))){
            $this->system = $id;
        }
    }
}
