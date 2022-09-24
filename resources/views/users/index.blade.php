<x-app-layout>
    <x-slot name="header">
        
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs overflow-hidden">
        <div class="px-2 py-4 flex justify-between">
            <h2 class="text-2xl font-semibold text-gray-700">Users</h2>
            @livewire('user.create-user')
        </div>

        <div class="datatable-container h-64 w-full rounded-lg border shadow-xs p-2">
            {{-- need filter for different roles --}}
            @livewire('user.user-table')
        </div>
    </div>
</x-app-layout>
