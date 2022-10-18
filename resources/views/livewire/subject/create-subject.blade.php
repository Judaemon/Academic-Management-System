<div wire:ignore.self>
    <x-card title="Create Subject">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-4">
            <div class="col-span-6">
                <x-input wire:model.defer="name" label="Name" placeholder="Thesis 1" />
            </div>

            <div class="col-span-6">
                <x-input wire:model.defer="subject_code" label="Subject code" placeholder="THESCS1" />
            </div>

            <div class="col-span-6">
                <x-select
                    wire:ignore
                    label="Teacher"
                    wire:model.defer="teacher"
                    placeholder="Select teacher"
                    :async-data="route('users.teachers')"
                    option-label="full_name"
                    option-value="id"
                />
            </div>

            <div class="col-span-6">
                <x-select
                    label="Grade level"
                    placeholder="Select grade level"
                    wire:model.defer="grade_level"
                    :async-data="route('grade_level.grade_level')"
                    option-label="name"
                    option-value="id"
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
