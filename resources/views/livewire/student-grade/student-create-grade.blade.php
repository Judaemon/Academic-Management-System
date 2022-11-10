<div wire:ignore.self>
    <x-card title="Assign Grade">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-4">
            <div class="col-span-6">
                <x-input wire:model.defer="first_quarter" label="First Quarter" placeholder="99" />
            </div>

            <div class="col-span-6">
                <x-input wire:model.defer="second_quarter" label="Second Quarter" placeholder="99" />
            </div>

            <div class="col-span-6">
                <x-input wire:model.defer="third_quarter" label="Third Quarter" placeholder="99" />
            </div>

            <div class="col-span-6">
                <x-input wire:model.defer="fourth_quarter" label="Fourth Quarter" placeholder="99" />
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
