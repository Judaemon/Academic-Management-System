<x-app-layout>
    <div class="p-4 block md:flex justify-between">
        <h2 class="text-2xl font-semibold text-text w-full md:w-auto flex justify-center mb-4 md:mb-0">
            Attendance
        </h2>
        @can('create_attendances')
        <x-button icon="plus-circle" primary class="uppercase w-full md:w-auto" label="CREATE ATTENDANCE"
            onclick="Livewire.emit('openModal', 'attendance.create-attendance')" />
        @endcan
    </div>

    <div class="datatable-container bg-white p-4 rounded-lg border shadow-xs overflow-hidden">
        @livewire('attendance.attendance-table')
    </div>

</x-app-layout>
