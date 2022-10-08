<div id="view-academic-year">
    <x-card title="Viewing Academic Year">
        <div class="grid grid-cols-1 gap-4">
          <div class="flex flex-row space-x-4">
            <div class="grow">
                <x-input readonly type="date" wire:model.defer="academic_year.start_year" label="Start of Academic Year" placeholder="" />
            </div>

            <div class="pt-5">
                <span class="font-bold text-xl-center text-gray-400">_</span>
            </div>

            <div class="grow">
                <x-input readonly type="date" wire:model.defer="academic_year.end_year" label="End of Academic Year" placeholder="" />
            </div>
          </div>

          <div class="col-span-1">
            <x-textarea readonly wire:model.defer="academic_year.curriculum" label="Curriculum" placeholder="Enter curriculum description..." />
          </div>

        </div>

        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <x-button primary icon="x" label="Close" wire:click="closeModal" />
            </div>
        </x-slot>
    </x-card>
</div>