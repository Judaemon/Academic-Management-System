<div class="flex flex-row space-x-2">
    @can('update_academic_years')
        <x-button wire:ignore.self icon="pencil" info label="Edit"  
            onclick="livewire.emit('openModal', 'academic-year.edit-academic-year', {{ json_encode(['academic_year' => $value]) }})" 
        />
    @endcan

    @can('read_academic_years')
        <x-button wire:ignore.self icon="eye" green label="View"  
            onclick="livewire.emit('openModal', 'academic-year.view-academic-year', {{ json_encode(['academic_year' => $value]) }})" 
        />
    @endcan

    @can('delete_academic_years')
        <x-button wire:ignore.self icon="trash" negative label="Delete"
            onclick="livewire.emit('openModal', 'academic-year.delete-academic-year', {{ json_encode(['academic_year' => $value]) }})" 
        />
    @endcan
</div>