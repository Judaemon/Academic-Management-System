<div wire:ignore.self class="form-container">
    <x-card title="{{ $cardTitle }}">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-4">
            <div class="col-span-4">
                <x-input wire:model.defer="user.firstname" label="Firstname" placeholder="John" />
            </div>

            <div class="col-span-4">
                <x-input wire:model.defer="user.lastname" label="Lastname" placeholder="Doe" />
            </div>

            <div class="col-span-4">
                <x-input wire:model.defer="user.email" label="Email" placeholder="Doe" />
            </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                @can('delete_users')
                    <x-button flat negative label="Delete" wire:click="deleteDialog" />
                    
                @else
                    <div></div>
                @endcan
        
                <div class="flex space-x-2">
                    <x-button flat label="Cancel" wire:click="$emit('closeModal')" />
                    <x-button wire:click="save" type="button" primary label="Save" />
                </div>
            </div>
        </x-slot>
    </x-card>
</div>
