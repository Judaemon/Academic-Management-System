<?php

namespace App\Http\Livewire\Admission;

use App\Models\AcademicYear;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Admission;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class AdmissionTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        return Admission::query()
            ->orderBy('id', 'DESC');
    }

    public function filters(): array
    {
        $option = AcademicYear::query()
            ->orderBy('id', 'DESC')
            ->get()
            ->keyBy('id')
            ->map(fn ($academic_year) => $academic_year->title)
            ->toArray();

        return [
            SelectFilter::make('Academic Year')
                ->options($option)
                ->filter(function (Builder $builder, string $value) {
                    $builder->whereHas('academic_year', function ($q) use ($value) {
                        $q->where('id', $value);
                    });
                }),
        ];
    }

    // public function builder(): Builder
    // {
    //     return Admission::query()
    //         ->where('academic_year_id', setting('academic_year_id'));
    //     // ->whereHas('academic_year', function ($q) {
    //     //     $q->where('1', $value);
    //     // });
    // }

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
