<x-app-layout>

    <div class="p-4 block md:flex justify-between">
        <h1 class="text-2xl font-semibold text-main">Academic Year</h1>

        <x-button icon="plus-circle" primary class="uppercase w-full md:w-auto" label="Add Academic Year"
            onclick="Livewire.emit('openModal', 'academic-year.create-academic-year')" />
    </div>

    <div class="datatable-container bg-white p-4 rounded-lg border shadow-xs overflow-hidden">
        @livewire('academic-year.academic-year-table')
    </div>

</x-app-layout>
