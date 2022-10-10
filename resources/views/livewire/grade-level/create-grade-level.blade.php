<div>
    <x-button primary onclick="$openModal('modalCreate')" label="ADD GRADE LEVEL" />
    
    <x-modal wire:model.defer="modalCreate" max-width="5xl">
        <x-card title="New grade level">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-4">
                <div class="col-span-4">
                    <x-input wire:model.defer="grade_level.name" label="Grade Level Name" placeholder="" />
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