<div wire:ignore.self>
    <x-card title="View Attendance">
        <div class="grid grid-cols-1 p-4">
            
            <div class="col-span-12 flex flex-row space-x-6 mb-5">
                <x-select label="Status" wire:model.defer="status" placeholder="Select Status" readonly>
                    <x-select.option label="Present" value="Present" />
                    <x-select.option label="Absent" value="Absent" />
                </x-select>
            </div>

            <div class="col-span-12 flex flex-row space-x-6 mb-5">
                <div class="w-1/2">
                    <x-datetime-picker
                        without-time
                        wire:model="attendance_date" 
                        label="Date"
                        readonly
                    />
                </div>
            </div>

            <div class="col-span-12">
                <x-select
                    wire:ignore
                    label="Students"
                    rightIcon="user"
                    wire:model.defer="student_id"
                    placeholder="Select Students"
                    :async-data="route('users.users')"
                    option-label="name"
                    option-value="id"
                    option-description="email"
                    multiselect
                    class="w-5/6"
                    readonly
                />
            </div>
        </div>
  
        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <x-button flat label="Close" wire:click="closeModal" />
            </div>
        </x-slot>
    </x-card>
</div>