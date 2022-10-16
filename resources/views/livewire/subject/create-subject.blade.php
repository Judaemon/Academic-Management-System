<div wire:ignore.self>
    <x-card title="Create form">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-4">
            <div class="col-span-6">
                <x-input wire:model.defer="subject.name" label="Name" placeholder="Thesis 1" />
            </div>

            <div class="col-span-6">
                <x-select
                    wire:ignore
                    label="Teacher"
                    wire:model.defer="teacher"
                    placeholder="Select Teacher"
                    :async-data="route('users.teachers')"
                    option-label="full_name"
                    option-value="id"
                /> 
            </div>

            <div class="col-span-6">
                <x-input wire:model.defer="subject.subject_code" label="Subject Code" placeholder="THESCS1" />
            </div>

            <div class="col-span-6">
                <x-select
                    label="Grade Level"
                    wire:model.defer="grade_level"
                    placeholder="Select Grade Level"
                >
                    @foreach ($grade_levels as $grade_level)
                        <x-select.option label="{{ $grade_level->name }}" value="{{ $grade_level->id }}" />
                    @endforeach
                </x-select>
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
