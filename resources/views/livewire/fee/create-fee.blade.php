<div wire:ignore.self>
  <x-card title="Create School Fee">
      <form wire:submit.prevent="save" class=>
          <div class="grid grid-cols-1 gap-4">
              <div class="col-span-4">
                  <x-input 
                    wire:model.defer="fee_name" 
                    label="Fee Name" 
                    corner-hint="e.g.Tuition Fee, Miscellaneous Fee" 
                  />
              </div>

              <div class="col-span-4">
                  <x-inputs.currency 
                    label="Fee Amount" 
                    corner-hint="Ex: 20000" 
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
                    type="button"
                  />

                  <x-button 
                    wire:click="save" 
                    type="button" 
                    primary 
                    label="Save" 
                  />
              </div>
          </x-slot>
      </form>
  </x-card>
</div>