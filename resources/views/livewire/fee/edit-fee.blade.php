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

            <div class="col-span-4">
              <x-select 
              label="Academic Year" 
              wire:model.defer="academic_year_id"
              placeholder="Select academic year"
            >
                @foreach ($academic_years as $academic_year)
                    <x-select.option 
                      label="{{ date('j \\ F Y', strtotime($academic_year->start_year)) }} - {{ date('j \\ F Y', strtotime($academic_year->end_year)) }}"
                      value="{{ $academic_year->id }}" 
                    />    
                @endforeach
            </x-select>
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
