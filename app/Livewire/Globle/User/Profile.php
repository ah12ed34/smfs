<?php

namespace App\Livewire\Globle\User;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Profile extends Component
{
    public $user;
    public $name;
    public $phone;
    public $email;
    public $birthday;
    public $currentPassword;
    public $password;
    public $password_confirmation;

    public function mount()
    {
        $this->user = auth()->user();
        $this->name = $this->fullName;
        $this->phone = $this->user->phone;
        $this->email = $this->user->email;

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
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'birthday' => 'required|date',
        ]);

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
    public function render()
    {
        return optional(view('livewire.globle.user.profile'))->layout('components.layouts.app');
    }
}
