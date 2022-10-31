<?php

namespace App\Http\Livewire\Admission;

use App\Models\User;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Admission;

class AdmissionTable extends DataTableComponent
{
    protected $model = Admission::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Student ", "student_id")
                ->searchable()
                ->sortable(),

            Column::make("Status", "status")
                ->searchable()
                ->sortable(),

            Column::make("Enrolled By", "enrolled_by")
                ->searchable()
                ->sortable(),

            Column::make("Date Enrolled", "updated_at")
                ->searchable()
                ->sortable()
                ->format(fn ($value) => date('j \\ F Y', strtotime($value))),

            Column::make("Actions", "id")
                ->view('livewire.admission.actions-col'),
        ];
    }
}
