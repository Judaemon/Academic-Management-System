<?php

namespace App\Http\Livewire\SubjectSchedule;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\SubjectSchedule;
use App\Models\User;

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
            Column::make("Teacher", "teacher.last_name")
                ->sortable()
                ->searchable(),
            Column::make("Actions", "id")->view('livewire.subject-schedule.actions-col'),
        ];
    }
}
