<div wire:ignore.self class="form-container">
    <x-card title="Edit role">
        <div class="flex gap-4">
            <div class="lg:w-4/12 mb-4">
                <x-input wire:model.defer="role.name" label="Name" placeholder="Type role name here" />
            </div>
            <div class="lg:w-8/12 mb-4">
                <x-label>Selected permissions</x-label>
                <div>
                    @forelse ($role_permissions as $permission)
                        <x-badge outline dark label="{{ $permission}}" />
                    @empty
                        <x-badge outline dark label="Select permission" />
                    @endforelse
                </div>
            </div>
        </div>

        <div class="overflow-x-auto relative sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Permissions
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Selected
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $permission->name}}
                        </th>
                        <td class="py-4 px-6">
                            <x-checkbox id="checkbox" value="{{ $permission->name}}" wire:model.lazy="role_permissions" />
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button flat label="Cancel" wire:click="closeModal" />

                <x-button wire:click="save" type="button" primary label="Save" />
            </div>
        </x-slot>
    </x-card>
</div>
