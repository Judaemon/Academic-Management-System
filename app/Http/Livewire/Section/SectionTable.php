<?php

namespace App\Http\Livewire\Section;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Section;

class SectionTable extends DataTableComponent
{
    protected $model = Section::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        // $this->setSearchDebounce(1000);
    }

    public function columns(): array
    {
        return [
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Capacity", "capacity")
                ->sortable()
                ->searchable(),
            Column::make("Teacher ID", "teacher_id")
                ->sortable()
                ->searchable(),
            Column::make("Grade Level ID", "grade_level_id")
                ->sortable()
                ->searchable(),
            Column::make("Actions", "id")->view('livewire.section.actions-col'),
        ];
    }
}
