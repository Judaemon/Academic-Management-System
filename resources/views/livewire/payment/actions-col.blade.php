<div class="flex flex-row space-x-2 justify-center items-center">
    @can('read_payment')
        <x-button wire:ignore.self icon="eye" green label="View"  
            onclick="livewire.emit('openModal', 'payments.view-payment', {{ json_encode(['payment' => $row->id]) }})" 
        />
    @endcan

    @can('update_payment')
        @if($row->payment_status !== 'Refunded')
            <x-button wire:ignore.self icon="receipt-refund" warning label="Refund" wire:click="refund({{$row->id}})" /> 
        @endif
    @endcan
</div>