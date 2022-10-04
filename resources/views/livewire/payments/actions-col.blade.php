<div>
    <x-button 
        icon="pencil" 
        info 
        onclick="livewire.emit('openModal', 'payments.edit-payment', {{ json_encode(['payment' => $value]) }})" 
        label="Edit" 
    />
    <x-button 
        icon="trash" 
        negative 
        onclick="#"  
        label="Remove"
    />
</div>