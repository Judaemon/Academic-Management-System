<x-app-layout>
    <div class="p-4 flex justify-between">
        <h2 class="text-2xl font-semibold text-text">Admission</h2>
        <x-button icon="plus-circle" primary class="uppercase" label="Create Admission"
            onclick="Livewire.emit('openModal', 'admission.create-admission')" />
    </div>

    <div class="datatable-container bg-white p-4 rounded-lg border shadow-xs overflow-hidden">
        @livewire('admission.admission-table')
    </div>

</x-app-layout>
