<div class="flex flex-row space-x-2">
    @can ('edit_announcement')
        <x-button wire:ignore.self icon="pencil" info label="Edit" 
            onclick="livewire.emit('openModal', 'announcement.edit-announcement', {{ json_encode(['announcement' => $value]) }})"  
        />
    @endcan

    @can ('delete_announcement')
        <x-button wire:ignore.self icon="trash" negative label="Delete"
            onclick="livewire.emit('openModal', 'announcement.delete-announcement', {{ json_encode(['announcement' => $value]) }})" 
        />
    @endcan
</div>