<div>
    <x-button primary onclick="$openModal('createRoleModal')" label="CREATE NEW " />
    
    <x-modal wire:model.defer="createRoleModal" max-width="3xl">
        <x-card title="Create new role">
            <div class="role-form mb-2">
                <style>
                    .center-label label{
                        width: 100%;
                        text-align: center;
                    }
                </style>

                <div class="col-span-12 flex justify-center center-label">
                    <div class="w-60">
                        <x-input wire:model.defer="newRoleName" label="ROLE NAME" placeholder="Admin" />
                    </div>
                </div>
            </div>

            <div class="permission-form grid md:grid-cols-3">
                <div class="flex flex-col w-full my-2">
                    <div class="main-checkbox py-2">
                        {{-- view_users --}}
                        <x-checkbox id="view_users" label="View User" value="1" wire:model="user_permissions" />
                    </div>
                    <div class="sub-checkbox pl-5 mt-0 space-y-2">
                        {{-- create_account --}}
                        <x-checkbox id="create_account" label="Create Account" value="2" wire:model="user_permissions" />
                        {{-- create_student --}}
                        <x-checkbox id="create_student" label="Create Student" value="2" wire:model="user_permissions" />
                        {{-- read_users --}}
                        <x-checkbox id="read_user" label="Read User" value="3" wire:model="user_permissions" />
                        {{-- update_users --}}
                        <x-checkbox id="update_user" label="Update User" value="4" wire:model="user_permissions" />
                        {{-- delete_users --}}
                        <x-checkbox id="delete_user" label="Delete User" value="5" wire:model="user_permissions" />
                    </div>                
                </div>

                <div class="flex flex-col w-full my-2">
                    <div class="main-checkbox py-2">
                        {{-- view_roles --}}
                        <x-checkbox id="view_roles" label="View Roles" value="6" wire:model="role_permissions" />
                    </div>
                    <div class="sub-checkbox pl-5 mt-0 space-y-2">
                        {{-- create_roles --}}
                        <x-checkbox id="create_role" label="Create Role" value="7" wire:model="role_permissions" />
                        {{-- read_roles --}}
                        <x-checkbox id="read_role" label="Read Role" value="8" wire:model="role_permissions" />
                        {{-- update_roles --}}
                        <x-checkbox id="update_role" label="Update Role" value="9" wire:model="role_permissions" />
                        {{-- delete_roles --}}
                        <x-checkbox id="delete_role" label="Delete Role" value="10" wire:model="role_permissions" />
                    </div>                
                </div>

                <div class="flex flex-col w-full my-2">
                    <div class="main-checkbox py-2">
                        <x-checkbox id="view_setting" label="View System Settings" value="11" wire:model="system_permissions" />
                    </div>
                    <div class="sub-checkbox pl-5 mt-0 space-y-2">
                        <x-checkbox id="update_setting" label="Update  System Settings" value="12" wire:model="system_permissions" />
                    </div>                
                </div>
            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" wire:click="closeModal" />

                    <x-button wire:click="save" type="button" primary label="Save" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
