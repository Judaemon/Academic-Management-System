<x-app-layout>
    <div class="p-4 flex justify-between">
        <h2 class="text-2xl font-semibold text-gray-700">Roles and Permissions</h2>
        
        @can('create_role')
            @livewire('role.create-role')
        @endcan
    </div>

    <div class="datatable-container p-4 rounded-lg border shadow-xs overflow-hidden ">
        @livewire('role.roles-table')
    </div>
</x-app-layout>