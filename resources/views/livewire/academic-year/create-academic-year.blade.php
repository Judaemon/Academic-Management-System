<div wire:ignore.self>
    <x-card title="Create Academic Year">
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 gap-4">
                <div class="col-span-4">
                    {{-- Change to datetime picker --}}
                    <x-input type="date" wire:model.defer="start_date"  label="Academic Year Start" />
                </div>

                <div class="col-span-4">
                    {{-- Day to Week Choice?? --}}
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
                        wire:model.defer="end_date" 
                        label="Academic Year End" 
                        read-only
                    />
                </div>
            </div>
  
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" wire:click="closeModal" />
                    <x-button wire:click.prevent="save" type="submit" primary label="Save" />
                </div>
            </x-slot>
        </form>
    </x-card>
</div>