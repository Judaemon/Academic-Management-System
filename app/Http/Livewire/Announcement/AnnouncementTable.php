<?php

namespace App\Http\Livewire\Announcement;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Announcement;

class AnnouncementTable extends DataTableComponent
{
    protected $model = Announcement::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Title", "title")
                ->sortable(),
            Column::make("Actions", "id")
                ->view('livewire.announcement.actions-col')
                ->collapseOnMobile(),

        ];
    }
}
