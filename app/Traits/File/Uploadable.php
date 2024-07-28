<?php

namespace App\Traits\File;

use App\Jobs\uploadFileJob;
use Livewire\Attributes\On;
use App\Models\HistoryQueue;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Repositories\FileRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;

trait Uploadable
{
    use WithFileUploads;
    // protected $listeners = ['refreshComponent', 'uploadAndDispatchJob'];
    public $file;
    public $path = 'files/temp';
    public $pathFile;


    public $uploadName = null;
    public $updateId = null;
    // prossing file
    public $position = 0;
    public $positionChunk = 0;
    public $sizeAll = 0;
    public $count = 0;
    public $chunk = 60;
    public $rows = [];
    public $headerRow = [];
    public $headerRowKeys = [];

    public $polling = false;
    public $progress = 0;
    public $status;
    public $message = '';
    public $HistoryQueue;


    protected $fileRep;

    public function initializeUpload()
    {
        $this->fileRep = new FileRepository();
    }

    public function initializeUploadFrontEnd()
    {
        $this->initializeUpload();
        $this->refreshComponent();
    }

    public function uploadFile()
    {
        if ($this->file) {
            $this->pathFile = $this->file->store($this->path);
        }
    }
    public function prossingFile()
    {
        $this->fileRep = new FileRepository();
        // dd($this->uploadName);
        $path = Storage::path($this->pathFile);
        if (!file_exists($path)) {
            new \Exception('File not found');
        }
        $spreadsheet = IOFactory::load($path);
        $sheetData = $spreadsheet->getSheet(0)->toArray();

        while (sizeof($sheetData) > 0) {
            $this->headerRow = array_shift($sheetData);
            $this->headerRowKeys = $this->fileRep->getArrayHeaderKey($this->headerRow);

            if ($this->headerRowKeys && isset($this->headerRowKeys['id'])) {
                break;
            }
        }
        $this->sizeAll = sizeof($sheetData);
        $rowsChunk = array_chunk($sheetData, $this->chunk);
        $this->count = sizeof($rowsChunk);
        $data = [
            'file' => $this->pathFile,
            'count' => $this->count,
            'chunk' => $this->chunk,
            'sizeAll' => $this->sizeAll,
            'id' => Auth::user()->id,
            'uploadName' => $this->uploadName,
        ];
        switch ($this->uploadName) {
            case 'students_upload_grades':
                $data['subject_id'] = $this->updateId;
                break;
            case 'students_upload':
                $data['department_id'] = $this->department_id;
                $data['level_id'] = $this->level_id;
                break;
        }
        foreach ($rowsChunk as $key => $rows) {
            $data['possition'] = $key + 1;
            $data['possitionChunk'] = sizeof($rows);
            uploadFileJob::dispatch($this->headerRowKeys, $rows, $data);
        }

        HistoryQueue::create([
            'user_id' => Auth::user()->id,
            'upload' => $this->uploadName,
            'file' => $this->pathFile,
            'status' => 'pending',
            'Progress' => 0,
        ]);
        $this->deleteFile($this->pathFile);
        $this->refreshComponent();
    }

    public function deleteFile($path)
    {
        Storage::delete($path);
    }

    public function getWarning()
    {
        return HistoryQueue::where('user_id', Auth::user()->id)
            ->where('upload', $this->uploadName)
            ->whereNotNull('read_at')
            ->where('status', 'warning')->orderBy('id', 'desc')->first();
    }
    #[on('refreshComponent')]
    public function refreshComponent()
    {
        if ($this->HistoryQueue)
            $this->HistoryQueue->refresh();
        else
            $this->HistoryQueue = HistoryQueue::where('user_id', Auth::user()->id)
                ->where('upload', $this->uploadName)
                ->whereIn('status', ['pending', 'processing'])->orderBy('id', 'desc')->first();

        if ($this->HistoryQueue) {
            if ($this->HistoryQueue?->status == 'pending') {
                if (DB::table('jobs')->count() == 0) {
                    $this->HistoryQueue->status = 'failed';
                    $this->HistoryQueue->save();
                }
            }
            $this->progress = $this->HistoryQueue->Progress;
            $this->status = $this->HistoryQueue->status;
            $this->message = $this->HistoryQueue->log;
            $this->pollLivewire();
            // dd($this->HistoryQueue);
        }
        return $this->HistoryQueue ? true : false;
    }

    public function pollLivewire()
    {
        $this->polling = !in_array($this->status, ['completed', 'failed']);
        // wite some time to refresh
        // try {
        //     sleep(5);
        // } catch (\Exception $e) {
        // }
        // $this->refreshComponent();
        $this->dispatch('refreshComponent');
    }
}
