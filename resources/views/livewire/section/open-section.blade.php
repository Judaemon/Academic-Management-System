<div wire:ignore.self class="form-container">
    <x-card title="{{ $cardTitle }}">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-4">
            <div class="col-span-4">
                <x-input wire:model.defer="section.name" label="Name" placeholder="Mapagmahal" />
            </div>

            <div class="col-span-4">
                <x-input wire:model.defer="section.subjects_id" label="Subjects ID" placeholder="x" />
            </div>

            <div class="col-span-4">
                <x-input wire:model.defer="section.class_limit" label="Class Limit" placeholder="00" />
            </div>

            <div class="col-span-4">
                <x-input wire:model.defer="section.column_5" label="Column 5" placeholder="x" />
            </div>

            <div class="col-span-4">
                <x-input wire:model.defer="section.grade_level_id" label="Grade Level ID" placeholder="1" />
            </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button flat negative label="Delete" wire:click="deleteDialog" />
        
                <div class="flex space-x-2">
                    <x-button flat label="Cancel" wire:click="closeModal" />
                    <x-button wire:click="save" type="button" primary label="Save" />
                </div>
            </div>
        </x-slot>
    </x-card>
</div>
