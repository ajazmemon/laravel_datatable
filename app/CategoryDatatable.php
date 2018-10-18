<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Services\DataTable;

class CategoryDatatable extends DataTable
{
    //...some default stubs deleted for simplicity.

    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->parameters([
                        'buttons' => ['export'],
                    ]);
    }
}
