<div class="flex flex-row space-x-2">
    <x-button icon="pencil" info label="Edit"  
        onclick="livewire.emit('openModal', 'academic-year.edit-academic-year', {{ json_encode(['academic_year' => $value]) }})" 
    />
    <x-button icon="eye" green label="View"  
        onclick="livewire.emit('openModal', 'academic-year.view-academic-year', {{ json_encode(['academic_year' => $value]) }})" 
    />

    <x-button icon="trash" negative label="Delete"
        onclick="livewire.emit('openModal', 'academic-year.delete-academic-year', {{ json_encode(['academic_year' => $value]) }})" 
    />
</div>