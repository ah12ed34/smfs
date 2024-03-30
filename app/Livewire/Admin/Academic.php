<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Academic as AcademicModel;
use App\Models\Department as DepartmentModel;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
class Academic extends Component
{
    use WithFileUploads;
    public $academics;
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
    public $department ;


    public $ava ;

    public function mount(DepartmentModel $d)
    {
        $this->department = $d;
        $this->academics = $d->academics;
        foreach($this->academics as $academic){
            if($academic->user->photo){
                // dump(Storage::exists('public/'.$academic->user->photo));
                $this->ava = Storage::url($academic->user->photo);
            }
        }
    }


    #[On('search')]
    public function search($v){
        // academic (name_academic,department_id,user_id) user (id,name,username,password,email)
        if(!$v){
            $this->academics = $this->department->academics;
            return;
        }
        $this->academics = AcademicModel::where('department_id',$this->department->id)
        ->whereIn('user_id',function($q) use($v){
            $q->select('id')->from('users')->where('name','like','%'.$v.'%')
            ->orWhere('username','like','%'.$v.'%')
            ->orWhere('email','like','%'.$v.'%')
            ->orWhere('phone','like','%'.$v.'%')
            ->orWhere('id','like','%'.$v.'%');
        })->get();

    }

    public function restall(){
        $this->reset(['name','email','phone','username','password','academic_name']);
    }

    public function set_gender($v){
        if(in_array($v,['male','female'])){
            $this->gender = $v;
        }else{
            $this->addError('gender','this field must');
        }
    }

    public function set_academic_name($v){
        if(in_array($v,['professor','assistant_professor','doctor','associate_professor'])){
            $this->academic_name = $v;
        }else{
            $this->addError('academic_name','this field must');
        }
    }



    public function updatedAvatar()
    {
        $this->avatarPreview = null;
        $this->validate([
            'avatar' => 'image|mimes:png,jpeg,jpg',
            ],[],[
                'avatar' => 'الصورة الشخصية',
            ]);
        $this->avatarPreview = $this->avatar->temporaryUrl();
    }
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'nullable|email', // 'nullable
            'phone' => 'nullable|numeric',
            'gender' => 'required',
            'date' => 'nullable|date', // 'nullable
            'username' => 'required',
            'password' => 'required|min:6',
            'academic_name' => 'required|in:professor,assistant_professor,doctor,associate_professor',]

            ,[],[
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

            $user_id = 160000000 + AcademicModel::all()->count();
            if($this->avatar){
            $avatar = $this->avatar->store('users/avatar','public');
            if(!$avatar){
                $this->addError('avatar','error in upload image');
                return;
            }
            }
            $name = $lest_name = null ;
            if(strpos($this->name,' ') !== false){
               $full_name = explode(' ',$this->name);
                $lest_name = $full_name[count($full_name) - 1];
                unset($full_name[count($full_name) - 1]);
                $name = implode(' ',$full_name);
                // dd($name,$lest_name);
            }else{
                $name = $this->name;
            }
            $academic = [
                'id' => $user_id,
                'name' => $name,
                'last_name' => $lest_name??'',
                'username' => $this->username,
                'password' => $this->password,
                'email' => $this->email??null,
                'phone' => $this->phone??null,
                'gender' => $this->gender,
                'photo' => $avatar,
                'birthday' => $this->date??null,
                'academic_name' => $this->academic_name,
                'department_id' => $this->department->id,
            ];


            AcademicModel::create($academic);
            $this->dispatch('closeModal');


        }

    public function render()
    {
        return view('livewire.admin.academic');
    }
}
