<div wire:ignore.self>
    <x-card title="Create Announcement">
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 gap-4 p-4">
                <div class="col-span-4">
                    <x-input label="Announcement Title" corner-hint="" wire:model.defer="title" />
                </div>

                <div class="col-span-4">
                    <x-input label="Announcement Description" corner-hint="Ex: 20000" wire:model.defer="description" />
                </div>

                <div class="col-span-4">
                    <x-datetime-picker 
                        without-time
                        wire:model.defer="date" 
                        label="Date" 
                    />
                </div>
            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" wire:click="closeModal" />
                    <x-button wire:click.prevent="save" type="submit" primary label="Save" />
                </div>
            </x-slot>
        </form>
    </x-card>
</div>
