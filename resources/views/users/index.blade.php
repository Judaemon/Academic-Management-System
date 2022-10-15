<x-app-layout>
        <div class="p-4 flex-fill justify-between">
            <h2 class="text-2xl font-semibold text-gray-700">Users</h2>
            <x-button wire:ignore.self primary onclick="Livewire.emit('openModal', 'user.create-user')" label="CREATE STUDENT" />
            <x-button wire:ignore.self primary onclick="Livewire.emit('openModal', 'user.create-teacher')" label="CREATE TEACHER" />
            <!-- <x-button wire:ignore.self primary onclick="Livewire.emit('openModal', 'user.create-accountant')" label="CREATE ACCOUNTANT" />
            <x-button wire:ignore.self primary onclick="Livewire.emit('openModal', 'user.create-admin')" label="CREATE ADMIN" /> -->
        </div>

        <div class="datatable-container p-4 rounded-lg border shadow-xs overflow-hidden">
            @livewire('user.user-table')
        </div>
</x-app-layout>