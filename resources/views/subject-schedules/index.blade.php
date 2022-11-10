<x-app-layout>
    <div class="p-4 flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-gray-700">Schedule</h2>

        <div>
            
                <x-button primary label="CREATE SCHEDULE" onclick="livewire.emit('openModal', 'subject-schedule.create-schedule')" />
            
        </div>
    </div>

    <div class="datatable-container bg-white p-4 rounded-lg border shadow-xs overflow-hidden">
        @livewire('subject-schedule.schedule-table')
    </div>
</x-app-layout>