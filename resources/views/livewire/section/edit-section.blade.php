<div wire:ignore.self class="form-container overflow-visible">
    <x-card >
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-4">
            <div class="col-span-4">
                <x-input wire:model.defer="section.name" label="Name" placeholder="Grade 1 - Fuschia" />
            </div>

            <div class="col-span-4">
                <x-input wire:model.defer="section.teacher_id" label="Capacity" placeholder="15" />
            </div>

            <div class="col-span-4">
                <x-select
                        label="Select Teacher"
                        wire:model.defer="teacher"
                        placeholder="Select Teacher"
                    >
                        @foreach ($teachers as $teacher)
                            <x-select.option label="{{ $teacher->firstname }} {{ $teacher->lastname }}" value="{{ $teacher->id }}" />
                        @endforeach
                </x-select>
            </div>

            <div class="col-span-4">
                <x-input wire:model.defer="section.grade_level_id" label="Grade Level ID" placeholder="1" />
            </div>

            <div class="col-span-8">
                <x-select
                    label="Add subjects"
                    placeholder="Select subjects"
                    wire:model.defer="section_subjects"
                    multiselect
                >

                    @foreach ($subjects as $subject)
                        <x-select.option label="{{ $subject->name }}" value="{{ $subject->id }}" />
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
