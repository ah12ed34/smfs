<?php

namespace App\Repositories;


use App\Tools\MyApp;
use App\Models\GroupStudents;
use App\Models\GroupSubject;

use function Laravel\Prompts\text;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Repositories\AcademicYRepository;
use Illuminate\Contracts\Cache\Store;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

class FileRepository extends AcademicYRepository
{

    private $columnsMap = [
        'id' => ['الرقم', 'كود الطالب', 'الرقم الاكاديمي', 'الرقم الجامعي', 'الرقم الطلابي', 'الرقم الوظيفي', 'id', 'student_id', 'employee_id', 'user_id', 'id student', 'id employee', 'id user', 'كود الطالب', 'كود الموظف', 'كود المستخدم'],
        'name' => ['name', 'الاسم', 'اسم الطالب', 'اسم الموظف', 'اسم المستخدم', 'name employee', 'name student', 'name user', 'name_student', 'name_employee', 'name_user'],
        'last_name' => ['last_name', 'اللقب', 'last name', 'last name student', 'last name employee', 'last name user'],
        'birthday' => ['brithday', 'تاريخ الميلاد', 'brithday student', 'brithday employee', 'brithday user'],
        'email' => ['email', 'البريد الالكتروني', 'البريد', 'الايميل', 'email student', 'email employee', 'email user'],
        'phone' => ['phone', 'الهاتف', 'الجوال', 'phone student', 'phone employee', 'phone user'],
        'address' => ['address', 'العنوان', 'address student', 'address employee', 'address user'],
        'password' => ['password', 'كلمة المرور', 'password student', 'password employee', 'password user'],
        'group' => ['group', 'المجموعة', 'group student', 'group user'],
        'level' => ['level', 'المستوى', 'level student', 'level user'],
        'department' => ['department', 'القسم', 'department student', 'department user'],
        'system' => ['system', 'النظام', 'system student', 'system user'],
        'join_date' => ['joindate', 'تاريخ الانضمام', 'joindate student', 'joindate user', 'عام الإنضمام'],
        'is_active' => ['is_active', 'الحالة', 'is_active student', 'is_active user'],
        'is_graduated' => ['is_graduated', 'التخرج', 'is_graduated student', 'is_graduated user'],
        'gender' => ['gender', 'الجنس', 'جندر', 'الجندر', 'النوع', 'sex'],
        'username' => ['username', 'اسم المستخدم', 'username student', 'username employee', 'username user'],
        'midterm_exam' => ['midterm_exam', 'الاختبار النصفي', 'midterm exam', 'midterm_exam', 'midterm exam student', 'midterm exam user'],
        'final_exam' => ['exam', 'الاختبار النهائي', 'exam student', 'exam user', 'final exam', 'final_exam', 'final exam student', 'final exam user'],
        'participation' => ['participation', 'المشاركة', 'participation student', 'participation user', 'addional_grades', 'addional grades', 'درجات اضافية'],
    ];

    public function containsArabic($text)
    {
        return preg_match('/\p{Arabic}/u', $text);
    }

    private function getHeaderKey(array $headers, array $possibleKeys)
    {
        foreach ($possibleKeys as $key) {
            if (in_array($key, $headers)) {
                return array_search($key, $headers);
            }
        }
        return null;
    }

    public function getArrayHeaderKey(array $headers)
    {
        $keys = [];
        foreach ($this->columnsMap as $key => $possibleKeys) {
            $keys[$key] = $this->getHeaderKey($headers, $possibleKeys);
        }
        return $keys;
    }

    public function getStudent(array $row, array $keys)
    {
        $student = [];
        $error = null;
        $student['id'] = $this->studnetId($row[$keys['id'] ?? null] ?? null, $error);
        $name = $this->nameAndLastName($row[$keys['name'] ?? null] ?? null, $row[$keys['last_name'] ?? null] ?? null, $error);
        $student['name'] = $name['name'] ?? null;;
        $student['last_name'] = $name['last_name'] ?? null;
        $student['email'] = $this->checkEmail($row[$keys['email'] ?? null] ?? null, $error);
        $student['birthday'] = $this->checkDate($rom[$keys['birthday'] ?? null] ?? null, $error);
        $student['phone'] = $this->checkPhone($row[$keys['phone'] ?? null] ?? null, $error);
        $student['system'] = $this->getSystem($row[$keys['system'] ?? null] ?? null, $error);
        $student['join_date'] = $this->checkYear($row[$key['join_date'] ?? null] ?? null, $error);
        $student['username'] = $this->checkusername($row[$keys['username'] ?? null] ?? null, $error) ?? $student['id'];
        $student['gender'] = $this->checkgender($row[$keys['gender'] ?? null] ?? null, $error);
        $student['password'] = $this->checkPassowrd($row[$keys['password'] ?? null] ?? null, $error);

        $student['error'] = $error;
        return $student;
    }

    public function DownloadFileSAFTA(int $group_subject_id)
    {

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $group_subject = GroupSubject::find($group_subject_id);
        $studing = DB::table('group_subjects')
            ->leftJoin('group_students', function ($join) {
                $join->on('group_subjects.group_id', '=', 'group_students.group_id')
                    ->on('group_subjects.ay_id', '=', 'group_students.ay_id');
            })
            ->leftJoin('students', 'group_students.student_id', '=', 'students.user_id')
            ->leftJoin('studyings', function ($join) {
                $join->on('group_subjects.id', '=', 'studyings.subject_id')
                    ->on('group_students.id', '=', 'studyings.student_id');
            })

            ->select('students.user_id as الرقم الجامعي', 'studyings.midterm_exam as الاختبار النصفي', 'studyings.addional_grades as المشاركة')
            ->where('group_subjects.id', $group_subject_id)
            // ->where('group_subjects.ay_id', 1)

            ->get();
        $rowNumber = 1; // بدء من الصف الأول

        foreach ($studing as $key => $value) {
            $colNumber = 1;
            foreach ($value as $k => $v) {
                $cell = Coordinate::stringFromColumnIndex($colNumber);
                if ($rowNumber == 1) {
                    // كتابة العناوين في الصف الأول
                    $sheet->setCellValue($cell . $rowNumber, $k);
                }
                // كتابة القيم في الصفوف التالية
                $sheet->setCellValue($cell . ($key + 2), $v);
                $colNumber++;
            }
            $rowNumber++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filePath = Storage::path('/temp/createing/' . $group_subject_id . '.xlsx');
        // add authors = url software
        $spreadsheet->getProperties()->setCreator(env('APP_URL'))
            ->setTitle(
                env('APP_NAME')
            )->setSubject(
                $group_subject->subject()->name_ar
            )->setDescription('نموذج تحميل الدرجات');
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    public function getStudentAndGradeToAcademic(array $row, array $key)
    {
        try {
            $student = [];
            $error = null;
            $id = $this->studnetId($row[$key['id']], $error);
            $student['id'] = $id;
            if ($error || !$student['id']) {
                $error .= __('validation.studentIdIsNotValid', ['attribute' => $row[$key['id']]]);
                $student['error'] = $error;
                return $student;
            }
            $student['midterm_exam'] = $this->checkGrade($row[$key['midterm_exam'] ?? null] ?? null, $error) ?? null;

            $student['addional_grades'] = $this->checkGrade($row[$key['participation'] ?? null] ?? null, $error) ?? null;
            if ($student['midterm_exam'] === null && $student['addional_grades'] === null) {
                $error .= __('لا يوجد درجات');
            }
            // any null value = null in unset
            // foreach ($student as $key => $value) {
            //     if ($value === null) {
            //         unset($student[$key]);
            //     }
            // }
            $student['error'] = $error;
            return $student;
        } catch (\Exception $e) {
            return $e->getMessage() . 'file repository';
        }
    }

    function getSet($row, $key)
    {
        return $row[$key] ?? null;
    }
    public function studnetId($cell, &$error)
    {
        $patterns = [
            '/^\d{2}_\d{2}_\d{4}$/',
            '/^\d{8}$/',
            '/^\d{2}-\d{2}-\d{4}$/',
            '/^\d{2}\.\d{2}\.\d{4}$/',
            '/^\d{2}\/\d{2}\/\d{4}$/'
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $cell)) {
                return str_replace(['_', '-', '.', '/'], '', $cell);
            }
        }

        $error .= __('validation.studentIdIsNotValid');
        return null;
    }

    public function nameAndLastName($name, $lest, &$error)
    {
        if (!$lest) {
            if ($this->checkName($name)) {
                $error .= __('validation.nameIsNotValid');
                return null;
            }
            $fullName = explode(' ', $name);
            if (sizeof($fullName) > 1) {
                $lest = array_pop($fullName);
                $name = implode(' ', $fullName);
            } else {
                $error .= 'last name not found';
                return null;
            }
        } else {
            if ($this->checkName($name) || $this->checkName($lest)) {
                $error .= __('validation.nameIsNotValid');
                return null;
            }
        }
        return ['name' => $name, 'last_name' => $lest];
    }
    public function checkName($name)
    {
        return !preg_match('/(^[\p{Arabic}\s]+$)|(^[\p{Latin}\s]+$)/u', $name);;
    }
    function checkPassowrd($password, &$error)
    {
        if (!$password) {
            return MyApp::defaultPassword;
        } else
        if (!preg_match('/^[\w*&^%#@!]{4,15}$/', $password)) {
            $error['password'] = __('validation.passwordIsNotValid');
            return MyApp::defaultPassword;
        }
        return $password;
    }

    function checkEmail($email, &$error)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error .= __('validation.emailIsNotValid');
            return null;
        }
        return $email;
    }

    function checkPhone($phone, &$error)
    {
        if (!preg_match('/^\d{6,15}$/', $phone)) {
            $error['phone'] .= __('validation.phoneIsNotValid');
            return null;
        }
        return $phone;
    }

    function checkDate($date, &$error)
    {
        if (!preg_match('/^\d{2}-\d{2}-\d{4}$/', $date)) {
            $error .= __('validation.dateIsNotValid');
            return null;
        }
        return $date;
    }

    function checkYear($year, &$error)
    {
        if (!preg_match('/^\d{2}-\d{2}-\d{4}$/', $year)) {
            $error .= __('validation.dateIsNotValid');
            return null;
        }
        return $year;
    }

    function checkusername($username, &$error)
    {
        if (!preg_match('/^[a-zA-Z0-9_]{6,255}$/', $username)) {
            $error .= __('validation.usernameIsNotValid');
            return false;
        }
        return true;
    }
    function checkBoolean($value, &$error)
    {
        $mapping = ['نعم' => true, 'لا' => false, 'yes' => true, 'no' => false];

        if (isset($mapping[$value])) {
            return $mapping[$value];
        } elseif (is_bool($value)) {
            return $value;
        }
        $error .= __('validation.booleanIsNotValid');
        return null;
    }

    function checkgender($gender, &$error)
    {
        $mapping = [
            'ذكر' => 'male',
            'male' => 'male',
            'انثى' => 'female',
            'أنثى' => 'female',
            'female' => 'female'
        ];

        if (isset($mapping[$gender])) {
            return $mapping[$gender];
        }
        $error .= __('validation.genderIsNotValid');
        return Myapp::defaultGender;
    }
    function checkNumeric($value, &$error)
    {
        if (!is_numeric($value)) {
            $error .= __('validation.numericIsNotValid');
            return false;
        }
        return true;
    }
    private $genderF = [
        '0' => ['غ', 'غاب', 'غائب', 'غياب', 'غائبة', 'غياب', 'غائبه', 'غيابه'],
    ];
    function checkGrade(string $grade = null, &$error)
    {
        if ($grade == null) {
            return null;
        }
        if (in_array($grade, $this->genderF['0'])) {
            return 0;
        }
        // and 2.5
        if (!preg_match('/^\d{1,2}(\.\d{1,2})?$/', $grade)) {
            $error .= __('validation.gradeIsNotValid');
            return null;
        }
        return $grade;
    }
    function checkNotExists($model, $column, $value, &$error = null)
    {
        if ($model::where($column, $value)->exists()) {
            $error .= __('validation.exists', ['attribute' => $value]);
            return false;
        }
        return true;
    }

    function getSystem($call, &$error)
    {
        $call = strtolower($call);
        $mapping = [
            'النظام العام', 'العام', 'عام', 'general'
        ];
        if (in_array($call, $mapping)) {
            return 'general';
        } else {
            return 'parallel';
        }
    }
}
