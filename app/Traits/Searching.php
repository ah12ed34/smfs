<?php

namespace App\Traits;

use App\Tools\MyApp;

trait Searching {
    public $search;

    public function srch(){
        $this->dispatch('search', $this->search);
    }
}
