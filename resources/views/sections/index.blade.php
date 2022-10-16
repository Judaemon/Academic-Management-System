<x-app-layout>
        <div class="p-4 flex justify-between">
            <h2 class="text-2xl font-semibold text-gray-700">Sections</h2>
            <x-button wire:ignore.self primary onclick="Livewire.emit('openModal', 'section.create-section')" label="CREATE SECTION" />
        </div>

        <div class="datatable-container p-4 rounded-lg border shadow-xs overflow-hidden">
            @livewire('section.section-table')
        </div>
</x-app-layout>