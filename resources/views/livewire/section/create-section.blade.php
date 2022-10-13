<div wire:ignore.self>
    <x-button primary onclick="$openModal('modalCreate')" label="CREATE SECTION " />
    
    <x-modal wire:model.defer="modalCreate" max-width="3xl">
        <x-card title="Create form">
            <form wire:submit.prevent="save">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <x-input wire:model.defer="section.name" label="Name" placeholder="Grade 1 - Fuschia" />
                    </div>
    
                    <div class="col-span-4">
                        <x-input wire:model.defer="section.capacity" label="Capacity" placeholder="15" />
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
                        <x-select
                            label="Select Grade Level ID"
                            wire:model.defer="grade_level_id"
                            placeholder="Select Grade Level ID"
                        >
                            @foreach ($gradelevels as $gradelevel)
                                <x-select.option label="{{ $gradelevel->name }}" value="{{ $gradelevel->id }}" />
                            @endforeach
                        </x-select>
                    </div>
    
                    <div class="col-span-8">
                        <x-select
                            label="Add subjects"
                            placeholder="Select subjects"
                            wire:model.defer="addSubject"
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
                        <x-button flat label="Cancel" wire:click="close" />
                        <x-button wire:click.prevent="save" type="button" primary label="Save" />
                    </div>
                </x-slot>
            </form>
        </x-card>
    </x-modal>
</div>
