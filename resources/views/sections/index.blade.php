<x-app-layout>
    <div class="p-4 flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-main">Sections</h2>

        <div>
            @can('create_section')
                <x-button wire:ignore.self primary onclick="Livewire.emit('openModal', 'section.create-section')"
                    label="CREATE SECTION" />
            @endcan
        </div>
    </div>

    <div class="datatable-container bg-white p-4 rounded-lg border shadow-xs overflow-hidden">
        @livewire('section.section-table')
    </div>
</x-app-layout>
