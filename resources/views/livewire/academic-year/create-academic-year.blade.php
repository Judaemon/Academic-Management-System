<div>
    <x-button primary onclick="$openModal('modalCreate')" label="ADD ACADEMIC YEAR" />
    
    <x-modal wire:model.defer="modalCreate" max-width="2xl">
        <x-card title="New academic year">
            <div class="grid grid-cols-1 gap-4">
                <div class="flex flex-row space-x-4">
                    <div class="grow">
                        <x-input type="date" wire:model.defer="academic_year.start_year" label="Start of Academic Year" placeholder="" />
                    </div>
      
                    <div class="pt-5">
                        <span class="font-bold text-xl-center text-gray-400">_</span>
                    </div>

                    <div class="grow">
                        <x-input type="date" wire:model.defer="academic_year.end_year" label="End of Academic Year" placeholder="" />
                    </div>
                </div>

                <div class="col-span-1">
                    <x-textarea wire:model.defer="academic_year.curriculum" label="Curriculum" placeholder="Enter curriculum description..." />
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