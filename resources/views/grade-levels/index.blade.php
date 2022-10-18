<x-app-layout>
    <div class="p-4 flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-gray-700">Grade Level</h2>

        <div>
            @can('create_grade_level')
                <x-button wire:ignore.self primary onclick="Livewire.emit('openModal', 'grade-level.create-grade-level')" label="CREATE GRADE LEVEL" />
            @endcan
        </div>
    </div>

    <div class="datatable-container bg-white p-4 rounded-lg border shadow-xs overflow-hidden">
        @livewire('grade-level.grade-level-table')
    </div>
</x-app-layout>
