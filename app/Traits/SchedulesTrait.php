<?php
namespace App\Traits;

use App\Models\Academic;
use Livewire\WithFileUploads;

trait SchedulesTrait
{
    use WithFileUploads;
    public $academicData;

    public $schedule;
    public $term_id ;
    public $nameSchedule = 'schedule';
    public $openType = null;

    public function initializeSchedules()
    {
        $this->nameSchedule = ($this->term_id == 1) ? 'schedule' : 'schedule2';
    }

    public function selectedSchedule($user_id,$delete = false)
    {
        if($this?->academicData?->user_id != $user_id){
            // reset Errors
            $this->resetErrorBag();
        }
        $this->academicData = Academic::findOrFail($user_id);

        $this->nameSchedule = ($this->term_id == 1) ? 'schedule' : 'schedule2';
        $this->openType = 'selected';
        // dd($this->academicData->{$this->nameSchedule});
        if($delete){
            // check if the schedule is not null
            if($this->academicData->{$this->nameSchedule} == null){
                $this->addError('schedule','The schedule is already empty');
                $this->openType = 'delete';
            }
        }
    }

    public function uploadSchedule($user_id)
    {
        $this->selectedSchedule($user_id);
        $this->openType = 'upload';
    }

    public function showSchedule($user_id)
    {
        $this->selectedSchedule($user_id);
        $this->openType = 'show';
    }

    public function uploadScheduleSave()
    {
        $this->validate([
            'schedule' => 'required|file|mimes:png,jpg,jpeg|max:2048',
        ]);

        $this->academicData->{$this->nameSchedule} = $this->schedule->store('schedules');
        $this->academicData->save();
        $this->resetSchedule();
        $this->dispatch('closeModal');
    }

    public function resetSchedule()
    {
        $this->openType = null;
        $this->schedule = null;
    }

    public function deleteSchedule()
    {
        if($this->academicData->{$this->nameSchedule} == null){
            return;
        }
        $this->academicData->{$this->nameSchedule} = null;
        $this->academicData->save();
        $this->resetSchedule();
        $this->dispatch('closeModal');
    }

}
