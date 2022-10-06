<div>
    <x-button 
        icon="pencil" 
        info 
        onclick="livewire.emit('openModal', 'fee.edit-school-fee', {{ json_encode(['fee' => $value]) }})" 
        label="Edit" 
    />
    <x-button 
        icon="trash" 
        negative 
        onclick="livewire.emit('openModal', 'fee.delete-fee', {{ json_encode(['fee' => $value]) }})" 
        label="Remove"
    />
</div>