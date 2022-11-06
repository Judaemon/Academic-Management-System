<x-app-layout>
    <div class="p-4 flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-gray-700">Grades</h2>

        <div>
            @can('create_grade')
                <x-button primary label="ASSIGN GRADES" onclick="livewire.emit('openModal', 'student-grades.student-create-grade')" />
            @endcan
        </div>
    </div>

    <div class="datatable-container bg-white p-4 rounded-lg border shadow-xs overflow-hidden">
        @livewire('student-grades.student-grade-table')
    </div>
</x-app-layout>
