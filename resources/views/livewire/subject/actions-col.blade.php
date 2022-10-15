<div class="flex flex-row space-x-2">

    @can ('update_subject')
    <x-button wire:ignore.self icon="pencil" info label="Edit"  
        onclick="livewire.emit('openModal', 'subject.edit-subject', {{ json_encode(['subject' => $value]) }})" 
    />
    @endcan

    @can ('read_subject')
    <x-button wire:ignore.self icon="eye" green label="View"  
        onclick="livewire.emit('openModal', 'subject.view-subject', {{ json_encode(['subject' => $value]) }})" 
    />
    @endcan

    @can ('delete_subject')
    <x-button wire:ignore.self icon="trash" negative label="Delete"
        onclick="livewire.emit('openModal', 'subject.delete-subject', {{ json_encode(['subject' => $value]) }})" 
    />
    @endcan

</div>