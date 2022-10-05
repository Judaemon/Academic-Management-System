<div>
    <x-button primary onclick="$openModal('modalCreate')" label="ADD ACADEMIC YEAR LEVEL" />
    
    <x-modal wire:model.defer="modalCreate" max-width="2xl">
        <x-card title="CREATE ACADEMIC YEAR">
            <div class="grid grid-cols-1 gap-4">
                <div class="col-span-4">
                    <x-input wire:model.defer="academic_year.year" label="Academic Year Level" placeholder="" />
                </div>
  
                <div class="col-span-4">
                    <x-textarea wire:model="academic_year.curriculum" label="Curriculum" placeholder="Enter curriculum description..." />
                </div>
  
            </div>
  
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" wire:click="closeModal" />
  
                    <x-button wire:click="save" type="button" primary label="Save" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>