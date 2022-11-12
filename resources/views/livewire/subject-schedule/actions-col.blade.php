<div class="flex flex-row space-x-2">

    
    <x-button wire:ignore.self icon="pencil" info label="Edit"  
        onclick="livewire.emit('openModal', 'subject-schedule.edit-schedule', {{ json_encode(['schedule' => $value]) }})"
    />
    

    
    <x-button wire:ignore.self icon="eye" green label="View"  
        onclick="livewire.emit('openModal', 'subject-schedule.view-schedule', {{ json_encode(['schedule' => $value]) }})" 
    />
    

    
    <x-button wire:ignore.self icon="trash" negative label="Delete"
        onclick="livewire.emit('openModal', 'subject-schedule.delete-schedule', {{ json_encode(['schedule' => $value]) }})" 
    />
    

</div>