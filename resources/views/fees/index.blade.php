<x-app-layout>

    <div class="p-4 flex justify-between">
        <h2 class="text-2xl font-semibold text-gray-700">School Fees</h2>
        <x-button 
            icon="plus-circle"
            primary 
            class="font-bold uppercase tracking-wide"
            onclick="Livewire.emit('openModal', 'fee.create-fee')" 
            label="Add School Fee" 
        />
    </div>

    <div class="datatable-container p-4 rounded-lg border shadow-xs overflow-hidden">
        @livewire('fee.fees-table')
    </div>


</x-app-layout>