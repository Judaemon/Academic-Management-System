<div wire:ignore.self>
    <x-card title="Edit Section">
        <form wire:submit.prevent="save">
            <div class="sm:grid sm:grid-cols-2 md:grid-cols-12 gap-4">
                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $section->name }}" label="Name" placeholder="Type section name here" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-input readonly value="{{ $section->capacity}}" label="Capacity" placeholder="15" />
                </div>

                <div class="sm:col-span-1 md:col-span-4">
                    <x-select
                        readonly
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
                        readonly
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
                        readonly
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
                    <x-button primary icon="x" label="Close" wire:click="closeModal" />
                </div>
            </x-slot>
        </form>
    </x-card>
</div>
