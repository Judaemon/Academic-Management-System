<div class="flex flex-row space-x-2">

    @can ('update_user')
    <x-button wire:ignore.self icon="pencil" info label="Edit"  
        onclick="livewire.emit('openModal', 'user.edit-user', {{ json_encode(['user' => $value]) }})" 
    />
    @endcan

    @can ('read_user')
    <x-button wire:ignore.self icon="eye" green label="View"  
        onclick="livewire.emit('openModal', 'user.view-user', {{ json_encode(['user' => $value]) }})" 
    />
    @endcan

    @can ('delete_user')
    <x-button wire:ignore.self icon="trash" negative label="Delete"
        onclick="livewire.emit('openModal', 'user.delete-user', {{ json_encode(['user' => $value]) }})" 
    />
    @endcan

</div>