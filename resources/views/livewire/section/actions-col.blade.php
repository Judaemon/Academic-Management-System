<div class="flex flex-row space-x-2">
    <x-button wire:ignore.self icon="pencil" info label="Edit"  
        onclick="livewire.emit('openModal', 'section.edit-section', {{ json_encode(['section' => $value]) }})" 
    />
    <x-button wire:ignore.self icon="eye" green label="View"  
        onclick="livewire.emit('openModal', 'section.view-section', {{ json_encode(['section' => $value]) }})" 
    />
    <x-button wire:ignore.self icon="trash" negative label="Delete"
        onclick="livewire.emit('openModal', 'section.delete-section', {{ json_encode(['section' => $value]) }})" 
    />
</div>