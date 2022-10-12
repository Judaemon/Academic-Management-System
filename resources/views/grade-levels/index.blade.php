<x-app-layout>
    <div class="p-4 flex justify-between">
        <h2 class="text-2xl font-semibold text-gray-700">Grade Level</h2>

        @can('create_grade_level')
            @livewire('grade-level.create-grade-level')
        @endcan
    </div>

    <div class="datatable-container p-4 rounded-lg border shadow-xs overflow-hidden">
        @livewire('grade-level.grade-level-table')
    </div>
</x-app-layout>