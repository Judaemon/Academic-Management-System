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
            Column::make("ID", "id")
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
            Column::make("Middlename", "middlename")
                ->sortable()
                ->searchable(),
            Column::make("Suffix", "suffix")
                ->sortable()
                ->searchable(),
            Column::make("Birth Date", "birthdate")
                ->sortable()
                ->searchable(),
            Column::make("Birth Place", "birthplace")
                ->sortable()
                ->searchable(),
            Column::make("Religion", "religion")
                ->sortable()
                ->searchable(),
            Column::make("Gender", "gender")
                ->sortable()
                ->searchable(),
            // nag o-overlap sa screen na if add pa ako columns, need help here hehe
            // or show ko lang mga important details tapos pwede naman i-open eh
        ];


        // Check if user has permission
        if (auth()->user()->can('read_user')) {
            array_push($columns, Column::make("Actions", "id")->view('livewire.user.actions-col'));
        }

        return $columns;
    }
}
