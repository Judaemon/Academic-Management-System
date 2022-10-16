<div class="flex flex-row space-x-2">
    <x-button icon="pencil" info label="Edit"  
        onclick="livewire.emit('openModal', 'subject.edit-subject', {{ json_encode(['subject' => $value]) }})" 
    />
    <x-button icon="eye" green label="View"  
        onclick="livewire.emit('openModal', 'subject.view-subject', {{ json_encode(['subject' => $value]) }})" 
    />
    <x-button icon="trash" negative label="Delete"
        onclick="livewire.emit('openModal', 'subject.delete-subject', {{ json_encode(['subject' => $value]) }})" 
    />
</div>