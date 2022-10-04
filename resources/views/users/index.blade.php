<x-app-layout>
    <div class="p-4 rounded-lg shadow-xs">
        <div class="px-2 py-4 flex justify-between">
            <h2 class="text-2xl font-semibold text-gray-700">Users</h2>

            @can('create_user')
                @livewire('user.create-user')
            @endcan
        </div>
        
        <div class="datatable-container w-full rounded-lg border shadow-xs p-4 overflow-x-auto">
            <!-- need filter for different roles -->
                @livewire('user.user-table')
        </div>
    </div>
</x-app-layout>
