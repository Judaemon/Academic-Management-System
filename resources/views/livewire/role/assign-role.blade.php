<div wire:ignore.self>
    <x-card title="Assign Role">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-4">
            <div class="col-span-6">
                <x-select
                    label="User"
                    wire:model="user"
                    placeholder="Select user"
                    :async-data="route('users.users')"
                    option-label="name"
                    option-value="id"
                /> 
            </div>

            <div class="col-span-6">
                <x-select
                    label="Role"
                    wire:model="roles"
                    placeholder="Select role"
                    :async-data="route('roles.roles')"
                    option-label="name"
                    option-value="id"
                    multiselect
                /> 
            </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button flat label="Cancel" wire:click="closeModal" />
                <x-button wire:click="save" type="button" primary label="Save" />
            </div>
        </x-slot>
    </x-card>
</div>
