<?php

namespace App\Livewire\global\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;
    public $user;
    public $name;
    public $phone;
    public $email;
    public $birthday;
    public $currentPassword;
    public $password;
    public $password_confirmation;
    public $avatar;
    public $avatarPreview;

    public function mount()
    {
        $this->user = auth()->user();
        $this->name = $this->fullName;
        $this->phone = $this->user->phone;
        $this->email = $this->user->email;
        $this->birthday = $this->user->birthday;
        $this->avatar = $this->user->photo;
        if($this->avatar){
            $this->avatarPreview = asset('storage/'.$this->avatar);
        }

    }

    public function getFullNameProperty()
    {
        return $this->user->name . ' ' . $this->user->last_name;
    }

    public function gander($gender)
    {
        if($gender =='m'){
            $this->user->gender = 'male';
        }elseif($gender =='f'){
            $this->user->gender = 'female';
        }
        $this->user->save();
    }

    public function changePassword()
    {
        $this->validate([
            'currentPassword' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        if (password_verify($this->currentPassword, $this->user->password)) {
            $this->user->password = Hash::make($this->password);
            $this->user->save();
            $this->dispatch('closeModal');
        } else {
            $this->addError('currentPassword', 'The current password is incorrect.');
        }
    }


    public function updateProfile()
    {

        $this->validate([
            'name' => 'required|string|min:3|min_words:2',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'birthday' => 'required|date',
        ],
        []
        ,[
            'name' => 'الاسم',
        ]
    );

        $this->name = trim($this->name);
        $name = explode(' ', $this->name);
        $this->user->last_name = array_pop($name);
        $this->user->name = implode(' ', $name);
        $this->user->birthday = $this->birthday;
        $this->user->phone = $this->phone;
        $this->user->email = $this->email;

        $this->user->save();

        $this->dispatch('closeModal');
    }

    public function acedmicN($name)
    {
        if(in_array($name,['bachelor','master','doctor','professor','assistant professor','lecturer','assistant lecturer','البكالوريوس','الماجستير','استاذ مشارك', 'مدرس','معيد','دكتور','البروفيسور','الاستاذ المساعد','المحاضر','المحاضر المساعد'])){
            $this->user->academic->academic_name = $name;
            $this->user->academic->save();
        }else{
            $this->addError('academic_name', 'The academic name is incorrect.');
        }

    }

    public function updatedAvatar()
    {

        $this->validate([
            'avatar' => 'mimes:png,jpeg,jpg',
        ]);

        try {
            $profile = $this->user->photo;
            if ($this->avatar) {
                $this->user->photo = $this->avatar->store('users/avatar');
                if($this->avatar){
                    unlink($this->avatar->getRealPath());
                }
                $this->user->save();
                if($profile&&Storage::exists($profile)){
                    Storage::delete($profile);
                }
                $this->avatarPreview = asset('storage/'.$this->user->photo);
                // refresh the page
                $this->dispatch('refresh');
            }
        } catch (\Exception $e) {
            $this->addError('profile', $e->getMessage());
            if($this->avatar&&Storage::exists($this->avatar->getRealPath())){
                unlink($this->avatar->getRealPath());
            }

        }

    }
    public function render()
    {
        return optional(view('livewire.global.user.profile'))->layout('components.layouts.app');
    }
}
