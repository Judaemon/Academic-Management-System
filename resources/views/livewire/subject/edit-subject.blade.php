<div wire:ignore.self class="form-container">
    <x-card title="Subject Information">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-4">
            <div class="col-span-6">
                <x-input wire:model.defer="subject.name" label="Name" placeholder="Thesis 1" />
            </div>

            <div class="col-span-6">
                <x-input wire:model.defer="subject.subject_code" label="Subject code" placeholder="THESCS1" />
            </div>

            <div class="col-span-6">
                <x-select
                    label="Teacher"
                    wire:model.defer="subject.teacher_id"
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
                    wire:model.defer="subject.grade_level_id"
                    :async-data="route('grade_level.grade_level')"
                    option-label="name"
                    option-value="id"
                />
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
