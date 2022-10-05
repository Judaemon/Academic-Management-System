<div wire:ignore.self class="form-container">  
    <x-card title="{{ $card_title }}">
        <div class="grid grid-cols-1 gap-4">
          <div class="col-span-4">
            <x-input wire:model.defer="school_fee.fee_name" label="School Fee Name" />
          </div>

          <div class="col-span-4">
            <x-native-select 
              label="Select Academic Year" 
              wire:model.defer="school_fee.academic_year_id"
            >
              @foreach ($academic_year as $academic_year)
                <option value="{{ $academic_year->id }}">{{ $academic_year->year }}</option>
              @endforeach
            </x-native-select>
          </div>
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
