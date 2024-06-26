<?php

namespace App\Livewire\Admin;

use App\Models\Academic;
use App\Models\Role;
use App\Models\User;
use App\Tools\MyApp;
use Livewire\Attributes\On;
use Livewire\Component;

class EmployeesInformation extends Component
{
    public $role;
    public $roles;
    public $search;
    public $perPage = 10;
    public $employeeData;

    //employee edit
    public $Eid;
    public $name;
    public $email;
    public $phone;
    public $gender;
    public $birthday;
    public $photo;
    public $username;
    public $password;
    public $password_confirmation;
    public $role_id;
    public $academic_name;




    public function mount($name)
    {
        $allowedNames = ['StudentAffairs', 'AcademicAffairs'];
        if (!in_array($name, $allowedNames)) {
            abort(404);
        }
        $this->role = Role::where('name', $name)->firstOrFail();
        $this->roles = Role::whereIn('name', $allowedNames)->get();


    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function showEmployee($id)
    {
        $this->selected($id);
        $this->employeeData->show = true;
        if ($this->employeeData->show) {
            $this->dispatch('openDetailsModal');
        }

    }
    public function deleteEmployee()
    {
        $this->employeeData->delete();
        $this->dispatch('closeDeleteModal');
    }

    public function editEmployee($id)
    {
        $this->selected($id);
        $this->Eid = $this->employeeData->id;
        $this->name = $this->employeeData->FullName;
        $this->email = $this->employeeData->email;
        $this->phone = $this->employeeData->phone;
        $this->gender = $this->employeeData->gender;
        $this->birthday = $this->employeeData->birthday;
        $this->username = $this->employeeData->username;
        $this->role_id = $this->employeeData->Role()->id;
        $this->academic_name = $this->employeeData->academic->academic_name;


    }
    public function gen($gender){
        if(in_array($gender,['male','female'])){
            return $this->gender = $gender;
        }
    }
    public function academic($academic_name){
        if(in_array($academic_name,array_keys(MyApp::getAcademicNameAllOut('all')))){
            return $this->academic_name = $academic_name;
        }
    }
    public function saveEmployee()
    {
        $this->validate([
            'name' => 'required|string|min:3|min_words:2',
            'email' => 'required|email|max:255|unique:users,email,' . $this->Eid,
            'phone' => 'required|string|max:15',
            'gender' => 'required|in:male,female',
            'birthday' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'username' => 'required|string|max:255|unique:users,username,' . $this->Eid,
            'role_id' => 'nullable|in:' . implode(',', $this->roles->pluck('id')->toArray()),
            'academic_name' => 'required|string|in:' . implode(',', array_keys(MyApp::getAcademicNameAllOut('all'))),
            'password' => 'nullable|string|min:6|confirmed',
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
        $this->employeeData->last_name = array_pop($name);
        $this->employeeData->name = implode(' ', $name);
        $this->employeeData->birthday = $this->birthday;
        if ($this->photo) {
            $this->employeeData->photo = $this->photo->store('users/avatar');
        }

        $this->employeeData->fill([
            'email' => $this->email,
            'phone' => $this->phone,
            'username' => $this->username,
            'gender' => $this->gender,
        ]);
        if ($this->password) {
            $this->employeeData->password = bcrypt($this->password);
        }
        if ($this->role_id) {
            $this->employeeData->Roles()->sync($this->role_id);
        }else{
            $this->employeeData->Roles()->sync([]);
        }
        if ($this->academic_name&&$this->employeeData->isAcademic()) {
            $this->employeeData->academic->academic_name = $this->academic_name;
            $this->employeeData->academic->save();
        }

        $this->employeeData->save();

        $this->reset(['name', 'email', 'phone','gender', 'birthday', 'photo', 'username', 'password', 'role_id', 'academic_name', 'Eid','password_confirmation']);

        $this->dispatch('closeEditModal');
    }

    public function addEmployee(){
        $this->validate([
            'Eid'=>'nullable|numeric|unique:users,id',
            'name' => 'required|string|min:3|min_words:2',
            'email' => 'nullable|email|max:255|unique:users,email',
            'phone' => 'nullable|string|max:15|regex:/^[0-9]{6,}$/|unique:users,phone',
            'gender' => 'required|in:' . implode(',',array_keys(MyApp::getGenderAllOut('all'))),
            'birthday' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'username' => 'required|string|max:255|unique:users,username|regex:/^[A-Za-z0-9]{3,}$/',
            'role_id' => 'nullable|in:' . implode(',', $this->roles->pluck('id')->toArray()),
            'academic_name' => 'nullable|string|in:' . implode(',', array_keys(MyApp::getAcademicNameAllOut('all'))),
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
        if(!$this->Eid){
            $user_id = 160000000 + Academic::all()->count();
            while(user::where('id',$user_id)->exists()){
                $user_id++;
            }
        }
            if($this->photo){
            $avatar = $this->photo->store('users/avatar');
            if(!$avatar){
                $this->addError('avatar','error in upload image');
                return;
            }
            }

            $academic = [
                'id' => $user_id,
                'name' => $name,
                'last_name' => $last_name,
                'username' => $this->username,
                'password' => $this->password,
                'email' => $this->email??null,
                'phone' => $this->phone??null,
                'gender' => $this->gender,
                'photo' => $avatar,
                'birthday' => $this->date??null,
                'academic_name' => $this->academic_name,
                'department_id' => null,
            ];

            Academic::create($academic);
            $user = User::find($user_id);
            $user->Roles()->sync($this->role_id);
            $this->reset(['name', 'email', 'phone','gender', 'birthday', 'photo', 'username', 'password', 'role_id', 'academic_name', 'Eid','password_confirmation']);

            $this->dispatch('closeAddModal');


    }


    public function selected($id)
    {
        $this->employeeData = $this->employees->firstWhere('id', $id);
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }
    #[On('search')]
    public function search($search)
    {
        // dd($search);
        $this->search = $search;
    }
    public function getEmployeesProperty()
    {
        $users = $this->role->
        Users;
        return $users->filter(function ($user) {
            // search by name or email or phone
            return
            // $user->isacademic() ||
            (strpos(strtolower($user->FullName), strtolower($this->search)) !== false ||
                strpos(strtolower($user->email), strtolower($this->search)) !== false ||
                strpos(strtolower($user->phone), strtolower($this->search)) !== false||
                strpos(strtolower($user->username), strtolower($this->search)) !== false||
                strpos(strtolower($user->id), strtolower($this->search)) !== false);
        })
        ->paginate($this->perPage);
    }
    public function render()
    {
        // dd($this->employees);
        return view('livewire.admin.employees-information', [
            'employees' => $this->employees
        ]);
    }
}
