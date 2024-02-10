<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\studying;
use App\Models\Department;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Str;
use App\Jobs\CreateStudentFile;

class StudentController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('role:student')->only('index');
    }
    public function index()
    {
        //
        $filePath = Storage::path("public\std_IT4.xlsx");  
        // $cleanedPath = realpath ($filePath);
        // $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        // $file = Excel::import(new YourImportClass,$filePath,null,$extension);
        // $sheet = $file->sheet('Sheet1');
        // $data = $sheet->get();
       //////////////////////______________________________
        // $spreadsheet = IOFactory::load($filePath);
        // $sheetData =array_merge($spreadsheet->getSheet(0)->toArray());
        // $user = array();
        // $i = 0;
        // foreach ($sheetData as $key => $value) {
        //     if(!preg_match('/^\d{2}_\d{2}_\d{4}$|^\d{8}$/', $value[0]))
        //         continue;
        //     elseif($value[0] == null||$value[1] == null)
        //         continue;
        //     $i++;
        //     $user[$i]['id'] = str_replace('_', '', $value[0]);
        //     $spletted = explode(' ', $value[1]);
        //     $last_name = $spletted[sizeof($spletted)-1];
        //     $user[$i]['name'] =str_replace(' '.$last_name, '', $value[1]);
        //     $user[$i]['last_name'] =  $last_name;
        // }
        // dd($user,sizeof($user));
        ////////////////////__________________________________________
        
            try {
                $spreadsheet = IOFactory::load($filePath);
                $sheetData = $spreadsheet->getSheet(0)->toArray();
                $headerRow = array_shift($sheetData); // استخراج صف العناوين

                $arabicColumns = ['الرقم الجامعي', 'الاسم', 'اللقب', 'كلمة المرور','اسم المستخدم','الايميل', 'الجنس'];
                $englishColumns = ['id', 'name', 'last_name', 'password','username',"email", 'gender'];
        
                $user = [];
                foreach ($sheetData as $row) {
                    $user = ['password'=>1230];
                    foreach ($row as $index => $cell) {
                        
                        $column =$this->getColumnName(trim($headerRow[$index]), $arabicColumns, $englishColumns);
                
                        if($column != null&&$cell != null){
                            if($column == 'id'&&preg_match('/^\d{2}_\d{2}_\d{4}$|^\d{8}$/', $cell))
                                $cell = str_replace('_', '', $cell);
                            elseif($column == 'name'&&preg_match('/^[\p{L}\s]+$/u', $cell)){
                                if(str_word_count($cell, 0, 'أبجدية عربية')>=4&&(array_search('last_name', $headerRow)===false &&array_search('اللقب', $headerRow)===false)){
                                    $cell = trim($cell);
                                    $spletted = explode(' ', $cell);
                                    $user["last_name"] = $spletted[sizeof($spletted)-1];
                                    $cell = str_replace(' '.$user["last_name"], '', $cell);
                                }
                            }
                            $user[$column] = $cell;
                        } else {
                            continue;
                        }
                
                        
                    }
                
                   
                } 
                dd($user,$headerRow);
            } catch (\Exception $e) {
                throw $e;
            } 
        
        return 'student home';
    }
    private function getColumnName($header, $arabicColumns, $englishColumns): ?string
    {
        // $language = Str::of($header)->contains($arabicColumns) ? 'arabic' : 'english';
        return (Str::of($header)->contains($arabicColumns) ? 'arabic' : 'english')==='arabic'?
            $englishColumns[array_search($header, $arabicColumns)]:(array_search($header, $englishColumns)!==false?
            $englishColumns[array_search($header, $englishColumns)]:null);       

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $departments = Department::all();
        if($departments->isEmpty())
            return redirect()->route('department.create')->with('error',trans('error.create_department_first'));
        $levels =  Level::where('department_id', $departments->first()->id)->get();
        if($levels->isEmpty())
            return redirect()->route('level.create')->with('error',trans('error.create_level_first'));
        return view('academic.student.create', compact('departments', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
        $request->validate([
            'id'=>'required|numeric',
            'name' => 'required|string',
            'last_name' => 'required|string',
            'username' => 'nullable',
            'email' => 'nullable|email',
            'password' => 'required',
            'department_id' => 'required|numeric',
            'level_id' => 'required|numeric'
            ,]);
        try{
            if($request->hasFile('image'))
            $request['photo'] = $request->file('image')->store('images/profile', 'public');
            Student::create_student($request);

            return redirect()->route('student.create')->with('success', 'Student created successfully.');

        }catch(\Exception $e){
            echo($e->getMessage());
        }
            }
    public function storeExcel(Request $request){
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls|max:2048',
            'department_id' => 'required|numeric',
            'level_id' => 'required|numeric'
        ]);
        
        try {
            session()->flash('message', 'is processing file, please wait... ');
            $filePath = Storage::putFile('public/file/excel/create_student', $request->file('file'));
            if(Storage::exists($filePath)){
                CreateStudentFile::dispatch($filePath,['department_id'=>$request->department_id,'level_id'=>$request->level_id]);
            }
            
            return redirect()->route('home');
        } catch (\Exception $e) {
            return $e;
            return redirect()->route('student.create-excel')->with('error', 'Failed to create students.');
        }
    }
    public function createExcel()
    {
        //
        $departments = Department::all();
        if($departments->isEmpty())
            return redirect()->route('department.create')->with('error',trans('sysmass.create_department_first'));
        $levels =  Level::where('department_id', $departments->first()->id)->get();
        if($levels->isEmpty())
            return redirect()->route('level.create')->with('error',trans('sysmass.create_level_first'));
        return view('academic.student.createEx', compact('departments', 'levels'));

    }
    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
