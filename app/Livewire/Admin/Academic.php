<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Academic as AcademicModel;
use App\Models\Department as DepartmentModel;
use App\Models\User;

class Academic extends Component
{
    use WithFileUploads;
    public $academics;
    public $acad;
    public $name;
    public $email;
    public $phone;
    public $username;
    public $password;
    public $academic_name;
    public $gender;
    public $avatar;
    public $avatarPreview;
    public $date;
    public $image;
    public $department;
    public $user_id_selected;
    public $schedule;


    public $ava;

    public function mount(DepartmentModel $d)
    {
        $this->department = $d;
        $this->academics = $d->academics;
        // $this->acad = new AcademicModel();
        foreach ($this->academics as $academic) {
            if ($academic->user->photo) {
                // dump(Storage::exists('public/'.$academic->user->photo));
                $this->ava = Storage::url($academic->user->photo);
            }
        }
    }


    #[On('search')]
    public function search($v)
    {
        // academic (name_academic,department_id,user_id) user (id,name,username,password,email)
        if (!$v) {
            $this->academics = $this->department->academics;
            return;
        }
        $this->academics = AcademicModel::where('department_id', $this->department->id)
            ->whereIn('user_id', function ($q) use ($v) {
                $q->select('id')->from('users')
                    ->where('name', 'like', '%' . $v . '%')
                    ->orWhere('username', 'like', '%' . $v . '%')
                    ->orWhere('email', 'like', '%' . $v . '%')
                    ->orWhere('phone', 'like', '%' . $v . '%');
            })->get();
    }
    //# rest all inputs in form
    #[On('addacademic')]
    public function restall()
    {
        $this->reset(['name', 'email', 'phone', 'username', 'password', 'academic_name', 'gender', 'avatar', 'avatarPreview', 'date', 'image', 'acad']);
    }

    public function set_gender($v)
    {
        // $this->resetErrorBag();
        if (in_array($v, ['male', 'female'])) {
            $this->gender = $v;
        } else {
            $this->addError('gender', 'this field must');
        }
    }

    public function set_academic_name($v)
    {
        // $this->resetErrorBag();
        if (in_array($v, ['professor', 'assistant_professor', 'doctor', 'associate_professor'])) {
            $this->academic_name = $v;
        } else {
            $this->addError('academic_name', 'this field must');
        }
    }


    private function IdGenration()
    {

        $user_id = 16 . AcademicModel::all()->count();
        while (User::where('id', $user_id)->exists()) {
            $user_id++;
        }
        return $user_id;
    }
    public function updatedAvatar()
    {
        $this->avatarPreview = null;
        $this->validate([
            'avatar' => 'image|mimes:png,jpeg,jpg',
        ], [], [
            'avatar' => 'الصورة الشخصية',
        ]);
        $this->avatarPreview = $this->avatar->temporaryUrl();
    }
    public function store()
    {
        // $this->dispatch('alert', 'message', 'success');
        // event(new \App\Events\AlertEvent('success', 'تمت العملية بنجاح'));
        $this->validate(
            [
                'name' => 'required',
                'email' => 'nullable|email|unique:users,email', // 'nullable
                'phone' => 'nullable|numeric',
                'gender' => 'required',
                'date' => 'nullable|date', // 'nullable
                'username' => 'required|unique:users,username',
                'password' => 'required|min:6',
                'academic_name' => 'required|in:professor,assistant_professor,doctor,associate_professor',
                'avatar' => 'nullable|image|mimes:png,jpeg,jpg',
            ],
            [],
            [
                'name' => 'الاسم',
                'email' => 'البريد الالكتروني',
                'phone' => 'الهاتف',
                'gender' => 'الجنس',
                'date' => 'تاريخ الميلاد',
                'username' => 'اسم المستخدم',
                'password' => 'كلمة المرور',
                'academic_name' => 'المسمى الوظيفي',
                'avatar' => 'الصورة الشخصية',
            ]
        );

        // create user id is auto increment frist number is not used
        // $this->dispatch('closeModal');
        $avatar = null;
        $user_id = $this->IdGenration();
        if ($this->avatar) {
            $avatar = $this->avatar->store('users/avatar');
            if (!$avatar) {
                $this->addError('avatar', 'error in upload image');
                return;
            }
        }
        $name = $lest_name = null;
        if (strpos($this->name, ' ') !== false) {
            $full_name = explode(' ', $this->name);
            $lest_name = $full_name[count($full_name) - 1];
            unset($full_name[count($full_name) - 1]);
            $name = implode(' ', $full_name);
            // dd($name,$lest_name);
        } else {
            $name = $this->name;
        }
        // dd($this->department);
        $academic = [
            'id' => $user_id,
            'name' => $name,
            'last_name' => $lest_name ?? '',
            'username' => $this->username,
            'password' => $this->password,
            'email' => $this->email ?? null,
            'phone' => $this->phone ?? null,
            'gender' => $this->gender,
            'photo' => $avatar,
            'birthday' => $this->date ?? null,
            'academic_name' => $this->academic_name,
            'department_id' => $this->department->id,
        ];


        AcademicModel::create($academic);
        $this->dispatch('closeModal');
    }

    public function unselect()
    {
        $this->user_id_selected = null;
        $this->restall();
    }

    public function select($id)
    {
        $this->restall();
        $this->user_id_selected = $id;
        $academic = $this->academics->where('user_id', $id)->first();
        $this->acad = $academic;
        $this->name = $academic->user->name . ' ' . $academic->user->last_name;
        $this->email = $academic->user->email;
        $this->phone = $academic->user->phone;
        $this->username = $academic->user->username;
        $this->gender = $academic->user->gender;
        $this->date = $academic->user->birthday;
        $this->academic_name = $academic->academic_name;
        $this->avatarPreview = $academic->user->photo ? asset('storage/' . $academic->user->photo) : null;
    }

    public function editUser()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'nullable|email', // 'nullable
            'phone' => 'nullable|numeric',
            'avatar' => 'nullable|image|mimes:png,jpeg,jpg',
            'gender' => 'required|in:male,female',
            'schedule' => 'nullable|file|mimes:pdf,jpeg,jpg,png',
            'date' => 'nullable|date', // 'nullable
            'username' => 'required',
            'password' => 'nullable|min:6',
            'academic_name' => 'required|in:professor,assistant_professor,doctor,associate_professor',
        ]);
        $academic = $this->academics->where('user_id', $this->user_id_selected)->first();
        $user = $academic->user;

        if ($this->name != $user->name . ' ' . $user->last_name) {
            $name = $lest_name = null;
            if (strpos($this->name, ' ') !== false) {
                $full_name = explode(' ', $this->name);
                $lest_name = $full_name[count($full_name) - 1];
                unset($full_name[count($full_name) - 1]);
                $name = implode(' ', $full_name);
                // dd($name,$lest_name);
            } else {
                $name = $this->name;
            }
            $user->name = $name;
            $user->last_name = $lest_name;
        }


        $user->fill([
            'email' => $this->email,
            'phone' => $this->phone,
            'username' => $this->username,
            'gender' => $this->gender,
            'birthday' => $this->date,
            'password' => $this->password ?: $user->password,
        ]);

        if ($this->avatar) {

            $avatar = $this->avatar->store('users/avatar');
            if (!$avatar) {
                $this->addError('avatar', 'error in upload image');
                return;
            }
            if ($user->photo) {
                Storage::delete($user->photo);
            }
            $user->photo = $avatar;
        }

        if ($this->academic_name != $academic->academic_name) {
            $academic->academic_name = $this->academic_name;
        }
        if ($this->schedule) {

            $schedule = $this->schedule->store('users/teacher/schedule');
            if (!$schedule) {
                $this->addError('schedule', 'error in upload schedule');
                return;
            }
            if ($academic->schedule) {
                Storage::delete($academic->schedule);
            }
            $academic->schedule = $schedule;
        }

        $user->save();
        $academic->save();
        $this->dispatch('closeModal');
        $this->unselect();
    }
    public function resetError(){
        $this->resetErrorBag();
    }
    public function render()
    {
        return view('livewire.admin.academic');
    }
    // public function boot()
    // {
    //     $this->withValidator(function ($validator) {
    //         $validator->after(function ($validator) {
    //             $er = '';
    //             if ($validator->errors()->count() == 0) {
    //                 return;
    //             }
    //             foreach ($validator->errors()->messages()
    //                 as $key => $value) {
    //                 foreach ($value as $v) {
    //                     $er .= $v . '
    //                     ';
    //                 }
    //             }
    //             $this->dispatch('alert', $er, 'error');
    //             // event(new \App\Events\AlertEvent('error', $er));
    //         });
    //     });
    // }
}
