<div class="flex flex-row space-x-2">
    @can('read_payment')
        <x-button wire:ignore.self icon="eye" green label="View"  
            onclick="livewire.emit('openModal', 'payments.view-payment', {{ json_encode(['payment' => $row->id]) }})" 
        />
    @endcan

    @can('delete_payment')
        <x-button wire:ignore.self icon="trash" negative label="Delete"
            onclick="livewire.emit('openModal', 'payments.delete-payment', {{ json_encode(['payment' => $row->id]) }})" 
        />
    @endcan
</div>