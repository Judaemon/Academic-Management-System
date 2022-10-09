<div class="flex flex-row space-x-2">
    <x-button icon="pencil" info label="Edit"  
        onclick="livewire.emit('openModal', 'user.edit-user', {{ json_encode(['user' => $value]) }})" 
    />
    <x-button icon="eye" green label="View"  
        onclick="livewire.emit('openModal', 'user.view-user', {{ json_encode(['user' => $value]) }})" 
    />
    <x-button icon="trash" negative label="Delete"
        onclick="livewire.emit('openModal', 'user.delete-user', {{ json_encode(['user' => $value]) }})" 
    />
</div>