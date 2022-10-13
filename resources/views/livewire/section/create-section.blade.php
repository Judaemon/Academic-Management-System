<div wire:ignore.self>
    <x-card title="Create Section">
        <form wire:submit.prevent="save">
            <div class="sm:grid sm:grid-cols-2 md:grid-cols-12 gap-4">
                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="name" label="Name" placeholder="Type section name here" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input wire:model.defer="capacity" label="Capacity" placeholder="Type maximum capacity here" type="number" min="0"  />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-select
                        label="Teacher"
                        wire:model.defer="teacher"
                        placeholder="Select teacher"
                    >
                        @foreach ($teachers as $teacher)
                            <x-select.option label="{{ $teacher->firstname }} {{ $teacher->lastname }}" value="{{ $teacher->id }}" />
                        @endforeach
                    </x-select>
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-select
                        label="Grade level"
                        wire:model="grade_level"
                        placeholder="Select grade level"
                    >
                        @foreach ($grade_levels as $grade_level)
                            <x-select.option label="{{ $grade_level->name }}" value="{{ $grade_level->id }}" />
                        @endforeach
                    </x-select>
                </div>

                <div class="sm:col-span-2 md:col-span-8">
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
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" wire:click="closeModal" />
                    <x-button wire:click.prevent="save" type="submit" primary label="Save" />
                </div>
            </x-slot>
        </form>
    </x-card>
</div>
