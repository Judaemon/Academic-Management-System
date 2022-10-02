<x-app-layout>
    <x-slot name="header">
        
    </x-slot>

    <div class="p-4 rounded-lg shadow-xs">
        <div class="px-2 py-4 flex justify-between">
            <h2 class="text-2xl font-semibold text-gray-700">Subjects</h2>
            @livewire('subject.create-subject')
        </div>

        <div class="datatable-container w-full rounded-lg border shadow-xs p-4">
            {{-- need filter for different roles --}}
            @livewire('subject.subject-table')
        </div>
    </div>
</x-app-layout>