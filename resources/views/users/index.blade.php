<x-app-layout>
    <div class="p-4 flex justify-between">
        <h1 class="text-2xl font-semibold text-text">Users</h1>

        <div class="flex justify-end gap-x-2">
            @can('enroll_student')
                <x-button primary onclick="Livewire.emit('openModal', 'user.admit-student')" label="ADMIT NEW STUDENT" />
            @endcan

            @can('create_account')
                <x-button primary onclick="Livewire.emit('openModal', 'user.create-account')" label="CREATE NEW ACCOUNT" />
            @endcan
        </div>
    </div>

    <div class="datatable-container bg-white p-4 rounded-lg border shadow-xs overflow-hidden">
        @livewire('user.user-table')
    </div>
</x-app-layout>
