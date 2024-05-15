<?php

namespace App\Http\Controllers\global\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Livewire\Livewire;
use Livewire\LivewireManager;
use App\Livewire\global\User\Profile as ProfileL;

class profile extends Controller
{
    //
    public function __construct()
    {
        Livewire::component('profile', ProfileL::class);
    }
    public function index(){
        return Livewire::mount('profile');

    }
}
