<?php

namespace App\Traits;

use App\Tools\MyApp;

trait Searching {
    public $search;
    public $parameters ;
    public $qurey;

    public function initializeSearching(){
        $this->parameters = request()->route()->parameters();
        $this->qurey = request()->query();
    }

    public function srch(){
        $this->dispatch('search', $this->search);
    }
}
