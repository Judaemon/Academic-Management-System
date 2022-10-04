<x-app-layout>

    <div class="p-4 rounded-lg shadow-xs overflow-hidden">
        <div class="px-2 py-4 flex justify-between">
            <h2 class="text-2xl font-semibold text-gray-700">Academic Year</h2>
            @can('create_academic_year')
                <livewire:academic-year.create-academic-year />
            @endcan
        </div>

        <div class="datatable-container max-h-screen w-full rounded-lg border shadow-xs p-2">
            <livewire:academic-year.academic-year-table />
        </div>
    </div>

</x-app-layout>