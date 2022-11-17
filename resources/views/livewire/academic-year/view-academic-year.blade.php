<div wire:ignore.self>
    <x-card title="View Academic Year">
        <div class="grid grid-cols-1 p-4">
            <div class="col-span-4 flex flex-row space-x-6 mb-5">
                <div class="w-1/2">
                    <x-input readonly label="Title" wire:model.defer="title" />
                </div>

                <div class="w-1/2">
                    <x-native-select readonly label="Select Status" placeholder="Select one status" :options="['Open', 'Ongoing', 'Closed']"
                        wire:model="status" />
                </div>
            </div>

            <div class="col-span-4 flex flex-row space-x-6 mb-5">
                <div class="w-1/2">
                    <x-input rightIcon="calendar" value="{{ date('F j, Y', strtotime($academic_year->start_date)) }}"
                        label="Start Date" readonly />
                </div>

                <div class="flex justify-center items-center pt-5 uppercase text-sm text-gray-400">
                    TO
                </div>

                <div class="w-1/2">
                    <x-input rightIcon="calendar" value="{{ date('F j, Y', strtotime($academic_year->end_date)) }}"
                        label="End Date" readonly />
                </div>
            </div>

            <div class="col-span-4">
                <x-input type="number" label="Number of School Days (In Days)" corner-hint="Ex: 128 days"
                    wire:model.defer="school_days" readonly />
            </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <x-button flat label="Close" wire:click="closeModal" />
            </div>
        </x-slot>
    </x-card>
</div>
