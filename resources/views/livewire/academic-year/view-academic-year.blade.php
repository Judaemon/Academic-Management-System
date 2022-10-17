<div wire:ignore.self>
    <x-card title="View Academic Year">
        <div class="grid grid-cols-1 gap-4">
            <div class="col-span-4">
                <x-datetime-picker
                    without-time
                    wire:model.defer="start_date" 
                    label="Academic Year Start" 
                    read-only
                />
            </div>

            <div class="col-span-4">
                <x-input
                    type="number"
                    label="Number of School Days" 
                    corner-hint="Ex: 128 days" 
                    wire:model.defer="school_days" 
                    read-only
                />
            </div>

            <div class="col-span-4">
                <x-datetime-picker
                    without-time
                    wire:model.defer="end_date" 
                    label="Academic Year End" 
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