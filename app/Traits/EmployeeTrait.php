<?php

namespace App\Traits;

use App\Models\Academic;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use App\Tools\MyApp;
use App\Repositories\EmployeesRepository;
use Livewire\WithFileUploads;
use PhpParser\Node\Expr\Cast\Array_;

trait EmployeeTrait
{
    use WithFileUploads;

    public $role;
    public $roles;
    public $employeeData;

    protected $EmployeesR;

    public $departments;//departments

    public $rolesAll;
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
    public $department_id;
    public $stutes;
    public $schedule;
    public $weekly_lectures;
    public $quarterly_lectures;

    public $openType ;

    public function initializeEmployeeTrait()
    {
        $this->EmployeesR =  new EmployeesRepository();
        $this->roles = Role::all();
        $this->departments = Department::all();
        $this->rolesAll = Role::all();
    }


    public function selected($id)
    {
        $this->employeeData = User::find($id);
         $result = [];
        dd(
            $this->EmployeesR->getSubjectsableByAcademicAndLevel($this->employeeData->id,$this->level->id)->get()
            ->map(function($item)use(&$result){
                if(empty($result)||array_search($item->subject, Array_column($result, 'subject')) === false){
                    $result[] =
                    [
                        'subject' => $item->subject,
                        'groups' => [$item->group],
                        'isGroup' => [$item->group_name],
                    ]
                    ;
                }else{
                    if(!in_array($item->group, $result[array_search($item->subject, Array_column($result, 'subject'))]['groups']))
                        $result[array_search($item->subject, Array_column($result, 'subject'))]['groups'][] = $item->group;
                        if($item->group_name && !in_array($item->group_name, $result[array_search($item->subject, Array_column($result, 'subject'))]['isGroup']))
                        $result[array_search($item->subject, Array_column($result, 'subject'))]['isGroup'][] = $item->group_name;

                }

                return $item;

            }),$result
        );

    }

    public function showEmployee($id)
    {
        $this->selected($id);
        // $this->employeeData->show = true;
        $this->openType = 'show';
    }

    public function EditEmployee($id)
    {
        if($this->openType != 'edit' || $this->Eid != $id){
            $this->resetEmployee();
        }
        $this->selected($id);
        $this->openType = 'edit';
        $this->Eid = $this->employeeData->id;
        $this->name = $this->employeeData->name . ' ' . $this->employeeData->last_name;
        $this->email = $this->employeeData->email;
        $this->phone = $this->employeeData->phone;
        // $this->photo = $this->employeeData->photo;
        $this->gender = $this->employeeData->gender;
        $this->birthday = $this->employeeData->birthday;
        $this->username = $this->employeeData->username;
        $this->role_id = $this->employeeData?->Role()?->id;
        $this->academic_name = $this->employeeData?->academic?->academic_name;
        $this->department_id = $this->employeeData?->academic?->department_id;
        $this->stutes = $this->employeeData?->academic?->stutes;
        $this->weekly_lectures = $this->employeeData?->academic?->Weekly_lectures;
        $this->quarterly_lectures = $this->employeeData?->academic?->Quarterly_lectures;
        // $this->schedule = $this->employeeData?->academic?->schedule;

    }

    public function resetEmployee()
    {
        $this->Eid = null;
        $this->name = null;
        $this->email = null;
        $this->phone = null;
        $this->photo = null;
        $this->username = null;
        $this->role_id = null;
        $this->academic_name = null;
        $this->e = null;
        $this->stutes = null;
        $this->schedule = null;
        $this->employeeData = null;
        $this->openType = null;
        $this->password = null;
        $this->password_confirmation = null;
        $this->weekly_lectures = null;
        $this->quarterly_lectures = null;
        $this->resetErrorBag();
    }

    public function validation($type = 'edit')
    {
        $rules = [
            'name' => 'required|string|min:3|min_words:2|max:255',
            'photo' => 'nullable|file|mimes:'.MyApp::getMimes('image'),
            'email' => 'nullable|email|unique:users,email,'.$this->employeeData?->id,
            'phone' => 'nullable|string|regex:/^([0-9]*)$/|min:6|max:15,unique:users,phone,'.$this->employeeData?->id,
            'username' => 'required|string|min:3|max:255|unique:users,username,'.$this->employeeData?->id,
            'role_id' => 'nullable|exists:roles,id',
            'academic_name' => 'nullable|string|min:3|max:255|in:'.implode(',',MyApp::getAcademicNames(only:'key')),
            'gender' => 'nullable|in:'.implode(',',MyApp::getGenders(only:'key')),
            'department_id' => 'nullable|exists:departments,id',
            'stutes' => 'nullable|string|min:3|max:255',
            'schedule' => 'nullable|file|mimes:'.MyApp::getMimes('image'),
            'password' => 'nullable|string|min:8|confirmed',
            // weekly_lectures minthen quaterly_lectures
            'weekly_lectures' => 'nullable|numeric|min:1|lte:quarterly_lectures',
            'quarterly_lectures' => 'nullable|numeric|min:1|gte:weekly_lectures',
        ];
        if($type == 'add'){
            $rules['Eid'] = 'nullable|numeric|unique:users,id,'.$this->employeeData?->id;
        }
        $this->validate($rules,[],[
            'name' => __('general.name'),
            'email' => __('general.email'),
            'photo' => __('general.photo'),
            'phone' => __('general.phone'),
            'username' => __('general.username'),
            'role_id' => __('general.role'),
            'academic_name' => __('general.academic_name'),
            'gender' => __('general.gender'),
            'department_id' => __('general.department'),
            'stutes' => __('general.stutes'),
            'schedule' => __('general.schedule'),
            'password' => __('general.password'),
            'weekly_lectures' => __('general.weekly_lectures'),
            'quarterly_lectures' => __('general.quarterly_lectures'),
        ]);
    }
    public function deleteEmployee()
    {
        $this->employeeData->delete();
        $this->resetEmployee();
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

    private function uploadPhoto()
    {
       try {
            if ($this->photo) {
                return $this->photo->store('users/avatar');
            }
        } catch (\Exception $e) {
            $this->addError('photo', __('sysmass.upload_error'));
        }

        return null;
    }

    private function uploadSchedule()
    {
       try {
            if ($this->schedule) {
                return $this->schedule->store('users\teacher\schedule');
            }
        } catch (\Exception $e) {
            $this->addError('schedule', __('sysmass.upload_error'));
        }

        return null;
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
    public function save(){
        $this->validation();
        if(!$this->department_id && $this->role_id && $this->role_id == $this->rolesAll->where('name','HeadOfDepartment')->first()->id){
            $this->addError('role_id',__('sysmass.add_in_department_first'));
            return;
        }
        $data = $this->prepareName();
        $photo = $this->uploadPhoto();

        if($data){
            $this->employeeData->name = $data['name'];
            $this->employeeData->last_name = $data['last_name'];
        }

        if($photo){
            $this->employeeData->photo = $photo;
        }

        if($this->Eid){
            $this->employeeData->update([
                'email' => $this->email,
                'phone' => $this->phone,
                'username' => $this->username,
            ]);
            $this->employeeData->academic->update([
                'academic_name' => $this->academic_name,
                'department_id' => $this->department_id,
                'stutes' => $this->stutes,
                'schedule' => $this->schedule,
                'Weekly_lectures' => $this->weekly_lectures,
                'Quarterly_lectures' => $this->quarterly_lectures,
            ]);

            if($this->password){
                $this->employeeData->update([
                    'password' => bcrypt($this->password),
                ]);
            }

            if($this->role_id){
                $this->employeeData->Roles()->sync($this->role_id);
            }else{
                $this->employeeData->Roles()->sync([]);
            }

            $this->employeeData->save();
            $this->dispatch('closeModal');
            $this->resetEmployee();
        }else{
            $this->employeeData = User::create([
                'id' => $this->IdGenration(),
                'email' => $this->email,
                'phone' => $this->phone,
                'username' => $this->username,
                'password' => bcrypt($this->password),
                'photo' => $photo,
            ]);
            $this->employeeData->academic()->create([
                'name' => $this->academic_name,
                'department_id' => $this->department_id,
                'stutes' => $this->stutes,
                'schedule' => $this->schedule,
                'Weekly_lectures' => $this->weekly_lectures,
                'Quarterly_lectures' => $this->quarterly_lectures,
            ]);

            $this->employeeData->Roles()->sync($this->role_id);
            $this->employeeData->save();
            $this->dispatch('closeModal');
            $this->resetEmployee();
        }



    }



}
