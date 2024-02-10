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
use Illuminate\Support\Str;


class CreateExc extends Component
{
    use WithFileUploads;
    protected $listeners = ['uploadAndDispatchJob','refresh','refreshComponent'];

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

    public function mount()
    {
        $this->departments = Department::all();
        if(!$this->departments)redirect()->route('department.create')->with(['error' => __('sysmass.create_department_first')]);
        $this->level($this->departments->first()->id);

        if(!$this->refreshComponent()){
            $this->department_id = $this->departments->first()->id;
            $this->level_id = $this->levels->first()->id;
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function dpc(){
        $this->level();
    }


    public function level($id = null){
        $this->levels = Level::where('department_id',$id ?? $this->department_id)->get();
        if($this->levels->isEmpty()){
            redirect()->route('level.create')->with(['error' => __('sysmass.create_level_first'),'dep_id' => $this->department_id]);
        }
    }


    public function save()
    {
        $this->validate();
        $filePath = Storage::putFile('public/file/excel/create_student', $this->file);
        if(Storage::exists($filePath)){
            try{
                HistoryQueue::create([
                'user_id' => Auth::user()->id,
                'file' => $filePath,
                'status' => 'pending',
                'Progress' => 0,
            ]);
            }catch(\Exception $e){
                dd($e);
            }
            CreateStudentFile::dispatch($filePath,['department_id'=>$this->department_id,'level_id'=>$this->level_id],Auth::user()->id);
        }
        $this->mount();
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


    public function refreshComponent(){
        if($this->HistoryQueue)
            $this->HistoryQueue->refresh();
        else
        $this->HistoryQueue = HistoryQueue::where('user_id',Auth::user()->id)->whereIn('status', ['pending','processing'])->first();

        if($this->HistoryQueue){
            $this->progress = $this->HistoryQueue->Progress;
            $this->status = $this->HistoryQueue->status;
            $this->message = $this->HistoryQueue->log; ;
            $this->pollLivewire();
        }
        return $this->HistoryQueue ? true : false;
    }

    public function pollLivewire()
    {
        if($this->status == 'completed' || $this->status == 'failed'){
            $this->polling = false;
        }else{
            $this->polling = true;
        }

        $this->dispatch('refreshComponent');


    }

}
