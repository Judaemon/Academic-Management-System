<div wire:ignore.self class="form-container">  
    <x-card title="{{ $card_title }}">
        <div class="grid grid-cols-1 gap-4">

            <div class="col-span-4">
                <x-input 
                  wire:model.defer="fee_name" 
                  label="Fee Name" 
                />
            </div>

            <div class="col-span-4">
                <x-inputs.currency 
                  label="Fee Amount" 
                  wire:model.defer="amount" 
                />
            </div>

            {{-- <div class="col-span-4">
                <x-native-select 
                  label="Select Grade Level" 
                  wire:model.defer="grade_level_id
                >
                    @foreach ($grade_levels as $grade_level)
                        <option value="{{ $grade_level->id }}">{{ $grade_level->??? }}</option>
                    @endforeach
                </x-native-select>
            </div> --}}
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
