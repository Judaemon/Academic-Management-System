<div id="view-grade-level">
    <x-card title="Viewing Grade Level">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-4">
            <div class="col-span-12">
                <x-input readonly wire:model.defer="grade_level.name" label="Grade Level Name" placeholder="" />
            </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <x-button primary icon="x" label="Close" wire:click="closeModal" />
            </div>
        </x-slot>
    </x-card>
</div>