<div wire:ignore.self>
    <x-card title="Create School Fee">
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 gap-4">
                <div class="col-span-4">
                    <x-input label="School Fee Name" corner-hint="e.g.Tuition Fee, Miscellaneous Fee" wire:model.defer="name" />
                </div>

                <div class="col-span-4">
                    <x-inputs.currency label="Amount" corner-hint="Ex: 20000" wire:model.defer="amount" />
                </div>

                <div class="col-span-4">
                    <x-select 
                        label="Grade Level" 
                        placeholder="Select grade level"
                        wire:model.defer="grade_level"
                    >
                        @foreach ($grade_levels as $grade_level)
                            <x-select.option label="{{ $grade_level->name }}" value="{{ $grade_level->id }}" />    
                        @endforeach
                    </x-select>
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