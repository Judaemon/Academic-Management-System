<?php

namespace App\Http\Livewire\Role;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Role;

class RolesTable extends DataTableComponent
{
    protected $model = Role::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        $columns = [
            Column::make("Id", "id")
                ->sortable()
                ->searchable(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];

        // Check if user has permission
        if (auth()->user()->can('read_role') || auth()->user()->can('update_role') || auth()->user()->can('delete_role')) {
            array_push($columns, Column::make("Actions", "id")->view('livewire.role.actions-col'));
        }

        return $columns;
    }
}
