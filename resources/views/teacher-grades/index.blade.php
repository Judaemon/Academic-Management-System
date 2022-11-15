<x-app-layout>
    <div class="p-4 flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-text">Grades</h2>

        {{-- <div>
            @can('assign_grades')
                <x-button icon="plus-circle" primary onclick="Livewire.emit('openModal', 'teacher-grade.upload-grade')"
                    label="UPLOAD GRADES" />
            @endcan
        </div> --}}
    </div>

    <div class="datatable-container bg-white p-4 rounded-lg border shadow-xs overflow-hidden">
        @livewire('teacher-grade.teacher-grade-table')
    </div>
</x-app-layout>