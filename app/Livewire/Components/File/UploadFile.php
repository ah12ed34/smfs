<?php

namespace App\Livewire\Components\File;

use App\Traits\File\Uploadable;
use Livewire\Component;

class UploadFile extends Component
{
    use Uploadable;

    public function mount()
    {
        $this->initializeUploadFrontEnd();
    }

    public function saveFile()
    {
        $this->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        $this->uploadFile();

        if($this->pathFile){
            $this->prossingFile();
        }


    }
    public function render()
    {
        return view('livewire.components.file.upload-file');
    }
}
