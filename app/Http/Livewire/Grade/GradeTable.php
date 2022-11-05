<?php

namespace App\Http\Livewire\Grade;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Grade;

class GradeTable extends DataTableComponent
{
    protected $model = Grade::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        // $this->setSearchDebounce(1000);
    }

    public function columns(): array
    {
        return [
            Column::make("First Quarter", "first_quarter")
                ->sortable()
                ->searchable(),
            Column::make("Second Quarter", "second_quarter")
                ->sortable()
                ->searchable(),
            Column::make("Third Quarter", "third_quarter")
                ->sortable()
                ->searchable(),
            Column::make("Fourth Quarter", "fourth_quarter")
                ->sortable()
                ->searchable(),
            Column::make("Actions", "id")->view('livewire.grade.actions-col'),
        ];
    }
}
