<div class="flex flex-row space-x-2">
    @if (auth()->user()->can('update_academic_years'))
        <x-button icon="pencil" info label="Edit"  
            onclick="livewire.emit('openModal', 'academic-year.edit-academic-year', {{ json_encode(['academic_year' => $value]) }})" 
        />
    @endif

    @if (auth()->user()->can('read_academic_years'))
        <x-button icon="eye" green label="View"  
            onclick="livewire.emit('openModal', 'academic-year.view-academic-year', {{ json_encode(['academic_year' => $value]) }})" 
        />
    @endif

    @if (auth()->user()->can('delete_academic_years'))
        <x-button icon="trash" negative label="Delete"
            onclick="livewire.emit('openModal', 'academic-year.delete-academic-year', {{ json_encode(['academic_year' => $value]) }})" 
        />
    @endif
</div>