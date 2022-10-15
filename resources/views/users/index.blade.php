<x-app-layout>
    <h2 class="text-2xl font-semibold text-gray-700">Users</h2>
        <div class="p-4 flex-fill text-right">
        @can('create_user')
            <x-button wire:ignore.self primary onclick="Livewire.emit('openModal', 'user.create-user')" label="CREATE STUDENT" />
            <x-button wire:ignore.self primary onclick="Livewire.emit('openModal', 'user.create-account')" label="CREATE ACCOUNT" />
        @endcan
        </div>

        <div class="datatable-container p-4 rounded-lg border shadow-xs overflow-hidden">
            @livewire('user.user-table')
        </div>
</x-app-layout>