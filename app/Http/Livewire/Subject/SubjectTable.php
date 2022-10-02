<?php

namespace App\Http\Livewire\Subject;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Subject;

class SubjectTable extends DataTableComponent
{
    protected $model = Subject::class;

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
            Column::make("Actions", "id")->view('livewire.subject.actions-col'),
        ];
    }
}
