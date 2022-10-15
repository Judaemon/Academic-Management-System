<div wire:ignore.self>
    <x-card title="Create Grade Level">
        <form wire:submit.prevent="save">
            <div class="sm:grid sm:grid-cols-2 md:grid-cols-12 gap-4">
                <div class="col-span-12">
                    <x-input wire:model.defer="name" label="Grade Level Name" placeholder="" />
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
