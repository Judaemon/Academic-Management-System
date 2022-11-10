<x-app-layout>
    <div class="p-4 flex justify-between">
        <h2 class="text-2xl font-semibold text-text">Subjects</h2>
        {{-- @livewire('subject.create-subject') --}}
        <x-button primary onclick="Livewire.emit('openModal', 'subject.create-subject')" label="CREATE SUBJECT " />
    </div>

    <div class="datatable-container bg-white p-4 rounded-lg border shadow-xs overflow-hidden">
        {{-- need filter for different roles --}}
        @livewire('subject.subject-table')
    </div>
</x-app-layout>
