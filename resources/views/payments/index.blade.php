<x-app-layout>

    <div class="p-4 block md:flex justify-between">
        <h2 class="text-2xl font-semibold text-gray-700 w-full md:w-auto flex justify-center mb-4 md:mb-0">
            Payments
        </h2>
        <x-button icon="plus-circle" primary class="uppercase w-full md:w-auto" label="Add Payment Record" 
            onclick="Livewire.emit('openModal', 'payments.create-payments')" 
        />
    </div>

    <div class="datatable-container min-h-64 w-full rounded-lg border shadow-xs p-2">
        @livewire('payments.payments-table')
    </div>

</x-app-layout>