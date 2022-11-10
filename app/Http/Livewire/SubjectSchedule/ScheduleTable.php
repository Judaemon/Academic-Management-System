<?php

namespace App\Http\Livewire\SubjectSchedule;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\SubjectSchedule;

class ScheduleTable extends DataTableComponent
{
    protected $model = SubjectSchedule::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

    }
    
    public function columns(): array
    {
        return [
            Column::make("Time", "time")
                ->sortable()
                ->searchable(),
            Column::make("Day", "day")
                ->sortable()
                ->searchable(),
            Column::make("Teacher", "teacher_id")
                ->sortable()
                ->searchable(),
            Column::make("Actions", "id")->view('livewire.subject-schedule.actions-col'),
        ];
    }
}
