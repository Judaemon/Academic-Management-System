<div wire:ignore.self>
    <x-card title="View Academic Year">
        <div class="grid grid-cols-1 p-4">
            <div class="col-span-4 flex flex-row space-x-4 mb-5">
                <div class="w-1/2">
                    <x-datetime-picker
                        without-time
                        wire:model.defer="start_date" 
                        label="Start Date" 
                        read-only
                    />
                </div>
  
                <div class="flex justify-center items-center pt-5">
                    <x-icon name="arrow-right" class="w-5 h-5" solid />
                </div>

                <div class="w-1/2">
                    <x-datetime-picker
                        without-time
                        wire:model="end_date" 
                        label="End Date" 
                        read-only
                    />
                </div>
            </div>

            <div class="col-span-4">
                <x-input
                    type="number"
                    label="Number of School Days (In Days)" 
                    corner-hint="Ex: 128 days" 
                    wire:model="school_days" 
                    read-only
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