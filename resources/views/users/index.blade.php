<x-app-layout>
        <div class="p-4 flex justify-between">
            <h2 class="text-2xl font-semibold text-gray-700">Users</h2>
                <div class="text-right">
                @can('create_student')
                <x-button wire:ignore.self primary onclick="Livewire.emit('openModal', 'user.create-student')" label="CREATE STUDENT" />
                @endcan
                @can('create_account')
                <x-button wire:ignore.self primary onclick="Livewire.emit('openModal', 'user.create-account')" label="CREATE ACCOUNT" />
                @endcan
                </div>
        </div>

        <div class="datatable-container p-4 rounded-lg border shadow-xs overflow-hidden">
            @livewire('user.user-table')
        </div>
</x-app-layout>