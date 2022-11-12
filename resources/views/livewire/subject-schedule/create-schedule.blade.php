<div wire:ignore.self>
    <x-card title="Create Schedule">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-4">
            <div class="col-span-6">
                <x-input wire:model.defer="time" label="Time" />
            </div>

            <div class="col-span-6">
                <x-datetime-picker
                    without-time
                    wire:model="day" 
                    label="Day" 
                />
            </div>

            <div class="col-span-6">
                <x-select label="Teacher" wire:model.defer="teacher" placeholder="Select teacher" :async-data="route('users.teachers')"
                        option-label="full_name" option-value="id" />
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
