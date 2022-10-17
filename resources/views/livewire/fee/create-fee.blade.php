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
                    label="Grade Level" 
                    wire:model.defer="grade_level_id"
                    placeholder="Select grade level"
                  >
                      @foreach ($grade_levels as $grade_level)
                          <x-select.option 
                            label="{{ $grade_level->name }}"
                            value="{{ $grade_level->id }}" 
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