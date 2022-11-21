<?php

namespace App\Http\Livewire\User;

use App\Models\Role;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function filters(): array
    {
        $option = Role::all()
            ->pluck('name')
            ->toArray();

        $option = array_combine($option, $option);

        return [
            SelectFilter::make('Role')
                ->options($option)
                ->filter(function (Builder $builder, string $value) {
                    $builder->role($value);
                }),
        ];
    }

    public function columns(): array
    {
        $columns = [
            Column::make("ID", "id")
                ->sortable()
                ->searchable(),
            Column::make("First Name", "first_name")
                ->sortable()
                ->searchable(),
            Column::make("Last Name", "last_name")
                ->sortable()
                ->searchable(),
            Column::make("Email", "email")
                ->sortable()
                ->searchable(),
        ];

        // Check if user has permission
        if ('read_user') {
            array_push($columns, Column::make("Actions", "id")->view('livewire.user.actions-col'));
        }

        return $columns;
    }
}
