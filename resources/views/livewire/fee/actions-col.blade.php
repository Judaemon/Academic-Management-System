<div>
    @can ('edit_fee')
        <x-button wire:ignore.self icon="pencil" info label="Edit" 
            onclick="livewire.emit('openModal', 'fee.edit-fee', {{ json_encode(['fee' => $value]) }})"  
        />
    @endcan

    @can ('delete_fee')
        <x-button wire:ignore.self icon="trash" negative label="Delete"
            onclick="livewire.emit('openModal', 'fee.delete-fee', {{ json_encode(['fee' => $value]) }})" 
        />
    @endcan
</div>