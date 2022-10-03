<div>
    <x-button icon="pencil" info onclick="$openModal('modalEdit')" label="Edit" />
    <x-button icon="eye" green onclick="$openModal('modalView')" label="View" />
    <x-button icon="trash" negative onclick="#"  label="Remove" />

    <x-modal wire:model.defer="modalView" max-width="2xl">
        <x-card title="VIEW ACADEMIC YEAR">
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
                    <x-button flat label="Close" wire:click="closeModal" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>