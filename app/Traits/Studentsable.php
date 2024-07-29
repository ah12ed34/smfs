<?php

namespace App\Traits;

use App\Models\Student;
use App\Models\User;
use App\Tools\MyApp;
use Illuminate\Support\Facades\Date;

trait Studentsable
{
    public $studentData;

    public $photo;
    public $username;
    public $email;
    public $phone;
    public $name;
    public $gender;
    public $password;
    public $password_confirmation;
    public $department_id;
    public $level_id;
    public $join_date;
    public $is_active;
    public $system;
    public $birthday;
    public $SId;

    public $openType;

    public function selected($id)
    {
        $this->studentData = $this->students->where('id', $id)->firstOrFail();
    }

    public function showStudent($id)
    {
        $this->selected($id);
        $this->studentData->show = true;
        $this->openType = 'show';
    }

    public function addStudent()
    {
        if ($this->studentData) {
            $this->resetStudent();
        }
        $this->is_active = true;
    }

    public function deleteStudent()
    {
        $this->studentData->delete();
        $this->dispatch('closeModal');
    }

    public function editStudent($id)
    {
        $this->selected($id);
        $this->studentData->edit = true;

        $this->SId = $this->studentData->id;
        $this->username = $this->studentData->username;
        $this->email = $this->studentData->email;
        $this->phone = $this->studentData->phone;
        $this->name = $this->studentData->FullName;
        $this->gender = $this->studentData->gender;
        $this->birthday = $this->studentData->birthday;
        $this->department_id = $this->studentData->student->department_id;
        $this->level_id = $this->studentData->student->level_id;
        $this->is_active = $this->studentData->student->is_active;
        $this->system = $this->studentData->student->system;
        $this->join_date = $this->studentData->student->join_date;
    }

    public function validateStudent($pwr = false, $unr = true)
    {
        $this->validate([
            'SId' => 'required|numeric|unique:users,id,' . $this->studentData?->id,
            'username' => $unr ? 'required' : 'nullable' . '|string|min:3|max:255|unique:users,username,' . $this->studentData?->id,
            'email' => 'nullable|email|max:255|unique:users,email,' . $this->studentData?->id,
            'phone' => 'nullable|string|min:6|max:15|unique:users,phone,' . $this->studentData?->id,
            'name' => 'required|string|min:3|min_words:3',
            'gender' => 'required|in:' . implode(',', MyApp::getGenders(only: 'key')),
            'birthday' => 'required|date|before:today',
            'department_id' => 'required|exists:departments,id',
            'level_id' => 'required|exists:levels,id',
            'is_active' => 'required|boolean',
            'system' => 'required|in:general,parallel',
            // year only
            'join_date' => 'nullable|numeric|digits:4|min:2000|max:' . (Date::now()->year + 1),
            'photo' => 'nullable|image|max:1024',
            'password' => $pwr ? 'required' : 'nullable' . '|string|min:6|confirmed',
        ], [], [
            'username' => 'اسم المستخدم',
            'email' => 'البريد الالكتروني',
            'phone' => 'الهاتف',
            'name' => 'الاسم',
            'gender' => 'الجنس',
            'birthday' => 'تاريخ الميلاد',
            'department_id' => 'القسم',
            'level_id' => 'المستوى',
            'is_active' => 'الحالة',
            'system' => 'النظام',
            'join_date' => 'تاريخ الالتحاق',
            'photo' => 'الصورة',
            'password' => 'كلمة المرور',
        ]);
    }

    private function prepareName()
    {
        $this->name = trim($this->name);
        $nameParts = explode(' ', $this->name);
        $last_name = array_pop($nameParts);
        $first_name = implode(' ', $nameParts);

        return [
            'name' => $first_name,
            'last_name' => $last_name,
        ];
    }

    private function uploadPhoto()
    {
        try {
            if ($this->photo) {
                return $this->photo->store('users/avatar');
            }
        } catch (\Exception $e) {
            $this->addError('photo', 'حدث خطأ أثناء تحميل الصورة');
        }

        return null;
    }

    public function setGender($gender)
    {
        if (in_array($gender, MyApp::getGenders(only: 'key'))) {
            $this->gender = $gender;
        }
    }

    public function setSystem($system)
    {
        if (in_array($system, MyApp::getSystems(only: 'key'))) {
            $this->system = $system;
        }
    }


    public function saveStudent($type = 'add')
    {

        if ($type == 'add') {
            $this->validateStudent(true, false);
            $name = $this->prepareName();
            $avatar = $this->uploadPhoto();

            $userData = [
                'phone' => $this->phone,
                'photo' => $avatar,
                'name' => $name['name'],
                'last_name' => $name['last_name'],
                'username' => $this->username,
                'email' => $this->email,
                'password' => $this->password,
                'gender' => $this->gender,
                'birthday' => $this->birthday,
                'is_active' => true,
                'system' => $this->system,
                'join_date' => $this->join_date,
                'level_id' => $this->level_id,
                'department_id' => $this->department_id,
                'is_graduated' => false,
                'is_suspended' => false,
            ];

            if ($this->SId) {
                $userData['id'] = $this->SId;
            }

            $student = Student::create_student($userData);

            if ($student) {
                $this->resetStudent();
            }
        } elseif ($type == 'edit') {
            $this->validateStudent();
            $name = $this->prepareName();
            $avatar = $this->uploadPhoto();

            $userData = [
                'id' => $this->SId,
                'phone' => $this->phone,
                'photo' => $avatar ?? $this->studentData->photo,
                'name' => $name['name'],
                'last_name' => $name['last_name'],
                'username' => $this->username,
                'email' => $this->email,
                'birthday' => $this->birthday,
                'gender' => $this->gender,
            ];

            if ($this->password) {
                $userData['password'] = $this->password;
            }

            $this->studentData->update($userData);
            $this->studentData->student->update([
                'department_id' => $this->department_id,
                'level_id' => $this->level_id,
                'is_active' => $this->is_active,
                'system' => $this->system,
                'join_date' => $this->join_date,
            ]);
            $this->resetStudent();
        }
        $this->dispatch('closeModal');
    }

    public function resetStudent()
    {
        $this->reset([
            'SId', 'username', 'email', 'phone', 'name', 'password', 'password_confirmation', 'gender', 'birthday', 'department_id', 'level_id', 'is_active', 'system', 'join_date', 'photo'
        ]);

        $this->studentData = null;
    }
}
