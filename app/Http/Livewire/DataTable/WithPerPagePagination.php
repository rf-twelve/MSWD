<?php

namespace App\Http\Livewire\DataTable;

use Livewire\WithPagination;

trait WithPerPagePagination
{
    use WithPagination;

    public $per_page = 10;

    public function initializeWithPerPagePagination()
    {
        $this->per_page = session()->get('perPage', $this->per_page);
    }

    public function updatedPerPage($value)
    {
        session()->put('perPage', $value);
    }

    public function applyPagination($query)
    {
        return $query->paginate($this->per_page);
    }
}
