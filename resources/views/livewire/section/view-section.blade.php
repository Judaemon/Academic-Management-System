<div wire:ignore.self class="form-container">
    <x-card title="{{ $cardTitle }}">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-4">
                <div class="col-span-4">
                    <x-input readonly wire:model.defer="section.name" label="Name" placeholder="Grade 1 - Fuschia" />
                </div>

                <div class="col-span-4">
                    <x-input readonly wire:model.defer="section.capacity" label="Capacity" placeholder="15" />
                </div>

                <div class="col-span-4">
                    <x-input readonly wire:model.defer="section.teacher_id" label="Teacher ID" placeholder="0" />
                </div>

                <div class="col-span-4">
                    <x-input readonly wire:model.defer="section.grade_level_id" label="Grade Level ID" placeholder="1" />
                </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <x-button primary icon="x" label="Close" wire:click="closeModal" />
            
            </div>
        </x-slot>
    </x-card>
</div>
