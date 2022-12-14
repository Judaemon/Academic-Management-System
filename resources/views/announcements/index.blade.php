<x-app-layout>
    <div class="p-4 block md:flex justify-between">
        <h2 class="text-2xl font-semibold text-text">Announcements</h2>
        <x-button icon="plus-circle" primary class="uppercase w-full md:w-auto" label="Create Announcement"
            onclick="Livewire.emit('openModal', 'announcement.create-announcement')" />
    </div>

    <div class="datatable-container bg-white p-4 rounded-lg border shadow-xs overflow-hidden">
        @livewire('announcement.announcement-table')
    </div>
</x-app-layout>
