<x-app-layout>
    <div class="p-4 flex justify-between">
        <h2 class="text-2xl font-semibold text-gray-700">Users</h2>

        @can('create_user')
            @livewire('user.create-user')
        @endcan
    </div>
    
    <div class="datatable-container p-4 rounded-lg border shadow-xs overflow-hidden ">
        <!-- need filter for different roles -->
        @livewire('user.user-table')
    </div>
</x-app-layout>
