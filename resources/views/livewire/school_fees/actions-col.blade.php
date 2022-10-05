<div>
    <x-button 
        icon="pencil" 
        info 
        onclick="livewire.emit('openModal', 'fee.edit-school-fee', {{ json_encode(['school_fee' => $value]) }})" 
        label="Edit" 
    />
    <x-button 
        icon="trash" 
        negative 
        onclick="#"  
        label="Remove"
    />
</div>