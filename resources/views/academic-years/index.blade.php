<x-app-layout>
    <div class="p-4 flex justify-between">
        <h2 class="text-2xl font-semibold text-gray-700">Academic Year</h2>

        @can('create_academic_year')
            @livewire('academic-year.create-academic-year')
        @endcan
    </div>

    <div class="datatable-container p-4 rounded-lg border shadow-xs overflow-hidden">
        @livewire('academic-year.academic-year-table')
    </div>
</x-app-layout>