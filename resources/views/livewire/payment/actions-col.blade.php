<div class="flex flex-row space-x-2">
    @can('read_payment')
        <x-button wire:ignore.self icon="eye" green label="View"  
            onclick="livewire.emit('openModal', 'payments.view-payment', {{ json_encode(['payment' => $row->id]) }})" 
        />
    @endcan

    {{-- //if payment status is refunded user cannot switch to pending/paid --}}
    @can('refund_payment')
        {{-- @if() --}}
            <x-button wire:ignore.self icon="trash" negative label="Refund"
                onclick="livewire.emit('openModal', 'payments.refund-payment', {{ json_encode(['payment' => $row->id]) }})" 
            />
        {{-- @endif --}}
    @endcan
</div>