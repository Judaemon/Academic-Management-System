<?php

namespace App\Http\Livewire\Section;

use App\Models\GradeLevel;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Section;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class SectionTable extends DataTableComponent
{
    protected $model = Section::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function filters(): array
    {
        $option = GradeLevel::query()
            ->pluck('name')
            ->toArray();

        $option = array_combine($option, $option);

        return [
            SelectFilter::make('Grade Level')
                ->options($option)
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('grade_levels.name', $value);
                }),
        ];
    }

    public function columns(): array
    {
        $columns = [
            Column::make("Id", "id")
                ->searchable()
                ->sortable(),
            Column::make("Grade Level ID", "grade_level.name")
                ->sortable()
                ->searchable(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Capacity", "capacity")
                ->sortable()
                ->searchable(),
        ];

        // Check if user has permission
        if ('read_section') {
            array_push($columns, Column::make("Actions", "id")->view('livewire.section.actions-col'));
        }

        return $columns;
    }
}
