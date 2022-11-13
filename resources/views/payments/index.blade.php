<x-app-layout>
    <div class="p-4 block md:flex justify-between">
        <h1 class="text-2xl font-semibold text-main">Payments</h1>

        <x-button icon="plus-circle" primary class="uppercase w-full md:w-auto" label="Add Payment Record"
            onclick="Livewire.emit('openModal', 'payments.create-payments')" />
    </div>

    <div class="datatable-container bg-white min-h-64 w-full rounded-lg border shadow-xs p-2">
        @livewire('payments.payments-table')
    </div>
</x-app-layout>
