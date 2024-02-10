<?php

namespace App\Jobs;

use App\Events\ProgressData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;
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
    public $id;
    public function __construct($file,array $data,$id)
    {
        //
        $this->file = $file;
        $this->data = array_merge($this->data, $data);
        $this->id = $id;
    }
    /**
     * Execute the job.
     */
    public function handle(): void
    {
    try {

        $this->filePath = Storage::path($this->file);

        if (!file_exists($this->filePath)) {
       $this->eventPDHQ([
            'Progress' => 1,
            'status' => 'failed',
            'log' => 'File not found',
       ]);
        return;
        }

        $spreadsheet = IOFactory::load($this->filePath);
        $sheetData = $spreadsheet->getSheet(0)->toArray();
        $this->headerRow = $headerRow = array_shift($sheetData);

        $arabicColumns = ['الرقم الجامعي', 'الاسم', 'اللقب', 'كلمة المرور', 'اسم المستخدم', 'الايميل', 'الجنس'];
        $englishColumns = ['id', 'name', 'last_name', 'password', 'username', 'email', 'gender'];
        $this->eventPDHQ([
            'Progress' => 0,
            'status' => 'processing',
            'log' => 'start processing file',
        ]);
        $i = 0;
        foreach ($sheetData as $row) {
            $i++;
            $userData = $this->data; // افتراض أن $this->data هو نوع معين من البيانات
            foreach ($row as $index => $cell) {
                    $cell = trim($cell);
                $column = $this->getColumnName(trim($headerRow[$index]), $arabicColumns, $englishColumns);
                $statusError = '';
                if ($column && $cell) {
                    if (!$this->processCell($column, $cell, $userData,$statusError)){
                        $log = ($statusError)? $statusError .' '. $cell  :'Error processing file: ' . $column . ' ' . $cell . PHP_EOL .print_r($userData, true);
                        $this->eventPDHQ([
                            'Progress' => 10,
                            'status' => 'processing',
                            'log' => $log,
                        ]);
                        continue 2;
                    }

                }else {
                    continue;
                }
            }

            Student::create_student($userData);
            if (sizeof($sheetData)>=10 &&$i % 10 == 0) {
                $this->eventPDHQ([
                    'Progress' => $i / sizeof($sheetData) * 100,
                    'status' => 'processing',
                    'log' => $i . ' of ' . sizeof($sheetData) . ' processed successfully',
                ]);
            }
        }
        if($i==0){
            $this->eventPDHQ([
                'Progress' => 10,
                'status' => 'failed',
                'log' => 'Error processing file: ' . 'no data found',
            ]);

        }else
        $this->eventPDHQ([
            'Progress' => 100,
            'status' => 'completed',
            'log' => 'File processed successfully '.$i,
        ]);
    } catch (\Exception $e) {
        // Log the exception
        log::error('Error processing file: ' . $e->getMessage());
        // Send user notification of failure, etc...
        $this->eventPDHQ([
            'id' => $this->id,
            'Progress' => 10,
            'status' => 'failed',
            'log' => 'Error processing file: Exception ' . $e->getMessage(),
        ]);
    } finally {
        // Delete the file
        Storage::delete($this->file);

    }

    }


    private function processCell(string $column, string $cell, array &$userData,string &$statusError): bool
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
                $statusError = 'user_id already exists';
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
    /**
     * @propraty array [
     *       'user_id' => $data['id'] ,
     *       'file' => $this->file,
     *       'Progress' => $data['Progress'],
     *       'status' => $data['status'],
     *       'log' => $data['log'],
     *   ]
     */
    protected function eventPDHQ($data){
        event(new ProgressData([
            'user_id' => $this->id,
            'file' => $this->file,
            'Progress' => $data['Progress'],
            'status' => $data['status'],
            'log' => $data['log']??null,
        ]));
    }
    public function failed(\Exception $e = null)
    {
    //handle error
    if($this->file){
        Storage::delete($this->file);
    }

    $this->eventPDHQ([
        'Progress' => 10,
        'status' => 'failed',
        'log' => 'Error processing file: ' . $e->getMessage(),
    ]);
}
}
