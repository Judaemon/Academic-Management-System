<div wire:ignore.self class="form-container">  
    <x-card title="{{ $card_title }}">
        <div class="grid grid-cols-1 gap-4">
            <div class="col-span-4">
                <x-input 
                  wire:model.defer="academic_year.year" 
                  label="Academic Year Level" 
                />
            </div>
  
            <div class="col-span-4">
                <x-textarea 
                  wire:model="academic_year.curriculum" 
                  label="Curriculum" 
                />
            </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <x-button 
                  flat 
                  label="Cancel" 
                  wire:click="closeModal" 
                />
                <x-button 
                  wire:click="save" 
                  type="button" 
                  primary 
                  label="Update" 
                />
            </div>
        </x-slot>
    </x-card>
</div>
