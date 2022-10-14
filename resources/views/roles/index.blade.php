<x-app-layout>
    <div class="p-4 flex justify-between">
        <h2 class="text-2xl font-semibold text-gray-700">Roles and Permissions</h2>
        
        <div class="flex flex-row space-x-2">
            @can('assign_role')
            <x-button wire:ignore.self primary label="ASSIGN ROLE"  
                onclick="livewire.emit('openModal', 'role.assign-role')"
            />
        @endcan

        @can('create_role')
            @livewire('role.create-role')
        @endcan
        </div>
    </div>

    <div class="datatable-container overflow-hidden px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md ">
        @livewire('role.roles-table')
    </div>
</x-app-layout>