<div wire:ignore.self class="form-container">
    <x-card title="Schedule Information">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-4">
                <div class="col-span-6">
                    <x-input readonly value="{{ $schedule->time}}" label="Time" />
                </div>

                <div class="col-span-6">
                    <x-input readonly value="{{ $schedule->day}}" label="Day" />
                </div>

                <div class="col-span-6">
                    <x-select label="Teacher" wire:model.defer="schedule.teacher_id" placeholder="Select teacher"
                    :async-data="route('users.teachers')" option-label="full_name" option-value="id" readonly />
                </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <x-button primary icon="x" label="Close" wire:click="closeModal" />
            </div>
        </x-slot>
    </x-card>
</div>
