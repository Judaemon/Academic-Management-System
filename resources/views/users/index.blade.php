<x-app-layout>
        <div class="mb-4 p-4 flex justify-between">
            <h2 class="text-2xl font-semibold text-gray-700">Users</h2>
                <div class="flex justify-end gap-x-2">
                @can('create_student')
                <x-button primary label="CREATE STUDENT"
                    onclick="livewire.emit('openModal', 'user.create-student')"
                />
                @endcan

                @can('create_account')
                <x-button primary label="CREATE ACCOUNT"
                    onclick="livewire.emit('openModal', 'user.create-account')"
                />
                @endcan
                </div>
        </div>

        <div class="datatable-container p-4 rounded-lg border shadow-xs overflow-hidden">
            @livewire('user.user-table')
        </div>
</x-app-layout>
