<?php

namespace App\Traits;
use App\Tools\MyApp;
use Livewire\WithPagination;
use Livewire\Attributes\On;

trait Searchable
{
    use WithPagination;
    public $perPage = MyApp::perPage;
    public $search;
    public $sortField;
    public $sortAsc = true;

    #[On('search')]
    public function search($v)
    {
        $this->search = $v;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingperPage()
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

    // يمكنك إضافة وظائف إضافية هنا حسب الحاجة
}
