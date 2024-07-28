<?php

namespace App\Livewire\ManagementOFSechedules;

use App\Models\AcademicYear;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class ClassesSechedules extends Component
{
    use WithFileUploads;
    public $schedule;
    public $AcademicYear;
    public $uplodedFile;

    public function mount()
    {
        $this->AcademicYear = AcademicYear::currentAcademicYear();
        $this->setSchedule();
    }

    public function uploadFileSave()
    {
        $this->validate([
            'uplodedFile' => 'required|file|mimes:pdf,docx,doc|max:10240',
        ]);
        if ($this->uplodedFile) {
            $file = $this->uplodedFile->store('schedules');
            unlink($this->uplodedFile->getRealPath());
        }
        $this->AcademicYear->schedule = $file;
        $this->AcademicYear->save();
        $this->setSchedule();

        $this->uplodedFile = null;
    }

    public function deleteFile()
    {
        $this->AcademicYear->schedule = null;
        $this->AcademicYear->save();
        $this->setSchedule();
    }

    public function downloadFile()
    {
        if ($this->schedule && Storage::exists($this->schedule)) {
            return Storage::download($this->schedule, 'schedule' . '.' . pathinfo($this->schedule, PATHINFO_EXTENSION));
        } else {
            $this->dispatch('error', __('general.file_not_found'));
        }
    }

    public function setSchedule()
    {
        if ($this->AcademicYear->schedule) {
            $this->schedule = $this->AcademicYear->schedule;
        } else {
            $this->schedule = null;
        }

        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.managementOFsechedules.classes-sechedules');
    }
}
