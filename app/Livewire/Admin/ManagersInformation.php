<?php

namespace App\Livewire\Admin;

use App\Tools\MyApp;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Role;
use Livewire\WithFileUploads;
use Livewire\Attributes\On ;
use App\Models\Department;
use App\Models\Academic;
use App\Tools\ToolsApp;
use Illuminate\Support\Facades\DB;


class ManagersInformation extends Component
{
    use WithPagination, WithFileUploads;
    public $roles;
    public $allowRole;
    public $search;
    public $sortField;
    public $sortAsc;
    public $perPage = MyApp::perPage;

    public $departments;
    public $rolesAll;

    public $ManagerData;

    public $Eid;
    public $name;
    public $email;
    public $username;
    public $gender;
    public $academic_name;
    public $phone;
    public $role_id;
    public $department_id;
    public $photo;
    public $birthday;
    public $password;
    public $password_confirmation;


    public function mount()
    {
        $this->allowRole = [
            'Dean',
            'HeadOfDepartment',
            'ViceDeanForStudentAffairs',
            'ViceDeanForAcademics',
            'ViceDeanForQualityAffairs',
            'SuperAdmin',
            'Admin',
            'ViceDeanForQualityAffairs',
        ];

        $this->roles = Role::whereIn('name', $this->allowRole)->get();
        $this->updateIdsRoles();
        $this->departments = Department::all();
        $this->rolesAll = Role::all();
        $this->sortField = 'name';
        $this->sortAsc = true;
        $this->search = '';
    }

    private function updateIdsRoles()
{
    // $this->ids_roles = DB::table('roles')->whereIn('name', $this->allowRole)->pluck('id')->toArray();

    // if (empty($this->ids_roles)) {
    //     $this->ids_roles = [1]; // وضع قيمة افتراضية لعدم تركه فارغًا
    // }
}
    #[On('search')]
    public function search($v)
    {
        $this->search = $v;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField == $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function selected($id){
        $this->ManagerData = $this->managers->where('id',$id)->first();
    }

    public function addManager(){
        $this->reset();
    }

    public function showManager($id){
        $this->selected($id);
        $this->ManagerData->show = true;
    }
    // editManager
    public function editManager($id){
        if($this->ManagerData&&$this->ManagerData->id!=$id){
            $this->resetManager();
            $this->resetErrorBag();
        }
        $this->selected($id);
        $this->Eid = $this->ManagerData->id;
        $this->name = $this->ManagerData->FullName;
        $this->email = $this->ManagerData->email;
        $this->username = $this->ManagerData->username;
        $this->phone = $this->ManagerData->phone;
        $this->gender = $this->ManagerData->gender;
        if($this->ManagerData->isAcademic()){
            $this->academic_name = $this->ManagerData->academic->academic_name;
            $this->department_id = $this->ManagerData->academic->department_id;
        }
        $this->role_id = $this->ManagerData->Roles->first()->id;
        $this->birthday = $this->ManagerData->birthday;

    }

    public function deleteManager(){
        $this->ManagerData->delete();
        $this->dispatch('closeModal');
    }

    public function setAcademicName($name){
        if(in_array($name,MyApp::getAcademicNameAllOut(only:'key'))){
            $this->academic_name = $name;
        }
    }

    public function setGender($gender){
        // dd(implode(',',MyApp::getGenderAllOut(only:'key')),$gender);
        if(in_array($gender,MyApp::getGenderAllOut(only:'key')))
        {
            $this->gender = $gender;
        }
    }

    public function storManager()
    {
        // التحقق من صحة البيانات
        $this->validateData();

        // تحميل الصورة إذا وجدت
        $avatar = $this->uploadPhoto();

        // تحديث بيانات المستخدم الأساسية
        $this->updateManagerData($avatar,$this->prepareName());

        // تحديث أو إنشاء البيانات الأكاديمية
        $this->updateOrCreateAcademicData();

        // تحديث أدوار المستخدم
        $this->updateUserRoles();

        // إعادة تعيين بيانات النموذج وإغلاق النافذة
        $this->resetManager();
        $this->dispatch('closeEditModal');
    }

    public function createManager(){
        // التحقق من صحة البيانات
        $this->validateData(true);

        // تحميل الصورة إذا وجدت
        $avatar = $this->uploadPhoto();

        // إنشاء بيانات المدير
        $managerData = [
            'id' => $this->IdGenration(),
            $this->prepareName(),
            'username' => $this->username,
            'email' => $this->email,
            'phone' => $this->phone,
            'photo' => $avatar,
            'gender' => $this->gender,
            'birthday' => $this->birthday,
            'password' => $this->password ,
            'academic_name' => $this->academic_name,
            'department_id' => $this->department_id,
        ];

        // dd(;


        Academic::create(ToolsApp::flattenArray($managerData));

        $this->ManagerData = User::find($managerData['id']);

        $this->updateOrCreateAcademicData();

        $this->updateUserRoles();

        $this->resetManager();
        $this->dispatch('closeModal');
    }

    private function IdGenration()
    {
        if(!$this->Eid){
            $user_id = 160000000 + Academic::all()->count();
            while(user::where('id',$user_id)->exists()){
                $user_id++;
            }
            return $user_id;
        }
        return $this->Eid;
    }

    private function validateData(bool $passwordIsRequired = false)
    {
        $this->validate([
            'name' => 'required|string|min:3|min_words:2',
            'email' => 'nullable|email|unique:users,email,' . $this->Eid,
            'username' => 'required|string|min:3|unique:users,username,' . $this->Eid . '|regex:/^[A-Za-z0-9]+$/',
            'phone' => 'nullable|regex:/^[0-9]{6,}$/|unique:users,phone,' . $this->Eid,
            'photo' => 'nullable|image|max:1024',
            'password' => $passwordIsRequired?'required':'nullable'.'|string|min:8|confirmed',
            'role_id' => 'nullable|exists:roles,id',
            'department_id' => 'nullable|exists:departments,id',
            'gender' => 'required|in:' . implode(',', MyApp::getGenderAllOut(only:'key')),
            'birthday' => 'nullable|date|before:today',
            'academic_name' => 'nullable|string|in:' . implode(',', MyApp::getAcademicNameAllOut(only:'key')),
        ], [], [
            'name' => 'الاسم',
            'email' => 'البريد الالكتروني',
            'phone' => 'الهاتف',
            'photo' => 'الصورة',
            'gender' => 'الجنس',
            'birthday' => 'تاريخ الميلاد',
            'password' => 'كلمة المرور',
            'role_id' => 'الصلاحية',
            'department_id' => 'القسم',
            'academic_name' => 'المسمى الوظيفي',
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

    private function updateManagerData($avatar,array $full_name)
    {
        $data = [
            $full_name,
            'username' => $this->username,
            'email' => $this->email ?? null,
            'phone' => $this->phone ?? null,
            'gender' => $this->gender,
            'birthday' => $this->birthday,
        ];

        if ($avatar) {
            $data['photo'] = $avatar;
        }

        if ($this->password) {
            $data['password'] = bcrypt($this->password);
        }

        $this->ManagerData->update($data);
    }

    private function updateOrCreateAcademicData()
    {

        if ($this->academic_name || $this->department_id) {
            $academicData = [
                'academic_name' => $this->academic_name,
                'department_id' => $this->department_id,
            ];

            if ($this->ManagerData->isAcademic()) {
                $this->ManagerData->academic()->update($academicData);
            } else {
                $this->ManagerData->academic()->create($academicData);
            }
        } elseif ($this->ManagerData->isAcademic()) {
            if ($this->role_id) {
                $this->ManagerData->academic()->delete();
            } else {
                $this->ManagerData->academic()->update([
                    'academic_name' => null,
                    'department_id' => null,
                ]);
            }
        }
    }

    private function updateUserRoles()
    {
        if ($this->role_id) {
            $headOfDepartmentRoleId = $this->roles->where('name', 'HeadOfDepartment')->first()->id;

            if ($this->role_id == $headOfDepartmentRoleId && !$this->ManagerData->isAcademic() && !$this->department_id) {
                $this->addError('role_id', 'يجب تحديد القسم');
            }else{
                $this->ManagerData->Roles()->sync($this->role_id);
            }
        } else {
            $this->ManagerData->Roles()->detach();
        }
    }


    public function resetManager()
    {
        $this->reset([
            'name', 'email', 'phone', 'gender', 'birthday', 'photo', 'password', 'password_confirmation',
            'role_id', 'academic_name', 'department_id', 'Eid', 'ManagerData' ,'username'
        ]);
    }
    #[On('addUser')]
    public function addUser(){
        $this->resetManager();
        $this->resetErrorBag();
    }


    // public function getManagersProperty()
    // {


    //     $users = User::whereHas('Roles', function ($query){
    //         $query->whereIn('role_id',
    //             $this->ids_roles
    //         );
    //     })->where(function ($query) {
    //         $query->where('name', 'like', '%' . $this->search . '%')
    //             ->orWhere('email', 'like', '%' . $this->search . '%')
    //             ->orWhere('phone', 'like', '%' . $this->search . '%')
    //             ->orWhere('username', 'like', '%' . $this->search . '%')
    //             ->orWhere('id', 'like', '%' . $this->search . '%')
    //             ;
    //     })
    //         ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');

    //     return $users->paginate($this->perPage);
    // }

    public function getManagersProperty()
{
        // // تصفية القيم غير الصالحة في allowRole
        // $filteredAllowRole = array_filter($this->allowRole, function ($role) {
        //     return !is_null($role) && $role !== '';
        // });

        // // الحصول على معرفات الأدوار
        // $this->ids_roles = DB::table('roles')->whereIn('name', $filteredAllowRole)->pluck('id')->toArray();

        // التحقق من أن ids_roles ليست فارغة
        // if (empty($this->ids_roles)) {
        //     return collect()->paginate($this->perPage); // إرجاع مجموعة فارغة مع ترقيم الصفحات
        // }

    $users = User::whereHas('Roles', function ($query) {
        $query->whereIn('role_id', $this->roles->pluck('id'));
    })->where(function ($query) {

        $query->orWhere('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('phone', 'like', '%' . $this->search . '%')
            ->orWhere('username', 'like', '%' . $this->search . '%')
            ->orWhere('id', 'like', '%' . $this->search . '%');
    })
        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');

    return $users->paginate($this->perPage);
}


    public function render()
    {
        return view('livewire.admin.managers-information'
        , [
            'managers' => $this->managers,
        ]);
    }
}
