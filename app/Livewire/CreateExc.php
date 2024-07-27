<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\HistoryQueue;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Level;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Jobs\CreateStudentFile;
use Illuminate\Contracts\Session\Session;
use Livewire\Attributes\Validate;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Bus;


class CreateExc extends Component
{
    use WithFileUploads;
    protected $listeners = ['uploadAndDispatchJob', 'refresh', 'refreshComponent'];

    public $progress = 0;
    public $status;
    #[Validate]
    public $department_id;
    #[Validate]
    public $level_id;
    public $departments;
    public $levels;
    public $HistoryQueue;
    #[Validate]
    public $file;
    public $message = '';
    public $polling = false;
    protected $filePath;


    public function mount()
    {
        $this->departments = Department::all();
        if (!$this->departments) redirect()->route('department.create')->with(['error' => __('sysmass.create_department_first')]);
        $this->level($this->departments->first()->id);

        if (!$this->refreshComponent()) {
            $this->department_id = $this->departments->first()->id;
            $this->level_id = $this->levels->first()->id;
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function dpc()
    {
        $this->level();
    }


    public function level($id = null)
    {
        $this->levels = Level::where('department_id', $id ?? $this->department_id)->get();
        if ($this->levels->isEmpty()) {
            redirect()->route('level.create')->with(['error' => __('sysmass.create_level_first'), 'dep_id' => $this->department_id]);
        }
    }


    public function save()
    {
        $this->validate();
        $filePath = Storage::putFile('file/excel/create_student', $this->file);
        $this->file = $filePath;
        if (Storage::exists($filePath)) {
            try {
                HistoryQueue::create([
                    'user_id' => Auth::user()->id,
                    'file' => $filePath,
                    'status' => 'pending',
                    'Progress' => 0,
                ]);
                $this->filePath = Storage::path($this->file);

                if (!file_exists($this->filePath)) {
                    $this->HistoryQueue(1, 'failed', 'File not found');

                    return;
                }

                $spreadsheet = IOFactory::load($this->filePath);
                $sheetData = $spreadsheet->getSheet(0)->toArray();
                $headerRow = null;
                while (sizeof($sheetData) > 0) {
                    $headerRow = array_shift($sheetData);
                    if (sizeof($headerRow) > 0) {
                        $headerRow = array_map('trim', $headerRow);
                        foreach ($headerRow as $key => $value) {
                            $value = trim($value);
                            if (empty($value)) {
                                continue;
                            } elseif ($value == 'كود الطالب' || $value == 'id') {
                                break 2;
                            }
                        }
                    }
                }
                $sheetDataChunk = array_chunk($sheetData, 60);
                // $arabicColumns = ['كود الطالب', 'اسم الطالب', 'اللقب', 'كلمة المرور', 'اسم المستخدم', 'الايميل', 'النوع'];
                // $englishColumns = ['id', 'name', 'last_name', 'password', 'username, email', 'gender'];
                $data = array();
                $data['department_id'] = $this->department_id;
                $data['level_id'] = $this->level_id;
                $data['id'] = Auth::user()->id;
                $data['file'] = $this->file;
                $data['count'] = count($sheetDataChunk);
                $data['chunk'] = count($sheetDataChunk[0]);
                $data['sizeAll'] = count($sheetData);
                // $batch = Bus::batch([])->dispatch();

                $i = 0;
                foreach ($sheetDataChunk as $chunk) {
                    $i++;
                    $data['possition'] = $i;
                    // $batch->add(new CreateStudentFile($headerRow,$chunk,['department_id'=>$this->department_id,'level_id'=>$this->level_id],Auth::user()->id));
                    CreateStudentFile::dispatch($headerRow, $chunk, $data);
                }
                // Session()->put('batch_id', $batch->id);

            } catch (\Exception $e) {
                Storage::delete($filePath);
                $this->HistoryQueue(1, 'failed', $e->getMessage());
                // dd($e);
            }

            // CreateStudentFile::dispatch($filePath,['department_id'=>$this->department_id,'level_id'=>$this->level_id],Auth::user()->id);
        }
        $this->mount();
    }

    public function HistoryQueue($progress, $status, $log)
    {
        $hQ = HistoryQueue::where('user_id', auth()->user()->id)->where('file', $this->filePath)->first();

        if ($hQ) {
            $hQ->Progress = $progress;
            $hQ->status = $status;
            if (!empty($log)) {
                // $hQ->log += ' \n ' . $event->log;
                if (empty($hQ->log)) {
                    $hQ->log = $log;
                } else
                    $hQ->log .= PHP_EOL . $log;
            }

            $hQ->save();
        } else {
            HistoryQueue::create([
                'user_id' => auth()->user()->id,
                'file' => $this->filePath,
                'Progress' => $progress,
                'status' => $status,
                'log' => $log ?? null,
            ]);
        }
    }



    public function rules()
    {
        return [
            'file' => 'required|mimes:xlsx,xls',
            'department_id' => 'required|exists:departments,id',
            'level_id' => 'required|exists:levels,id',
        ];
    }


    public function render()
    {
        return view('livewire.create-exc');
    }


    public function refreshComponent()
    {
        if ($this->HistoryQueue)
            $this->HistoryQueue->refresh();
        else
            $this->HistoryQueue = HistoryQueue::where('user_id', Auth::user()->id)->whereIn('status', ['pending', 'processing'])->first();

        if ($this->HistoryQueue) {
            $this->progress = $this->HistoryQueue->Progress;
            $this->status = $this->HistoryQueue->status;
            $this->message = $this->HistoryQueue->log;
            $this->pollLivewire();
        }
        return $this->HistoryQueue ? true : false;
    }

    public function pollLivewire()
    {
        if ($this->status == 'completed' || $this->status == 'failed') {
            $this->polling = false;
        } else {
            $this->polling = true;
        }

        $this->dispatch('refreshComponent');
    }
}
