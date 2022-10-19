<div wire:ignore.self class="form-container">  
    <x-card title="Update Academic Year">
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 p-4">
                <div class="col-span-4 flex flex-row space-x-4 mb-5">
                    <div class="w-1/2">
                        <x-datetime-picker
                            without-time
                            wire:model.defer="start_date" 
                            label="Start Date" 
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
                        />
                    </div>
                </div>

                <div class="col-span-4">
                    <x-input
                        type="number"
                        label="Number of School Days" 
                        corner-hint="Ex: 128 days" 
                        wire:model="school_days" 
                        suffix="days"
                    />
                </div>
            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" wire:click="closeModal" />
                    <x-button wire:click.prevent="save" type="submit" primary label="Update" />
                </div>
            </x-slot>
        </form>
    </x-card>
</div>
