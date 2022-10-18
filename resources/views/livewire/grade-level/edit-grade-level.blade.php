<div wire:ignore.self class="form-container">
    <x-card title="Edit Grade Level">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-4">
            <div class="col-span-12">
                <x-input wire:model.defer="grade_level.name" label="Grade Level Name" placeholder="" />
            </div>

            <div class="col-span-12">
                <x-select
                    label="Subjects"
                    placeholder="Select subjects"
                    wire:model.defer="grade_level_subjects"
                    :async-data="route('subjects.subjects')"
                    option-label="name"
                    option-value="id"
                    multiselect
                />
            </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
              <x-button flat label="Cancel" wire:click="closeModal" />
              <x-button wire:click="save" type="button" primary label="Update"
                />
            </div>
        </x-slot>
    </x-card>
</div>
