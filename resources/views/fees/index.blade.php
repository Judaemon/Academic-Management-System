<x-app-layout>
    <div class="p-4 block md:flex justify-between">
        <h1 class="text-2xl font-semibold text-main">School Fees</h1>

        <x-button icon="plus-circle" primary class="uppercase w-full md:w-auto" label="Add School Fee"
            onclick="Livewire.emit('openModal', 'fee.create-fee')" />
    </div>

    <div class="datatable-container bg-white p-4 rounded-lg border shadow-xs overflow-hidden">
        @livewire('fee.fees-table')
    </div>

</x-app-layout>
