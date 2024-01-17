<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Queue\Events\JobPopping;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class CreateStudentFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $file , $data = ['password'=>'1230',"gender"=>'male'],$headerRow;
    public $filePath;
    public function __construct($file,array $data)
    {
        //
        $this->file = $file;
        $this->data = array_merge($this->data, $data);
    }
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // $user = array();
        // try {
            
        //     $spreadsheet = IOFactory::load(Storage::path($this->file));
        //     $sheetData = $spreadsheet->getSheet(0)->toArray();
        //     $headerRow = array_shift($sheetData); // استخراج صف العناوين

        //     $arabicColumns = ['الرقم الجامعي', 'الاسم', 'اللقب', 'كلمة المرور','اسم المستخدم','الايميل', 'الجنس'];
        //     $englishColumns = ['id', 'name', 'last_name', 'password','username',"email", 'gender'];
    
        //     $user = [];
        //     foreach ($sheetData as $row) {
        //         $user = $this->data;
        //         foreach ($row as $index => $cell) {
        //             $cell = trim($cell);
        //             $column =$this->getColumnName(trim($headerRow[$index]), $arabicColumns, $englishColumns);

        //             if($column&&$cell){
        //                 if($column == 'id'){
        //                     if(preg_match('/^\d{2}_\d{2}_\d{4}$/', $cell))
        //                         $cell = str_replace('_', '', $cell);
        //                     elseif(!preg_match('/^\d{8}$/', $cell))
        //                         continue;
        //                 }
        //                 elseif($column == 'name'&&preg_match('/^[\p{L}\s]+$/u', $cell)){
        //                     if(str_word_count($cell, 0, 'أبجدية عربية')>=4&&(array_search('last_name', $headerRow)===false &&array_search('اللقب', $headerRow)===false)){
        //                         $cell = trim($cell);
        //                         $spletted = explode(' ', $cell);
        //                         $user["last_name"] = $spletted[sizeof($spletted)-1];
        //                         $cell = str_replace(' '.$user["last_name"], '', $cell);
        //                         $user[$column] = $cell;
        //                     }
        //                 }elseif($column == 'last_name'&&preg_match('/^[\p{L}\s]+$/u', $cell)){
        //                     $user[$column] =$cell;
        //                 }else
        //                     $user[$column] = $cell;
        //             } else {
        //                 continue;
        //             }
            
                    
        //         }
            
        //         Student::create_student($user);
        //     } 
        // } catch (\Exception $e) {
        //     throw $e;
        // } finally{
        //     Storage::delete($this->file);
        // }

        $user = [];
    try {
        
        $this->filePath = Storage::path($this->file);
    
        if (!file_exists($this->filePath)) {
        Log::error("File does not exist: $this->filePath");
        return;
        }
            
        $spreadsheet = IOFactory::load($this->filePath);
        $sheetData = $spreadsheet->getSheet(0)->toArray();
        $this->headerRow = $headerRow = array_shift($sheetData);

        $arabicColumns = ['الرقم الجامعي', 'الاسم', 'اللقب', 'كلمة المرور', 'اسم المستخدم', 'الايميل', 'الجنس'];
        $englishColumns = ['id', 'name', 'last_name', 'password', 'username', 'email', 'gender'];

        foreach ($sheetData as $row) {
            $userData = $this->data; // افتراض أن $this->data هو نوع معين من البيانات
            foreach ($row as $index => $cell) {
                      $cell = trim($cell);
                $column = $this->getColumnName(trim($headerRow[$index]), $arabicColumns, $englishColumns);

                if ($column && $cell) {
                    if (!$this->processCell($column, $cell, $userData))
                        continue 2;
                } else {
                    continue;
                }
            }
 
            Student::create_student($userData);
        }
        event(new JobPopping('this suss' ,$this));
    } catch (\Exception $e) {
        // Log the exception
        log::error('Error processing file: ' . $e->getMessage());
        // Send user notification of failure, etc...
        event(new JobFailed('this fail' ,$this, $e));
    } finally {
        // Delete the file
        Storage::delete($this->file);
    }
    }


    private function processCell(string $column, string $cell, array &$userData): bool
{
    // تنفيذ العمليات الضرورية هنا
    switch ($column) {
        case 'id':
            // الكود المتعلق بـ 'id'
            if (preg_match('/^\d{2}_\d{2}_\d{4}$/', $cell)) {
                $cell = str_replace('_', '', $cell);
            } elseif (!preg_match('/^\d{8}$/', $cell)) {
                return false ;
            }
            if (Student::where('user_id', $cell)->exists()??false) {
                return false;
            }
            break;
        case 'name':
            if (preg_match('/^[\p{L}\s]+$/u', $cell)) {
                if (str_word_count($cell, 0, 'أبجدية عربية') >= 4&& (array_search('last_name', $this->headerRow) === false && array_search('اللقب', $this->headerRow) === false)) {
                    $spletted = explode(' ', $cell);
                    $userData['last_name'] = $spletted[sizeof($spletted) - 1];
                    $cell = str_replace(' ' . $userData['last_name'], '', $cell);
                }
            } else {
                return false;
            }
            break;
        case 'last_name':
            if (str_word_count($cell, 0, 'أبجدية عربية') > 1 ) {
                return false;
            }
            break;
            case 'username':
                if(!preg_match('/^[a-zA-Z0-9_]{6,255}$/', $cell))
                    return false;
                break;
            case 'email':
                if(!filter_var($cell, FILTER_VALIDATE_EMAIL))
                    return false;
                break;
            case 'gender':
                if($cell!="male"&&$cell!="famale")
                    return false;
                break;
            
        
    }

    // إضافة القيمة المعالجة إلى المصفوفة النهائية
    $userData[$column] = $cell;
    return true;
}

    private function getColumnName($header, $arabicColumns, $englishColumns): ?string
    {
        // $language = Str::of($header)->contains($arabicColumns) ? 'arabic' : 'english';
        return Str::of($header)->contains($arabicColumns)?
            $englishColumns[array_search($header, $arabicColumns)]:(array_search($header, $englishColumns)!==false?
            $englishColumns[array_search($header, $englishColumns)]:null);

    }
    // public function failed(\Throwable $exception): void
    // {
    //     // Send user notification of failure, etc...
    //     session()->put('error', 'Error processing file: ' . $exception->getMessage());
    // }

    // private function completed():void
    // {
    //     // Send user notification of success, etc...
    //     session()->forget('message');
    //     session()->put('success', 'File processed successfully');
    // }
}
