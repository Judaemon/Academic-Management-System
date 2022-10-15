<x-app-layout>
    <h2 class="text-2xl font-semibold text-gray-700">Grade Level</h2>
        <div class="p-4 flex-fill text-right">
        @can('create_grade_level')
            <x-button wire:ignore.self primary onclick="Livewire.emit('openModal', 'grade-level.create-grade-level')" label="CREATE GRADE LEVEL" />
        @endcan
        </div>

        <div class="datatable-container p-4 rounded-lg border shadow-xs overflow-hidden">
            @livewire('grade-level.grade-level-table')
        </div>
</x-app-layout>