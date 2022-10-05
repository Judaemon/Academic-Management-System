<div>
    <x-button 
        icon="pencil" 
        info 
        onclick="livewire.emit('openModal', 'academic-year.edit-academic-year', {{ json_encode(['academic_year' => $value]) }})" 
        label="Edit" 
    />
    <x-button 
        icon="eye" 
        green 
        onclick="livewire.emit('openModal', 'academic-year.view-academic-level', {{ json_encode(['academic_year' => $value]) }})" 
        label="View" 
    />
    <x-button 
        icon="trash" 
        negative 
        onclick="#"  
        label="Remove"
    />
</div>