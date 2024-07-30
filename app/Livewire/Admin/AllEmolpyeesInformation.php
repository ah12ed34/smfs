<?php

namespace App\Livewire\Admin;

use App\Models\Role;
use App\Models\User;
use App\Tools\MyApp;
use Livewire\Component;
use App\Models\Academic;
use App\Models\Department;
use App\Traits\Searchable;
use App\Traits\EmployeeTrait;

class AllEmolpyeesInformation extends Component
{
    use EmployeeTrait, Searchable;


    public function mount()
    {
        $this->sortField = 'id';
        $this->initializeEmployeeTrait();
        // $this->roles = Role::all();
        // $this->departments = Department::all();
        // $this->rolesAll = Role::all();
    }

    public function addEmployeeModal()
    {
        if ($this->openType != 'add') {
            $this->resetEmployee();
        }
        $this->openType = 'add';
    }

    public function setGender($gender)
    {
        if (in_array($gender, ['male', 'female'])) {
            return $this->gender = $gender;
        }
    }
    public function setAcademicName($academic_name)
    {
        if (in_array($academic_name, array_keys(MyApp::getAcademicNames('all')))) {
            return $this->academic_name = $academic_name;
        }
    }

    public function addEmployee()
    {
        $this->validate([
            'Eid' => 'nullable|numeric|unique:users,id',
            'name' => 'required|string|min:3|min_words:2',
            'email' => 'nullable|email|max:255|unique:users,email',
            'phone' => 'nullable|string|max:15|regex:/^[0-9]{6,}$/|unique:users,phone',
            'gender' => 'required|in:' . implode(',', array_keys(MyApp::getGenders('all'))),
            'birthday' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'username' => 'required|string|max:255|unique:users,username|regex:/^[A-Za-z0-9]{3,}$/',
            'role_id' => 'nullable|in:' . implode(',', $this->roles->pluck('id')->toArray()),
            'academic_name' => 'nullable|string|in:' . implode(',', array_keys(MyApp::getAcademicNames('all'))),
            'password' => 'required|string|min:6|confirmed',
        ], [], [
            'name' => 'الاسم',
            'email' => 'البريد الالكتروني',
            'phone' => 'الهاتف',
            'gender' => 'الجنس',
            'birthday' => 'تاريخ الميلاد',
            'photo' => 'الصورة',
            'username' => 'اسم المستخدم',
            'role_id' => 'الصلاحية',
            'academic_name' => 'المسمى الوظيفي',
            'password' => 'كلمة المرور',
        ]);

        $this->name = trim($this->name);
        $name = explode(' ', $this->name);
        $last_name = array_pop($name);
        $name = implode(' ', $name);
        $avatar = null;
        if (!$this->Eid) {
            $user_id = 16 . Academic::all()->count();
            while (user::where('id', $user_id)->exists()) {
                $user_id++;
            }
        }
        if ($this->photo) {
            $avatar = $this->photo->store('users/avatar');
            if (!$avatar) {
                $this->addError('avatar', 'error in upload image');
                return;
            }
        }

        $academic = [
            'id' => $user_id,
            'name' => $name,
            'last_name' => $last_name,
            'username' => $this->username,
            'password' => $this->password,
            'email' => $this->email ?? null,
            'phone' => $this->phone ?? null,
            'gender' => $this->gender,
            'photo' => $avatar,
            'birthday' => $this->birthday ?? null,
            'academic_name' => $this->academic_name,
            'department_id' => null,
        ];

        Academic::create($academic);
        $user = User::find($user_id);
        $user->Roles()->sync($this->role_id);
        $this->reset(['name', 'email', 'phone', 'gender', 'birthday', 'photo', 'username', 'password', 'role_id', 'academic_name', 'Eid', 'password_confirmation']);

        $this->dispatch('closeModal');
    }

    public function getEmployeesProperty()
    {
        $users = User::whereDoesntHave('student');

        if ($this->search) {
            $users = $users->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('phone', 'like', '%' . $this->search . '%')
                ->orWhere('username', 'like', '%' . $this->search . '%')
                ->orWhere('academic_name', 'like', '%' . $this->search . '%')
                ->orWhere('id', 'like', '%' . $this->search . '%');
        }
        $users = $users->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        return $users->paginate($this->perPage);
    }
    public function render()
    {
        return view('livewire.admin.all-emolpyees-information', [
            'employees' => $this->employees
        ]);
    }
}
