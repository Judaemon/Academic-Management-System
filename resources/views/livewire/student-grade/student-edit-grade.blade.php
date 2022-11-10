<div wire:ignore.self class="form-container">
    <x-card title="Grade Information">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-4">
            <div class="col-span-6">
                <x-input wire:model.defer="grade.first_quarter" label="First Quarter" placeholder="99" />
            </div>

            <div class="col-span-6">
                <x-input wire:model.defer="grade.second_quarter" label="Second Quarter" placeholder="99" />
            </div>

            <div class="col-span-6">
                <x-input wire:model.defer="grade.third_quarter" label="Third Quarter" placeholder="99" />
            </div>

            <div class="col-span-6">
                <x-input wire:model.defer="grade.fourth_quarter" label="Fourth Quarter" placeholder="99" />
            </div>

            
        </div>

        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <x-button flat label="Cancel" wire:click="closeModal" />

                <x-button wire:click="save" type="button" primary label="Save" />
            </div>
        </x-slot>
    </x-card>
</div>