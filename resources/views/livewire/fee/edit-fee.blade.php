<div wire:ignore.self class="form-container">  
    <x-card title="{{ $card_title }}">
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 gap-4">
                <div class="col-span-4">
                    <x-input wire:model.defer="fee_name" label="Fee Name" />
                </div>

                <div class="col-span-4">
                    <x-inputs.currency label="Fee Amount" wire:model.defer="amount" />
                </div>

                <div class="col-span-4">
                    <x-select 
                        label="Grade Level" 
                        wire:model.defer="grade_level_id"
                        placeholder="Select grade level"
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
                    <x-button wire:click="save" type="submit" primary label="Update" />
                </div>
            </x-slot>
        </form>
    </x-card>
</div>
