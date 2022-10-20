<x-app-layout>

    <div class="p-4 block md:flex justify-between">
        <h2 class="text-2xl font-semibold text-gray-700 w-full md:w-auto flex justify-center mb-4 md:mb-0">
            School Fees
        </h2>
        <x-button icon="plus-circle" primary class="uppercase w-full md:w-auto" label="Add School Fee" 
            onclick="Livewire.emit('openModal', 'fee.create-fee')" 
        />
    </div>

    <div class="datatable-container p-4 rounded-lg border shadow-xs overflow-hidden">
        @livewire('fee.fees-table')
    </div>

</x-app-layout>