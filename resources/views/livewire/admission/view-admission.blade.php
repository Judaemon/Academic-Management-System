<div wire:ignore.self>
    <x-card title="View Admission">
        <div class="grid grid-cols-1 p-4">
            <div class="col-span-4 flex flex-row space-x-4 mb-5">
                <div class="w-1/2">
                    <x-datetime-picker
                        readonly
                        without-time
                        wire:model.defer="date_enrolled" 
                        label="Date Enrolled" 
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