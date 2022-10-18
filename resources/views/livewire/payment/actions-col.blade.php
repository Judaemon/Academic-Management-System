<div class="flex flex-row space-x-2">
    @can('view_payment')
        <x-button wire:ignore.self icon="eye" green label="View"  
            onclick="livewire.emit('openModal', 'payments.view-payment', {{ json_encode(['payment' => $value]) }})" 
        />
    @endcan
    
    {{-- Not yet available --}}
    @can('refund_payment')
        <x-button wire:ignore.self icon="receipt-refund" positive label="Refund"
            onclick="livewire.emit('openModal', 'payments.refund-payment', {{ json_encode(['payment' => $value]) }})" 
        />
    @endcan

    @can('delete_payment')
        <x-button wire:ignore.self icon="trash" negative label="Delete"
            onclick="livewire.emit('openModal', 'payments.delete-payment', {{ json_encode(['payment' => $value]) }})" 
        />
    @endcan
</div>