<div class="flex flex-row space-x-2 justify-center items-center">
    @can('read_payment')
        <x-button icon="eye" green label="View"
            onclick="livewire.emit('openModal', 'payments.view-payment', {{ json_encode(['payment' => $row->id]) }})" />
    @endcan

    @can('update_payment')
        @if ($row->payment_status !== 'Refunded')
            <x-button icon="receipt-refund" warning label="Refund" wire:click="refund({{ $row->id }})" />
        @endif

        <x-dialog id="custom" title="User information" description="Complete your profile, give your name">
            <x-input label="What's your name?" placeholder="your name bro" x-model="name" />
        </x-dialog>
    @endcan

    {{-- try  --}}
    <x-button warning icon="receipt-refund"
        x-on:click="$wireui.confirmDialog({
                id: 'custom',
                icon: 'question',
                accept: {
                    label: 'Yes, save it',
                    method: 'update',
                    params: {{ $row->id }},
                    execute: () => 'update{{ $row->id }}'

                    {{-- execute: () => window.$wireui.notify({
                        'title': 'Profile name saved',
                        'description': `Good by, ${name}`,
                        'icon': 'success'

                    }) --}}
                },
                reject: {
                    label: 'No, cancel'
                }
            })">
        Refund
    </x-button>
</div>
