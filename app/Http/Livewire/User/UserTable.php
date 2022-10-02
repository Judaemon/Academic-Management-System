<?php

namespace App\Http\Livewire\User;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

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
            Column::make("Firstname", "firstname")
                ->sortable()
                ->searchable(),
            Column::make("Lastname", "lastname")
                ->sortable()
                ->searchable(),
            Column::make("Email", "email")
                ->sortable()
                ->searchable(),
        ];


        // Check if user has permission
        if (auth()->user()->can('read_user')) {
            array_push($columns, Column::make("Actions", "id")->view('livewire.user.actions-col'));
        }

        return $columns;
    }
}
