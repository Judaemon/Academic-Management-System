<?php

namespace App\Http\Livewire\Attendance;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use App\Models\Attendance;

class AttendanceTable extends DataTableComponent
{
    protected $model = Attendance::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Date", "attendance_date")
                ->searchable()
                ->sortable(),

            Column::make("Status", "status")
                ->searchable()
                ->sortable(),

            Column::make("Students", "student_id")
                ->searchable()
                ->sortable(),

            Column::make("Actions", "id")
                ->view('livewire.attendance.actions-col'),
        ];
    }
}
