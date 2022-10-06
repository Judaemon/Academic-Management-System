<x-app-layout>

    <div class="p-4 rounded-lg shadow-xs overflow-hidden">
        <div class="p-4 flex justify-between">
            <h2 class="text-2xl font-semibold text-gray-700">Fees</h2>
            
            @livewire('fee.create-school-fee')
        </div>

        <div class="datatable-container h-64 w-full rounded-lg border shadow-xs p-2">
            @livewire('fee.fees-table')
        </div>
    </div>

</x-app-layout>