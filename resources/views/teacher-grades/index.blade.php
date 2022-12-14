<x-app-layout>
    <div class="p-4 flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-text">Grades</h2>

    </div>

    <div class="datatable-container bg-white p-4 rounded-lg border shadow-xs overflow-hidden mb-4">
        @livewire('teacher.section-information')
    </div>

    <div class="datatable-container bg-white p-4 rounded-lg border shadow-xs overflow-hidden">
        @livewire('teacher-grade.teacher-grade-table')
    </div>
</x-app-layout>
