<div wire:ignore.self>
    <x-card title="Create School Fee">
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 gap-4 p-4">
                <div class="col-span-4">
                    <x-input label="School Fee Name" corner-hint="e.g.Tuition Fee, Miscellaneous Fee" wire:model.defer="name" />
                </div>

                <div class="col-span-4">
                    <x-inputs.currency label="Amount" corner-hint="Ex: 20000" wire:model.defer="amount" />
                </div>

                <div class="col-span-4">
                    <x-select 
                        label="Grade Level" 
                        wire:model.defer="grade_level"
                        placeholder="Select grade level"
                        :async-data="route('grade_level.grade_level')"
                        option-label="name"
                        option-value="id"
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