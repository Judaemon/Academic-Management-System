<x-app-layout>

    <div class="p-4 flex justify-between">
        <h2 class="text-2xl font-semibold text-gray-700">Payments</h2>
        <x-button icon="plus-circle" primary  class="font-bold uppercase tracking-wide" label="Add Payment Record" 
            onclick="Livewire.emit('openModal', 'payments.create-payments')" 
        />
    </div>

    <div class="datatable-container min-h-64 w-full rounded-lg border shadow-xs p-2">
        @livewire('payments.payments-table')
    </div>

</x-app-layout>