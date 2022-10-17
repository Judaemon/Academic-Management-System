<div wire:ignore.self>
    <x-card title="New academic year">
        <div class="grid grid-cols-1 gap-4">
            <div class="col-span-4">
                {{-- Change to datetime picker --}}
                <x-input
                  type="date"
                  wire:model.defer="start_date" 
                  label="Academic Year Start" 
                />
            </div>

            <div class="col-span-4">
                <x-input
                  type="number"
                  label="Number of School Days" 
                  corner-hint="Ex: 128 days" 
                  wire:model.defer="school_days" 
                />
            </div>

            <div class="col-span-4">
                <x-datetime-picker
                  without-time
                  wire:keydown.enter="calculateEndDate"
                  wire:model.defer="end_date" 
                  label="Academic Year End" 
                  read-only
                />
            </div>
        </div>
  
        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <x-button 
                  flat 
                  label="Cancel" 
                  wire:click="closeModal" 
                  type="button"
                />

                <x-button 
                  wire:click="save" 
                  type="button" 
                  primary 
                  label="Save" 
                />
            </div>
        </x-slot>
    </x-card>
</div>