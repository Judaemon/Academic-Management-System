<x-app-layout>

    <div class="p-4 flex justify-between">
        <h2 class="text-2xl font-semibold text-gray-700">Academic Year</h2>
        <x-button icon="plus-circle" primary  class="font-bold uppercase tracking-wide" label="Add Academic Year" 
            onclick="Livewire.emit('openModal', 'academic-year.create-academic-year')" 
        />
    </div>

    <div class="datatable-container p-4 rounded-lg border shadow-xs overflow-hidden">
        @livewire('academic-year.academic-year-table')
    </div>
    
</x-app-layout>