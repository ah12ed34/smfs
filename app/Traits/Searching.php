<?php

namespace App\Traits;

use App\Tools\MyApp;
use Illuminate\Support\Facades\Route;

trait Searching {
    public $search;
    public $parameters ;
    public $qurey;
    // public $urlName;

    public function initializeSearching(){
        $this->parameters = request()->route()->parameters();
        $this->qurey = request()->query();
        // $this->urlName = request()->route()->getName();
    }

    public function srch(){
        $this->dispatch('search', $this->search);
    }

    public function getRouteName()
    {
        // $routeName = request()->route()->getName();
        // if (strpos($routeName, 'livewire.update') !== false) {
        //     $routeName = explode('/', $routeName)[1]; // Extract the route name after the first slash
        // }

        return url()->current();
    }
}
