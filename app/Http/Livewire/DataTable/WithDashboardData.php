<?php

namespace App\Http\Livewire\DataTable;

trait WithDashboardData
{
    public $selectPage = false;
    public $selectAll = false;
    public $selected = [];

    // public function initializeWithBulkActions()
    // {
    //     $this->beforeRender(function () {
    //         if ($this->selectAll) $this->selectPageRows();
    //     });
    // }

    public function cou()
    {
        $this->selectAll = false;
        $this->selectPage = false;
    }

}
